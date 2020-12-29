$(document).ready(function(){
    var cropper;
    let coverBtn=document.getElementById("cover-photo");
    let stepModal=document.querySelector(".artdeco-modal");
    let previewContainer=document.querySelector(".artdeco-modal-step");
    let modal=document.getElementById("modal");
    $(document).on("click","#cover-photo",function(){
        previewContainer.style.display="none";
        modal.style.display="block";
        stepModal.style.display="block";
    });

    $(document).on("click",".artdeco-modal__dismiss",function(){
        modal.style.display="none";
    });
    
    window.onclick=function(e){
        if(e.target==modal){
            modal.style.display="none";
        }
    }

    $("#uploadCoverPhoto").change(function(e){
        if(this.files && this.files[0]){
            let stepModal=document.querySelector(".artdeco-modal");
        let previewContainer=document.querySelector(".artdeco-modal-step");
        stepModal.style.display="none";
        previewContainer.style.display="block";
            let reader=new FileReader();
            reader.onload=function(e){

                var image=document.getElementById("imagePreview");
                image.src=e.target.result;
                // $("#imagePreview").attr("src",e.target.result);

                if(cropper !==  undefined){
                    cropper.destroy();
                }

                cropper=new Cropper(image,{
                    aspectRatio:16/9,
                    background:false
                });
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
   
});