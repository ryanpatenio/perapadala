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

