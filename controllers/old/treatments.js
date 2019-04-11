// load pet id
$(document).ready(function() {
    var email = getCookie("imergencyEmail");
    var vacci = document.getElementById("vaccinationID");
    var edit_vacci = document.getElementById("edit-vac-vac");
    var careCener = getCookie("care_center_name");


          $.getJSON(doctorURL+"_find_email/"+email , function (data1) {
              console.log("data1  "+ data1[0]['doctor_name']);
              document.getElementById("exampleInputName").value = data1[0]['doctor_name'];
              document.getElementById("exampleInputNameVac").value = data1[0]['doctor_name'];
              document.getElementById("exampleInputNameOpe").value = data1[0]['doctor_name'];
              document.getElementById("exampleInputNameTree").value = data1[0]['doctor_name'];
              document.getElementById("edit-doc-name").value = data1[0]['doctor_name'];
              
              document.getElementById("edit-care-center").value = careCener;
              document.getElementById("careCenter1").value = careCener;
              document.getElementById("pet-treatments-center").value = careCener;
              document.getElementById("ope-center").value = careCener;
              document.getElementById("tree-center").value = careCener;

          });
     
          $.getJSON(petURL, function (data1) {
              var options = '';
              for(i=0;i<data1.length;i++){
                  options += '<option value="'+data1[i]["petID"]+"-"+data1[i]["name"]+'" />';
              }
              
              document.getElementById('browsers').innerHTML = options;
          });
          
          $.getJSON(vaccinationURL+"All", function (data2) {
              for(i=0;i<data2.length;i++){
                  vacci.options[i] = new Option(data2[i]["vaccinationName"], data2[i]["cid"]);
                  console.log("number 1");
                  edit_vacci.options[i] = new Option(data2[i]["vaccinationName"], data2[i]["cid"]);
              }
          });
});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

// save vaccinations 
$("#addVaccinationBtn").on("click",function(){
    
    var getPet = document.getElementById("petInput").value;
    var splited = getPet.split("-");
    var pet = splited[0];
    var vaccinationID = document.getElementById("vaccinationID").value;
    
    var age = document.getElementById("ageLbl1").innerHTML;
    var vaccinationDate = document.getElementById("vaccinationDate").value;
    var exampleInputName = document.getElementById("exampleInputName").value;
    var careCenter1 = getCookie("care_centerID");
    var remarks1 = document.getElementById("remarks1").value;
    var nxtVacDate = document.getElementById("nxtVacDate").value;
    var vacComment = document.getElementById("commentvaccination").value;
    var userEmail = getCookie("imergencyEmail");
    
    if(pet===''){
        swal("Oops!", "Please Select a Pet Before doing this!", "error");
        return;
    }
    
   var vaccObject = [{
      "vaccinationID": vaccinationID,
      "date":vaccinationDate,
      "age": age,
      "care_center": careCenter1,
      "remark":remarks1,
      "petID":pet,
      "nxtVacDate":nxtVacDate,
      "vacComment":vacComment,
      "userEmail":userEmail
  }];

    var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: vaccinationURL,
        data: JSON.stringify(vaccObject),
        async: true
    };

  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
      swal("Good job!", "Vaccination Has Successfully Saved!", "success");

      let table = $('#vaccinTable').DataTable();
        table.clear().draw();
        $.getJSON(vaccinationURL+"_findall/"+pet, function (data) {
            $.each(data, function (key, value) {
    
                        table.row.add([
                            value.name,
                            value.vacDate,
                            value.age,
                            value.doctor,
                            value.ccName,
                            value.remark,
                            function (data, type, row) {
                                return "<i class=\"fas fa-edit fa-lg\" id='" + value.cid + "' onclick='editModal(id)' style=\"color:#007bff!important \"></i>";
                            }
                        ]).draw(false);
    
            });
        });
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
        swal("Oops!", response, "error");
    }
  });
});

function editModal(id){
    console.log("id "+id);
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

// save treatments 
$("#addTreatmentsBtn").on("click",function(){
    
    var getPet = document.getElementById("petInput").value;
    var splited = getPet.split("-");
    var pet = splited[0];
    
    if(pet===''){
        swal("Oops!", "Please Select a Pet Before doing this!", "error");
        return;
    }
    
  var Symptoms = document.getElementById("pet-Symptoms").value;
  var Diagnosis = document.getElementById("pet-Diagnosis").value;
  var date = document.getElementById("pet-tretments-date").value;
  var age =document.getElementById("ageLbl1").innerHTML;
  var careCenter = getCookie("care_centerID");
  var nxt = document.getElementById("nxt-treatments").value;
  var nxtDate = document.getElementById("nxttreatmentDate1").value;
  var remark = document.getElementById("remark-treatments").value;
  var comment = document.getElementById("commentTreament").value;
  
  var vaccObject = [{
      "treatment_type": Symptoms,
      "name":Diagnosis,
      "age": age,
      "date": date,
      "nxt_gen": nxt,
      "remark": remark,
      "nxtDate":nxtDate,
      "comments":comment,
      "care_center": careCenter,
      "petID":pet
  }];

    var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: treatmentsURL,
        data: JSON.stringify(vaccObject),
        async: true
    };

  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
      swal("Good job!", "Treatment Has Successfully Saved!", "success");

        let tablet = $('#treatmentsTable').DataTable();
        tablet.clear().draw();
        
    $.getJSON(treatmentsURL+"_findall/"+pet, function (data) {
        $.each(data, function (key, value) {

                    tablet.row.add([
                        value.treatment_type,
                        value.name,
                        value.tretDate,
                        value.age,
                        value.doctor,
                        value.ccName,
                        value.next_gen_risk,
                        value.remark,
                        function (data, type, row) {
                            return "<i class=\"fas fa-edit fa-lg\" id='" + value.cid + "' onclick='editStock(id)' style=\"color:#007bff!important \"></i>";
                        }
                    ]).draw(false);

        });

    });
    
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
        swal("Oops!", response, "error");
    }
  });
});

// view medibook  
$("#mediBookBtn").on("click",function(){
    window.scrollBy(0, 300);
    var getPet = document.getElementById("petInput").value;
    var splited = getPet.split("-");
    var pet = splited[0];
    if(pet===''){
        swal("Oops!", "Please Select a Pet Before doing this!", "error");
        return;
    }
    
    $.getJSON(petURL+"ID/"+pet, function (data) {
        var petID= data[0]['cid'];
        $.getJSON(petURL+"_whois_user/"+petID, function (data1) {
            
            if(data1[0]['type']=='user'){
                var userID= data1[0]['userID'];
                 $.getJSON(userURL+"/"+userID, function (data2) {
                    document.getElementById('head-user').innerHTML = data2[0]['user_name'];
                    document.getElementById('head-user-email').innerHTML = data2[0]['email'];
                    document.getElementById('head-user-mobile').innerHTML = data2[0]['mob_no'];
                    document.getElementById('head-user-home').innerHTML = data2[0]['home_no'];
                 });
            }
            if(data1[0]['type']=='doct'){
                var userID= data1[0]['userID'];
                $.getJSON(userURL+"_credentialsByID/"+userID, function (data0) {
                    var userEmail= data0[0]['email'];
                     $.getJSON(doctorURL+"_find_email/"+userEmail, function (data2) {
                        document.getElementById('head-user').innerHTML = data2[0]['doctor_name'];
                        document.getElementById('head-user-email').innerHTML = data2[0]['email'];
                        document.getElementById('head-user-mobile').innerHTML = data2[0]['mob_no'];
                        // document.getElementById('head-user-home').innerHTML = data2[0]['home_no'];
                     });
                });
            }
            
        });
        
    });
    
});

// save operations 
$("#opeBtn").on("click",function(){
    var getPet = document.getElementById("petInput").value;
    var splited = getPet.split("-");
    var pet = splited[0];
    if(pet===''){
        swal("Oops!", "Please Select a Pet Before doing this!", "error");
        return;
    }
    
    var Diagnosis = document.getElementById("ope-Diagnosis").value;
    var Surgery = document.getElementById("ope-Surgery").value;
    var careCenter = getCookie("care_centerID");
    var remarks = document.getElementById("ope-remark").value;
    var date = document.getElementById("ope-date").value;
    var age =document.getElementById("ageLbl1").innerHTML;
    var nxt = document.getElementById("ope-nxt").value;
    
    var vaccObject = [{
      "care_center": careCenter,
      "Diagnosis":Diagnosis,
      "surgery_name": Surgery,
      "remark": remarks,
      "date": date,
      "age":age,
      "next_gen_risk":nxt,
      "petID":pet
  }];

    var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: surgeriesURL,
        data: JSON.stringify(vaccObject),
        async: true
    };

  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
         swal("Good job!", "Surgury Has Successfully Saved!", "success");
         let table2 = $('#operationsTable').DataTable();
         table2.clear().draw();
        
    $.getJSON(surgeriesURL+"_findall/"+pet, function (data) {
        $.each(data, function (key, value) {

                    table2.row.add([
                        value.diagnosis,
                        value.surgery_name,
                        value.surgeryDate,
                        value.age,
                        value.doctor,
                        value.ccName,
                        value.remark,
                        value.next_gen_risk,
                        function (data, type, row) {
                            return "<i class=\"fas fa-edit fa-lg\" id='" + value.cid + "' onclick='editStock(id)' style=\"color:#007bff!important \"></i>";
                        }
                    ]).draw(false);

        });

    });
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
        swal("Oops!", response, "error");
    }
  });
    
});

// save trainee 
$("#save-traineBtn").on("click",function(){
    var getPet = document.getElementById("petInput").value;
    var splited = getPet.split("-");
    var pet = splited[0];
    var name = document.getElementById("traine-name").value;
    var type = document.getElementById("traine-type").value;
    var age = document.getElementById("ageLbl1").innerHTML;
    var date = document.getElementById("traine-date").value;
    var doca = document.getElementById("exampleInputName").value;
    var careCenter1 = getCookie("care_centerID");
    var remarks1 = document.getElementById("traine-remark").value;
    
    if(pet===''){
        swal("Oops!", "Please Select a Pet Before doing this!", "error");
        return;
    }
  var vaccObject = [{
      "name": name,
      "training":type,
      "date": date,
      "age": age,
      "care_center": careCenter1,
      "remark":remarks1,
      "petID":pet
  }];

    var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: traineeURL,
        data: JSON.stringify(vaccObject),
        async: true
    };

  $.ajax(ajaxConfig).done(function (response) {
    if (response === 'true') {
      swal("Good job!", "Training Has Successfully Saved!", "success");
    let table1 = $('#trainingTable').DataTable();
    table1.clear().draw();
    $.getJSON(traineeURL+"_findall/"+pet, function (data) {
        $.each(data, function (key, value) {

                    table1.row.add([
                        value.name,
                        value.training,
                        value.traineDate,
                        value.age,
                        value.doctor,
                        value.ccName,
                        value.remark,
                        function (data, type, row) {
                            return "<i class=\"fas fa-edit fa-lg\" id='" + value.cid + "' onclick='editStock(id)' style=\"color:#007bff!important \"></i>";
                        }
                    ]).draw(false);

        });

    });
    } else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    } else{
        swal("Oops!", response, "error");
    }
  });
});

// edit vaccination 
$("#edit-vac-button").on("click",function(){
    var getPet = document.getElementById("petInput").value;
    var splited = getPet.split("-");
    var pet = splited[0];
    if(pet===''){
        swal("Oops!", "Please Select a Pet Before doing this!", "error");
        return;
    }
    var vac = document.getElementById("edit-vac-vac").value;
    var vaccinationDate = document.getElementById("edit-vac-date").value;
    var age = document.getElementById("edit-vac-age").value;
    var careCenter1 = getCookie("care_centerID");
    var remarks1 = document.getElementById("edit-vac-remark").value;
    var userEmail = getCookie("imergencyEmail");
    var id = document.getElementById("vac-model").value;
      
   var vaccObject = [{
      "vaccination": vac,
      "date":vaccinationDate,
      "age": age,
      "care_center": careCenter1,
      "remark":remarks1,
      "userEmail":userEmail
  }];

    var ajaxConfig = {
        method: "POST",
        contentType: 'application/json; charset=utf-8',
        url: vaccinationURL+"/"+id,
        data: JSON.stringify(vaccObject),
        async: true
    };
    $.ajax(ajaxConfig).done(function (response) {
           if (response === 'true') {
              swal("Good job!", "Vaccination Has Successfully Saved!", "success");
        let table = $('#vaccinTable').DataTable();
        table.clear().draw();
        $.getJSON(vaccinationURL+"_findall/"+pet, function (data) {
            $.each(data, function (key, value) {
    
                        table.row.add([
                            value.name,
                            value.vacDate,
                            value.age,
                            value.doctor,
                            value.ccName,
                            value.remark,
                            function (data, type, row) {
                                return "<i class=\"fas fa-edit fa-lg\" id='" + value.cid + "' onclick='editModal(id)' style=\"color:#007bff!important \"></i>";
                            }
                        ]).draw(false);
    
            });
        });
           }
           if(response === 'false'){
               swal("Oops!", "Something Wrong With the Process!", "error");
           }
    });


});





