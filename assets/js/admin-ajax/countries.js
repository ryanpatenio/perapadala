$(document).ready(function(){

    const addModal = $('#newCountryModal');
    const editModal = $('#editCountryModal');
  
    $('#countryForm').submit(function(e){
      e.preventDefault();
  
      const formData = $(this).serialize();
  
        $.ajax({
          url:'admin-addCountry',
          method:'post',
          data:formData,
          dataType:'json',
  
          success:function(response){
            //console.log(response);
            formModalClose(addModal,$('#countryForm'));
            if(response.message == 'success'){
              message('New Country added Successfully!','success');
            }
          },
  
          error:function(xhr,status,error){
            console.log(xhr.responseText);
            if(xhr.status == 400){
              msg('Opps! unexpected Error!','error');
            }
          }
  
        });
  
    })
  
  
      $(document).on('click','#edit_country_btn',function(e){
          e.preventDefault();
  
          //clear the form firt
          resetForm($('#upCountryForm'));
  
          const id = $(this).attr('data-id');
          $.ajax({
              url:'admin-editCountry',
              method:'post',
              data:{id:id},
              dataType:'json',
  
              success:function(data){
                //console.log(data)
                $('#up-country-id').val(data.country_id);
                $('#up-country-name').val(data.name);
                $("#editCountryModal").modal('show');
  
  
              },
              error:function(xhr,status,error){
                console.log(xhr.responseText);
                if(xhr.status == 400){
                  msg('Oops! Unexpected Error!','error');
                }
              }
  
          }); 
  
  
      });
  
      $('#upCountryForm').submit(function(e){
        e.preventDefault();
  
        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update this Country?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
              
              $.ajax({
                  url:'admin-updateCountry',
                  method:'post',
                  data:formData,
                  dataType:'json',
        
                  success:function(response){
                    //console.log(response)
                      formModalClose(editModal,$('#upCountryForm'));
                      if(response.message == 'success'){
                        message('Country Updated Successfully!','success');
                      }
                  },
        
                  error:function(xhr,status,error){
                      console.log(xhr.responseText)
                      if(xhr.status == 400){
                        msg('Oops! Unexpected error!','error');
                      }
                  }
                  
              });
      

            }
        });
        
        
      })
  
  })