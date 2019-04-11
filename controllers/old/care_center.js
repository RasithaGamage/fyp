// load care centers or window location into dashboard
$(document).ready(function() {
    var email = getCookie("imergencyEmail");
    var select = document.getElementById("category");
     $.getJSON(careCenterURL + "_doctor/"+email , function (data) {
         if(data[0]==='No Doctor Found'){
             window.location='view/dashboard.php';
         }
          if(data[0]==='No Care Centers'){
             window.location='view/dashboard.php';
         }
         
         for(i=0;i<data.length;i++){
             
            if(data.length===1){
                 document.cookie = 'care_center_name='+data[i]['care_center_name'];
                 document.cookie = 'care_centerID='+data[i]['care_centerID'];
                 window.location='view/dashboard.php';
                 
            }
             select.options[i] = new Option(data[i]['care_center_name'], data[i]['care_centerID']);
         }
         
     });
});


function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

// next btn click and go to dashboard (if multiple care centers available) 
$("#btn_login2").on('click', function (event) {
    var center =  document.getElementById("category").value;

    var e = document.getElementById("category");
    var centerName = e.options[e.selectedIndex].text;
    
    document.cookie='care_centerID='+center;
    document.cookie='care_center_name='+centerName;
    
    window.location='view/dashboard.php';

});
