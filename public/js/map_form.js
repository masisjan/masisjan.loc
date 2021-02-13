ymaps.ready(init);
var myMap;

function init () {
    myMap = new ymaps.Map("map", {
        center: [40.0650, 44.4367],
        zoom: 13
    }, {
        balloonMaxWidth: 50,
        searchControlProvider: 'yandex#search'
    });
    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coords');
            document.getElementById('cord0').value = coords[0].toPrecision(6);
            document.getElementById("cord1").value = coords[1].toPrecision(6);
            myMap.balloon.open(coords, {
                contentBody:'<span>Հասցեն լինելու է այստեղ</span>',
            });
        }
        else {
            myMap.balloon.close();
        }
    });
    myMap.behaviors.disable('scrollZoom');
}
