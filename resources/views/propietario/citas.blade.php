@extends('propietario.vpropietario')
@section('contenido')
    <div id="cita">
      <div class="col-md-8 col-xs-12">
        <h1>Citas</h1>
          <button class="fa fa-calendar" v-on:click="showModal()"> Añadir cita</button>
          <table class="table table-bordered">
        <thead>
          <th>Mascota</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Editar|Eliminar</th>
        </thead>
        <tbody>
          <tr v-for="citax in cita">
            <td>@{{ citax.id_mascota }}</td>
            <td>@{{ citax.fecha_cita }}</td>
            <td>@{{ citax.hora_cita }}</td>
            <td>
           <span class="btn btn-primary btn-s glyphicon glyphicon-pencil" v-on:click="editDatos(citax.id_cita)"></span>
            <span class="btn btn-danger btn-s fa fa-trash" v-on:click="eliminarCita(citax.id_cita)"></span>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="modal fade" tabindex="-1" role="dialog" id="datos">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" v-on:click="salir">x</span></button>
              <h4 class="modal-title">Añadir cita para mi mascota</h4>
            </div>
            <div class="modal-body">
              <input type="text" placeholder="#Mascota" class="form-control" v-model="id_mascota">
              <input type="date" placeholder="Fecha" class="form-control" v-model="fecha_cita">
              <input type="time" placeholder="Hora" class="form-control" v-model="hora_cita">
              {{-- elementos html --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">  Cancelar</button>
              <button type="submit" class="btn btn-primary" v-on:click="agregarCita()">Guardar cita</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->  
    </div>
</div>
@endsection
@push('scripts')
  <script src="js/cita.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">
