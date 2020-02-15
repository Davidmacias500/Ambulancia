@extends('layouts.masterlte')
@section('titulo','Perfil')
@section('contenido')

<div id="cuentas">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
				  <div class="container responsive" align="center">
				    <h2>Administrador</h2>
				    <div class="row">
            <div class="col-md-12">
            <label>Buscar: </label><br><input type="text" placeholder="Escriba el usuario a buscar" v-model="buscar" value="buscar">
            </div>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
          <th>Id</th>
					<th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
					<th>Celular</th>
          <th>Dirección</th>
					<th>Usuario</th>
          <th>Password</th>								
          <th>Rol</th>
          <th>Editar</th>
				</thead>
				<tbody>
          <tr v-for="c in filtroCuentas" v-bind:value="c.id_cuenta">
            <td>@{{c.id_cuenta}}</td>
						<td>@{{c.nombre}}</td>
            <td>@{{c.apellidop}}</td>
            <td>@{{c.apellidom}}</td>
						<td>@{{c.celular}}</td>
            <td>@{{c.direccion}}</td>
						<td>@{{c.usuario}}</td>
            <td>@{{c.password}}</td>
            <td>@{{c.rol}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarCuenta(c.id_cuenta)"></span>
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
                <h4 class="modal-title" v-if="editar">Editar Cuenta</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Cuenta</h4>
              </div>
              <div class="modal-body">
                <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="Apellido Paterno" v-model="apellidop" class="form-control">
                <input type="text" placeholder="Apellido Materno" v-model="apellidom" class="form-control">
                <input type="text" placeholder="Celular" v-model="celular" class="form-control" maxlength="10">
                <input type="text" placeholder="Usuario" v-model="usuario" class="form-control">
                <input type="text" placeholder="Contraseña" v-model="password" class="form-control">
                <input type="text" placeholder="Rol" v-model="rol" class="form-control" maxlength="20">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarCuenta()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarCuenta()" v-if="!editar">Guardar</button>
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
<script src="js/administrador.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">