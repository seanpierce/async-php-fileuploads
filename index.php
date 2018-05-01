<html>
<head>
<script>
function uploadFile(e) {
    e.preventDefault()
    var formData = new FormData()
    formData.append("fileToUpload", document.getElementById("fileToUpload").files[0])

    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = (state) => {
        if (state.target.readyState === 4 && state.target.status === 200)
            console.log('Upload complete!')
    }
    xhr.upload.onprogress = (progress) => {
        console.log((progress.loaded / progress.total) * 100)
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