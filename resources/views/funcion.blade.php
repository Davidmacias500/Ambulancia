@extends('layouts.masterlte')
@section('titulo','Choferes')
@section('contenido')
<div id="funcion">
<p>@{{saludo}}</p>

<p></p>
<p></p>

@{{xd}}
</div>
@endsection

@push('scripts')
<script src="js/vue.min.js"></script>
<script src="js/vue-resource.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/funcion.js"></script>
@endpush