$(document).ready(function(){
    const addModal = $('#newBranchModal');
    const editModal = $('#editBranchModal');
  
    $('#main').css('filter', 'none');
    $('#loader').hide();
  
  
    var newOption = $('<option>', {
        value: 'rm',
        text: 'Remove Branch Manager',
        id:'rm'
      });
     
    $('#newBranchForm').submit(function(e){
      e.preventDefault()
  
      const formData = $(this).serialize();
        $.ajax({
            url:'admin-add-branch',
            method:'post',
            data:formData,
            dataType:'json',
  
            success:function(response){
              //console.log(response)
              formModalClose(addModal,$('#newBranchForm'));
              if(response.message == 'success'){
                message('New Branch Created Successfully!','success');
              }
            },
  
            error:function(xhr,status,error){
              console.log(xhr.responseText);
  
              if(xhr.status == 400){
                msg('Oops! unexpected error return Validation_errors!','error');
              }
              if(xhr.status == 500){
                msg('Oops! unexpected Server Error!','error');
              }
            }
  
        });
  
    });
  
      $(document).on('click','#edit_branch_btn',function(e){
          e.preventDefault();
          //remove first the append remove option
          $('#rm').remove();
  
         $('#current-bm-hidden').val('');
  
          //lets reset edit form first
          resetForm($('#upBranchForm'));
  
          const id = $(this).attr('data-id');
            $.ajax({
              url:"admin-edit-location",
              method:'post',
              data:{id:id},
              dataType:'json',
  
              success:function(data){
                //console.log(data);
                $("#editBranchModal").modal('show');
  
                //set the current location
                $("#current-location-hidden").val(data.location_id);
  
                $('#current-branch-id').val(data.branch_id);
                $('#branch-name').val(data.branch_name);
                $('#current-location').val(data.location_id);
                $('#current-location').text(data.province_name+' |'+data.city+' |'+data.street_name);
                
                if(data.BM === null || data.BM === ''){
                  $('#current-BM').val('');
                  $('#current-BM').text('select');
                }else{
                  $('#current-BM').val(data.employee_id);
                  $('#current-bm-hidden').val(data.employee_id);
                  $('#current-BM').text(data.BM);
                 //append option for in case the user want to remove the Branch Manager
                  $('#BM').append(newOption);
                }
                
              
              },
  
              error:function(xhr,status,error){
                console.log(xhr.responseText);
                if(xhr.status == 500){
                  msg('Oops! unexpected Internal Server Error!','error');
                }
              }
  
  
            });
  
         
  
  
      });
  
      $('#upBranchForm').submit(function(e){
        e.preventDefault();
  
        const formData = $(this).serialize();
  
        swal({
              title: "Are you sure you want Update this Branch?",
              text:'Please Click the `OK` Button to Continue!',
              icon: "info",
              buttons: true,
              dangerMode: true,
        }).then((willconfirmed) => {
  
          if(willconfirmed){
            
              $.ajax({
                  url:'admin-updateBranch',
                  method:"post",
                  data:formData,
                  dataType:'json',
  
                  success:function(response){
                    //console.log(response);
                    formModalClose(editModal,$('#upBranchForm'));
                    if(response.message == 'success'){
                      message('Branch Updated Successfully!','success');
                    }
                  },
  
                  error:function(xhr,status,error){
                    //console.log(xhr.responseText);
                    if(xhr.status == 400){
                      msg('Oops! unexpected error return Validation errors','error');
                    }
                    if(xhr.status == 500){
                      msg('Oops Unexpected Internal Server Error!','error');
                    }
                  }
  
                });
  
           }
        });
  
         
  
      });
  
  })