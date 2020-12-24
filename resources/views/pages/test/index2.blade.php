@extends('layouts.app')
@section('content')
@section('title', 'Public Map')

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Public Map</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Public Map</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                @if (Auth::user())
                <h3>
                  {{ Auth::user()->name }}
                </h3>
                  @else
                  <h3>Guest</h3>
                  @endif
                <p>Login As</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-contract"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Private Project</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-map"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-12">
				<div id="panel">
					<div id="color-palette"></div>
					<div>
						<button id="delete-button">Delete Selected Shape</button>
					</div>
					<div>
						<button id="get-coods-button">Get Coodinates</button>
					</div>
					<div>
						<textarea id="info" style="position: absolute; font-family: Arial; font-size: 14px;"></textarea>
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
	#color-palette {
		clear: both;
	}
	.color-button {
		width: 14px;
		height: 14px;
		font-size: 0;
		margin: 2px;
		float: left;
		cursor: pointer;
	}
	#delete-button {
		margin-top: 5px;
	}
	#get-coods-button {
		margin-top: 5px;
	}
	#info {
		width: 180px;
		height: 250px;
	}
</style>
@endsection

@section('custom-js')  
<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.exp&sensor=false&libraries=geometry&libraries=drawing"></script>
<script type="text/javascript">
	var drawingManager;
	var selectedShape;
	var colors = [getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()];
	var selectedColor;
	var colorButtons = {};
	var chekmode = false;
	var infowindow = new google.maps.InfoWindow();
	var iconsObj = ["https://developers.google.com/maps/documentation/javascript/examples/full/images/parking_lot_maps.png",
					"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
					"https://developers.google.com/maps/documentation/javascript/examples/full/images/library_maps.png",
					"https://developers.google.com/maps/documentation/javascript/examples/full/images/info-i_maps.png"
	]

	function clearSelection() {
		if (selectedShape) {
			//console.log('Clear selection : '+selectedShape.type)
			if(selectedShape.type == 'marker') {
				
			} else {
				selectedShape.setEditable(false);
				selectedShape = null;
			}
			
		}
	}

	function randomItem(iconsObj)
	{
		return iconsObj[Math.floor(Math.random()*iconsObj.length)];	
	}

	function getRandomColor() {
		var letters = '0123456789ABCDEF'.split('');
		var color = '#';
		for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}

	function setSelection(shape) {
		
		//console.log('Selected shape: '+shape.type);
		if(shape.type == 'marker') {
			clearSelection();
			selectedShape = shape;

			
			setSelectedShapeObject();
			infowindow.setContent("A", "Tes");
		  	infowindow.open(map, selectedShape);
			
			console.log(randomItem(iconsObj));

		} else {
			clearSelection();
			selectedShape = shape;
			shape.setEditable(true);
			selectColor(shape.get('fillColor') || shape.get('strokeColor'));				
		}

	}

	function deleteSelectedShape() {
		if (selectedShape) {
			selectedShape.setMap(null);
			document.getElementById('info').innerHTML = "";
		}
	}

	function getCoodinates() {
		
		if (selectedShape) {
			//console.log('Get coordinate: '+selectedShape.type)
			//console.log('Selected: '+selectedShape.type)
			if(selectedShape.type == 'marker') {
				
				var lat = selectedShape.position.lat();
				var lng = selectedShape.position.lng();
				var htmlStr = "";
				htmlStr += lat+", "+"\n";
				htmlStr += lng+"\n";
				document.getElementById('info').innerHTML = htmlStr;
				// console.log()
				var coordinate = [lat, lng];
				//saveObject("marker", 1, coordinate);
				//setSelectedShapeObject();
			}
			else if(selectedShape.type == 'rectangle') {
				var len = 4;
				//console.log(len);
				var bounds = selectedShape.getBounds();
				var start = bounds.getNorthEast();
				var end = bounds.getSouthWest();
				var center = bounds.getCenter();

				var htmlStr = "";
				htmlStr += 'NorthEast: '+start.lat()+", "+start.lng()+"\n";
				htmlStr += 'SouthWest: '+end.lat()+", "+end.lng()+"\n";
				console.log(start);
				document.getElementById('info').innerHTML = htmlStr;
			}
			else if(selectedShape.type == 'circle') {
				var htmlStr = "";
				htmlStr += 'coordinate: '+selectedShape.center.lat()+", "+selectedShape.center.lng()+"\n";
				htmlStr += 'radius: '+selectedShape.getRadius()+"\n";
				document.getElementById('info').innerHTML = htmlStr;
				console.log(selectedShape.getRadius());
			}

			else {
				var len = selectedShape.getPath().getLength();
				var htmlStr = "";
				var coord = new Array();
				for (var i = 0; i < len; i++) {
					coord.push(selectedShape.getPath().getAt(i).toUrlValue(5));
					console.log(selectedShape.getPath().getAt(i).toUrlValue(5));
					htmlStr += selectedShape.getPath().getAt(i).toUrlValue(5) + "\n";
				}
				console.log(coord.length);
				//console.log(selectedShape.getPath());
				document.getElementById('info').innerHTML = htmlStr;

				if(selectedShape.type == "polyline") {
					//var coordinate = 
					saveObject("polyline", 2, coord);
				} else if(selectedShape.type == "polygone") {

				}

				
			}

		}
		else{
			alert("Select A Polygon First.");
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

		function setSelectedShapeObject() {
			if (selectedShape) {
				if (selectedShape.type == google.maps.drawing.OverlayType.MARKER) {
					selectedShape.set('icon', randomItem(iconsObj));
				}
			}
		}

		function makeColorButton(color) {
			var button = document.createElement('span');
			button.className = 'color-button';
			button.style.backgroundColor = color;
			google.maps.event.addDomListener(button, 'click', function () {
				selectColor(color);
				setSelectedShapeColor(color);
			});

			return button;
		}

		function buildColorPalette() {
			var colorPalette = document.getElementById('color-palette');
			for (var i = 0; i < colors.length; ++i) {
				var currColor = colors[i];
				var colorButton = makeColorButton(currColor);
				colorPalette.appendChild(colorButton);
				colorButtons[currColor] = colorButton;
			}
			selectColor(colors[0]);
		}

		function initialize() {
			
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 11,
				center: new google.maps.LatLng(33.5362475, -111.9267386),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
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
            drawingMode: google.maps.drawing.OverlayType.MARKER,

            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                google.maps.drawing.OverlayType.MARKER,
                google.maps.drawing.OverlayType.CIRCLE,
                google.maps.drawing.OverlayType.POLYGON,
                google.maps.drawing.OverlayType.POLYLINE,
                google.maps.drawing.OverlayType.RECTANGLE,
                ]
            },
            markerOptions: {
                //title: "Title",
                //label: "This is label",
                //icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                draggable: true,
            },
            polylineOptions: {
                editable: true
            },
            polygonOptions: polyOptions,
            map: map
            });

			// Create the initial InfoWindow.
			let infoWindow = new google.maps.InfoWindow({
				content: "Click the map to get Lat/Lng!",
				position: new google.maps.LatLng(33.5362475, -111.9267386),
			});
			infoWindow.open(map);
			
			// Configure the click listener.
			// map.addListener("click", (mapsMouseEvent) => {

			// 	console.log('mouse event: ');
			// 	//console.log(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));

			// 	// Close the current InfoWindow.
			// 	infoWindow.close();
			// 	// Create a new InfoWindow.
			// 	infoWindow = new google.maps.InfoWindow({
			// 		position: mapsMouseEvent.latLng,
			// 	});
			// 	infoWindow.setContent(
			// 		JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
			// 		);
			// 	infoWindow.open(map);
			// });

			google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {
				drawingManager.setDrawingMode(null);

				// Add an event listener that selects the newly-drawn shape when the user
				// mouses down on it.
				//console.log(e);
				if (e.type != google.maps.drawing.OverlayType.MARKER) {
					// Switch back to non-drawing mode after drawing a shape.
					var newShape = e.overlay;
					newShape.type = e.type;
					google.maps.event.addListener(newShape, 'click', function () {
						setSelection(newShape);
					});
					setSelection(newShape);
				} 

				//Type Object is marker
				else if(e.type == google.maps.drawing.OverlayType.MARKER) {
					
					var newShape = e.overlay;
					newShape.type = e.type;
					//console.log(newShape);
					console.log(newShape.position);
					google.maps.event.addListener(newShape, 'click', function (ev) {
						setSelection(newShape);
					});
					setSelection(newShape);


				}
			});
			
			// Clear the current selection when the drawing mode is changed, or when the
			// map is clicked.
			google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
			google.maps.event.addListener(map, 'click', clearSelection);

			google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
			google.maps.event.addDomListener(document.getElementById('get-coods-button'), 'click', getCoodinates);
			
			buildColorPalette();
		}
		google.maps.event.addDomListener(window, 'load', initialize);

		function saveObject(name, typeObject, coordinate) {
			var name = name;
            var type_object = typeObject;
			var position = coordinate;
			var route = "{{ route('object.ajax') }}";

            $.ajax({
                type: 'GET',
                url: route,
                data: {
                    name: name,
                    type_object: type_object,
                    positions: position
                },
                dataType: 'json',
                success: function(data) {
					console.log(data);
					alert('berhasil');
                },
                error: function(e) {
					console.log(e);
                }
            });
		}
	</script>
	@endsection

