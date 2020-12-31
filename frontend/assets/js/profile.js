$(document).ready(function(){
    var cropper;
    var u_id = $('.u_p_id').data('uid');
    let coverBtn=document.getElementById("cover-photo");
    let stepModal=document.querySelector(".artdeco-modal");
    let previewContainer=document.querySelector(".artdeco-modal-step");
    let modal=document.getElementById("modal");
    let modalPic=document.getElementById("modal-pic");
    let  modalEditPic=document.querySelector(".modal-pic-edit");

    $(document).on("click","#cover-photo",function(){
        previewContainer.style.display="none";
        modal.style.display="block";
        stepModal.style.display="block";
    });

    $(document).on("click",".artdeco-modal__dismiss",function(){
        modal.style.display="none";
        $(".profile-topcard-background-image-edit__input").val("");
    });
    
    // window.onclick=function(e){
    //     if(e.target==modal){
    //         modal.style.display="none";
    //         $(".profile-topcard-background-image-edit__input").val("");
    //     }
    // }
  $(window).on("click",function(e){
      if(e.target==modal){
            modal.style.display="none";
           $(".profile-topcard-background-image-edit__input").val("");
      }
  })
    // window.onclick=function(e){
    //     if(e.target==modal){
    //         modal.style.display="none";
    //         $(".profile-topcard-background-image-edit__input").val("");
    //     }
    // }
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

    $(document).on("click",".edit-profile-icon",function(){
        // var odalPic=document.querySelector(".artdeco-modal-pic");
        modalEditPic.style.display="block";
        // odalPic.style.display="block";
    });
   
    $(document).on("click",".artdeco-modal__dismiss",function(){
        
        $.post("http://localhost/linkedIn/backend/ajax/getUsernameByuserId.php",{userId:u_id},function(data){
            window.location.href = "http://localhost/linkedIn/in/"+data;
            modalEditPic.style.display="none";
        })
        
    });
  
  $(window).on("click",function(e){
          if(e.target==modalEditPic){
            $.post("http://localhost/linkedIn/backend/ajax/getUsernameByuserId.php",{userId:u_id},function(data){
                window.location.href = "http://localhost/linkedIn/in/"+data;
                modalEditPic.style.display="none";
            })
        }
  });
 
    window.onclick=function(e){
        if(e.target==modalPic){
            modalPic.style.display="none";
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

    $("#p__edit-profileCover").change(function(e){
       
        if(this.files && this.files[0]){
            
          let picE=document.querySelector(".artdeco-modal-pic-edit");
          let previewContainer=document.querySelector(".artdeco-modal-pic-cover-edit");
        //   let pHeader=document.querySelector(".p_h3");
       
        picE.style.display="none";
        previewContainer.style.display="block";
    //   console.log(pHeader);
     
            let reader=new FileReader();
            reader.onload=function(e){

                var image=document.getElementById("profileEditImagePreview");
               
                image.src=e.target.result;
               
            
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

    $("#profile__edit-modal").change(function(e){
       
        if(this.files && this.files[0]){
           
          let picE=document.querySelector(".artdeco-modal-pic-edit");
          let previewContainer=document.querySelector(".artdeco-modal-pic-cover-edit");
        let pHeader=document.querySelector(".p_h3");
       
        picE.style.display="none";
        previewContainer.style.display="block";
    //   console.log(pHeader);
        pHeader.innerHTML="Profile Photo";

    
       
   
            let reader=new FileReader();
            reader.onload=function(e){

                var image=document.getElementById("profileEditImagePreview");
               
                image.src=e.target.result;
               
            
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
                    location.reload();
                    // let previewContainer=document.querySelector(".artdeco-modal-step");
                    // let modal=document.getElementById("modal");
                    // $('.profile-cover-wrap').css('background-image', 'url(' + data + ')');
                    // modal.style.display="none";
                    // previewContainer.style.display="none";
                    
                }
                
            });

       });
    });

    $(".profileUploadButton").click(function(e){
        var name = document.querySelector("#photoUpload").files[0];
        //  console.log(name,u_id);
        let canvas=cropper.getCroppedCanvas();
        if(canvas==null){
           alert("Could not upload image.Make sure it is an image file.");
           return;
        }
       canvas.toBlob((blob)=>{
        let formData=new FormData();
            formData.append("croppedImage",blob);
            formData.append("userId",u_id);
            $.ajax({
                url:"http://localhost/linkedIn/backend/ajax/profilePhoto.php",
                type:"POST",
                cache:false,
                processData:false,
                data:formData,
                contentType:false,
                success:(data)=> {
                    location.reload(true);
                    
                }
                
            });

       });
    });

    $("#editPhoto").click(function(e){
        let pHeader=document.querySelector(".p_h3");
        if(pHeader.innerText=="Profile Photo"){
            var name = document.querySelector("#profile__edit-modal").files[0];
            let canvas=cropper.getCroppedCanvas();
            if(canvas==null){
            alert("Could not upload image.Make sure it is an image file.");
            return;
            }
        canvas.toBlob((blob)=>{
            let formData=new FormData();
                formData.append("croppedImage",blob);
                formData.append("userId",u_id);
                $.ajax({
                    url:"http://localhost/linkedIn/backend/ajax/profilePhoto.php",
                    type:"POST",
                    cache:false,
                    processData:false,
                    data:formData,
                    contentType:false,
                    success:(data)=> {
                        location.reload(true);
                        
                    }
                    
                });

       });
        }else if(pHeader.innerText=="Background photo"){
         var name = document.querySelector("#p__edit-profileCover").files[0];
        let pHeader=document.querySelector(".p_h3");
        
        //  console.log(name,u_id);
        // alert(name);
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
                    location.reload(true);
                    
                }
                
            });

       });
        }
    
    });
    $(document).on("click",".back__edit",function(){
        location.reload(true);
    });

    $(document).on("click","#eprofile",function(e){
        e.preventDefault();
        let fname=$("#topcard-firstname").val().trim();
        let lname=$("#topcard-lastname").val().trim();
        let headlineDesc=$("#topcard-headline").val().trim();
        let country=$("#location-country-region").val().trim();
        let education=$("#topcard-education").val().trim();
        let industry=$("#topcard-industry").val().trim();
        if(fname !="" && lname != "" && headlineDesc != "" && country != "" && education != "" && industry != ""){
           $.post("http://localhost/linkedIn/backend/ajax/profileEdit.php",{userId:u_id,firstName:fname,lastName:lname,headline:headlineDesc,country:country,education:education,industry:industry},function(data){
               location.href="http://localhost/linkedin/in/"+data;
           })
        }else{
            alert("All fields are required!");
        }
       
        // alert(lname);
    })

   
});