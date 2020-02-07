@extends('layouts.masterlte')
@section('titulo','Destinos')
@section('contenido')

<div id="destinos">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
				  <div class="container responsive" align="center">
				    <h2>Destinos</h2>
				    <div class="row">
				    <div class="col-md-12">
                  	<label>Buscar: </label><br><input type="text" placeholder="Escriba el destino a buscar" v-model="buscar" value="buscar">
                  	</div>
					<button class="btn btn-success fas fa-location-arrow" v-on:click="showModal()"
					> Nuevo destino</button>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Distancia (Km)</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<tr v-for="d in filtroDestinos" v-bind:value="d.id_destino">
						<td>@{{d.id_destino}}</td>
						<td>@{{d.nombre}}</td>
						<td>@{{d.distancia}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarDestino(d.id_destino)"></span>
							<span class="btn btn-danger btn-md fas fa-trash" v-on:click="eliminarDestino(d.id_destino)"></span>
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
                <h4 class="modal-title" v-if="editar">Editar Destino</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Destino</h4>
              </div>
              <div class="modal-body">
                <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Distancia" v-model="distancia" class="form-control">
                <!-- <select class="form-control" v-model="id_tipo">
                  <option disabled="Seleccione una opcion"></option>
                  <option v-for="t in tipos" v-bind:value="t.id_tipo">@{{t.nombre}}</option>
                </select > -->

              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarDestino()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarDestino()" v-if="!editar">Guardar</button>
                <!-- <button type="submit" class="btn btn-success" @click="salir">Cancelar</button> -->

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
<script src="js/destino.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">