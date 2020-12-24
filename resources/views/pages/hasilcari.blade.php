@extends('layouts.app')
@section('content')
@section('title', 'Hasil Pencarian Public Object')
<style type="text/css">
.news-post{
  background-color: #fefefe;
  -webkit-transition: background-color 0.5s;
  border-top: solid 0.5px #ccc;
  border-bottom: solid 0.5px #ccc;
  margin: 10px;
  padding: 10px
}
.news-post:hover{
  background-color: #efefef;
}
.post-title h4{
  color: #000;
  -webkit-transition: color 0.5s;
}
.post-title h4:hover{
  color: #16174F;
}
#map {
  width: 100%;
  height: 600px;
  background-color: #CCC;
}
#obj_name {
  margin: 10px 5px; 
  padding: 12px;
  min-width: 250px;
  font-size: 12px;
}

#pac-input {
  margin: 10px 5px; 
  padding: 12px;
  min-width: 250px;
  font-size: 12px;
}
</style>


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
        <p>You are login as, </p>
      </div>
      <div class="icon">
        <i class="ion ion-android-contract"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-6 col-6">
    <!-- small box -->
    <a href="{{route ('project.index') }}">
    <div class="small-box bg-danger">
      <div class="inner">
      <h3>{{$data['count_project']}}</h3>
      <p>Project</p>
      </div>
      <div class="icon">
      <i class="ion ion-android-map"></i>
      </div>
    </div>
    </a>
    
  </div>
  <!-- ./col -->
  </div>
  <section class="content">
  <div class="container-fluid">
    <h5 class="mb-2">Object Type</h5>
    <div class="row">
    @foreach ($data['type'] as $items) 
  
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-default" style="background:#f4f4f4">
        <img src="{!!$items->path_image!!}">
      </span>

      <div class="info-box-content">
        <span class="info-box-text">{!!$items->name!!}</span>
        <span class="info-box-number">{!!$items->type!!}</span>
      </div>
      <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    @endforeach
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
  </section>

  <div class="col-lg-12">
  <center>
    <h4>Public Map</h4>
  </center>
  <div class="row">
  <div class="col-sm-64">
  @if($keyword != null)
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Hasil Pencarian Object : {!!$keyword!!}
                </div>
 @else
  @endif
  </div>
   <div class="col-sm-6">
  <input id="pac-input" class="controls" type="text" placeholder="Search Place" class="form-search-box">
  {!! Form::open(array('url' => 'pencarian', 'method' => 'GET' )) !!}  
   <input type="text"  class="form-control " id="obj_name" class="form-search-box" name="keyword" placeholder="Pencarian Object...">
  
      
   {!! Form::close() !!}
      </div>
     </div>
  <div id="map" style="min-width: 1024px; height:800px;"></div>
  </div>
</div><!-- /.container-fluid -->
</section> 
@endsection

@section('custom-js')  

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSh2WVII6ATtASKyCk2SNEFlbb93MJw3c&libraries=places,geometry"></script>

<script type="text/javascript">
  const defaultPosition = new google.maps.LatLng(-5.17885, 119.445908);
  let map;
  getPublicMarker();
  function initialize() {
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: defaultPosition,
      disableDefaultUI: false,
      zoomControl: true,
      styles :[
      {
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#ebe3cd"
        }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#523735"
        }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
        {
          "color": "#f5f1e6"
        }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
        {
          "color": "#c9b2a6"
        }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry.stroke",
        "stylers": [
        {
          "color": "#dcd2be"
        }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#ae9e90"
        }
        ]
      },
      {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#dfd2ae"
        }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#dfd2ae"
        }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#93817c"
        }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
        {
          "color": "#a5b076"
        }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#447530"
        }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#f5f1e6"
        }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#fdfcf8"
        }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#f8c967"
        }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
        {
          "color": "#e9bc62"
        }
        ]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#e98d58"
        }
        ]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.stroke",
        "stylers": [
        {
          "color": "#db8555"
        }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#806b63"
        }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#dfd2ae"
        }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#8f7d77"
        }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "labels.text.stroke",
        "stylers": [
        {
          "color": "#ebe3cd"
        }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#dfd2ae"
        }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
        {
          "color": "#b9d3c2"
        }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#92998d"
        }
        ]
      }]
    });

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
  }
  google.maps.event.addDomListener(window, 'load', initialize);

  function getPublicMarker() {
    var route = "{{ url('/marker/result/ajax?keyword='.$keyword) }}";
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
      },
      error: function(e) {
        console.log(e);
      }
    });
  }
  
  function drawPublicMarker(lineCoordinates, dataObj) {
    const url = "{{ url('') }}";
    const newShape = new google.maps.Marker({
      position: lineCoordinates,
      map: map,
      type_object: dataObj.type_object,
    });

    if(dataObj.object != null) {
      newShape.setIcon(url+"/"+dataObj.object.path_image);
    }
    newShape.setMap(map);
    
    const contentString = buildContentWindow(dataObj);
    const infowindow = new google.maps.InfoWindow({
      content: contentString,
    });
    newShape.addListener("click", () => {
      infowindow.open(map, newShape);
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
</script>

@endsection
  