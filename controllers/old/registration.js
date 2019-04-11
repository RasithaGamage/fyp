// user registration btn click and send mail 
$("#btn_next").on('click', function (event) {
      var userID='';
      $.getJSON(userURL + "max", function (data1) {
       userID = data1+1;

      var userName = $('#userName').val();
      var mobile = $('#mobile').val();
      var mail = $('#mail').val();
      var password = $('#password').val();
      var reTypePassword = $('#reTypePassword').val();
     
      // Encode the String
        var pw = btoa(password);

      if (password!==reTypePassword) {
        swal("Oops!", "Ooops Password Doesn't Matched!", "error");
        return;
      }


var base64 = getBase64Image(document.getElementById("imageid"));

      var userObject = [{
          "userID": userID,
          "user_name": userName,
          "name":"",
          "email": mail,
          "language": "",
          "mob_no": mobile,
          "home_no":"",
          "dob":"",
          "password":pw,
          "image":base64
      }]

      var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: userURL,
        data: JSON.stringify(userObject),
        async: true
    }

      $.ajax(ajaxConfig).done(function (response) {
        if (response === 'true') {
          swal("Good job!", "User Has Successfully registered!", "success");
        window.location="index.php";
         
        }
        if (response === 'This Email Was Already Taken') {
          swal("Oops!", "This Email Was Already Taken!", "error");
        }
        else if (response === 'false') {
              swal("Oops!", "Something Wrong With the Process!", "error");
        }
      })
      });

});

function getBase64Image(img) {
  var canvas = document.createElement("canvas");
  canvas.width = img.width;
  canvas.height = img.height;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0);
  var dataURL = canvas.toDataURL("image/png");
  return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
