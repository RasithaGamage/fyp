// load doctor details to profile
$(document).ready(function() {
    var email;
     $.getJSON(doctorURL + "_current" , function (data) {

      document.getElementById("inputemail").value = data[0]['email'];
      email= document.getElementById("inputemail").value;
      
        $.getJSON(doctorURL+"_find_email/"+email , function (data1) {
            
            document.getElementById("regNo").disabled = true;
            document.getElementById("name").value = data1[0]['doctor_name'];
            document.getElementById("regNo").value = data1[0]['slva_no'];
            document.getElementById("nic").value = data1[0]['nic'];
            document.getElementById("dob").value = data1[0]['dob'];
            document.getElementById("mobileNo").value = data1[0]['mob_no'];
            document.getElementById("address").value = data1[0]['address'];
            document.getElementById("bio").value = data1[0]['bio'];
            document.getElementById("doctor-mobile").innerHTML=data1[0]['mob_no'];
            document.getElementById("doctor-nicNo").innerHTML=data1[0]['nic'];
            document.getElementById("doctor-email").innerHTML=data1[0]['email'];
            document.getElementById("va_no").innerHTML = data1[0]['slva_no'];
            document.getElementById("doctorAddress").innerHTML = data1[0]['address'];
            document.getElementById("doctor-bio").innerHTML = data1[0]['bio'];
            try{
            document.getElementById("doc-head-name").innerHTML=data1[0]['doctor_name'];
            }catch(error){
                
            }
        
        });
    });
    
    var type = getCookie("imergencyUserType");
    var detail =  getCookie("care_center_name");
    
    
        document.getElementById("head-of-name-doctor").innerHTML = "Name Not Found";
        $.getJSON(doctorURL + "_find_email/"+email , function (data) {
            //   $("#sideBarIcon").append("<img src='../dist/img/log_img.jpg' class='img-circle elevation-2' alt='User Image'>");
              document.getElementById('head-of-name-doctor').innerHTML="Dr. "+data[0]['doctor_name'];
              document.getElementById('head-of-care-center').innerHTML= detail
          
        });
});

// save doctor 
$("#savedoctor").on('click', function (event) {

        var name = $('#name').val();
        var inputemail = $('#inputemail').val();
        var mobileNo = $('#mobileNo').val();
        var regNo = $('#regNo').val();
        var nic = $('#nic').val();
        var dob = $('#dob').val();
        var address = $('#address').val();
        var bio = $('#bio').val();
        
        if  (nic.length<10 || mobileNo.length!=10){
            alert("Check Your Contact Numbers are Correct ?");
            return;
        }else{
        }

        var doctorObject = [{
            "doctor_name": name,
            "email":inputemail,
            "slva_no": regNo,
            "address": address,
            "dob": dob,
            "mob_no": mobileNo,
            "bio": bio,
            "nic":nic
        }];

  var ajaxConfig = {
    method: "POST",
    contentType: 'application/json; charset=utf-8',
    url: doctorURL,
    data: JSON.stringify(doctorObject),
    async: true
};

   $.ajax(ajaxConfig).done(function (response) {
        if (response === 'true') {
          console.log("true");
          swal("Good job!", "doctor Details Successfully Updated!", "success");
          location.reload(true);
        } else if (response === 'false') {
          console.log("false");
              swal("Oops!", "Something Wrong With the Process!", "error");
        }else{
            swal("Oops!", response, "error");
        }
   });
});


// change passwords 

$("#changePasswordBtn").on('click', function (event) {

    $.getJSON(doctorURL + "_current" , function (data1) {
        $.getJSON(doctorURL + "_find_email/"+data1[0]['email'] , function (data2) {
        var pw = data1[0]['password'];
        if  ($('#oldPassword').val()==pw){
            document.getElementById("oldPassword").style.borderColor = '#C8C4C3';
            document.getElementById("oldPassword").disabled=true;
            if  ( $('#confirmPassword').val()== $('#newPassword').val() && $('#newPassword').val()!==""){
                document.getElementById("confirmPassword").style.borderColor = '#C8C4C3';
                var pwbtoa = $('#confirmPassword').val();
                     var userObject = [{
                          "email": data1[0]['email'],
                          "password":pwbtoa
                     }];
                          var ajaxUpConfig = {
                            method: "POST",
                            contentType: 'application/json; charset=utf-8',
                            url: doctorURL+"_credentials_update",
                            data: JSON.stringify(userObject),
                            async: true
                          }
                                  $.ajax(ajaxUpConfig).done(function (response) {
                                        if (response === 'true') {
                                          swal("Good job!", "Doctor Has Successfully Updated!", "success");
                                          location.reload(true);
                                        } else if (response === 'false') {
                                          console.log("false");
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

// validations 
var timer;
$("#oldPassword").focusout(function(){
    var searchid = $(this).val().trim();
    clearInterval(timer);
    timer = setTimeout(function() {
        $.getJSON(doctorURL + "_current" , function (data1) {
             $.getJSON(doctorURL + "_find_email/"+data1[0]['email'] , function (data2) {
                var pw = data1[0]['password'];
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

$("#nic").focusout(function(){
    var nic = $('#nic').val();
      if (nic.length<10) {
        document.getElementById("nic").style.borderColor = '#e52213';
    } else {
        document.getElementById("nic").style.borderColor = '#C8C4C3';
    }
});
