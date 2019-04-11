// load pets to side bar
$(document).ready(function() {
     $.getJSON(petURL + "_user" , function (data) {
        var i;
            for (i = 0; i < data.length; i++) { 
                $.getJSON(petURL + "/"+data[i]['petID'] , function (data1) {
                 var petName =data1[0]['name']+" - "+data1[0]['petID'];
                 var pet = data1[0]['petID'];
                 var nav_ul = document.getElementById('nav-ul');
                 nav_ul.insertAdjacentHTML('beforeend', '<li class="nav-item"> <a href="./profile.php?id='+pet+'" class="nav-link active" id='+data1[0]['petID']+'> <div class="user-block"> <p style="padding-left: 10px; padding-top: 6px;">'+petName+' </p> <img class="img-circle img-bordered-sm" src="data:image;base64,'+data1[0]['image']+'" alt="pet image">');
  
                });
            }
            try {
              document.getElementById("petCount").innerHTML = data.length;
            }
            catch(err) {
            }
            
         });
        var docName;
        var careCeter;
        var email = getCookie("imergencyEmail");
        var detail = getCookie("care_center_name");
       
});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}


// save pet 
$("#savePet").on('click', function (event) {
    
    try{
        var property = document.getElementById("file").files[0];
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
      property='';  
    }

  var name = $('#petName').val();
  var category = $('#category').val();
  var weight = $('#inputweight').val();
  var breed = document.getElementById("breed").value;
  var dob = $('#dobPet').val();
  var gender = $('#gender').val();

 var formDate = new FormData();
 formDate.append("file",property);
 formDate.append("category",category);
 formDate.append("name",name);
 formDate.append("weight", weight);
 formDate.append("breed", breed);
 formDate.append("pet_dob", dob);
 formDate.append("gender",gender);
 formDate.append("breed", breed);
 
  var ajaxConfig = {
    method: "POST",
    url: petURL,
    data: formDate,
    contentType: false,
    cache:false,
    processData:false,
    async: true
};

  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
      console.log("true");
      swal("Wooh!", "Your Pet Created!", "success");
      location.reload(true);
    }else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    }else{
        swal("Oops!", response, "error");
    }
  });
});
