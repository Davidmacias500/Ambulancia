@extends('layouts.masterlte')
@section('titulo','Usuarios')
@section('contenido')

<div id="usuarios">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
				  <div class="container responsive" align="center">
				    <h2>Usuarios</h2>
				    <div class="row">
				    <div class="col-md-12">
                  	<label>Buscar: </label><br><input type="text" placeholder="Escriba el solicitante a buscar" v-model="buscar" value="buscar">
                  	</div>
					<button class="btn btn-success fa fa-user" v-on:click="showModal()"
					> Nuevo usuario</button>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
					<th>Curp</th>
					<th>Nombre</th>
					<th>A. Materno</th>
					<th>A. Paterno</th>								
					<th>Dirección</th>
					<th>Referencia</th>
					<th>Celular</th>
					<th>Foto_INE</th>
					<th>Foto_CURP</th>
					<th>Foto_Comprobante Dom.</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<tr v-for="u in filtroUsuarios" v-bind:value="u.curp">
						<td>@{{u.curp}}</td>
						<td>@{{u.nombre}}</td>
						<td>@{{u.apellidop}}</td>
						<td>@{{u.apellidom}}</td>
						<td>@{{u.direccion}}</td>
						<td>@{{u.referencia}}</td>
						<td>@{{u.celular}}</td>
						<td>@{{u.foto_credencial}}</td>
						<td>@{{u.foto_curp}}</td>
						<td>@{{u.foto_recibo_luz}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarUsuario(u.curp)"></span>
							<span class="btn btn-danger btn-md fas fa-trash" v-on:click="eliminarUsuario(u.curp)"></span>
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
                <h4 class="modal-title" v-if="editar">Editar Usuario</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Usuario</h4>
              </div>
              <div class="modal-body">
                <input type="text" placeholder="CURP" v-model="curp" class="form-control" maxlength="18">
                <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="A. Paterno" v-model="apellidop" class="form-control">
                <input type="text" placeholder="A. Materno" v-model="apellidom" class="form-control">
                <input type="text" placeholder="Dirección" v-model="direccion" class="form-control">
                <input type="text" placeholder="Referencia" v-model="referencia" class="form-control">
                <input type="text" placeholder="Celular" v-model="celular" class="form-control" maxlength="10">
                <input type="file" class="form-control" @change="alSeleccionarine" accept="pdf" maxlength="2048"><br>
                <input type="file" class="form-control" @change="alSeleccionarcurp" accept="pdf" maxlength="2048"><br>
                <input type="file" class="form-control" @change="alSeleccionarrecibo" accept="pdf" maxlength="2048"><br>
              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarUsuario()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarUsuario()" v-if="!editar">Guardar</button>
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
<script src="js/solicitante.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">