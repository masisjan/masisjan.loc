function deleteImg(imgName) {
    if (confirm('Դուք ցանկանում եք հեռացնել նկարը?')) {
        document.getElementById(imgName).style.display = "none";
        if (imgName === 'image') {
            document.getElementById("imgdelete").value = "none";
        }
        if (imgName === 'images') {
            document.getElementById("imgsdelete").value = "none";
        }
    }
}
