$(document).ready(function(){
    var cropper;
    var u_id = $('.u_p_id').data('uid');
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

    $(".imageUploadButton").click(function(e){
        var name = document.querySelector("#uploadCoverPhoto").files[0];
        // console.log(name,u_id);
        let canvas=cropper.getCroppedCanvas();
        if(canvas==null){
           alert("Could not upload image.Make sure it is an image file.");
           return;
        }
       canvas.toBlob((blob)=>{
        let formData=new FormData();
            formData.append("croppedCoverImage",blob);
            formData.append("userId",u_id);
            $.ajax({
                url:"http://localhost/linkedIn/backend/ajax/profilePhoto.php",
                type:"POST",
                cache:false,
                processData:false,
                data:formData,
                contentType:false,
                success:(data)=> {
                    let previewContainer=document.querySelector(".artdeco-modal-step");
                    let modal=document.getElementById("modal");
                    $('.profile-cover-wrap').css('background-image', 'url(' + data + ')');
                    modal.style.display="none";
                    previewContainer.style.display="none";
                    
                }
                
            });

       });
    });


   
});