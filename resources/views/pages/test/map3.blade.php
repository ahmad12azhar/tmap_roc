<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="UTF-8">
	<title>Drawing Tools</title>

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="UTF-8">
	<title>Drawing Tools</title>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing">
</script>
<style type="text/css">
	html, body, #map, #map_wrap {
	height: 100%;
	width:100%;
}
</style>
<script type="text/javascript">
	function xmlParse(str) {
		if (typeof ActiveXObject != 'undefined' && typeof GetObject != 'undefined') {
			var doc = new ActiveXObject('Microsoft.XMLDOM');
			doc.loadXML(str);
			return doc;
		}

		if (typeof DOMParser != 'undefined') {
			return (new DOMParser()).parseFromString(str, 'text/xml');
		}

		return createElement('div', null);
	}

	var infoWindow = new google.maps.InfoWindow();
	var customIcons = {
		monumento: {
			icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png'
		},
		hotel: {
			icon: 'http://maps.google.com/mapfiles/ms/icons/green.png'
		},
		restaurantes: {
			icon: 'http://maps.google.com/mapfiles/ms/icons/yellow.png'
		},
		museus: {
			icon: 'http://maps.google.com/mapfiles/ms/icons/purple.png'
		}
	};

	var markerGroups = {
		"museus": [],
		"monumentos": [],
		"restaurantes": [],
		"hotel": []
	};

	function load() {
		var map = new google.maps.Map(document.getElementById("map"), {
			center: new google.maps.LatLng(38.639104, -8.210413),
			zoom: 12,
			mapTypeId: 'roadmap'
		});
		var infoWindow = new google.maps.InfoWindow();


		map.set('styles', [{
			zoomControl: false
		}, {
			featureType: "road.highway",
			elementType: "geometry.fill",
			stylers: [{
				color: "#ffd986"
			}]
		}, {
			featureType: "road.arterial",
			elementType: "geometry.fill",
			stylers: [{
				color: "#9e574f"
			}]
		}, {
			featureType: "road.local",
			elementType: "geometry.fill",
			stylers: [{
				color: "#d0cbc0"
			}, {
				weight: 1.1
			}

			]
		}, {
			featureType: 'road',
			elementType: 'labels',
			stylers: [{
				saturation: -100
			}]
		}, {
			featureType: 'landscape',
			elementType: 'geometry',
			stylers: [{
				hue: '#ffff00'
			}, {
				gamma: 1.4
			}, {
				saturation: 82
			}, {
				lightness: 96
			}]
		}, {
			featureType: 'poi.school',
			elementType: 'geometry',
			stylers: [{
				hue: '#fff700'
			}, {
				lightness: -15
			}, {
				saturation: 99
			}]
		}]);

		//         downloadUrl("markers.xml", function (data) {
		var xml = xmlParse('<markers><marker name="Castelo" address="Rua da Condessa de Valença" lat="38.64351973190569" lng="-8.216521812152905" type="monumento" /><marker name="Anta 1 de Tourais" address="Estrada Nacional 114" lat="38.64260059929888" lng="-8.159376865959189" type="monumento" /><marker name="Hotel da Ameira" address="Herdade da Ameira" lat="38.64109640475479" lng="-8.180432206726096" type="hotel" /><marker name="Hotel Montemor" address="Avenida Gago Coutinho 8, 7050-248 Montemor-o-Novo" lat="38.64925541964039" lng="-8.216489625644726" type="hotel" /><marker name="Restaurante Monte Alentejano" address="Av. Gago Coutinho 8" lat="38.6492329" lng="-8.216665" type="restaurantes" /><marker name="Restaurante A Ribeira" address="Rua de São Domingos" lat="38.6347498199708" lng="-8.206468892765088" type="restaurantes" /><marker name="Núcleo Museológico do Convento de S. Domingos" address="" lat="38.643139" lng="-8.212732" type="museus" /><marker name="Centro Interpretativo do Castelo de Montemor-o-Novo" address="Rua Condessa de Valença" lat="38.64258748216167" lng="-8.21467108793263" type="museus" /></markers>');
		// var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
		for (var i = 0; i < markers.length; i++) {
			var name = markers[i].getAttribute("name");
			var address = markers[i].getAttribute("address");
			var type = markers[i].getAttribute("type");

			var point = new google.maps.LatLng(
			parseFloat(markers[i].getAttribute("lat")),
			parseFloat(markers[i].getAttribute("lng")));
			var html = "<b>" + name + "</b> <br/>" + address;
			// var icon = customIcons[type] || {};
			var marker = createMarker(point, name, address, type, map);
			bindInfoWindow(marker, map, infoWindow, html);
		}
		// });
	}

	function createMarker(point, name, address, type, map) {
		var icon = customIcons[type] || {};
		var marker = new google.maps.Marker({
			map: map,
			position: point,
			icon: icon.icon,
			// shadow: icon.shadow,
			type: type
		});
		if (!markerGroups[type]) markerGroups[type] = [];
		markerGroups[type].push(marker);
		var html = "<b>" + name + "</b> <br/>" + address;
		bindInfoWindow(marker, map, infoWindow, html);
		return marker;
	}

	function toggleGroup(type) {
		console.log(type);
		for (var i = 0; i < markerGroups[type].length; i++) {
			var marker = markerGroups[type][i];
			if (!marker.getVisible()) {
				marker.setVisible(true);
			} else {
				marker.setVisible(false);
			}
		}
	}

	function bindInfoWindow(marker, map, infoWindow, html) {
		google.maps.event.addListener(marker, 'click', function () {
			infoWindow.setContent(html);
			infoWindow.open(map, marker);

		});
	}

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest();

		request.onreadystatechange = function () {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}
	google.maps.event.addDomListener(window, 'load', load);
</script>
</head>
<body>
	<div class="map_wrap">
		<div class="siderbarmap">
			<ul>
				<input id="monumentoCheckbox" type="checkbox" onclick="toggleGroup('monumento')" checked="checked"></input>
				<input id="museusCheckbox" type="checkbox" onclick="toggleGroup('museus')" checked="checked"></input>
				<input id="restaurantesCheckbox" type="checkbox" onclick="toggleGroup('restaurantes')" checked="checked"></input>
				<input id="hotelCheckbox" type="checkbox" onclick="toggleGroup('hotel')" checked="checked"></input>
			</ul>
		</div>
		<div id="map" style="width:100%;height:585px; z-index: 1;"></div>
	</div>
</body>
</html>