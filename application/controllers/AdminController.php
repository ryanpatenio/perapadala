<?php 



class AdminController extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('jobModel');
            $this->load->model('CountriesModel');
            $this->load->model('RegionModel');
            $this->load->model('LocationModel');
            $this->load->model('EmployeesModel');
            $this->load->model('AdminBranchModel');
            $this->load->library('response');
        
        }


    public function render(){
        $page = "index";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    

    public function employee_index(){
        $page = "employees";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['jobs'] = $this->jobModel->fetchJob();
        $data['employees'] = $this->EmployeesModel->fetchEmployees();
        $data['branches'] = $this->BranchModel->fetchBranch();
        

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
     
    }

    public function branches_index(){
        $page = "branches";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['locations'] = $this->LocationModel->noAssignLocation();
        $data['BMemployees'] = $this->EmployeesModel->fetchBmEmployeesNotAlreadyAssign();
        $data['branches'] = $this->AdminBranchModel->fetchBranches();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
     
    }

    public function customer_index(){
        $page = "customer";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    
    public function transaction_index(){
        $page = "transactions";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function jobs_index(){
        $page = "jobTitle";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['jobs'] = $this->jobModel->fetchJob();
      

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    public function users_index(){
        $page = "users";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }

    public function profile_index(){
        $page = "profile";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function serviceCharge_index(){
        $page = "serviceCharges";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['sample'] = 'data';


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function countries_index(){
        $page = "countries";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['countries'] = $this->CountriesModel->getCountries();


     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }
    public function regions_index(){
        $page = "regions";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['countries'] = $this->CountriesModel->getCountries();
        $data['regions'] = $this->RegionModel->fetchRegions();

        
        $this->load->view('templates/admin-layout/header');
        $this->load->view('templates/admin-layout/sidebar');
        $this->load->view('admin/'.$page,$data);
        $this->load->view('templates/admin-layout/footer');
    }
    public function locations_index(){
        $page = "locations";

        
        if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
         show_404();

        }
        $data['locations'] = $this->LocationModel->fetchLocations();
        $data['countries'] = $this->CountriesModel->getCountries();
        $data['regions'] = $this->RegionModel->fetchRegions();
       

     $this->load->view('templates/admin-layout/header');
     $this->load->view('templates/admin-layout/sidebar');
     $this->load->view('admin/'.$page,$data);
     $this->load->view('templates/admin-layout/footer');
    }


}