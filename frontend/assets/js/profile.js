$(document).ready(function(){
    var cropper;
    var u_id = $('.u_p_id').data('uid');
    let coverBtn=document.getElementById("cover-photo");
    let stepModal=document.querySelector(".artdeco-modal");
    let previewContainer=document.querySelector(".artdeco-modal-step");
    let modal=document.getElementById("modal");
    let modalPic=document.getElementById("modal-pic");
    $(document).on("click","#cover-photo",function(){
        previewContainer.style.display="none";
        modal.style.display="block";
        stepModal.style.display="block";
    });

    $(document).on("click",".artdeco-modal__dismiss",function(){
        modal.style.display="none";
        $(".profile-topcard-background-image-edit__input").val("");
    });
    
    window.onclick=function(e){
        if(e.target==modal){
            modal.style.display="none";
            $(".profile-topcard-background-image-edit__input").val("");
        }
    }
    $(document).on("click",".pv-top-card__photo-wrapper",function(){
        let stepModalPic=document.querySelector(".artdeco-modal-pic");
        let previewProfileContainer=document.querySelector(".art-pic-step");
        stepModalPic.style.display="block";
        previewProfileContainer.style.display="none";
        modalPic.style.display="block";
    });

    $(document).on("click",".artdeco-modal__dismiss",function(){
        modalPic.style.display="none";
    });

    window.onclick=function(e){
        if(e.target==modalPic){
            modalPic.style.display="none";
        }
    }
    $("#uploadCoverPhoto").change(function(e){
        // let stepModal=document.querySelector(".artdeco-modal");
        // let previewContainer=document.querySelector(".artdeco-modal-step");
        // stepModal.style.display="none";
        // previewContainer.style.display="block";
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

    $("#photoUpload").change(function(e)
    {
        if(this.files && this.files[0]){
            let stepModalPic=document.querySelector(".artdeco-modal-pic");
            let previewProfileContainer=document.querySelector(".art-pic-step");
            stepModalPic.style.display="none";
            previewProfileContainer.style.display="block";
            let reader=new FileReader();
            reader.onload=function(e){

                var image=document.getElementById("profileImagePreview");
                image.src=e.target.result;
                // $("#imagePreview").attr("src",e.target.result);

                if(cropper !==  undefined){
                    cropper.destroy();
                }

                cropper=new Cropper(image,{
                    aspectRatio:1/1,
                    background:false
                });
            }
            reader.readAsDataURL(this.files[0]);
        }
    })

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

    $(".profileUploadButton").click(function(e){
        var name = document.querySelector("#photoUpload").files[0];
         console.log(name,u_id);
    //     let canvas=cropper.getCroppedCanvas();
    //     if(canvas==null){
    //        alert("Could not upload image.Make sure it is an image file.");
    //        return;
    //     }
    //    canvas.toBlob((blob)=>{
    //     let formData=new FormData();
    //         formData.append("croppedCoverImage",blob);
    //         formData.append("userId",u_id);
    //         $.ajax({
    //             url:"http://localhost/linkedIn/backend/ajax/profilePhoto.php",
    //             type:"POST",
    //             cache:false,
    //             processData:false,
    //             data:formData,
    //             contentType:false,
    //             success:(data)=> {
    //                 let previewContainer=document.querySelector(".artdeco-modal-step");
    //                 let modal=document.getElementById("modal");
    //                 $('.profile-cover-wrap').css('background-image', 'url(' + data + ')');
    //                 modal.style.display="none";
    //                 previewContainer.style.display="none";
                    
    //             }
                
    //         });

    //    });
    });


   
});