@extends('layouts.app')
@section('content')
@section('title', 'Drawing Map')

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Drawing Map</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Drawing Map</li>
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
							<img src="{{ url($item->path_image) }}">
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

				<div id="panel">
					<div class="mb-5">
						<a href="{{ route('drawing.index', $dataProject->id) }}" data-toggle="tooltip" title="View Drawing Map Data" class="btn btn-primary btn-sm btn-icon-anim btn-square mr-2"><i class="fa fa-eye" style="font-size: 14px;"></i></a>
						<a href="#" onclick="saveShape()" data-toggle="tooltip" title="Save Selected Shape" class="btn btn-success btn-sm btn-icon-anim btn-square mr-2"><i class="fa fa-pen" style="font-size: 14px;"></i></a>
						<a href="#" onclick="deleteShape()" data-toggle="tooltip" title="Delete Selected Shape" class="btn btn-danger btn-sm btn-icon-anim btn-square mr-2"><i class="fa fa-trash-alt" style="font-size: 14px;"></i></a>
					</div>
					<div class="form-group">
						<label for="example">Name</label>
						<textarea id="input-name" class="form-control" rows="2" name="name"></textarea>
					</div>
					<div class="form-group">
						<label for="example">Object Type</label>
						{{ Form::select('object_id', $object, null, array('id' => 'input-object', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						<label for="example">Status</label>
						{{ Form::select('status', [
							'0' => 'Unactive',
							'1' => 'Active'
						], 1, array('id' => 'input-status', 'class' => 'form-control select2')) }}
					</div>
					<div class="form-group">
						<label for="example">Description</label>
						<textarea id="input-description" class="form-control" rows="2" name="description"></textarea>
					</div>
					<div class="mb-2">
						<a href="#" onclick="saveNameObject()" data-toggle="tooltip" title="Save Name Object" class="btn btn-success btn-sm">Save</a>
					</div>
				</div>
				
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
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places,geometry,drawing&key=AIzaSyDSh2WVII6ATtASKyCk2SNEFlbb93MJw3c&"></script>

<script type="text/javascript">
	const defaultPosition = new google.maps.LatLng(-5.17885, 119.445908);
	var drawingManager;
	var selectedShape;
	var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
	var selectedColor;
	var colorButtons = {};
	var chekmode = false;
	var iconsObj = [];
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

	function saveShape() {
		getCoodinates(selectedShape);
	}

	function deleteShape() {
		deleteSelectedShape(selectedShape);
	}

	function saveNameObject() {
		updateShapeDrawing(selectedShape.unique_id);
	}

	function clearSelection() {
		//console.log('clearSelection');
		if (selectedShape) {
			if(selectedShape.type != 'marker') {			
				selectedShape.setEditable(false);
				selectedShape = null;
			}
		}
	}

	function setSelection(shape) {
		if(shape) {
			//console.log('Selected shape: '+shape.type);
			if(shape.type == 'marker') {
				clearSelection();
				selectedShape = shape;
			}
			else {
				clearSelection();
				selectedShape = shape;
				shape.setEditable(true);
				selectColor(shape.get('fillColor') || shape.get('strokeColor'));				
			}
		} else {
			alert("Select A Shape First.");
		}
	}

	function deleteSelectedShape(selectedShape) {
		if (selectedShape) {
			deleteShapeDrawing(selectedShape.unique_id);
			selectedShape.setMap(null);
		} else {
			alert("Select A Shape First.");
		}
	}

	function getCoodinates(selectedShape) {
		if (selectedShape) {
			console.log('Get coordinate: '+selectedShape.type)
			if(selectedShape.type == 'marker') {
				var lat = selectedShape.position.lat();
				var lng = selectedShape.position.lng();
				var coordinates = [lat, lng];
				saveObject("name", "Marker", coordinates, selectedShape.unique_id, 0);
			}
			else {
				var len = selectedShape.getPath().getLength();
				var htmlStr = "";
				var coord = new Array();
				var coordinates = new Array();
				for (var i = 0; i < len; i++) {
					var tempCoor = [selectedShape.getPath().getAt(i).lat(), selectedShape.getPath().getAt(i).lng()];
					coordinates.push(tempCoor);
					coord.push(selectedShape.getPath().getAt(i).toUrlValue(5));
					htmlStr += selectedShape.getPath().getAt(i).toUrlValue(5) + "\n";
				}

				// Get Area
				var area = google.maps.geometry.spherical.computeArea(selectedShape.getPath().Nb);
				console.log("Area in meter2: ", area);

				// Get Length
				var length = google.maps.geometry.spherical.computeLength(selectedShape.getPath().Nb);
				console.log("Length in meter: ", length);


				// Save Object
				if(selectedShape.type == "polyline") {
					saveObject("name", "Polyline", coordinates, selectedShape.unique_id, length);
				} else if(selectedShape.type == "polygon") {
					saveObject("name", "Polygon", coordinates, selectedShape.unique_id, length);
				}
			}
		}
		else{
			alert("Select A Shape First.");
		}
	}

	function selectColor(color) {
		selectedColor = color;
		// Retrieves the current options from the drawing manager and replaces the
		// stroke or fill color as appropriate.
		var polylineOptions = drawingManager.get('polylineOptions');
		polylineOptions.strokeColor = color;
		drawingManager.set('polylineOptions', polylineOptions);

		var polygonOptions = drawingManager.get('polygonOptions');
		polygonOptions.fillColor = color;
		drawingManager.set('polygonOptions', polygonOptions);
	}

	function setSelectedShapeColor(color) {
		if (selectedShape) {
			if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
				selectedShape.set('strokeColor', color);
			} else {
				selectedShape.set('fillColor', color);
			}
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

		// Creates a drawing manager attached to the map that allows the user to draw
		// markers, lines, and shapes.
		drawingManager = new google.maps.drawing.DrawingManager({
			drawingMode: google.maps.drawing.OverlayType.POLYGON,
			drawingControlOptions: {
				position: google.maps.ControlPosition.TOP_CENTER,
				drawingModes: [
					google.maps.drawing.OverlayType.MARKER,
					google.maps.drawing.OverlayType.POLYGON,
					google.maps.drawing.OverlayType.POLYLINE,
				]
			},
			markerOptions: {
				draggable: true,
			},
			polylineOptions: {
				editable: true
			},
			polygonOptions: polyOptions,
			map: map
		});
		
		google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {
			var unique_id = Date.now();

			// Switch back to non-drawing mode after drawing a shape.
			drawingManager.setDrawingMode(null);

			// Add an event listener that selects the newly-drawn shape when the user
			// mouses down on it.
			console.log(e);
			if (e.type != google.maps.drawing.OverlayType.MARKER) {
				// Switch back to non-drawing mode after drawing a shape.
				var newShape = e.overlay;
				newShape.type = e.type;
				newShape.unique_id = unique_id;

				google.maps.event.addListener(newShape, 'click', function (e) {
					if (e.vertex !== undefined) {
						if (newShape.type === google.maps.drawing.OverlayType.POLYGON) {
							var path = newShape.getPaths().getAt(e.path);
							path.removeAt(e.vertex);
							if (path.length < 3) {
								newShape.setMap(null);
							}
						}
						if (newShape.type === google.maps.drawing.OverlayType.POLYLINE) {
							var path = newShape.getPath();
							path.removeAt(e.vertex);
							if (path.length < 2) {
								newShape.setMap(null);
							}
						}
					}
					setSelection(newShape);
				});
				setSelection(newShape);
			} 

			//Type Object is marker
			else if(e.type == google.maps.drawing.OverlayType.MARKER) {
				var newShape = e.overlay;
				newShape.type = e.type;
				newShape.unique_id = unique_id;
				google.maps.event.addListener(newShape, 'click', function (ev) {
					setSelection(newShape);
				});
				setSelection(newShape);
			}

			// Save outomatically object when drawing is done
			getCoodinates(newShape);
		});
		
		// Clear the current selection when the drawing mode is changed, or when the
		// map is clicked.
		google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
		google.maps.event.addListener(map, 'click', clearSelection);

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

	function saveObject(name, typeObject, coordinates, unique_id, length) {
		var route = "{{ route('drawing.map') }}";
		var name = name;
		var type_object = typeObject;
		var coordinates = coordinates;
		var project_id = project.id;
		var unique_id = unique_id;
		var length = length;

		$.ajax({
			type: 'GET',
			url: route,
			data: {
				name: name,
				type_object: type_object,
				coordinates: coordinates,
				project_id: project_id,
				unique_id: unique_id,
				length: length
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
					//console.log(dataObj);
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

	function deleteShapeDrawing(unique_id) {
		var route = "{{ route('delete.shape.ajax') }}";
		$.ajax({
			type: 'GET',
			url: route,
			data: {
				unique_id: unique_id,
			},
			dataType: 'json',
			success: function(data) {
				console.log('delete shape success');
			},
			error: function(e) {
				console.log(e);
			}
		});
	}

	function updateShapeDrawing(unique_id) {
		var route = "{{ route('update.shape.ajax') }}";
		//var inputUsed = $('#input-used').val();
		//var inputOcc = $('#input-occ').val();
		//var inputCapacity = $('#input-capacity').val();
		var inputStatus = $('#input-status').val();
		var inputName = $('#input-name').val();
		var inputDescription = $('#input-description').val();
		var inputObject = $('#input-object').val();

		$.ajax({
			type: 'GET',
			url: route,
			data: {
				unique_id: unique_id,
				//used: inputUsed,
				//occ: inputOcc,
				//capacity: inputCapacity,
				status: inputStatus,
				name: inputName,
				description: inputDescription,
				object_id: inputObject,
			},
			dataType: 'json',
			success: function(data) {
				console.log('update name success');
				alert('Nama berhasil diterapkan, silahkan reload page untuk melihat perubahan!');
			},
			error: function(e) {
				console.log(e);
				alert('Nama gagal diterapkan!');
			}
		});
	}

	function drawMarker(lineCoordinates, dataObj) {
		console.log('drawMarker');
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

		newShape.type = "marker";
		editableObject(newShape);

		const contentString = buildContentWindow(dataObj);
		const infowindow = new google.maps.InfoWindow({
			content: contentString,
		});
		newShape.addListener("click", () => {
			infowindow.open(map, newShape);
		});
	}

	function drawPublicMarker(lineCoordinates, dataObj) {
		console.log('drawMarker');
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

		newShape.type = "marker";
		editableObject(newShape);

		const contentString = buildContentWindow(dataObj);
		const infowindow = new google.maps.InfoWindow({
			content: contentString,
		});
		newShape.addListener("click", () => {
			infowindow.open(map, newShape);
		});
	}

	function drawPolygon(lineCoordinates, dataObj) {
		console.log('drawPolygon');
		const newShape = new google.maps.Polygon({
			path: lineCoordinates,
			//editable: true,
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
		//google.maps.event.addDomListener(window, 'load', initialize);

		newShape.type = "polygon";
		editableObject(newShape);
		
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
		console.log('drawPolyline');
		const newShape = new google.maps.Polyline({
			path: lineCoordinates,
			geodesic: true,
			//editable: true,
			strokeColor: '#FF0000',
			strokeOpacity: 1.0,
			strokeWeight: 2,
			type_object: dataObj.type_object,
			id: dataObj.unique_id,
			unique_id: dataObj.unique_id,
		});

		newShape.setMap(map);
		//google.maps.event.addDomListener(window, 'load', initialize);
		
		newShape.type = "polyline";
		editableObject(newShape);

		const contentString = buildContentWindowPrivate(dataObj);
		var infowindow = new google.maps.InfoWindow();
		infowindow.opened = false;
		google.maps.event.addListener(newShape, 'click', function(event) {
			infowindow.setContent(contentString);
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
		});
	}

	function editableObject(newShape) {
		google.maps.event.addListener(newShape, 'click', function (e) {
			if (e.vertex !== undefined) {
				if (newShape.type === google.maps.drawing.OverlayType.POLYGON) {
					var path = newShape.getPaths().getAt(e.path);
					path.removeAt(e.vertex);
					if (path.length < 3) {
						newShape.setMap(null);
					}
				}
				if (newShape.type === google.maps.drawing.OverlayType.POLYLINE) {
					var path = newShape.getPath();
					path.removeAt(e.vertex);
					if (path.length < 2) {
						newShape.setMap(null);
					}
				}
			}
			setSelection(newShape);
		});
		setSelection(newShape);
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

