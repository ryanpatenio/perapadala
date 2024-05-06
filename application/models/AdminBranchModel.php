<?php


class AdminBranchModel extends CI_Model{
    public function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('response');

    }

    public function fetchBranches(){
        $this->db->select('b.branch_id, b.branch_name, CONCAT(l.province_name, " ", l.city, " ", l.street_name) as location, CONCAT(e.fname, " ", e.lname) as BM');
        $this->db->from('branches b');
        $this->db->join('locations l', 'b.location_id = l.location_id', 'left');
        $this->db->join('employees e', 'b.employee_id = e.employee_id', 'left');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        //return empty array
        return array();

    }

    
public function addBranch($data){

    //seperate important data
    $BM_selected = $data['BM'];
    $location_id = $data['location'];

    //remove data in the array
    unset($data['BM']);
    unset($data['location']);

    $insertData = array(
        'branch_name' => $data['branchName'],
        'location_id' => $location_id,
        'employee_id' => $BM_selected

    );

        if($BM_selected === '' || $BM_selected === null){
            //no Branch Manager Selected
        
            $insert = $this->db->insert('branches',$insertData);
            //update location assign column into mean already assign
            $locationSetAssignTrue = $this->db->where('location_id',$location_id)
                ->update('locations',['assign'=>1]);
            return 1;
        }else{
            //BM selected
            $data = 
            $insert = $this->db->insert('branches',$insertData);
            //set employees Branch Manager Status into 1 mean already assigned
            $setEmployeeAssignStatusTrue = $this->db->where('employee_id',$BM_selected)
                ->update('employees',['bm_status'=>1]);

            //set Location into already assigned
            $locationSetAssignTrue = $this->db->where('location_id',$location_id)
                ->update('locations',['assign'=>1]);
        return 1;
            
        }

    //return 2 error
    return 2;

}

public function getBranchById($id){
    
    
     $query =  $this->db->select('b.branch_id, l.location_id, e.employee_id, b.branch_name, l.province_name, l.city, l.street_name, CONCAT(e.fname, " ", e.lname) AS BM')
            ->from('branches b')
            ->join('locations l', 'b.location_id = l.location_id', 'left')
            ->join('employees e', 'b.employee_id = e.employee_id', 'left')
            ->where('b.branch_id', $id)
            ->get();
    if($query->num_rows() > 0){
        return $query->row_array();
    }else{
        return 2;
    }
}

public function updateBranch($data){
    $branch_id = $data['branch_id'];
    $employee_id = $data['BM'];
    $hiddenCurrentBM_ID = $data['currentBMhidden'];

    $hiddenCurrentLocation = $data['currentLocationHidden'];
    $location_id = $data['location'];

    unset($data['branch_id']);
    unset($data['BM']);
    unset($data['currentLocationHidden']);

    //this array will use into default update data into branch table only!
    $receiveData = array(
        'branch_name'=> $data['branch'],
        'location_id' => $data['location'],
        'employee_id' => $employee_id        
    );



    if($hiddenCurrentLocation == $location_id){
        //user didn't change the location
        #note it is important to check the location if it is change coz the location table has a column for "assign"

        $oldLocation = $location_id;//ss

        //check if the user remove the Branch Manager
         if($employee_id == 'rm'){
             //we gonna clear the employee id in the branches and also in the employees table assign status for BM only
            //first we gonna update the branch
                $updateBranch = $this->db->where('branch_id',$branch_id)->update('branches',
                [
                    'branch_name' => $data['branch'],
                    'location_id' => $oldLocation,
                    'employee_id' => 0,

                ]
        
        );

            //then lets remove the assign status in the employees table into 0
            $updateEmployeeAssignStatus = $this->db->where('employee_id',$hiddenCurrentBM_ID)
                ->update('employees',['bm_status'=>0,'branch_id'=>0]);

        
            //return 1 mean success
            return 1;

         }else{
             //lets check if the user select a branch manager
            if($employee_id == $hiddenCurrentBM_ID){
                //echo 'same BM';
                $update = $this->db->where('branch_id',$branch_id)
                    ->update('branches',$receiveData);
                    return 1;

            }elseif($employee_id === null || $employee_id === ''){
                //echo 'No selected';
                $update = $this->db->where('branch_id',$branch_id)
                ->update('branches',$receiveData);
                return 1;

            }elseif($employee_id != $hiddenCurrentBM_ID){
                //echo 'selected Diff BM';
                $update = $this->db->where('branch_id',$branch_id)
                    ->update('branches',$receiveData);

                //lets update also the !!"SELECTED"!! employee table column bm_status into 1 mean already assigned
                $updateBMstatus = $this->db->where('employee_id',$employee_id)
                ->update('employees',['bm_status'=>1,'branch_id'=>$branch_id]);

                #lets update the OLD BM employee branch_id and bm_status
                $updateEmployeeStatus = $this->db->where('employee_id',$hiddenCurrentBM_ID)
                ->update('employees',[
                    'branch_id'=> 0,
                    'bm_status' => 0
                ]);
                return 1;

            }else{
                echo 'else';
            }
         }
        
        


    }else{
        //user change the location

        $hiddenLocation = $hiddenCurrentLocation;

            
                //check if the user remove the Branch Manager
                if($employee_id == 'rm'){
                //we gonna clear the employee id in the branches and also in the employees table assign status for BM only
                //first we gonna update the branch
                    $updateBranch = $this->db->where('branch_id',$branch_id)->update('branches',
                    [
                        'branch_name' => $data['branch'],
                        'location_id' => $location_id,
                        'employee_id' => 0,

                    ]
            
            );

                //then lets remove the assign status in the employees table into 0
                $updateEmployeeAssignStatus = $this->db->where('employee_id',$hiddenCurrentBM_ID)
                    ->update('employees',['bm_status'=>0,'branch_id'=>0]);
                
                //update the selected location assign status into 1
                $updateSelectedLocation = $this->db->where('location_id',$location_id)
                ->update('locations',['assign'=>1]);

                //update Old Location Assign Status
                $updateOldLocationStatus1 = $this->db->where('location_id',$hiddenLocation)
                    ->update('locations',['assign'=>0]);
            
                //return 1 mean success
                return 1;

            }else{
                #lets check if the user select a branch manager
                #lets check if the user select a branch manager
            if($employee_id == $hiddenCurrentBM_ID){
                //echo 'same BM';
                $update = $this->db->where('branch_id',$branch_id)
                    ->update('branches',$receiveData);

                #update the selected location assign status into 1
                 $updateSelectedLocation = $this->db->where('location_id',$location_id)
                 ->update('locations',['assign'=>1]);

                 #update Old Location Assign Status
                 $updateOldLocationStatus2 = $this->db->where('location_id',$hiddenLocation)
                 ->update('locations',['assign'=>0]);

                return 1;

            }elseif($employee_id === null || $employee_id === ''){
                //echo 'No selected';
                $update = $this->db->where('branch_id',$branch_id)
                ->update('branches',$receiveData);


                 //update the selected location assign status into 1
                 $updateSelectedLocation = $this->db->where('location_id',$location_id)
                 ->update('locations',['assign'=>1]);

                 //update Old Location Assign Status
                 $updateOldLocationStatus2 = $this->db->where('location_id',$hiddenLocation)
                 ->update('locations',['assign'=>0]);

                 return 1;

            }elseif($employee_id != $hiddenCurrentBM_ID){
                //echo 'selected Diff BM';
                $update = $this->db->where('branch_id',$branch_id)
                    ->update('branches',$receiveData);

                //lets update also the !!"SELECTED"!! employee table column bm_status into 1 mean already assigned
                $updateBMstatus = $this->db->where('employee_id',$employee_id)
                ->update('employees',['bm_status'=>1,'branch_id'=>$branch_id]);

                #lets update the OLD BM employee branch_id and bm_status
                $updateEmployeeStatus = $this->db->where('employee_id',$hiddenCurrentBM_ID)
                ->update('employees',[
                    'branch_id'=> 0,
                    'bm_status' => 0
                ]);

                 //update the selected location assign status into 1
                 $updateSelectedLocation = $this->db->where('location_id',$location_id)
                 ->update('locations',['assign'=>1]);

                 //update Old Location Assign Status
                 $updateOldLocationStatus3 = $this->db->where('location_id',$hiddenLocation)
                 ->update('locations',['assign'=>0]);

                return 1;

            }else{
                echo 'else';
            }


            }

    }
    

}

}