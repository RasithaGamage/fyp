// load pet count and user Name into dashboard
$(document).ready(function() {
     $.getJSON(petURL + "_user" , function (data) {

        var i;
            for (i = 0; i < data.length; i++) { 
                $.getJSON(petURL + "/"+data[i]['petID'] , function (data1) {
                 var petName =data1[0]['name']+" - "+data1[0]['petID'];
                 var pet = data1[0]['petID'];
                 var nav_ul = document.getElementById('nav-ul');
 
                });
            }
            document.getElementById("petCount").innerHTML = data.length;
         });
         
            var docName;
            var careCeter;
           
            var email = getCookie("imergencyEmail");
            var detail = getCookie("care_center_name");
       
            document.getElementById("head-name").innerHTML = "Name Not Found";

});
