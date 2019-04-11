 // load notifications 
 $(document).ready(function() {
       var email = getCookie("imergencyEmail");

       $.getJSON(vaccinationURL+"_using_email/"+email , function (data) {
           if(data[0].length===4){
               document.getElementById('notiCount').innerHTML='No Notification';
               return;
           }
           document.getElementById('notiCount').innerHTML=data.length+' Notification';
           document.getElementById('notiSpan').innerHTML=data.length;
        
        $.each(data, function (key, value) {
            
        if('Next Vac'===value.status){
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth()+1; 
                    var yyyy = today.getFullYear();
                    
                    if(dd<10) {
                        dd = '0'+dd
                    } 
                    
                    if(mm<10) {
                        mm = '0'+mm
                    } 
                    
                    today = yyyy + '-' + mm + '-' + dd;
                    
                     var d1 = new Date(today);
                     var d2 =  new Date(value.date);
                     
                     if(d1<=d2){
                        //  $("#notiCount").
                         
                         var dif = d2.getDate() - d1.getDate();
                         $("#notiID").append("<div class='dropdown-divider'></div> <a href='#' class='dropdown-item'><i class='fa fa-file mr-2'></i> Next Vaccination  "+value.date+" <span class='float-right text-muted text-sm'>"+dif+" days</span> </a>"); 
                     }else{
                         
                     }
                     
             }
          });
       });
 });
 
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}