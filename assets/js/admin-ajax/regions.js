$(document).ready(function(){
    const addModal = $('#newRegionModal');
    const editModal = $('#editRegionModal');
    
        $('#newRegionForm').submit(function(e){
          e.preventDefault();
    
          const formData = $(this).serialize();
            $.ajax({
                url:'admin-addRegion',
                method:'post',
                data:formData,
                dataType:'json',
    
                success:function(response){
                  //console.log(response)
                  formModalClose(addModal,$("#newRegionForm"));
                  if(response.message == 'success'){
                    message('New Region Added Successfully!','success');
                  }
    
                },
    
                error:function(xhr,status,error){
                  console.log(xhr.responseText)
                  if(xhr.status == 400){
                    msg('Oops! unexpected Error!','error');
                  }
                }
            })
    
        })
    
        $(document).on('click','#edit_region_btn',function(e){
            e.preventDefault();
    
            const id = $(this).attr('data-id');
            //reset form first
            resetForm($('#upRegionForm'));
    
            $.ajax({
              url:'admin-editRegion',
              method:'post',
              data:{id:id},
              dataType:'json',
    
              success:function(data){
               
                $('#up-region-id').val(data.region_id);
                $('#up-region-name').val(data.region_name);
                $('#current-country').text(data.country_name);
                $('#current-country').val(data.country_id);
                $("#editRegionModal").modal('show');
              },
    
              error:function(xhr,status,error){
                console.log(xhr.responseText)
              }
    
            })
            
    
    
        });
    
        $('#upRegionForm').submit(function(e){
          e.preventDefault()
    
          const formData = $(this).serialize();
          
          swal({
              title: "Are you sure you want Update this Region?",
              text:'Please Click the `OK` Button to Continue!',
              icon: "info",
              buttons: true,
              dangerMode: true,
          }).then((willconfirmed) => {

              if(willconfirmed){
                $.ajax({
                    url:'admin-updateRegion',
                    method:'post',
                    data:formData,
                    dataType:'json',
          
                    success:function(response){
                      // console.log(response)
                        formModalClose(editModal,$('#upRegionForm'));
                        if(response.message == 'success'){
                          message('Region Updated Successfully!','success');
                        }
                    },
                    error:function(xhr,status,error){
                        console.log(xhr.responseText)
                        if(xhr.status == 400){
                          msg('Opps! validation Error','error');
                        }
                        if(xhr.status == 401){
                          msg('Oops! Id return Null!','error');
                        }
                        if(xhr.status == 500){
                          msg('Oops! internal Server Error return false!','error');
                        }
                    }
        
                });


              }
          });
           
        })
    
    })