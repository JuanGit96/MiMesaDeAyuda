@if($errors->any())<!--Si tenemos algun error-->
<div class="alert alert-danger">
    <h5>Porfavor corrige los errores</h5>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{$url}}">
{{ csrf_field() }}<!--Protección de ataques laravel(token)-->

    <input name="_method" type="hidden" value="{{(isset($method)?$method:"post")}}">

    @if(isset($this_update))
        <input type="hidden" value="true" name="this_update">
        <input type="hidden" value="{{(isset($ticket->id)?$ticket->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="role_id">Tipo de caso:</label>
        <select class="form-control" id="typeCase" name="typeCase">
            <option value="" {{(isset($ticket->typeCase))?"":"selected"}}>sin seleccionar</option>
            <option {{(!isset($ticket->typeCase))?"":($ticket->typeCase == "Incidencia")?"selected":""}}
                value="Incidencia">Incidencia</option>
            <option {{(!isset($ticket->typeCase))?"":($ticket->typeCase == "Requerimiento")?"selected":""}}
                value="Requerimiento">Requerimiento</option>
        </select>
    </div>

    <div class="form-group">
        <label for="role_id">Prioridad:</label>
        <select class="form-control" id="priority" name="priority">
            <option value="" {{(isset($ticket->typeCase))?"":"selected"}}>sin seleccionar</option>
            <option {{(!isset($ticket->priority))?"":($ticket->priority == "Alta")?"selected":""}}
                value="Alta">Alta</option>
            <option {{(!isset($ticket->priority))?"":($ticket->priority == "Media")?"selected":""}}
                value="Media">Media</option>
            <option {{(!isset($ticket->priority))?"":($ticket->priority == "Baja")?"selected":""}}
                value="Baja">Baja</option>
        </select>
    </div>

    <div class="form-group">
            <label for="address">Direccion</label>
            <input autocomplete="on" type="text" class="form-control" id="address" name="address" value="{{(isset($ticket->address)?$ticket->address:old('address'))}}"
            aria-describedby="addressHelp" placeholder="Selecciona en el mapa (Recomendado)">
            <div id="map"
            style="width:100%;
            height: 300px;">
            </div>

            <input type="hidden" name="latitude" id="latitud" title="latitud" value="{{(isset($ticket->latitude)?$ticket->latitude:old('latitude'))}}">
            <input type="hidden" name="longitude" id="longitud" title="longitud" value="{{(isset($ticket->longitude)?$ticket->longitude:old('longitude'))}}">
        </div>

    <div class="form-group">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control"
               id="description" name="description" value="{{(isset($ticket->description)?$ticket->description:old('description'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status">
            <option value="" {{(isset($ticket->status))?"":"selected"}}>sin seleccionar</option>
            <option {{(!isset($ticket->status))?"":($ticket->status == "0")?"selected":""}}
                value="0">Pendiente</option>
            <option {{(!isset($ticket->status))?"":($ticket->status == "1")?"selected":""}}
                value="1">En curso</option>
            <option {{(!isset($ticket->status))?"":($ticket->status == "2")?"selected":""}}
                value="2">Resuelto</option>
        </select>
    </div>

    <div class="form-group">
        <label for="technical_id">Tecnico:</label>
        <select class="form-control" id="technical_id" name="technical_id">
            <option value="" {{(isset($ticket->technical_id))?"":"selected"}}>sin tecnico</option>
            @foreach($technicals as $technical)
                <option {{(!isset($ticket->technical_id))?"":($ticket->technical_id == $technical->id)?"selected":""}}
                        value="{{$technical->id}}">{{$technical->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="client_id">CLiente asociado:</label>
        <select class="form-control" id="client_id" name="client_id">
            <option value="" {{(isset($ticket->client_id))?"":"selected"}}>sin cliente asociado</option>
            @foreach($clients as $client)
                <option {{(!isset($ticket->client_id))?"":($ticket->client_id == $client->id)?"selected":""}}
                        value="{{$client->id}}">{{$client->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/tickets')}}">Regresar al listado</a>
</form>


@section('scripts')
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script src="{{asset('js/map.js')}}"></script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA70fslcm8mwK6ZSGPOc_S0SNaAn74G_6Y&callback=initMap&libraries=places">
</script>
@stop
