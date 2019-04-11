$( document ).ready(function() {
    // console.log( "ready!" );
    var email = getCookie("imergencyEmail");
    var type = getCookie("imergencyUserType");
    // console.log("type is "+type);
    // console.log("email is "+email);
    
    var detail =  getCookie("care_center_name");
    
    
        // document.getElementById("head-of-name-doctor").innerHTML = "Name Not Found";
        $.getJSON(doctorURL + "_find_email/"+email , function (data) {
              document.getElementById('head-of-name-doctor').innerHTML="Dr. "+data[0]['doctor_name'];
              document.getElementById('head-of-care-center').innerHTML= detail
          
        });
    
});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
