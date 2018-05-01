<html>
<head>
<script>
function uploadFile(e) {
    e.preventDefault()
    var formData = new FormData()
    formData.append("fileToUpload", document.getElementById("fileToUpload").files[0])

    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if (this.readyState == 4 && this.status == 200)
            console.log('upload complete')
    }
    xhr.onprogress = (progress) => {
        if (progress.lengthComputable)
            console.log(progress.loaded / progress.total)
    }
    xhr.open("POST", "upload.php")
    xhr.send(formData); 
}  
</script>
</head>
    <body>
        <div class="section">
            <form onsubmit="uploadFile(event)" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>


    </body>
</html>