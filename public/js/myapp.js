

//ORER JAMER
var dey = document.querySelectorAll(".dey div");
var d = new Date();
var weekday = new Array(7);
weekday[0] = "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";
var resultdey = weekday[d.getDay()];
var hours ="'" + d.getHours() + "'";
if(hours.length === 3){
    hours = '0' + d.getHours();
}else {
    hours = d.getHours();
}
var resulthours ='1' + hours + d.getMinutes();
for (var j = 0; j < dey.length; j++) {
    let id = dey[j].id;
    if(id == resultdey){
        dey[j].style.backgroundColor = "Chocolate";
        dey[j].style.borderRadius = "50px";
        var text = dey[j].innerText
        if (! /^[0-9]+$/.test(text)) {
            var textend = text.substr(text.length - 5);
            var resend = '1' + textend.slice(0, -3) + textend.slice(-2);
            var textstart = text.substr(text.length - 13, 5);
            var resstart = '1' + textstart.slice(0, -3) + textstart.slice(-2);
            if (resulthours > resstart && resulthours < resend) {
                dey[j].style.backgroundColor = "Green";
            } else {
                dey[j].style.backgroundColor = "Maroon";
            }
        }else {
            dey[j].style.backgroundColor = "Maroon";
        }
        break
    }
}

window.addEventListener('load', function() {
    var i_table_id = document.querySelector('input[name=table_id]');
    var i_table_name = document.querySelector('input[name=table_name]');
    var i_id_post = document.querySelector('input[name=id_post]');
    var i_refresh = document.querySelector('input[name=refresh]');
    var i_rating = document.querySelectorAll('input[name=rating]');
    document.querySelector('#send').onclick = function () {
        for (let i = 0; i < i_rating.length; i++) {
            if (i_rating[i].checked) {
               i_rating = i_rating[i].value;
            }
        }
        var params = 'table_id=' + i_table_id.value + '&' + 'id_post=' + i_id_post.value + '&' + 'refresh=' + i_refresh.value + '&' + 'rating=' + i_rating + '&' + 'table_name=' + i_table_name.value;
        ajaxPost(params);
    }
});

function newajax() {
    var i_table_id = document.querySelector('input[name=table_id]');
    var i_table_name = document.querySelector('input[name=table_name]');
    var i_id_post = document.querySelector('input[name=id_post]');
    var i_rating = document.querySelectorAll('input[name=rating]');
        for (let i = 0; i < i_rating.length; i++) {
            if (i_rating[i].checked) {
                i_rating = i_rating[i].value;
            }
        }
        var params = 'table_id=' + i_table_id.value + '&' + 'id_post=' + i_id_post.value + '&' + 'refresh=1' + '&' + 'rating=' + i_rating + '&' + 'table_name=' + i_table_name.value;
        ajaxPost(params);
};
//RETING
window.addEventListener('load', function(){
    let rating = document.querySelector('#rating');
    let callbackfunc = function(){
        document.querySelector('#rating_name').style.display = "none";
        document.querySelector('#send').style.display = "block";
        document.querySelector('#send i').style.color = "green";
    };
    rating.addEventListener('click', callbackfunc);
});

function ajaxPost(params){
    var request = new XMLHttpRequest();

    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200){
            if(request.responseText == 5){
                var con = confirm("Գնահատելու համար պետք է մուտք գործել կայք")
                if (con == true) {
                    location.href = '/login';
                }
            }else if(request.responseText != '1' && request.responseText != 5){
                alert(request.responseText);
            }else if(request.responseText == 1){
                var ref = confirm("Շարունակելու դեպքում ձեր նախկին գնահատականը հեռացվելու է");
                if (ref == true) {
                    newajax();
                }
            }

        }
    }
    request.open('POST', '/rating');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(params);
}



