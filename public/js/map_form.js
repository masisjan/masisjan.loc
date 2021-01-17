ymaps.ready(init);
var myMap;

function init () {
    myMap = new ymaps.Map("map", {
        center: [40.0650, 44.4367],
        zoom: 13
    }, {
        balloonMaxWidth: 100,
        searchControlProvider: 'yandex#search'
    });

    // Обработка события, возникающего при щелчке
    // левой кнопкой мыши в любой точке карты.
    // При возникновении такого события откроем балун.
    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coords');
            document.getElementById('cord0').value = coords[0].toPrecision(6);
            document.getElementById("cord1").value = coords[1].toPrecision(6);
            myMap.balloon.open(coords, {
                contentBody:'<p>Հասցեն լինելու է այստեղ</p>',
                    // +
                    // '<p>Координаты щелчка: ' + [
                    //     coords[0].toPrecision(6),
                    //     coords[1].toPrecision(6)
                    // ].join(', ') + '</p>',
                // contentFooter:'<sup>Щелкните еще раз</sup>'
            });
        }
        else {
            myMap.balloon.close();
        }
    });
}
