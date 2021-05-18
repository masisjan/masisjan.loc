window.onload = function() {

    var alltop_click = document.getElementById("alltop_click");

    alltop_click.onclick = function () {
        mytop.style.display = "none";
        mytop_img.style.display = "none";
        hottop.style.display = "none";
        hottop_img.style.display = "none";
        alltop.style.display = "block";
        alltop_img.style.display = "block";
        alltop_click.style.backgroundColor = "#dea115";
        mytop_click.style.backgroundColor = "#163f9d";
        hottop_click.style.backgroundColor = "#163f9d";
    }

    let alltopa = document.querySelectorAll(".alltop a");

    for ( let i = 0; i < alltopa.length; i++) {
        alltopa[i].addEventListener("mouseover", function() {
            let id = this.id + 'a';
            let img = document.querySelectorAll(".alltopimg img");
            for (let j = 0; j < img.length; j++) {
                img[j].style.display = "none";
            }
            document.getElementById(id).style.display = "block";
        });
    }

    var mytop_click = document.getElementById("mytop_click");

    mytop_click.onclick = function () {
        mytop.style.display = "block";
        mytop_img.style.display = "block";
        alltop.style.display = "none";
        alltop_img.style.display = "none";
        hottop.style.display = "none";
        hottop_img.style.display = "none";
        alltop_click.style.backgroundColor = "#163f9d";
        hottop_click.style.backgroundColor = "#163f9d";
        mytop_click.style.backgroundColor = "#dea115";
    }

    let mytopa = document.querySelectorAll(".mytop a");

    for ( let i = 0; i < mytopa.length; i++) {
        mytopa[i].addEventListener("mouseover", function() {
            let id = this.id + 'a';
            let img = document.querySelectorAll(".mytopimg img");
            for (let j = 0; j < img.length; j++) {
                img[j].style.display = "none";
            }
            document.getElementById(id).style.display = "block";
        });
    }

    var hottop_click = document.getElementById("hottop_click");

    hottop_click.onclick = function () {
        mytop.style.display = "none";
        mytop_img.style.display = "none";
        alltop.style.display = "none";
        alltop_img.style.display = "none";
        hottop.style.display = "block";
        hottop_img.style.display = "block";
        alltop_click.style.backgroundColor = "#163f9d";
        mytop_click.style.backgroundColor = "#163f9d";
        hottop_click.style.backgroundColor = "#dea115";
    }

    let hottopa = document.querySelectorAll(".hottop a");

    for ( let i = 0; i < hottopa.length; i++) {
        hottopa[i].addEventListener("mouseover", function() {
            let id = this.id + 'a';
            let img = document.querySelectorAll(".hottopimg img");
            for (let j = 0; j < img.length; j++) {
                img[j].style.display = "none";
            }
            document.getElementById(id).style.display = "block";
        });
    }
//     @ndhanur menu
    let menusBottom = document.querySelectorAll(".menusBottom div");

    for ( let i = 0; i < menusBottom.length; i++) {
        menusBottom[i].addEventListener("click", function() {
            let id = this.id;
            let Bottom = document.querySelectorAll(".menusBottom p");
            for (let f = 0; f < Bottom.length; f++) {
                Bottom[f].style.backgroundColor = "#163f9d"
            }
            document.getElementById(id).querySelector("p").style.backgroundColor = "#dea115";
            id += 'a';
            let block = document.querySelectorAll(".menus .menu");
            for (let j = 0; j < block.length; j++) {
                block[j].style.display = "none";
            }
            document.getElementById(id).style.display = "block";
        });
    }
}

