$(document).ready(function(){
    const addModal = $('#newJobModal');
    const editModal = $('#editJobModal');
    
    $('#jobForm').submit(function(e){
      e.preventDefault()
    
      const formData = $(this).serialize();
        $.ajax({
            url:'admin-addJob',
            method:'post',
            data: formData,
            dataType:'json',
    
            success:function(response){
              //console.log(response);
              formModalClose(addModal,$('#jobForm'));
              if(response.message == 'success'){
                message('New Job Added Successfully!','success');
              }
              if(response.message == 'error'){
                message('Oops! an error Occur!','error');
              }
            },
            error:function(xhr,status,error){
              console.log(xhr.responseText);
            }
    
        });
    
    });
    
        $(document).on('click','#edit_job_btn',function(e){
            e.preventDefault();
    
            const id = $(this).attr('data-id');
    
           $.ajax({
              url:"admin-getJob",
              method:'post',
              data:{id:id},
              dataType:'json',
    
              success:function(data){
                //console.log(data);
                $('#up-job-id').val(data.job_id);
                $('#up-job-name').val(data.name);
                $("#up-job-code").val(data.job_code);
                
                $("#editJobModal").modal('show');
              },
    
              error:function(xhr,status,error){
                console.log(xhr.responseText)
               if(xhr.status == 400){
                msg('Opps! unexpected error!','error');
               }
                
              }
    
           });
    
    
           
    
    
        });
    
        $('#upJobForm').submit(function(e){
          e.preventDefault();
    
          const formData = $(this).serialize();

          swal({
              title: "Are you sure you want Update this Job?",
              text:'Please Click the `OK` Button to Continue!',
              icon: "info",
              buttons: true,
              dangerMode: true,
          }).then((willconfirmed) => {

            if (willconfirmed) {
                
                $.ajax({
                    url:'admin-updateJob',
                    method:'post',
                    data:formData,
                    dataType:'json',
          
                    success:function(response){
                        //console.log(response)
                        formModalClose(editModal,$('#upJobForm'));
                        if(response.message == 'success'){
                          message('Job Updated Successfully!','success');
                        }
                    },
          
                    error:function(xhr,status,error){
                        console.log(xhr.responseText)
                        if(xhr.status == 400){
                          msg('Oops! Unexpected Error Occur!','error');
                        }
                    }
                  
                });


              }
          });
    
          
    
        })
    
    })