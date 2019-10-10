
@extends('adminlte::layouts.app')

@section("admin_content")


    <div id="map"
            style="width:100%;
            height: 500px;">
    </div>

@stop


@section('scripts')

<script src="{{asset('js/multiplePointsMap.js')}}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA70fslcm8mwK6ZSGPOc_S0SNaAn74G_6Y&callback=initMap&libraries=places">
</script>
{{--<script>
    window.addEventListener('load', addMarkerByDB(), false);
</script>--}}
@stop
