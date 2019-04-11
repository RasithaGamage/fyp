$(document).ready(function() {
    pageId = ParseURLParameter('id');
    // $.getJSON(petURL + "ID/"+pageId , function (data) {
    
    // });
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