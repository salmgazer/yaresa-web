@extends('mainlayout')
@section('content')
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{Session::get('message')}}
    </p>
@endif

<h1>Communities</h1>

<p>
Population Map    
</p>
{{-- @if ($communities->count())  --}}


<p>Population map</p>
  
<div id="map-canvas" class="col-md-8"></div>


<style type="text/css">
      html, body, #map-canvas { height: 800px; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?v=3.exp">
      
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat: 8, lng: -0.9},
          zoom: 7
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        var bounds= new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();



@foreach ($communities as $community)

var myLatlng = new google.maps.LatLng({{ $community->latitude}} , {{$community->longitude}} );
bounds.extend(myLatlng);
var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<b>{{ $community->community_name}} </b><p>Population:{{$community->population }} </p>'
  });
google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(this.title);
            infowindow.open(map, this);
        });

@endforeach
map.fitBounds(bounds);

      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  
{{-- 
@else
    There are no communities
@endif
 --}}


@stop