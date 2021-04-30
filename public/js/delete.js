// document.querySelector('#filter_city_id').addEventListener('change', function () {
//     let city_id = this.value || this.options[this.selectedIndex].value;
//     let location = window.location.href;
//     // console.log(location);
//     window.location.href = window.location.href.split('?')[0] + '?city_id=' + city_id;
// });

document.querySelectorAll('.btn-logout').forEach((button) => {

    button.addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Դուք ցանկանում եք դուրս գալ?')) {
            let action = this.getAttribute('href');
            let form = document.querySelector('#form-logout');
            form.setAttribute('action', action);
            form.submit();
        }
    });
});

document.querySelectorAll('.btn-delete').forEach((button) => {

    button.addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Դուք ցանկանում եք հեռացնել?')) {
            let action = this.getAttribute('href');
            let form = document.querySelector('#form-delete');
            form.setAttribute('action', action);
            form.submit();
        }
    });
});

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

// document.querySelector('#btn-clear').addEventListener('click', function () {
//     // let input = document.querySelector('#search');
//     // let select = document.querySelector('#filter_company_id');
//     //
//     // input.value = "";
//     // select.selectedIndex = 0;
//
//     window.location.href = window.location.href.split('?')[0];
// })

// const toggleClearButton = () => {
//     let query = location.search;
//     let pattern = /[?&]search=/;
//     let button = document.querySelector('#btn-clear');
//
//     if (pattern.test(query)) {
//         button.style.display = 'block';
//     } else {
//         button.style.display = 'none';
//     }
// }

// toggleClearButton();
