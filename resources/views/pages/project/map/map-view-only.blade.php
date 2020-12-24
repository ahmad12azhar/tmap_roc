@extends('layouts.app')
@section('content')
@section('title', 'View Map')

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">View Map Project : {{$dataProject->name}}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">View Map</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<h5 class="mb-2">Object Type</h5>
		<div class="row">
			@foreach ($objects as $item) 
				<div class="col-md-3 col-sm-6 col-12" style="max-width: 20%;">
					<div class="info-box">
						<span class="info-box-icon bg-default" style="background:#f4f4f4">
							<img src="{{  url($item->path_image) }}">
						</span>
						<div class="info-box-content">
							<span class="info-box-text">
								<input id="checkbox{{$item->type}}" type="checkbox" checked="checked" />
								{!!$item->name!!}
							</span>
							<span class="info-box-number">{!!$item->type!!}</span>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-12">
				<input id="pac-input" class="controls" type="text" placeholder="Search Place" class="form-search-box">	
				<div id="map" style="min-height: 700px"></div>

			</div>
		</div>
	</div>
</section>

<!-- /.content -->
@endsection

@section('custom-css') 
<style type="text/css">
#map, html, body {
	padding: 0;
	margin: 0;
	height: 100%;
}

#panel {
	width: 200px;
	font-family: Arial, sans-serif;
	font-size: 13px;
	float: right;
	margin: 10px;
}

#pac-input {
	margin: 10px 5px; 
	padding: 12px;
	min-width: 250px;
	font-size: 12px;
}
	
</style>
@endsection

@section('custom-js')  
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places,geometry&key=AIzaSyDSh2WVII6ATtASKyCk2SNEFlbb93MJw3c&"></script>

<script type="text/javascript">
	const defaultPosition = new google.maps.LatLng(-5.17885, 119.445908);
	var chekmode = false;
	let map;

	var project = {!! json_encode($dataProject->toArray(), JSON_HEX_TAG) !!};
	var markerGroups = {
		"High_Priority": [],
		"ODP": [],
		"ODC": [],
		"ODP_PLANNED": [],
		"TIANG": []
	};
	
	getPolygon();
	getPolyline();
	getMarker();
	getPublicMarker();

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('#input-name').val("");
		listenerCheckbox();
	});

	function listenerCheckbox() {
		$('#checkbox'+"High_Priority").click(function(){
            if($(this).is(":checked")){
				toggleGroup("High_Priority", true);
            }
            else if($(this).is(":not(:checked)")){
				toggleGroup("High_Priority", false);
            }
        });
		$('#checkbox'+"ODP").click(function(){
            if($(this).is(":checked")){
				toggleGroup("ODP", true);
            }
            else if($(this).is(":not(:checked)")){
				toggleGroup("ODP", false);
            }
        });
		$('#checkbox'+"ODC").click(function(){
            if($(this).is(":checked")){
				toggleGroup("ODC", true);
            }
            else if($(this).is(":not(:checked)")){
				toggleGroup("ODC", false);
            }
        });
		$('#checkbox'+"ODP_PLANNED").click(function(){
            if($(this).is(":checked")){
				toggleGroup("ODP_PLANNED", true);
            }
            else if($(this).is(":not(:checked)")){
				toggleGroup("ODP_PLANNED", false);
            }
        });
		$('#checkbox'+"TIANG").click(function(){
            if($(this).is(":checked")){
				toggleGroup("TIANG", true);
            }
            else if($(this).is(":not(:checked)")){
				toggleGroup("TIANG", false);
            }
        });
	}

	function initToggleGroup() {
		//console.log("init toggle group");
		var checkbox_1 = $('#checkbox'+"High_Priority").prop("checked");
		var checkbox_2 = $('#checkbox'+"ODP").prop("checked");
		var checkbox_3 = $('#checkbox'+"ODC").prop("checked");
		var checkbox_4 = $('#checkbox'+"ODP_PLANNED").prop("checked");
		var checkbox_5 = $('#checkbox'+"TIANG").prop("checked");
		toggleGroup("High_Priority", checkbox_1);
		toggleGroup("ODP", checkbox_2);
		toggleGroup("ODC", checkbox_3);
		toggleGroup("ODP_PLANNED", checkbox_4);
		toggleGroup("TIANG", checkbox_5);
	}
	
	function toggleGroup(type, status) {
		for (var i = 0; i < markerGroups[type].length; i++) {
			var marker = markerGroups[type][i];
			marker.setVisible(status);
		}
	}

	function initialize() {
		map = new google.maps.Map(document.getElementById('map'), {
			zoom: 13,
			center: defaultPosition,
			disableDefaultUI: false,
			zoomControl: true
		});

		var polyOptions = {
			strokeWeight: 0,
			fillOpacity: 0.45,
			editable: true
		};

		// Create the search box and link it to the UI element.
		const input = document.getElementById("pac-input");
		const searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		// Bias the SearchBox results towards current map's viewport.
		map.addListener("bounds_changed", () => {
			searchBox.setBounds(map.getBounds());
		});
		let markers = [];
		// Listen for the event fired when the user selects a prediction and retrieve
		// more details for that place.
		searchBox.addListener("places_changed", () => {
			const places = searchBox.getPlaces();

			if (places.length == 0) {
			return;
			}
			// Clear out the old markers.
			markers.forEach((marker) => {
				marker.setMap(null);
			});
			markers = [];
			// For each place, get the icon, name and location.
			const bounds = new google.maps.LatLngBounds();
			places.forEach((place) => {
			if (!place.geometry) {
				console.log("Returned place contains no geometry");
				return;
			}
			const icon = {
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(25, 25),
			};
			// Create a marker for each place.
			markers.push(
				new google.maps.Marker({
					map,
					icon,
					title: place.name,
					position: place.geometry.location,
				})
			);

			if (place.geometry.viewport) {
				// Only geocodes have viewport.
				bounds.union(place.geometry.viewport);
			} else {
				bounds.extend(place.geometry.location);
			}
			});
			map.fitBounds(bounds);
		});
		
		// buildColorPalette();
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	function saveObject(name, typeObject, coordinates, unique_id) {
		var name = name;
		var type_object = typeObject;
		var coordinates = coordinates;
		var project_id = project.id;
		var unique_id = unique_id;
		var route = "{{ route('drawing.map') }}";

		$.ajax({
			type: 'GET',
			url: route,
			data: {
				name: name,
				type_object: type_object,
				coordinates: coordinates,
				project_id: project_id,
				unique_id: unique_id,
			},
			dataType: 'json',
			success: function(data) {
				console.log(data);
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getMarker() {
		var route = "{{ route('marker.ajax') }}";
		var project_id = project.id;
		$.ajax({
			type: 'GET',
			url: route,
			data: {
				project_id: project_id
			},
			dataType: 'json',
			success: function(data) {
				console.log('get marker success');
				$.each(data.data, function(index, dataObj) {
					var dataParser = JSON.parse(dataObj.coordinates);
					var lineCoordinates = new google.maps.LatLng(dataParser[0], dataParser[1]);

					drawMarker(lineCoordinates, dataObj);
					//console.log(dataObj.object.type);
				});
				initToggleGroup();
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getPublicMarker() {
		var route = "{{ route('public.marker.ajax') }}";
		$.ajax({
			type: 'GET',
			url: route,
			data: {
			},
			dataType: 'json',
			success: function(data) {
				console.log('get public marker success');
				$.each(data.data, function(index, dataObj) {
					var lineCoordinates = new google.maps.LatLng(dataObj.lat, dataObj.lang);
					drawPublicMarker(lineCoordinates, dataObj);
					//console.log(dataObj.type);
				});
				initToggleGroup();
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getPolygon() {
		var route = "{{ route('polygon.ajax') }}";
		var project_id = project.id;
		$.ajax({
			type: 'GET',
			url: route,
			data: {
				project_id: project_id
			},
			dataType: 'json',
			success: function(data) {
				console.log('get polygon success');
				$.each(data.data, function(index, dataObj) {
					var dataParser = JSON.parse(dataObj.coordinates);
					var lineCoordinates = [];
					for (let index = 0; index < dataParser.length; index++) {
						lineCoordinates.push(new google.maps.LatLng(dataParser[index][0], dataParser[index][1]));
					}
					drawPolygon(lineCoordinates, dataObj);
				});
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function getPolyline() {
		var route = "{{ route('polyline.ajax') }}";
		var project_id = project.id;
		$.ajax({
			type: 'GET',
			url: route,
			data: {
				project_id: project_id,
			},
			dataType: 'json',
			success: function(data) {
				console.log('get polyline success');
				$.each(data.data, function(index, dataObj) {
					var dataParser = JSON.parse(dataObj.coordinates);
					var lineCoordinates = [];
					for (let index = 0; index < dataParser.length; index++) {
						lineCoordinates.push(new google.maps.LatLng(dataParser[index][0], dataParser[index][1]));
					}
					drawPolyline(lineCoordinates, dataObj);
				});
			},
			error: function(e) {
				console.log(e);
			}
		});
	}
	
	function drawMarker(lineCoordinates, dataObj) {
		//console.log('drawMarker');
		const url = "{{ url('') }}";
		const newShape = new google.maps.Marker({
			position: lineCoordinates,
			map: map,
			draggable: true,
			type_object: dataObj.type_object,
			id: dataObj.unique_id,
			unique_id: dataObj.unique_id,
			type: dataObj.object.type,
		});

		if (!markerGroups[dataObj.object.type]) markerGroups[dataObj.object.type] = [];
		markerGroups[dataObj.object.type].push(newShape);

		if(dataObj.object != null) {
			newShape.setIcon(url+"/"+dataObj.object.path_image);
		}
		newShape.setMap(map);
		google.maps.event.addDomListener(window, 'load', initialize);

		const contentString = buildContentWindow(dataObj);
		const infowindow = new google.maps.InfoWindow({
			content: contentString,
		});
		newShape.addListener("click", () => {
			infowindow.open(map, newShape);
		});
	}

	function drawPublicMarker(lineCoordinates, dataObj) {
		//console.log('drawMarker');
		const url = "{{ url('') }}";
		const newShape = new google.maps.Marker({
			position: lineCoordinates,
			map: map,
			type_object: dataObj.type_object,
			type: dataObj.type,
		});

		if (!markerGroups[dataObj.type]) markerGroups[dataObj.type] = [];
		markerGroups[dataObj.type].push(newShape);

		if(dataObj.object != null) {
			newShape.setIcon(url+"/"+dataObj.object.path_image);
		}
		newShape.setMap(map);
		google.maps.event.addDomListener(window, 'load', initialize);

		const contentString = buildContentWindow(dataObj);
		const infowindow = new google.maps.InfoWindow({
			content: contentString,
		});
		newShape.addListener("click", () => {
			infowindow.open(map, newShape);
		});
	}

	function drawPolygon(lineCoordinates, dataObj) {
		//console.log('drawPolygon');
		const newShape = new google.maps.Polygon({
			path: lineCoordinates,
			strokeColor: "#FF0000",
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: 'blue',
			fillOpacity: 0.35,
			type_object: dataObj.type_object,
			id: dataObj.unique_id,
			unique_id: dataObj.unique_id,
		});

		newShape.setMap(map);
		
		const contentString = buildContentWindowPrivate(dataObj);
		var infowindow = new google.maps.InfoWindow();
		infowindow.opened = false;
		google.maps.event.addListener(newShape, 'click', function(event) {
			infowindow.setContent(contentString);
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
		});
	}

	function drawPolyline(lineCoordinates, dataObj) {
		//console.log('drawPolyline');
		const newShape = new google.maps.Polyline({
			path: lineCoordinates,
			geodesic: true,
			strokeColor: '#FF0000',
			strokeOpacity: 1.0,
			strokeWeight: 2,
			type_object: dataObj.type_object,
			id: dataObj.unique_id,
			unique_id: dataObj.unique_id,
		});
		newShape.setMap(map);


		const contentString = buildContentWindowPrivate(dataObj);
		var infowindow = new google.maps.InfoWindow();
		infowindow.opened = false;
		google.maps.event.addListener(newShape, 'click', function(event) {
			infowindow.setContent(contentString);
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
		});
	}

	function buildContentWindow(dataObj) {
		let status; 
		if(dataObj.status == 1) {
			status = "Active";
		} else {
			status = "Unactive";
		}

		var contentString = '<div id="content">' +
		'<div id="siteNotice">' +
		"</div>" +
		'<h4 id="firstHeading" class="firstHeading">Information</h4>' +
		'<div id="bodyContent">' +
		'<p style="margin-bottom: 5px">Name: <strong>'+ dataObj.name +'</strong></p>'+
		'<p style="margin-bottom: 5px">Type: <strong>'+ dataObj.object.type +'</strong></p>'+
		'<p style="margin-bottom: 5px">Status: <strong>'+ status +'</strong></p>'+
		"</div>" +
		"</div>";
		return contentString;
	}

	function buildContentWindowPrivate(dataObj) {
		let status; 
		if(dataObj.status == 1) {
			status = "Active";
		} else {
			status = "Unactive";
		}

		var contentString = '<div id="content">' +
		'<div id="siteNotice">' +
		"</div>" +
		'<h4 id="firstHeading" class="firstHeading">Information</h4>' +
		'<div id="bodyContent">' +
		'<p style="margin-bottom: 5px">Name: <strong>'+ dataObj.name +'</strong></p>'+
		'<p style="margin-bottom: 5px">Status: <strong>'+ status +'</strong></p>'+
		"</div>" +
		"</div>";
		return contentString;
	}
</script>

@endsection

