function message($text='',$msg_type=''){
    swal($text, {
               icon: $msg_type,
             }).then((confirmed)=>{
                window.location.reload();

        });
 }
 function msgThenRedirect(text,message,url){
    swal(text, {
               icon: message,
             }).then((confirmed)=>{
                window.location.href=url

        });
 }
 function logs(_logs){
  _logs == false;

  if(_logs === true){
    console.log('Sending Request to API...');
  }else{
    console.log('Request Completed...');
  }

 }

 function loader(_status){
  _status == false;

  if(_status === true){
    $('#loader').show();
  }else{
    $('#loader').hide();
  }
 }

 function Redirect(_url,_logs){

  console.log(_logs);

    setTimeout(function() {
      // Delay 1 second to proceed
      window.location.href = _url;

    }, 1000);
  
 }


function msg($text='',$msg_type=''){
    swal($text, {
               icon: $msg_type,
             });
 }

 const resetForm = (thisForm)=>{
   thisForm.get(0).reset();
 }

 const formModalClose = (modalName,thisForm) => {
   $(modalName).modal('hide');
   thisForm.get(0).reset();

 }
 const res = (param) => {
   console.log(param);
 }

 const modalClose = (modalName) => {
   $(modalName).modal('hide');
 }

