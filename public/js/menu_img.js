window.onload = function() {

    var alltop_click = document.getElementById("alltop_click");

    alltop_click.onclick = function () {
        mytop.style.display = "none";
        mytop_img.style.display = "none";
        alltop.style.display = "block";
        alltop_img.style.display = "block";
        alltop_click.style.backgroundColor = "#dea115";
        mytop_click.style.backgroundColor = "#163f9d";
    }

    document.getElementById('all_img1').onmouseover = function () {
        all_img11.style.display = "block";
    }

    document.getElementById('all_img2').onmouseover = function () {
        all_img11.style.display = "none";
        all_img22.style.display = "block";
    }

    document.getElementById('all_img2').onmouseout = function () {
        all_img11.style.display = "block";
        all_img22.style.display = "none";
    }

    document.getElementById('all_img3').onmouseover = function () {
        all_img11.style.display = "none";
        all_img33.style.display = "block";
    }

    document.getElementById('all_img3').onmouseout = function () {
        all_img11.style.display = "block";
        all_img33.style.display = "none";
    }

    document.getElementById('all_img4').onmouseover = function () {
        all_img11.style.display = "none";
        all_img44.style.display = "block";
    }

    document.getElementById('all_img4').onmouseout = function () {
        all_img11.style.display = "block";
        all_img44.style.display = "none";
    }

    document.getElementById('all_img5').onmouseover = function () {
        all_img11.style.display = "none";
        all_img55.style.display = "block";
    }

    document.getElementById('all_img5').onmouseout = function () {
        all_img11.style.display = "block";
        all_img55.style.display = "none";
    }

    var mytop_click = document.getElementById("mytop_click");

    mytop_click.onclick = function () {
        mytop.style.display = "block";
        mytop_img.style.display = "block";
        alltop.style.display = "none";
        alltop_img.style.display = "none";
        alltop_click.style.backgroundColor = "#163f9d";
        mytop_click.style.backgroundColor = "#dea115";
    }

    document.getElementById('my_img1').onmouseover = function () {
        my_img11.style.display = "block";
    }

    document.getElementById('my_img2').onmouseover = function () {
        my_img11.style.display = "none";
        my_img22.style.display = "block";
    }

    document.getElementById('my_img2').onmouseout = function () {
        my_img11.style.display = "block";
        my_img22.style.display = "none";
    }

    document.getElementById('my_img3').onmouseover = function () {
        my_img11.style.display = "none";
        my_img33.style.display = "block";
    }

    document.getElementById('my_img3').onmouseout = function () {
        my_img11.style.display = "block";
        my_img33.style.display = "none";
    }

    document.getElementById('my_img4').onmouseover = function () {
        my_img11.style.display = "none";
        my_img44.style.display = "block";
    }

    document.getElementById('my_img4').onmouseout = function () {
        my_img11.style.display = "block";
        my_img44.style.display = "none";
    }

    document.getElementById('my_img5').onmouseover = function () {
        my_img11.style.display = "none";
        my_img55.style.display = "block";
    }

    document.getElementById('my_img5').onmouseout = function () {
        my_img11.style.display = "block";
        my_img55.style.display = "none";
    }

    document.getElementById('my_img6').onmouseover = function () {
        my_img11.style.display = "none";
        my_img66.style.display = "block";
    }

    document.getElementById('my_img6').onmouseout = function () {
        my_img11.style.display = "block";
        my_img66.style.display = "none";
    }

    document.getElementById('my_img7').onmouseover = function () {
        my_img11.style.display = "none";
        my_img77.style.display = "block";
    }

    document.getElementById('my_img7').onmouseout = function () {
        my_img11.style.display = "block";
        my_img77.style.display = "none";
    }
}

