let word_click = document.getElementById("word_click");
    let guest = document.getElementById("guest");

    let i = 1;

    word_click.onclick = function () {

        if (i > 6) {
            guest.style.display = "block";
            word_click.style.color = "red";
            word_click.style.border = "2px solid red";
            return;
        }
        document.getElementById(`word${i}`).style.display = "none";
        i++;
        guest.style.display = "none";
        document.getElementById(`word${i}`).style.display = "block";

        return (i);
    }
