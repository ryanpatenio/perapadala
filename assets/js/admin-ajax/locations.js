
$(document).ready(function(){
    const addModal = $('#newLocationModal');
    const editModal = $('#upLocationModal');

   

    $('#newLocationForm').submit(function(e){
      e.preventDefault();

      const formData = $(this).serialize();

        $.ajax({
          url:'admin-add-location',
          method:'post',
          data:formData,
          dataType:'json',

          success:function(response){
           // console.log(response)
           formModalClose(addModal,$('#newLocationForm'));
            if(response.message == 'success'){
              message('New Location added Successfully!','success');
            }
          },

          error:function(xhr,status,error){
            console.log(xhr.responseText)
            if(xhr.status == 400){
              msg('Oops! unexpected error Return Validatin Error','error');
            }
            if(xhr.status == 500){
              msg('Oops! an error Occur in Server Side','error');
            }
          }

        })

    })


      $(document).on('click','#edit_location_btn',function(e){
          e.preventDefault();
          //reset Form first
          resetForm($('#upLocationForm'));

          //id
          const id = $(this).attr('data-id');
         
            $.ajax({
                url:'admin-editLocation',
                method:'post',
                data:{id:id},
                dataType:'json',

                success:function(data){
                  //console.log(data)
                  
                  $("#location-id").val(data.location_id);
                  $("#province-name").val(data.province_name);
                  $("#city-name").val(data.city);
                  $("#street-name").val(data.street_name);
                  $("#current-region").val(data.region_id);
                  $("#current-region").text(data.region_name);
                },

                error:function(xhr,status,error){
                  console.log(xhr.responseText);
                  if(xhr.status == 400){
                    msg('Oops! unexpected Error return Null','error')
                  }
                  if(xhr.status == 500){
                    msg('Oops! an error Occur Server Error','error');
                  }
                }

            })
          $("#upLocationModal").modal('show');


      });

      $('#upLocationForm').submit(function(e){
        e.preventDefault();

        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update this Location?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

          if(willconfirmed){
            $.ajax({
                  url:'admin-update-location',
                  method:'post',
                  data:formData,
                  dataType:'json',
      
                  success:function(response){
                      //console.log(response)
                      formModalClose(editModal,$('#upLocationForm'));
                      if(response.message == 'success'){
                        message('Location updated Successfully!','success');
                      }
                  },
      
                  error:function(xhr,status,error){
                    console.log(xhr.responseText);
        
                      if(xhr.status == 400){
                        msg('Oops! validation error','error');
                      }
                      if(xhr.status == 401){
                        msg('Oops Unexpected error return Null','error');
                      }
                      if(xhr.status == 500){
                        msg('Oops! unexpected Server Error!','error');
                      }
                  }
  
  
            })


          }
        });


        
      })

  })