if (window.location.pathname.indexOf('/transports/') >= 0) {
    window.addEventListener('load', function() {
        var myDate = new Date();
        if (myDate.getDay() == 0) {
            myDate = 6;
        } else {
            myDate = myDate.getDay() - 1;
        }
        if (myDate == 5 || myDate == 6) {
            holi()
        }
        var stop_t = document.querySelectorAll('.st1');
        for (let j = 0; j < stop_t.length; j++) {
            let stop_day = stop_t[j].getElementsByTagName('span');
            for (let i = 0; i < stop_day.length; i++) {
                if (i == myDate) {
                    stop_day[i].style.backgroundColor = "#dea115";
                }
            }
        }
        let stoptogl = document.querySelectorAll('.stopsp');
        for (let i = 0; i < stoptogl.length; i++) {
            stoptogl[i].addEventListener("click", function () {
                let id = this.id + "p";
                let elem = document.getElementById(id);
                elem.classList.toggle("block_non");
            })
        }
        let stop_ref = document.querySelectorAll('.stop_ref');
        document.querySelector('#stop_ref').addEventListener("click", function () {
            for (let i = 0; i < stop_ref.length; i++) {
                stop_ref[i].classList.toggle("block_non");
            }
        });
            let elems = document.querySelectorAll('.st1 span');
            for (var i = 0; i < elems.length; i++) {
                elems[i].addEventListener('click', changeColor);
            }

            function changeColor() {
                for (var i = 0; i < elems.length; i++) {
                    elems[i].style.backgroundColor = "";
                }
                this.style.backgroundColor = '#dea115';
                if (this.innerHTML == "ՇԲ" || this.innerHTML == "ԿՐ") {
                    holi()
                } else {
                    work()
                }
            }

        function work() {
            let workdays = document.querySelectorAll('.workdays');
            let holidays = document.querySelectorAll('.holidays');
            for (let c = 0; c < workdays.length; c++) {
                workdays[c].style.display = "block";
            }
            for (let k = 0; k < holidays.length; k++) {
                holidays[k].style.display = "none";
            }
        }

        function holi() {
            let workdays = document.querySelectorAll('.workdays');
            let holidays = document.querySelectorAll('.holidays');
            for (let c = 0; c < workdays.length; c++) {
                workdays[c].style.display = "none";
            }
            for (let k = 0; k < holidays.length; k++) {
                holidays[k].style.display = "block";
            }
        }
    });
}
if (window.location.pathname.indexOf('/users/stops/') >= 0) {
    function kangar(result) {
        var t_name = document.querySelector('input[name=t_name]:checked').value;
        var t_id = document.querySelectorAll('select option');
        for (let j = 0; j < t_id.length; j++) {
            if (t_id[j].selected) {
                t_id = t_id[j].value;
            }
        }
        var par = 't_name=' + t_name + '&' + 't_id=' + t_id;
        ajaxKangar(par);
    }

    function ajaxKangar(par) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                let $t = request.responseText;
                document.querySelector('#kangar').innerHTML = $t;
            }
        }
        request.open('POST', '/users/tajax');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(par);
    }
}
