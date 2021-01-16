@extends('layouts.user')
@section('title', 'Contact App | All contacts')
@section('content')

    <script type="text/javascript">
        ymaps.ready(init);
        var myMap;

        function init () {
            myMap = new ymaps.Map("map", {
                center: [40.0650, 44.4367],
                zoom: 13
            }, {
                balloonMaxWidth: 200,
                searchControlProvider: 'yandex#search'
            });

            // Обработка события, возникающего при щелчке
            // левой кнопкой мыши в любой точке карты.
            // При возникновении такого события откроем балун.
            myMap.events.add('click', function (e) {
                if (!myMap.balloon.isOpen()) {
                    var coords = e.get('coords');
                    document.getElementById('cord0').innerHTML = coords[0].toPrecision(6);
                    document.getElementById("cord1").innerHTML = coords[1].toPrecision(6);
                    myMap.balloon.open(coords, {
                        contentBody:'<p>Кто-то щелкнул по карте.</p>' +
                            '<p>Координаты щелчка: ' + [
                                coords[0].toPrecision(6),
                                coords[1].toPrecision(6)
                            ].join(', ') + '</p>',
                        contentFooter:'<sup>Щелкните еще раз</sup>'
                    });
                }
                else {
                    myMap.balloon.close();
                }
            });
        }
    </script>
<div id="map" style="width: 640px; height: 500px"></div>
    <p>Координаты щелчка: </p>
    <p id="cord0"></p>
    <p id="cord1"></p>

@endsection
