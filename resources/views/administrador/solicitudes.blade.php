@extends('layouts.masterlte')
@section('titulo','Solicitudes')
@section('contenido')

<div id="solicitudes">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
				  <div class="container responsive" align="center">
				    <h2>Solicitudes</h2>
				    <div class="row">
				    <div class="col-md-12">
                  	<label>Buscar: </label><br><input type="text" placeholder="Escriba el curp del solicitante a buscar" v-model="buscar" value="buscar">
                  	</div>
					<button class="btn btn-success fa fa-copy" v-on:click="showModal()"
					> Nueva solicitud</button>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Fecha de solicitud</th>
					<th>Hora de solicitud</th>
					<th>Fecha de uso</th>
					<th>Hora de uso</th>
					<th>Estatus de solicitud</th>
					<th>Curp</th>				
					<th>Editar</th>
				</thead>
				<tbody>
					<tr v-for="soli in filtroSolicitudes" v-bind:value="soli.id_solicitud">
						<td>@{{soli.id_solicitud}}</td>
						<td>@{{soli.fecha_solicitud}}</td>
						<td>@{{soli.hora_solicitud}}</td>
						<td>@{{soli.fecha_uso}}</td>
						<td>@{{soli.hora_uso}}</td>
						<td>@{{soli.estatus_solicitud}}</td>
						<td>@{{soli.curp}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarSolicitud(soli.id_solicitud)"></span>
							<span class="btn btn-danger btn-md fas fa-trash" v-on:click="eliminarSolicitud(soli.id_solicitud)"></span>
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
                <h4 class="modal-title" v-if="editar">Editar Solicitud</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Solicitud</h4>
              </div>
              <div class="modal-body">
                <input type="date" placeholder="Fecha de solicitud" v-model="fecha_solicitud" class="form-control">
                <input type="time" placeholder="Hora de solicitud" v-model="hora_solicitud" class="form-control">
                <input type="date" placeholder="Fecha de uso" v-model="fecha_uso" class="form-control">
                <input type="time" placeholder="Hora de uso" v-model="hora_uso" class="form-control">
                <input type="number" placeholder="Estatus" v-model="estatus_solicitud" class="form-control">
                <input type="text" placeholder="Curp" v-model="curp" class="form-control" maxlength="18">
              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarSolicitud()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarSolicitud()" v-if="!editar">Guardar</button>
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
<script src="js/solicitud.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">