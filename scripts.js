function uploadFile(e) {
    e.preventDefault()
    var formData = new FormData()
    formData.append("fileToUpload", document.getElementById("fileToUpload").files[0])

    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = (state) => {
        if (state.target.readyState === 4 && state.target.status === 200) {
            console.log('Upload complete! ', JSON.parse(state.target.response))
        } else if (state.target.readyState === 4 && state.target.status !== 200) {
            console.log('Errors: ', JSON.parse(state.target.response))
        }
    }
    xhr.upload.onprogress = (progress) => {
        console.log((progress.loaded / progress.total) * 100)
    }
    xhr.open("POST", "upload.php")
    xhr.send(formData); 
}  