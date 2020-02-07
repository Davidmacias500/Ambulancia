@extends('layouts.masterlte')
@section('titulo','Ambulancias')
@section('contenido')

<div id="ambulancias">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
 <!--TOKEN PARA CAMBIOS-->
    <meta charset="utf-8" name="token" id="token" value="{{ csrf_token() }}">
    <!--META PARA RUTA DINAMICA-->
				  <div class="container responsive" align="center">
				    <h2>Ambulancias</h2>
				    <div class="row">
				    <div class="col-md-12">
                  	<label>Buscar: </label><br><input type="text" placeholder="Escriba la ambulancia a buscar" v-model="buscar" value="buscar">
                	</div>
                	<p></p>
                	<p></p>
                	<p></p>
					<button class="btn btn-success fa fa-ambulance" v-on:click="showModal()"
					> Nueva ambulancia</button>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
					<th>Id</th>
					<th>Placa</th>
					<th>Kilometraje</th>
					<th>Gasolina (L)</th>								
					<th>Editar</th>
				</thead>
				<tbody>
					<tr v-for="a in filtroAmbulancias" v-bind:value="a.id_ambulancia">
						<td>@{{a.id_ambulancia}}</td>
						<td>@{{a.placa}}</td>
						<td>@{{a.kilometraje}}</td>
						<td>@{{a.gasolina}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarAmbulancia(a.id_ambulancia)"></span>
							<span class="btn btn-danger btn-md fas fa-trash" v-on:click="eliminarAmbulancia(a.id_ambulancia)"></span>
						</td>
					</tr>
				</tbody>
			</table>
				    </div>
				    </div>
				
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="modal fade" tabindex="-1" role="dialog" id="datos">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" v-if="editar">Editar Ambulancia</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Ambulancia</h4>
              </div>
              <div class="modal-body">
                <input type="text" placeholder="Placa" v-model="placa" class="form-control">
                <input type="text" placeholder="Kilometraje" v-model="kilometraje" class="form-control">
                <input type="text" placeholder="Gasolina" v-model="gasolina" class="form-control">
                <!-- <select class="form-control" v-model="id_tipo">
                  <option disabled="Seleccione una opcion"></option>
                  <option v-for="t in tipos" v-bind:value="t.id_tipo">@{{t.nombre}}</option>
                </select > -->

              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarAmbulancia()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarAmbulancia()" v-if="!editar">Guardar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal -->
	<p></p>	
	</div>
@endsection

@push('scripts')
<script src="js/vue.min.js"></script>
<script src="js/vue-resource.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/ambulancia.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">