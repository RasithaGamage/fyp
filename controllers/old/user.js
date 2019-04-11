$(document).ready(function() {
     $.getJSON(userURL + "_current" , function (data) {

      document.getElementById("head-name").innerHTML ="Hi!  "+ data[0]['user_name'];
      document.getElementById("Home").innerHTML = data[0]['home_no'];
      document.getElementById("lang").innerHTML = data[0]['language'];
      document.getElementById("profile-username").innerHTML = data[0]['user_name'];
      document.getElementById("Birth").innerHTML = data[0]['dob'];
      document.getElementById("Mobile").innerHTML = data[0]['mob_no'];
      document.getElementById("profile-email").innerHTML = data[0]['email'];
      document.getElementById("name").value = data[0]['user_name'];
      
      document.getElementById("inputemail").value = data[0]['email'];
      document.getElementById("dob").value = data[0]['dob'];
      document.getElementById("mobileNo").value = data[0]['mob_no'];
      document.getElementById("homeNO").value = data[0]['home_no'];
      document.getElementById("language").value = data[0]['language'];
      if(data[0]['image']===''){
         $("#userProp").append("<img class='profile-user-img img-fluid img-circle'  src='../dist/img/log_img.jpg' >"); 
      }else{
        $("#userProp").append("<img class='profile-user-img img-fluid img-circle' src='data:image;base64,"+data[0]['image']+"'>");  
      }
       try{
         document.getElementById("currentUser").innerHTML = data[0]['user_name'];
       }catch(error){
           
       }
      
    });
});

$("#saveUser").on('click', function (event) {
  // console.log("click");
  var userID='';
          $.getJSON(userURL + "max", function (data1) {
              userID = data1+1;

  // if (error_fname === '' && error_lname === '' && error_email === '' && error_password === '') {
        var name = $('#name').val();
        var inputemail = $('#inputemail').val();
        var mobileNo = $('#mobileNo').val();
        var homeNO = $('#homeNO').val();
        var dob = $('#dob').val();
        // var availability = $('#availability').find(':selected').text();
        var language =  $('#language').val();

         console.log(userID);

        var userObject = [{
            "userID": userID,
            "name": name,
            "user_name": inputemail,
            "mob_no": mobileNo,
            "home_no": homeNO,
            "dob": dob,
            "language": language[0]
        }]

  var ajaxConfig = {
    method: "POST",
    contentType: 'application/json; charset=utf-8',
    url: userURL,
    data: JSON.stringify(userObject),
    async: true
}

  $.ajax(ajaxConfig).done(function (response) {
    console.log("mmmm");
    if (response === 'true') {
      swal("Good job!", "User Has Successfully Saved!", "success");
    //   $('#userFrom')[0].reset();
      location.reload(true);
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    }
  })
});
// }
});


$("#updateUser").on('click', function (event) {
    
   try{
        var property = document.getElementById("file0").files[0];
        var image_name = property.name;
        var image_extention = image_name.split('.').pop().toLowerCase();
        
        if(jQuery.inArray(image_extention,['gif','png','jpg','jpeg'])== -1){
            alert("Invalid Image");
            return;
        }
        var image_size = property.size;
        if(image_size>2000000){
            alert("Image File Size very big");
            return;
        }
        
   }catch(error){
       var property='';
   }
  
        var name = $('#name').val();
        var inputemail = $('#inputemail').val();
        var mobileNo = $('#mobileNo').val();
        var homeNO = $('#homeNO').val();
        var dob = $('#dob').val();
        var language =  $('#language').val();
        if  (homeNO.length!=10 || mobileNo.length!=10){
            alert("Your Contact Number is incorrect ?");
            return;
        }else{
        }
        
         var formDate = new FormData();
         formDate.append("file0",property);
         formDate.append("email",inputemail);
         formDate.append("user_name",name);
         formDate.append("mob_no",mobileNo);
         formDate.append("home_no",homeNO);
         formDate.append("dob",dob);
         formDate.append("language",language[0]);
         

 var ajaxUpConfig = {
    method: "POST",
    // contentType: 'application/json; charset=utf-8',
    url: userURL+"/"+"hello",
    data: formDate,
    contentType: false,
    cache:false,
    processData:false,
    async: true
};

  $.ajax(ajaxUpConfig).done(function (response) {
    if (response === 'true') {
      swal("Good job!", "User Has Successfully Updated!", "success");
      $('#userFrom')[0].reset();
      location.reload(true);
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
        swal("Oops!", response, "error");
    }
  });
// }
});


$("#changePasswordBtn").on('click', function (event) {

    $.getJSON(userURL + "_current" , function (data1) {
        $.getJSON(userURL + "_email/"+data1[0]['email'] , function (data2) {
        var pw = atob(data2[0]['password']);
        if  ($('#oldPassword').val()==pw){
            document.getElementById("oldPassword").style.borderColor = '#C8C4C3';
            document.getElementById("oldPassword").disabled=true;
            if  ( $('#confirmPassword').val()== $('#newPassword').val() && $('#newPassword').val()!==""){
                document.getElementById("confirmPassword").style.borderColor = '#C8C4C3';
                var pwbtoa = btoa($('#confirmPassword').val());
                     var userObject = [{
                          "email": data1[0]['email'],
                          "password":pwbtoa
                     }];
              var ajaxUpConfig = {
                    method: "POST",
                    contentType: 'application/json; charset=utf-8',
                    url: userURL+"_credentials_update",
                    data: JSON.stringify(userObject),
                    async: true
            }
                              $.ajax(ajaxUpConfig).done(function (response) {
                                    if (response === 'true') {
                                      swal("Good job!", "User Has Successfully Updated!", "success");
                                    //   $('#userFrom')[0].reset();
                                      location.reload(true);
                                    } else if (response === 'false') {
                                          swal("Oops!", "Something Wrong With the Process!", "error");
                                    } else{
                                        swal("Oops!", response, "error");
                                    }
                              });

            }else{
                 document.getElementById("confirmPassword").style.borderColor = '#e52213';
                swal("Oops!", "Password Does't Matched, Please Check the password and re-type !", "error");
            }
        }else{
            document.getElementById("oldPassword").style.borderColor = '#e52213';
            swal("Oops!", "Your Old Password Does't Matched to Current Typed Password!", "error");
        }
        });
    
     
    });
    
});

var timer;
$("#oldPassword").focusout(function(){
    var searchid = $(this).val().trim();
    clearInterval(timer);
    timer = setTimeout(function() {
    $.getJSON(userURL + "_current" , function (data1) {
        $.getJSON(userURL + "_email/"+data1[0]['email'] , function (data2) {
        var pw = atob(data2[0]['password']);
        if  ($('#oldPassword').val()==pw){
            document.getElementById("oldPassword").style.borderColor = '#C8C4C3';
            document.getElementById("changePasswordBtn").disabled=false;
        }else{
             document.getElementById("oldPassword").style.borderColor = '#e52213';
            swal("Oops!", "Your Old Password Does't Matched to Current Typed Password!", "error");
            document.getElementById("changePasswordBtn").disabled=true;
            }


    }, 200);
    });
    });
});


$("#mobileNo").focusout(function(){
    var mobileNo = $('#mobileNo').val();
    var re = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
      if (re.test(mobileNo) && mobileNo.length<=10) {
        document.getElementById("mobileNo").style.borderColor = '#C8C4C3';
    } else {
        document.getElementById("mobileNo").style.borderColor = '#e52213';
    }
});
$("#homeNO").focusout(function(){
    var homeNO = $('#homeNO').val();
    var re = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
      if (re.test(homeNO) && homeNO.length<=10) {
        document.getElementById("homeNO").style.borderColor = '#C8C4C3';
    } else {
        document.getElementById("homeNO").style.borderColor = '#e52213';
    }
});
