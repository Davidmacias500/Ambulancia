@extends('layouts.masterlte')
@section('titulo','Choferes')
@section('contenido')

<div id="choferes">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">	
				  <div class="container responsive" align="center">
				    <h2>Choferes</h2>
				    <div class="row">
				    <div class="col-md-12">
                  	<label>Buscar: </label><br><input type="text" placeholder="Escriba el chofer a buscar" v-model="buscar" value="buscar">
                	</div>
					<button class="btn btn-success fa fa-male" v-on:click="showModal()"
					> Nuevo chofer</button>
					<br>
					<p></p>
					<p></p>
					<table class="table table-bordered">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>A. Paterno</th>
					<th>A. Materno</th>								
					<th>Celular</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<tr v-for="c in filtroChoferes" v-bind:value="c.id_chofer">
						<td>@{{c.id_chofer}}</td>
						<td>@{{c.nombre}}</td>
						<td>@{{c.apellidop}}</td>
						<td>@{{c.apellidom}}</td>
						<td>@{{c.celular}}</td>
						<td>
							<span class="btn btn-primary btn-md fas fa-pen" v-on:click="editarChofer(c.id_chofer)"></span>
							<span class="btn btn-danger btn-md fas fa-trash" v-on:click="eliminarChofer(c.id_chofer)"></span>
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
                <h4 class="modal-title" v-if="editar">Editar Chofer</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Chofer</h4>
              </div>
              <div class="modal-body">
                <input type="text" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" placeholder="A. Paterno" v-model="apellidop" class="form-control">
                <input type="text" placeholder="A. Materno" v-model="apellidom" class="form-control">
                <input type="text" placeholder="Celular" v-model="celular" class="form-control">
              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="salir">Salir</button>
                <button type="submit" class="btn btn-success" v-on:click="actualizarChofer()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-success" v-on:click="agregarChofer()" v-if="!editar">Guardar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<p></p>	
	</div>
@endsection

@push('scripts')
<script src="js/vue.min.js"></script>
<script src="js/vue-resource.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/chofer.js"></script>
@endpush
<input type="hidden" name="route" id="route" value="{{url('/')}}">