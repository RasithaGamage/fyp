 var pageId;
 // load pet details
 $(document).ready(function() {
  pageId = ParseURLParameter('id');
  localStorage.setItem("urlPetID", pageId);
    
    if(typeof pageId!=='undefined'){
        var breed = document.getElementById("breedBox");
        
       
         $.getJSON(petURL + "ID/"+pageId , function (data) {
             console.log("1st one");
             $.getJSON(userURL + "_pet_who/"+data[0]['cid'] , function (d) {   
                 if(d[0].length===4){
                     alert("Dont Do Wrong Works");
                     return;
                 }else{
                   var gen;
                     if(data[0]['gender']==='Male'){
                         gen = "<i class='fa fa-mars' style='color:#17a2b8;'></i>";
                     }else{
                         gen = "<i class='fa fa-venus' style='color:#c8237e;'></i>";
             
                     }
                     
             document.getElementById("text-center1").innerHTML= "<img class='profile-user-img img-fluid img-circle' src='data:image;base64,"+data[0]['image']+"' alt='pet profile picture'>";
             document.getElementById("nameLbl").innerHTML = data[0]['name']+" "+gen;
             document.getElementById("dobLbl").innerHTML = data[0]['pet_dob'];
             document.getElementById("breedLbl").innerHTML = data[0]['breed'];
             document.getElementById("weghtLbl").innerHTML = data[0]['weight']+"lbl";
             document.getElementById("name5Lbl").value = data[0]['name']+" - "+pageId;
             document.getElementById("name6Lbl").value = data[0]['name'];
             document.getElementById("weight2Lbl").value = data[0]['weight'];
             document.getElementById("dob1Input").value = data[0]['pet_dob'];
             
             var select = document.getElementById("genderBox");
             select.options[0] = new Option(data[0]['gender'], data[0]['gender']);
             select.options[1] = new Option("Male", "Male");
             select.options[2] = new Option("Female", "Female");
             
             
             breed.options[0] = new Option(data[0]['breed'], data[0]['breed']);

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                
                if(dd<10) {
                    dd = '0'+dd
                } 
                
                if(mm<10) {
                    mm = '0'+mm
                } 
                
                today = dd + '/' + mm + '/' + yyyy;
          
                var age = loadAge(data[0]['pet_dob']);
                document.getElementById("ageLbl").innerHTML = age;
                 }
                 
             });
             

         });
         
     
     $.getJSON(petURL + "_event/"+pageId , function (data) {
         $.each(data, function (key, value) {
             if(value.eventName==='Born'){
                 $("#timeLife").append('  <li class="time-label"> <span class="bg-pink" id="eventDate"> '+value.eventDate+' </span> </li><li><i class="fa fa-stethoscope bg-warning"></i><div class="timeline-item">  <span class="time" id="eventTime"><i class="fa fa-clock-o"></i> 27 mins ago</span> <h3 class="timeline-header" id="eventName"><a href="#" id="name1Lbl"></a> is born on </h3></div> </li>');
             }
             if(value.eventName==='Surgeries'){
                  $("#timeLife").append('  <li class="time-label"> <span class="bg-danger" id="eventDate"> '+value.eventDate+' </span> </li><li><i class="fa fa-stethoscope bg-warning"></i><div class="timeline-item">  <span class="time" id="eventTime"><i class="fa fa-clock-o"></i> 27 mins ago</span> <h3 class="timeline-header" id="eventName"><a href="#" id="name1Lbl"></a> did a Surgeries </h3></div> </li>');
             }
             if(value.eventName==='Treatments'){
                 $("#timeLife").append('  <li class="time-label"> <span class="bg-warning" id="eventDate"> '+value.eventDate+' </span> </li><li><i class="fa fa-stethoscope bg-warning"></i><div class="timeline-item">  <span class="time" id="eventTime"><i class="fa fa-clock-o"></i> 27 mins ago</span> <h3 class="timeline-header" id="eventName"><a href="#" id="name1Lbl"></a> make a Treatments</h3></div> </li>');
             }
             if(value.eventName==='Vaccination'){
                 $("#timeLife").append('  <li class="time-label"> <span class="bg-success" id="eventDate"> '+value.eventDate+' </span> </li><li><i class="fa fa-stethoscope bg-warning"></i><div class="timeline-item">  <span class="time" id="eventTime"><i class="fa fa-clock-o"></i> 27 mins ago</span> <h3 class="timeline-header" id="eventName"><a href="#" id="name1Lbl"></a> doing Vaccinations</h3></div> </li>');
             }
         });
     });
         
    } else{
        alert("Something went wrong! Check URL");
    }
try{
document.getElementById("text-center").innerHTML = i;
}catch(e){
    
}
});

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

// update pet btn click 
$("#petUpdate").on('click', function (event) {
    
  
  var petID = localStorage.getItem("urlPetID");
  
  var name = $('#name6Lbl').val();
  var weight = $('#weight2Lbl').val();
  var breed = document.getElementById("breedBox").value;
  var dob = $('#dob1Input').val();
  var gender = $('#genderBox').val();
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
      property='';
  }
     var formDate = new FormData();
     formDate.append("name",name);
     formDate.append("weight",weight);
     formDate.append("breed",breed);
     formDate.append("pet_dob", dob);
     formDate.append("gender", gender);
     formDate.append("file",property);

  var ajaxConfig = {
    method: "POST",
    url: petURL+"/"+petID,
    data: formDate,
    contentType: false,
    cache:false,
    processData:false,
    async: true
};


  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
      swal("Good job!", "pet Has Successfully Updated!", "success");
      location.reload(true);
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
          swal("Oops!", response, "error");
    }
  });
});

// validate email is valid 
$("#receiverEmail").focusout(function(){
 var email = document.getElementById("receiverEmail").value;
 var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email)) {
        document.getElementById("receiverEmail").style.borderColor = '#C8C4C3';
        document.getElementById("requestBtn").disabled = false;

    } else {
        document.getElementById("receiverEmail").style.borderColor = '#e52213';
        document.getElementById("requestBtn").disabled = true;
    }
});
$("#mediBtn").on('click', function (event) {
    window.location = '../view/medibook.php?id='+pageId+'';
});

function loadAge(newDate){
    
    
  var dateString = ''+newDate;
    var splited = dateString.split("-");
    var y = splited[0];
    var m = splited[1];
    var d = splited[2];
    
    var dateString = m+"-"+d+"-"+y;

  var now = new Date();
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());

  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();

  var dob = new Date(dateString.substring(6,10),
                     dateString.substring(0,2)-1,                   
                     dateString.substring(3,5));

  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";

  yearAge = yearNow - yearDob;

  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }

  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;

    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }

  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge };

  if ( age.years > 1 ) yearString = " years";
  else yearString = " year";
  if ( age.months> 1 ) monthString = " months";
  else monthString = " month";
  if ( age.days > 1 ) dayString = " days";
  else dayString = " day";


  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "Only " + age.days + dayString + " old!";
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years + yearString + " old. Happy Birthday!!";
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.months + monthString + " and " + age.days + dayString + " old.";
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.months + monthString + " old.";
  else ageString = "Oops! Could not calculate age!";

  return ageString;
    
}

// pet request btn clilck 
$("#requestBtn").on('click', function (event) {
    var email = document.getElementById("receiverEmail").value;
    var peta = document.getElementById("name5Lbl").value.split(" - ");
    var splitedPet = peta[1];
    
    var checkBox = document.getElementById("myCheck");
      if (checkBox.checked == true){
        
      } else {
        swal("Please Accept Following Conditions!", "Pet Requesting prohibited !", "warning");
        return;
      }
      
      if(email==''){
          alert("Sorry This User Email is Not Valid !");
            return;
      }
    
    $.getJSON(api +"/valid_user/"+email, function (data) {
        if(data[0]==='null'){
            alert("Sorry This User Email is Not Valid !");
            return;
        }
    });
    
    var noti = [{
        "petID":splitedPet,
        "email":email
    }];
    
     var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: notiURL,
        data: JSON.stringify(noti),
        async: true
    };
    
  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
      swal("Good job!", "pet Has Successfully Requested!", "success");
      location.reload(true);
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
        swal("Oops!", response, "error");
    }
  });
});






