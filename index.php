<html>
<head>
<script>
function test(e) {
    e.preventDefault()
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        var formData = new FormData();
        formData.append("fileToUpload", document.getElementById("fileToUpload").files[0]);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "upload.php");
        xhr.send(formData);  
}  
</script>
</head>
    <body>
        <div class="section">
            <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
            <form onsubmit="test(event)" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>


    </body>
</html>