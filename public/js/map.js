
    var a = document.querySelector(".cord0");
    var txta = a.innerText;
    var b = document.querySelector(".cord1");
    var txtb = b.innerText;
    ymaps.ready(init);
    var myMap,
        myPlacemark;

    function init() {
        myMap = new ymaps.Map("map", {
            center: [txta, txtb],
            zoom: 18
        });

        myPlacemark = new ymaps.Placemark([txta, txtb]);

        myMap.behaviors.disable('scrollZoom');
        myMap.geoObjects.add(myPlacemark);
    }

