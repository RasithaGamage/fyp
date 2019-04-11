// load profile image and 
$( document ).ready(function() {
    var email = getCookie("imergencyEmail");
    var type = getCookie("imergencyUserType");

    localStorage.removeItem("commentetImage");
    if  (type==='user'){
        $.getJSON(userURL + "_current" , function (data) {
          document.getElementById("head-name").innerHTML =data[0]['user_name'];
          
          if(data[0]['image']===''){
             $("#userProp").append("<img class='profile-user-img img-fluid img-circle' src='../dist/img/log_img.jpg' >");
             $("#commenterImage").append("<img class='img-circle img-md'   src='../dist/img/log_img.jpg' >"); 
          }else{
        localStorage.setItem("commentetImage", data[0]['image']);
          $("#commenterImage").append("<img class='img-circle img-md'  src='data:image;base64,"+data[0]['image']+"' >"); 
           $("#userProp").append("<img class='profile-user-img img-fluid img-circle' src='data:image;base64,"+data[0]['image']+"'>"); 
          }
       
        });
    }
    if  (type==='doct'){
        document.getElementById("head-name").innerHTML = "Name Not Found";
        $.getJSON(doctorURL + "_find_email/"+email , function (data) {
          document.getElementById("head-name").innerHTML ="Dr."+data[0]['doctor_name'];
           if(data[0]['image']===''){
               $("#commenterImage").append("<img class='img-circle img-md'  src='../dist/img/log_img.jpg' >"); 
             $("#userProp").append("<img class='profile-user-img img-fluid img-circle' src='../dist/img/log_img.jpg'> ");
          }else{
        localStorage.setItem("commentetImage", data[0]['image']);
          $("#commenterImage").append("<img class='img-circle img-md'  src='../dist/img/log_img.jpg' >"); 
           $("#userProp").append("<img class='profile-user-img img-fluid img-circle' src='../dist/img/log_img.jpg' >"); 
          }
        });
    }

});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
