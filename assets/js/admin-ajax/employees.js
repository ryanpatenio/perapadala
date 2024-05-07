$(document).ready(function(){
    const addModal = $('#employeeModal');
    const editModal = $('#editEmployeeModal');
    const viewModal = $('#viewEmployeeModal');
    const assignModal = $('#assignModal');
    const removeModal = $('#removeAssignModal');

      $('#newEmployeeForm').submit(function(e){
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
          url:'admin-addEmployee',
          method:'post',
          data:formData,
          dataType:'json',

          success:function(response){
             //res(response)
            formModalClose(addModal,$('#newEmployeeForm'));

            if(response.message == 'success'){
              message('New Employee added Successfully!','success');
            }
          },

          error:function(xhr,status,error){
            res(xhr.responseText);
            if(xhr.responseJSON.message == 'email_exist'){
              msg('Email is already Exist','info');
              $('#email').val('').focus();
            }
            if(xhr.status == 400){
              msg('Oops! Validation error','error');
            }
            if(xhr.status == 500){
              msg('Oops! unexpected Internal Server Error!','error');
            }
          }
          

        });

      });


      $(document).on('click','#edit_btn',function(e){
        e.preventDefault()

        //reset form first
        resetForm($('#updateForm'));
        const id = $(this).attr('data-id');
        
        $.ajax({
          url:'admin-edit-employee',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
            $('#e-id').val(data.employee_id);
            
            $('#edit-fname').val(data.fname);
            $('#edit-lname').val(data.lname);
            $('#edit-email').val(data.email);
            $('#edit-contact').val(data.contact);
            $('#edit-address').val(data.address);
            
            //job
            $('#current-job').val(data.job_id);
            $('#current-job').text(data.job_title);
            $('#old-job').val(data.job_id);

            //date
            $('#hire-date').val(data.hire_date);

            $('#editEmployeeModal').modal('show');

          },

          error:function(xhr,status,error){
            
            res(xhr.responseText);
            if(xhr.status == 400){
              msg('Oops! unexpected Error return ID null','error');
            }
            if(xhr.status == 500){
              msg('Oops! unexpected Internal Server Error','error');
             
            }
           
          }

        });
     
      });

      $('#updateForm').submit(function(e){
        e.preventDefault();
        const formData = $(this).serialize();
        swal({
            title: "Are you sure you want Update this Employee?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

          if(willconfirmed){

            $.ajax({
                url:'admin-update-employee',
                method:'post',
                data:formData,
                dataType:'json',

                success:function(response){
                  //res(response)
                  formModalClose(editModal,$('#updateForm'));
                  if(response.message == 'success'){
                    message('Employee Updated Successfully!','success');
                  }
                },

                error:function(xhr,status,error){
                  //res(xhr.responseText);
                  if(xhr.responseJSON.message == 'email_exist'){
                    msg('Email is already Exist','info');
                  
                  }
                  if(xhr.responseJSON.message == 'BP_hasBranch_assign'){
                    msg('Oops! This employee is already assigned to a branch. If you want to change their job title, you must first remove the branch assignment','error');
                  }
                  if(xhr.responseJSON.message == 'AS_hasBranch_assign'){
                    msg('Oops! This employee is already assigned to a branch. If you want to change their job title, you must first remove the branch assignment','error');
                  }

                  if(xhr.responseJSON.message == 'id_null'){
                    msg('Oops Unexpected error return ID null','error');
                  }
                  if(xhr.status == 500){
                    msg('Oopss! unexpected Internal Server Error','error');
                  }
                  if(xhr.responseJSON.message == 'bm_assigned'){
                    formModalClose(editModal,$('#updateForm'));
                    msgThenRedirect("Oops! This employee is currently assigned to one or more branches. If you want to change their job title, you must first remove the employee's assignment from the branch(es). After dismissing this error, you will be redirected to the branches page, where you can locate the employee by name.",'error','admin-branches');
                  }
                }

           });

          }
        });

        

      });
      
      $(document).on('click','#assign-btn',function(e){
        e.preventDefault();
        const id = $(this).attr('data-id');       
        resetForm($('#assignForm'));
        $('#branch').empty();

        $.ajax({
          url:'admin-get-employee-name',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
           // res(data)

          let info = data.emp_info;
          let branches = data.branches;
          
            //set basic info
          $('#employee-name').val(info.fname + ' ' + info.lname);
          $('#job-title').val(info.job_title);
          $('#employee-id').val(info.employee_id);
          $('#job-id').val(info.job_id);
          $('#job-code').val(info.job_code);

           //set data in the select option
           // Check if branches is an array
          if (Array.isArray(branches)) {
              // If branches contains only one item
              if (branches.length === 1) {
                  let branch = branches[0];
                  $('#branch').append('<option value="' + branch.branch_id + '">' + branch.branch_name + '</option>');
              } else {
                  // If branches contains more than one item
                  $.each(branches, function(index, value) {
                      $('#branch').append('<option value="' + value.branch_id + '">' + value.branch_name + '</option>');
                  });
              }
          } else {
              // If branches is not an array but a single object
              $('#branch').append('<option value="' + branches.branch_id + '">' + branches.branch_name + '</option>');
          }

             
            
          },

          error:function(xhr,status,error){
            res(xhr.responseText);
          }

        });
        assignModal.modal('show');

      });

      $('#assignForm').submit(function(e){
        e.preventDefault();

        const formData = $(this).serialize();
        swal({
            title: "Are you sure you want the assigned branch of this Employee?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

          if(willconfirmed){

            $.ajax({
                url:"admin-assignEmployee",
                method:'post',
                data:formData,
                dataType:'json',

                success:function(resp){
                  //res(resp);
                  formModalClose(assignModal,$('#assignForm'));
                  if(resp.message == 'success'){
                    message('The employee has been successfully assigned to the branches','success');
                  }
                },

                error:function(xhr,status,error){
                  res(xhr.reponseText);
                  if(xhr.status == 400){
                    msg('Oops! unexpected error return validation error','error');
                  }
                  if(xhr.status == 500){
                    msg('Oops! unexpected Internal server error!','error');
                  }
                }

        });

          }
        });


      });

      $(document).on('click','#remove-btn',function(e){
          e.preventDefault();

            resetForm($('#removeEmployeeForm'));
            const id = $(this).attr('data-id');
              $.ajax({
                  url:'admin-get-assignBranch',
                  method:'post',
                  data:{id:id},
                  dataType:'json',

                  success:function(data){
                    //res(data);
                    $('#emp-name').val(data.emp_name);
                    $('#jb-title').val(data.job_title);
                    $('#branch-assigned').val(data.branch_name)

                    $('#emp-id').val(data.employee_id);
                    $('#jb-code').val(data.job_code);
                    $('#branch-id').val(data.branch_id);
                    removeModal.modal('show');
                  },
                  error:function(xhr,status,error){
                    res(xhr.responseText);
                  }

          });        
              
      });

      $('#removeEmployeeForm').submit(function(e){
        e.preventDefault();

        const formData  = $(this).serialize();
        swal({
            title: "Are you sure you want remove the assigned branch of this Employee?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
            }).then((willconfirmed) => {

              if(willconfirmed){

                  $.ajax({
                    url:'admin-removeAssignBranch',
                    method:'post',
                    data:formData,
                    dataType:'json',

                    success:function(resp){
                      //res(resp)
                      formModalClose(removeModal,$('#removeEmployeeForm'));
                      if(resp.message == 'success'){
                        message('Employee Assigned Branches was successfully remove','success');
                      }
                    },

                    error:function(xhr,status,error){
                      res(xhr.responseText)
                      if(xhr.status == 500){
                        msg('Oops! unexpected Internal Server Error!','error');
                      }
                      if(xhr.status == 400){
                        msg('Oops! unexpected Error Return Validation error!','error');
                      }
                    }

                  });

              }
            });


      });


      $(document).on('click','#viewBtn',function(e){
        e.preventDefault()
        resetForm($('#viewForm'));
        const id = $(this).attr('data-id');
       
        $.ajax({
          url:'admin-get-employee-details',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
            
            $('#name').val(data.emp_name);   
              
            $('#e-mail').val(data.email);  
            $('#contact').val(data.contact);
            $('#address').val(data.address);
           
            $('#job-name').val(data.job_title);
            if(data.branch_name === null){
              $('#branch-name').val('No assigned branch');
            }else{
              $('#branch-name').val(data.branch_name);
            }
            $('#viewEmployeeModal').modal('show');
           
          },

          error:function(xhr,status,error){
            res(xhr.responseText);
            if(xhr.status == 500){
              msg('Oops! unexpected Internal Server Error!','error');
            }
          }


        });

       
      
      });
      

    });
