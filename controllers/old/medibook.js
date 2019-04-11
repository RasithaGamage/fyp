var pageId
// load medi book name and tables of tabs
$(document).ready(function() {
   pageId = ParseURLParameter('id');
   
      $.getJSON(petURL + "ID/"+pageId , function (data) {
            console.log("1st one");
            $.getJSON(userURL + "_pet_who/"+data[0]['cid'] , function (d) {   
                if(d[0].length===4){
                    alert("Dont Do Wrong Works");
                    return;
                }else{
                    try {
                          document.getElementById("bookName").innerHTML ="Medi Book -"+ data[0]['name'];
                        }
                        catch(err) {
                          
                        }
                    
                    
                }
                
            });
            
         });
         
    let table = $('#vaccinTable').DataTable();
    table.clear().draw();
    
    $.getJSON(vaccinationURL+"_findall/"+pageId, function (data) {
        $.each(data, function (key, value) {

                    table.row.add([
                        value.name,
                        value.vacDate,
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
    
        
    let table1 = $('#trainingTable').DataTable();
    table1.clear().draw();
    
    $.getJSON(traineeURL+"_findall/"+pageId, function (data) {
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
    
    let table2 = $('#operationsTable').DataTable();
    table2.clear().draw();
        
    $.getJSON(surgeriesURL+"_findall/"+pageId, function (data) {
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
    
    let tablet = $('#treatmentsTable').DataTable();
    tablet.clear().draw();
        
    $.getJSON(treatmentsURL+"_findall/"+pageId, function (data) {
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

