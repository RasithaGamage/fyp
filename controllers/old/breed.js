// load breed
 $(document).ready(function() {
     var breed = document.getElementById("breed");
      $.getJSON(breedURL , function (data) {
             for(i=0;i<data.length;i++){
                 if(data[i]['type']==='Dog'){
                 breed.options[i] = new Option(data[i]['name'], data[i]['name']);
                 }
             }
             
         });

 });