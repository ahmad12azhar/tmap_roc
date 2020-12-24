<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>Drawing Tools</title>
        
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing"></script>
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASBA9QAmpfRbTmtF40yBLTebUb8LM7QTs&libraries=drawing"></script> --}}
        <style type="text/css">
            html, body, #map_canvas { margin: 0; padding: 0; height: 100% }
        </style>

        <script type="text/javascript">        
            var myOptions = {
                center: new google.maps.LatLng(	-6.200000, 106.816666),
                zoom: 3,
                mapTypeId: google.maps.MapTypeId.SATELLITE
            };
                
            var map;

            function initialize() {
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                var drawingManager = new google.maps.drawing.DrawingManager({
                    drawingModes: [
                        google.maps.drawing.OverlayType.CIRCLE,
                        google.maps.drawing.OverlayType.MARKER,
                    ],
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [
                            google.maps.drawing.OverlayType.MARKER,
                            google.maps.drawing.OverlayType.CIRCLE,
                            google.maps.drawing.OverlayType.POLYGON,
                            google.maps.drawing.OverlayType.POLYLINE,
                            google.maps.drawing.OverlayType.RECTANGLE,
                        ],
                    },
                    circleOptions: {
                        editable: true
                    },
                    markerOptions: {
                        editable: true
                    }
                });

                drawingManager.setMap(map);
                var circles = [];
                var markers = [];

                google.maps.event.addDomListener(drawingManager, 'circlecomplete', function(circle) {
                    circles.push(circle);
                    console.log(circle);
                });

                google.maps.event.addDomListener(drawingManager, 'markercomplete', function(marker) {
                    console.log('marker');
                 
                    markers.push(marker);
                    console.log(marker.getPosition());
                });
                

                // // This event listener will call addMarker() when the map is clicked.
                // google.maps.event.addDomListener(drawingManager, 'markercomplete', function(event) {
                //     console.log(event.latLng);
                //     // if (markers.length >= 1) {
                //     //     deleteMarkers();
                //     // }

                //     // addMarker(event.latLng);
                //     // document.getElementById('lat').value = event.latLng.lat();
                //     // document.getElementById('long').value =  event.latLng.lng();
                // });
                //addMarker(event.latLng);
        

                google.maps.event.addDomListener(savebutton, 'click', function() {
                    document.getElementById("savedata").value = "";
                        for (var i = 0; i < circles.length; i++) {
                            var circleCenter = circles[i].getCenter();
                            var circleRadius = circles[i].getRadius();
                            document.getElementById("savedata").value += "circle((";
                            document.getElementById("savedata").value += 
                                circleCenter.lat().toFixed(3) + "," + circleCenter.lng().toFixed(3);
                            document.getElementById("savedata").value += "), ";
                            document.getElementById("savedata").value += circleRadius.toFixed(3) + ")\n";                        
                        }

                        for (var i = 0; i < markers.length; i++) {
                            var markerCenter = markers[i];
                            console.log('====');
                            console.log(markerCenter);
                        }
                    });
                };

                // google.maps.event.addDomListener(savebutton2, 'click', function() {
                   
                // });
            
                google.maps.event.addDomListener(window, 'load', initialize);

        </script>
    </head>
    <body>
        <button id="savebutton">SAVE</button>
        <textarea id="savedata" rows="5" cols="40"></textarea>

        <button id="savebutton2">SAVE</button>
        <textarea id="savemarker" rows="5" cols="40"></textarea>

        <div id="map_canvas"></div>
    </body>
</html>