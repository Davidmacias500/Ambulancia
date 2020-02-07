@extends('layouts.masterlte')
@section('titulo','Viajes')
@section('contenido')

<div id="viajes">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
				  <div class="container responsive" align="center">
				    <h2>Viajes</h2>
				    <div class="row">
            <div class="col-md-12">
            <label>Buscar: </label><br><input type="text" placeholder="Escriba la fecha del viaje a buscar" v-model="buscar" value="buscar">
            </div>
					<button class="btn btn-success fa fa-route" v-on:click="showModal()"
					> Nuevo viaje</button>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
          <th>Id</th>
					<th>Personas (cantidad)</th>
          <th>Fecha del viaje</th>
          <th>Hora del viaje</th>
					<th>Destino</th>
					<th>Ambulancia</th>
          <th>Chofer</th>								
					<th>Editar</th>
				</thead>
				<tbody>
          <tr v-for="v in filtroViajes" v-bind:value="v.id_viaje">
            <td>@{{v.id_viaje}}</td>
						<td>@{{v.personas}}</td>
            <td>@{{v.fecha_viaje}}</td>
            <td>@{{v.hora_viaje}}</td>
						<td>@{{v.destino.nombre}}</td>
						<td>@{{v.ambulancia.placa}}</td>
            <td>@{{v.chofer.nombre}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarViaje(v.id_viaje)"></span>
							<span class="btn btn-danger btn-md fas fa-trash" v-on:click="eliminarViaje(v.id_viaje)"></span>
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
                <h4 class="modal-title" v-if="editar">Editar Viaje</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Viaje</h4>
              </div>
              <div class="modal-body">
                <input type="text" placeholder="Personas" v-model="personas" class="form-control">
                <input type="date" placeholder="Fecha del viaje" v-model="fecha_viaje" class="form-control">
                <input type="time" placeholder="Hora del viaje" v-model="hora_viaje" class="form-control">
                <select class="form-control" v-model="id_ambulancia">
                  <option disabled="Seleccione una opcion"></option>
                  <option v-for="a in ambulancias" v-bind:value="a.id_ambulancia">@{{a.placa}}</option>
                </select >

                 <select class="form-control" v-model="id_destino">
                  <option disabled="Seleccione una opcion"></option>
                  <option v-for="d in destinos" v-bind:value="d.id_destino">@{{d.nombre}}</option>
                </select >

                <select class="form-control" v-model="id_chofer">
                  <option disabled="Seleccione una opcion"></option>
                  <option v-for="c in choferes" v-bind:value="c.id_chofer">@{{c.nombre}}</option>
                </select >

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarViaje()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarViaje()" v-if="!editar">Guardar</button>
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
<script src="js/viaje.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">