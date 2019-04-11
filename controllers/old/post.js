// load all post and commenters when scrolling
$(document).ready(function() {
    
    var currentPage =0;
    var pageCount1 =2;
    loadData(currentPage,pageCount1);
    
    $(window).scroll(function(){
       if($(window).scrollTop()==$(document).height()-$(window).height()){
            currentPage += pageCount1;
            loadData(currentPage,pageCount1);
       } 
    });
    
    function loadData(currentPage,pageCount1){
          $.getJSON(postURL+"_limits/"+currentPage+","+pageCount1, function (data) {
           
           $.each(data, function (key, value) {
               
               if(value.user_type ==='user'){
                   $.getJSON(userURL+"/"+value.posted_user , function (dataUaer) {
                       
                       if(value.image===''){
                            $("#postRow").append("<div class='row' id='hi'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle'  src='../dist/img/log_img.jpg'><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp; "+ dataUaer[0]['user_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" - "+value.date+"</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"' style='color:red'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div class='card-footer card-comments' id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text'  id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>"); 
                       }else{
                       
                       if(value.liked ==='liked'){
                           $("#postRow").append("<div class='row' id='hi'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle' src='data:image;base64,"+dataUaer[0]['image']+"'><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+ dataUaer[0]['user_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" - "+value.date+"</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"' style='color:red'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div class='card-footer card-comments' id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text'  id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>"); 
                       }else{
                           $("#postRow").append("<div class='row' id='hi'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle' src='data:image;base64,"+dataUaer[0]['image']+"'><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+ dataUaer[0]['user_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" - "+value.date+"</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"' style='color:black'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div class='card-footer card-comments'  id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text'  id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>");
                       }
                       }
                      
                       $.getJSON(commentsURL+"/"+value.cid, function (d) {
                           $.each(d, function (key, v) {
                          
                          if(v.image===''){
                            
                             $("#f"+value.cid).append( "<div class='card-comment'   style='border-top: 1px solid #e2dcdc' ><img class='img-circle img-sm' src='../dist/img/log_img.jpg' ><div class='comment-text'><span class='username' id='commenterUserName'>"+v.userName+"<span class='text-muted float-right' id='commentedTime'>"+v.time+" - "+v.date+"</span></span><div id='commentField'>"+v.comments+"</div></div></div>");  
                          }else{
                             $("#f"+value.cid).append( "<div class='card-comment'   style='border-top: 1px solid #e2dcdc' ><img class='img-circle img-sm' src='data:image;base64,"+v.image+"'><div class='comment-text'><span class='username' id='commenterUserName'>"+v.userName+"<span class='text-muted float-right' id='commentedTime'>"+v.time+" - "+v.date+"</span></span><div id='commentField'>"+v.comments+"</div></div></div>");
                          }
                          
                           });
                       });
                           
                    });
               }else{
                    $.getJSON(doctorURL+"_find_email/"+value.email , function (dataUaer) {
                        if(value.image===''){
                        $("#postRow").append("<div class='row' id='hi'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle'  src='../dist/img/log_img.jpg'><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+ dataUaer[0]['doctor_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" - "+value.date+"</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"' style='color:red'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div class='card-footer card-comments'  id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text'  id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>");
                        }else{
                        if(value.liked==='liked'){
                         $("#postRow").append("<div class='row' id='hi'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle'  src='../dist/img/log_img.jpg' ><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+ dataUaer[0]['doctor_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" - "+value.date+"</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"' style='color:red'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div class='card-footer card-comments'  id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text'  id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>");
                        }else{
                         $("#postRow").append("<div class='row' id='hi'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle'  src='../dist/img/log_img.jpg' ><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+ dataUaer[0]['doctor_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" - "+value.date+"</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"' style='color:black'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div class='card-footer card-comments'  id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text'  id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>");
                        }
                        }
                  
                        $.getJSON(commentsURL+"/"+value.cid, function (d) {
                            $.each(d, function (key, v) {
                                if(v.image===''){
                                    $("#f"+value.cid).append( "<div class='card-comment'   style='border-top: 1px solid #e2dcdc' ><img class='img-circle img-sm' src='../dist/img/log_img.jpg'><div class='comment-text'><span class='username' id='commenterUserName'>"+v.userName+"<span class='text-muted float-right' id='commentedTime'>"+v.time+" - "+v.date+"</span></span><div id='commentField'>"+v.comments+"</div></div></div>");
                                }else{
                                    $("#f"+value.cid).append("<div class='card-comment' style='border-top: 1px solid #e2dcdc'><img class='img-circle img-sm' src='../dist/img/log_img.jpg' ><div class='comment-text'><span class='username' id='commenterUserName'>"+v.userName+"<span class='text-muted float-right' id='commentedTime'>"+v.time+" - "+v.date+"</span></span><div id='commentField'>"+v.comments+"</div></div></div>"); 
                                }
                            
                            });
                        });
                        
                   });
               }
           });
         
       });

    }
    
       
       $.getJSON(postURL+"_count" , function (data) {
           document.getElementById("postCount").innerHTML = data[0]['count'];
       });
});

// like btn click 
function myBtn(value){
  var post = value;
  var likeComments = document.getElementById('i'+value).innerHTML;
  var likesArray = likeComments.split(" likes ");
  var likeCount = parseInt(likesArray[0])+1;


  var likeObject = [{
      "post":post,
  }];
    
  var ajaxConfig = {
    method: "POST",
    contentType: 'application/json; charset=utf-8',
    url: likeURL,
    data: JSON.stringify(likeObject),
    async: true
  };
  
  $.ajax(ajaxConfig).done(function (response) {
      if(response==='true'){
             document.getElementById(value).style.color = "red";
             document.getElementById('i'+value).innerHTML = likeCount+" likes "+likesArray[1];
      }
      if(response==='delete'){
             document.getElementById(value).style.color = "black";
             var minLikeCOunt =  parseInt(likesArray[0])-1;
             document.getElementById('i'+value).innerHTML = minLikeCOunt+" likes "+likesArray[1];
      }
  });
  
}

// comment input action enter 
var cc;
function commentFunc(c){
    var comment = document.getElementById(c).value;
    var x =  c.split("c");
    var post = x[1];
    cc = post;

   var user=  document.getElementById("head-name").innerHTML
   
   var property = localStorage.getItem("commentetImage");


  var commentObj = [{
      "postID":post,
      "comments":comment,
      "currentUser":user,
      "image":property
  }];
    
  var ajaxConfig = {
    method: "POST",
    contentType: 'application/json; charset=utf-8',
    url: commentsURL,
    data: JSON.stringify(commentObj),
    async: true
  };
  $.ajax(ajaxConfig).done(function (response) {
      console.log("response "+response)
      $.getJSON(commentsURL+"_byID/"+response , function (ijse) {
          if(ijse[0]['image']===''){
               $("#f"+cc).append("<div class='card-comment' style='border-top: 1px solid #e2dcdc'><img class='img-circle img-sm' src='../dist/img/log_img.jpg' alt='User Image'><div class='comment-text'><span class='username' id='commenterUserName'>"+ijse[0]['userName']+"<span class='text-muted float-right' id='commentedTime'>"+ijse[0]['time']+" - "+ijse[0]['date']+"</span></span><div id='commentField'>"+ijse[0]['comments']+"</div></div></div>"); 
          }else{
               $("#f"+cc).append("<div class='card-comment' style='border-top: 1px solid #e2dcdc'><img class='img-circle img-sm' src='data:image;base64,"+ijse[0]['image']+"' alt='User Image'><div class='comment-text'><span class='username' id='commenterUserName'>"+ijse[0]['userName']+"<span class='text-muted float-right' id='commentedTime'>"+ijse[0]['time']+" - "+ijse[0]['date']+"</span></span><div id='commentField'>"+ijse[0]['comments']+"</div></div></div>"); 
          }
          
      });
     
      document.getElementById(c).value= "";

  });
       
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

$("#loveBtn").on('click', function (event) {
});

// load post in real  time 
$("#postBtn").on('click', function (event) {

    var description = document.getElementById("postArea").value;
    var image = document.getElementById("file").files[0];
    try{
    var image_name = image.name;
    }catch(err){
        swal("Please Select a Image !", "Something Wrong With the Process!", "error");
        return;
    }
    var image_extention = image_name.split('.').pop().toLowerCase();
    var email = getCookie("imergencyEmail");
    
    if(jQuery.inArray(image_extention,['gif','png','jpg','jpeg'])== -1){
        alert("Invalid Image");
        return;
    }
    var image_size = image.size;
    if(image_size>2000000){
        alert("Image File Size very big");
        return;
    }
    
var formData = new FormData();
formData.append("file",image);
formData.append("description",description);
formData.append("email",email);
    
var ajaxConfig = {
    method: "POST",
    url: postURL,
    data: formData,
    contentType: false,
    cache:false,
    processData:false,
    async: true
};

$.ajax(ajaxConfig).done(function (response) {
    console.log(response);
    if (response > 0) {

     $.getJSON(postURL+"/"+response , function (data) {
           
           $.each(data, function (key, value) {
               
               if(value.user_type ==='user'){
                   $.getJSON(userURL+"/"+value.posted_user , function (dataUaer) {
                         $("#postRow0").append("<div class='row'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle' src='data:image;base64,"+dataUaer[0]['image']+"' ><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+dataUaer[0]['user_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" Today</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text' id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>");
                   });
                  
               }else{
                    $.getJSON(doctorURL+"_find_email/"+value.email , function (dataUaer) {
                         $("#postRow0").append("<div class='row'><div class='col-md-8'><div class='card card-widget'><div class='card-header'><div class='user-block'><img class='img-circle' src='data:image;base64,"+dataUaer[0]['image']+"'><span class='postUserName' id='postUserName'><a href='#' ></a>&nbsp;&nbsp;&nbsp;"+dataUaer[0]['doctor_name']+"</span><span class='description' id='postedTime'>Public "+value.time+" Today</span></div><div class='card-tools'><button type='button' class='btn btn-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button><button type='button' class='btn btn-tool' data-widget='collapse'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-tool' data-widget='remove'><i class='fa fa-times'></i></button></div></div><div class='card-body'><div id='postImg'><img class='img-fluid pad' src='data:image;base64,"+value.post_img+"' alt='Photo'></div><br><p  id='PostDescription'>"+value.description+"</p><button type='button' value='"+value.cid+"' class='btn btn-default btn-sm'  onClick='myBtn(this.value)' id='loveBtn'><i class='fa fa-heart' id='"+value.cid+"'></i> Love it</button><span class='float-right text-muted' id='i"+value.cid+"'>"+value.likeCount+" likes "+value.commentCount+" comments</span></div><div id='f"+value.cid+"'></div><div class='card-footer'><img class='img-fluid img-circle img-sm' src='../dist/img/user4-128x128.jpg' alt='Alt Text'><div class='img-push'><input type='text' id='c"+value.cid+"' onchange='commentFunc(this.id)' class='form-control form-control-sm' placeholder='Press enter to post comment'></div></div></div></div></div>");
                   });
                
               }
              
           });
         
       });
    }else if (response === 'false') {
          swal("Oops!", "Something Wrong With the Process!", "error");
    }else{
          swal("Oops!", response, "error");
    }
  });
       var offCount=document.getElementById("postCount").innerHTML;
       document.getElementById("postCount").innerHTML = parseInt(offCount)+1;
       document.getElementById("postArea").value="";
       $('#blah').attr('src', '');

});

