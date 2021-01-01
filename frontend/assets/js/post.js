$(function(){
    let modalPost=document.querySelector(".artdeco-modal-outlet__post");
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
});