<html>
    <head>
        <script src="scripts.js"></script>
    </head>
    <body>
        <div class="section">
            <form onsubmit="uploadFile(event)" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
        <div class="section">
        <?php 
            include 'functions.php';
            getFiles();
        ?>
        </div>
    </body>
</html>