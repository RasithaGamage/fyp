function ParseURLParameter(Parameter){
    var fullUrl = window.location.search.substring(1);
    var parametersArray = fullUrl.split('&');
    for(i=0;i<parametersArray.length;i++){
        var currentParameter = parametersArray[i].split('=');
        if(currentParameter[0]==Parameter){
            return currentParameter[1];
        }
    }
}

// login btn click 
$("#btn_login").on('click', function (event) {
  var email = $('#name').val();
  var password = $('#password').val();

  $.getJSON(userURL + "_email/"+ email , function (data) {
      
      if(data[0].length===4){
          swal("User Email Not Found!", "Invalid Email !  check Email", "error");
          return;
      }
      
    var decodedString;
        if(data[0]['user_type']=='user'){
            decodedString = atob(data[0]['password']);
        }else{
            decodedString=data[0]['password'];
        }
        
        if(data[0]['status']==='Not Active'){
            swal("Please Verify Your Email Address!", "Invalid Email !  check Email", "error");
            return;
        }else{
        if (password == decodedString) {
        
         if(data[0]['user_type']==='doct'){
              document.cookie = "imergencyUserType="+data[0]['user_type'];
              document.cookie = "imergencyEmail="+email;
              
              console.log(data[0]['user_type']);
              console.log(email);
              window.location = "doc_center_login.php";
          
          }else{
              document.cookie = "imergencyUserType="+data[0]['user_type'];
              document.cookie = "imergencyEmail="+email;
              window.location = "view/dashboard.php";
          }
      

        }else{
             swal(" Password Incorrect!", "Invalid User!  check Password", "error");
        }
   }
 });

});
