@extends('propietario.vpropietario')
@section('contenido')
				<div id="mascota">
				  <div class="container responsive" align="center">
				    <h2>Datos de la mascota |<small> Mis mascotas</small></h2>
				    <div class="row">
				        <div class="col-md-8" >
				          <h1>Mis mascotas</h1>
					<button class="fa fa-paw" v-on:click="showModal()"
					> Agregar mascota</button>
					<table class="table table-bordered">
				<thead>
					<div class="hidden">
					  <th>@{{id_session="{!!Session::get('id_propietario')!!}"}}</th>
					</div>
					<th>Nombre</th>
					<th>Género</th>
					<th>Raza</th>
					<th>Especie</th>
					<th>Fecha de nacimiento</th>
					<th>Color</th>
					<th>Observaciones</th>
					<th>Foto</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<tr v-for="mascotax in mascota">
						<div class="hidden">
						  <td>@{{id_session="{!!Session::get('id_propietario')!!}"}}</td>
						</div>
						<td>@{{ mascotax.nombre }}</td>
						<td>@{{ mascotax.genero }}</td>
						<td>@{{ mascotax.raza }}</td>
						<td>@{{ mascotax.especie.tipo}}</td>
						<td>@{{ mascotax.fecha_nac }}</td>
						<td>@{{ mascotax.color }}</td>
						<td>@{{ mascotax.observaciones}}</td>
						<!-- Las Fotos son con v-bind y entre las 2 comillas llevan acento al revés
						Este acento sale con alt gr y llave de cierre `` -->
						<td><img v-bind:src="`img/mascotas/${mascotax.foto}`"class="image" height="100px" width="100px"></td>
						<td>
							<span class="btn btn-primary btn-md glyphicon glyphicon-pencil" v-on:click="editDatos(mascotax.id_mascota)"></span>
						</td>
					</tr>
				</tbody>
			</table>
				    <div class="col-xs-6">
				    </div>
				  
				    </div>
				        <div class="col-md-4" align="center">
				        <h4>Foto de mi mascota (Cambiar foto)</h4>
				        <p></p>
				        <p></p>
						<img v-bind:src="preview" class="img img-rounded" width="150px" height="150px" v-if="preview">
						</div>
				      </div><!-- Fin del row
				    </div> -->
				<div class="modal fade" tabindex="-1" role="dialog" id="datos">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" v-on:click="salir">x</span></button>
							<h4 class="modal-title">Editar datos de mi mascota</h4>
							<p></p>
						</div>
						<div class="modal-body">
							<!-- <div class="hidden">
								<input type="text" placeholder="primary" class="form-control" v-bind:value="{{Session::get('id_propietario')}}" v-model="id_propietario"> 
							</div> -->
							

							<input type="text" placeholder="Nombre" class="form-control" v-model="nombre" maxlength="50"> 
							<input type="text" placeholder="Género" class="form-control" v-model="genero" maxlength="1">
							<input type="text" placeholder="Raza" class="form-control" v-model="raza">





							<select class="form-control" v-model="id_especie">
			                  <option disabled="Seleccione una opcion"></option>
			                  <option v-for="esp in especie" v-bind:value="esp.id_especie">@{{ esp.tipo}}</option>
			                </select >

							<!-- <input type="text" placeholder="Especie" class="form-control" v-model="especie"> -->


							<input type="date" placeholder="Fecha_nacimiento" class="form-control" v-model="fecha_nac">
							<input type="text" placeholder="Color" class="form-control" v-model="color">
							<input type="text" placeholder="Observaciones" class="form-control" v-model="observaciones">
							<input type="file" placeholder="Foto" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024"><br>

							{{-- elementos html --}}
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">	Cancelar</button>
							<button type="submit" class="btn btn-primary" @click="agregarMascota()">Guardar</button>
							<button type="submit" class="btn btn-primary" v-on:click="actualizarDatos()">Actualizar</button>
							<p></p>
							<button class="btn btn-primary btn-block" @click="cargarFoto()">Guardar foto</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
				<p></p>	
				</div>
@endsection

@push('scripts')
	<script src="js/vue-resource.js"></script>
	<script src="js/mascota.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">