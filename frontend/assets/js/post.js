$(function(){
    let modalPost=document.querySelector(".artdeco-modal-outlet__post");
    let succPostModal=document.querySelector(".artedeco-toast-item_toasts__post");
    var u_id = $('.u_p_id').data('uid');
   $(document).on("click","#postModal",function(e){
       e.preventDefault();
       modalPost.style.display="block";
   });

   $(document).on("click","#artdeco-modal__header-post-close",function(e){
       modalPost.style.display="none";
   });

   window.onclick=function(e){
    if(e.target==modalPost){
        modalPost.style.display="none";
    }
}

$(document).on("click","#btn-post-close__succ",function(){
   succPostModal.style.display="none";
});

$(document).on("keyup","#editorInput",function(e){
      let textbox=$(e.target);
      let value=textbox.val().trim();

      let submitButton=$("#ember1104") ;
      if(submitButton.length ==0) return alert("No submit button not found");

      if(value ==""){
        submitButton.prop("disabled",true);
        return;
      }
      submitButton.prop("disabled",false);
});
   
$(document).on("click","#ember1104",function(e){
    e.preventDefault();
    let submitButton=$("#ember1104") ;
    let textInput=$("#editorInput").val().trim();
    if(textInput.length >50){
        alert("Post can not be greater than 50");
        submitButton.prop("disabled",true);
    }else{
        submitButton.prop("disabled",false);
        if(textInput !="" && textInput !=null){
            $.post('http://localhost/Linkedin/backend/ajax/post.php',{userId:u_id,onlyStatusText:textInput},function(data){
                modalPost.style.display="none";
                $("#editorInput").val("");
                submitButton.prop("disabled",true);
                succPostModal.style.display="block";
                $(".artedeco-toast-item_toasts__post").html(data);
                setTimeout(function(){
                    succPostModal.style.display="none";
                },3000);
            });
        }
    }
});
});