window.addEventListener('load', function() {
    if(document.querySelector("#title_tab")) {
        let title_tab = document.querySelector("#title_tab").href;
        title_tab = title_tab.substring(title_tab.indexOf('?') + 1);
        let text;
        switch (title_tab) {
            case "10":
                text = "Արագ սնունդ․ ";
                break;
            case "6":
                text = "Դեղատուն. ";
                break;
            case "9":
                text = "Կուսակցություն․ ";
                break;
            case "5":
                text = "Տաքսի․ ";
                break;
            case "3":
                text = "Ավիատոմսեր․ ";
                break;
            default:
                text = "";
        }
        document.querySelector("#title_name").innerHTML = text;
    }
});

function formValidation() {
    let user_id = document.querySelector(".user_id").textContent;
    user_id = user_id.slice(0, user_id.indexOf(' ')) + " ջան";
    let title = document.val.title;
    let director = document.val.director;
    let address = document.val.address;
    let phone = document.val.phone;
    let email = document.val.email;
    let site = document.val.site;
    let post_url = document.val.post_url;
    let fb = document.val.fb;
    let text = document.val.text;
    let word = document.val.word;
    var months = document.querySelectorAll(".months input");
    //VALIDATE
    let regex1 = /^[ \u0561-\u0587\u0531-\u0556-]+$/g;
    let regex2 = /^[0-9․,/ \u0561-\u0587\u0531-\u0556-]+$/g;
    let regex_phone = /^[+0-9]+$/;
    var regex_jam = /^[0-9-: ]+$/;
    var regex_text = /^[\u0561-\u0587\u0531-\u0556- 0-9․,<>։;՛"՝՜*+%$#@!()?]+$/;
    let regex_mail = /^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i;
    let regex_site = /[-a-zA-Z0-9@:%_\+.~#?&\/=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&\/=]*)?/gi;
    var regex_fb = /(?:http:\/\/)?(?:www\.)?facebook\.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-]*)/;
    //TITLE
    if (title !== undefined) {
        if (title.value.length === 0) {
            document.getElementById('title_val').innerHTML = user_id + ' ստե դատարկ չի կարա մնա';
            title.focus();
            return false;
        }
        if (title.value.length < 11 || title.value.length > 120) {
            document.getElementById('title_val').innerHTML = user_id + ' ստե պետքա 10-ից պակաս ու 120-ից ավել չլինի';
            title.focus();
            return false;
        }
    }
    //GHEKAVAR
    if (director !== undefined) {
        if (director.value.length > 0) {
            if (director.value.length < 3 || director.value.length > 90) {
                document.getElementById('director_val').innerHTML = user_id + ' ստե պետքա 3-ից պակաս ու 90-ից ավել չլինի';;
                director.focus();
                return false;
            }
            if (director.value.match(regex1)) {
            } else {
                document.getElementById('director_val').innerHTML = user_id + ' ստե պետքա հայերեն գրես ու տենց նշաններ չլինի';
                director.focus();
                return false;
            }
        }
    }
    //ADDRESS
    if (address !== undefined) {
        if (address.value.length === 0) {
            document.getElementById('address_val').innerHTML = user_id + ' Հասցէ դաշտը պարտադիր ա';
            address.focus();
            return false;
        }
        if (address.value.length < 3 || address.value.length > 99) {
            document.getElementById('address_val').innerHTML = user_id + ' ստե պետքա 3-ից պակաս ու 99-ից ավել չլինի';
            address.focus();
            return false;
        }
        if (address.value.match(regex2)) {
        } else {
            document.getElementById('address_val').innerHTML = user_id + ' ստե պետքա հայերեն գրես';
            address.focus();
            return false;
        }
    }
    //PHONE
    if (phone !== undefined) {
        if (phone.value.length > 0) {
            if (phone.value.length < 5 || phone.value.length > 12) {
                document.getElementById('phone_val').innerHTML = user_id + ' ստե պետքա 5-ից պակաս ու 12-ից ավել չլինի';
                phone.focus();
                return false;
            }
            if (phone.value.match(regex_phone)) {
            } else {
                document.getElementById('phone_val').innerHTML = user_id + ' հեռախոսահամարը թվով են գրում ու մենակ + նշանով';
                phone.focus();
                return false;
            }
        }
    }
    //EMAIL
    if (email !== undefined) {
        if (email.value.length > 0) {
            if (email.value.match(regex_mail)) {
            } else {
                document.getElementById('email_val').innerHTML = user_id + ' սխալ Էլ․ հասցե էս գրել միատ ուշադիր նայի';
                email.focus();
                return false;
            }
        }
    }
    //SITE
    if (site !== undefined) {
        if (site.value.length > 0) {
            if (site.value.match(regex_site)) {
            } else {
                document.getElementById('site_val').innerHTML = user_id + ' սենց կայք չկա';
                site.focus();
                return false;
            }
        }
    }
    //SITE post
    if (post_url !== undefined) {
        if (post_url.value.length > 0) {
            if (post_url.value.match(regex_site)) {
            } else {
                document.getElementById('site_val').innerHTML = user_id + ' սենց կայք չկա';
                post_url.focus();
                return false;
            }
        }
    }
    //FACEBOOK
    if (fb !== undefined) {
        if (fb.value.length > 0) {
            if (fb.value.match(regex_fb)) {
            } else {
                document.getElementById('fb_val').innerHTML = user_id + ' սենց Ֆեյսբուքյան էջի հասցե չի լինում';
                fb.focus();
                return false;
            }
        }
    }
    //TEXT
    if (text !== undefined) {
        if (text.value.length > 0) {
            if (text.value.length < 30) {
                document.getElementById('text_val').innerHTML = user_id + ' ստե պետքա 30 նիշից շատ լինի';
                return false;
            }
            if (text.value.match(regex_text)) {
            } else {
                document.getElementById('text_val').innerHTML = user_id + ' ստե պետքա հայերեն գրես ու ավելորդ նշաններ չլինեն';
                return false;
            }
        }
    }
    //WORD
    if (word !== undefined) {
        if (word.value.length > 0) {
            if (word.value.length < 30) {
                document.getElementById('word_val').innerHTML = user_id + ' ստե պետքա 30 նիշից շատ լինի';
                return false;
            }
            if (word.value.match(regex_text)) {
            } else {
                document.getElementById('word_val').innerHTML = user_id + ' ստե պետքա հայերեն գրես ու ավելորդ նշաններ չլինեն';
                return false;
            }
        }
    }
    //MONTHS
    if (months !== undefined) {
        for (let i = 0; i < months.length; i++) {
            if (months[i].value) {
                if (months[i].value.match(regex_jam)) {
                } else {
                    document.getElementById(months[i].name).innerHTML = user_id + ' ստե պետքա թիվ կամ (։-) նշաններ գրես';
                    months[i].focus();
                    return false;
                }
            }
        }
    }
}
