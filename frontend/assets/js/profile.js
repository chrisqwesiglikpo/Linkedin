$(document).ready(function(){
    let coverBtn=document.getElementById("cover-photo");
    let modal=document.getElementById("modal");
    $(document).on("click","#cover-photo",function(){
        modal.style.display="block";
    });

    $(document).on("click",".artdeco-modal__dismiss",function(){
        modal.style.display="none";
    });
    
    window.onclick=function(e){
        if(e.target==modal){
            modal.style.display="none";
        }
    }
});