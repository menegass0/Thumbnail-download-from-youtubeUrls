<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thumbanail Download</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/e6f0797e64.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="#">
        <header>Download thumbnail</header>
        <div class="url-input">
            <span class="title">Paste video url:</span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/watch?v=2oc4KeGOjn4" required>
                <input type="hidden" class="hidden-input">
                <div class="bottom-line"></div>
            </div>
        </div>
        <div class="preview-area">
            <img src="fetchimage.webp" alt="thumbnail" class="thumbnail">
            <i class="icon fas fa-cloud-download-alt"></i>
            <span>Paste video url to see preview</span>
        </div>
        <button class="download-btn" tipe="submit">Download thumbnail</button>
    </form>
    <script>
        const urlField = document.querySelector(".field input");
        previewArea = document.querySelector(".preview-area");
        imgTag =  previewArea.querySelector(".thumbnail");
        
        urlField.onkeyup = ()=>{
            let imgUrl = urlField.value;
            previewArea.classList.add("active");
            hiddenInput =document.querySelector(".hidden-input");
            if(imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1){
                let vidId = imgUrl.split("v=")[1].substring(0,11);
                let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
                imgTag.src = ytThumbUrl;

            }else if(imgUrl.indexOf("https://youtu.be/") != -1){
                let vidId = imgUrl.split("be/")[1].substring(0,11);
                let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
                imgTag.src = ytThumbUrl;

            }else if(imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){
                imgTag.src = imgUrl;    
            }
            else{
                imgTag.src = "";
                previewArea.classList.remove("active");
                
            }
            hiddenInput.value = imgTag.src;
        }
    </script>
</body>
</html>