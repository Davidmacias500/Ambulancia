@extends('propietario.vpropietario')
@section('contenido')
<script>
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        return false;
    }
}

</script>

<script type="text/javascript">
function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}
</script>
<!-- <div class="hidden">
  @{{id_session="{!!Session::get('id_propietario')!!}"}}
</div> -->

<div id="propietario">
  <div class="container" align="center">
    <h2>Información |<small> Mi perfil</small></h2>
    <div class="row">
        <div class="col-md-11 col-xs-8 table-responsive" >
          <table class="table table-bordered">
          <thead>
            <th>Nombre de Usuario</th>
            <th>Contraseña</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Celular</th>
            <th>Calle</th>
            <th>Localidad</th>
            <th>Cruzamientos</th>
            <th>Municipio</th>
            <th>Opciones</th>
          </thead>
          <tbody v-for="pro in propietario">
            <td>@{{pro.nombre_usuario}}</td>
            <td>@{{pro.password}}</td>
            <td>@{{pro.nombre}}</td>
            <td>@{{pro.apellidop}}</td>
            <td>@{{pro.apellidom}}</td>
            <td>@{{pro.edad}}</td>
            <td>@{{pro.celular}}</td>
            <td>@{{pro.calle}}</td>
            <td>@{{pro.cruzamientos}}</td>
            <td>@{{pro.localidad}}</td>
            <td>@{{pro.municipio}}</td>
            <td><span class="btn btn-success glyphicon glyphicon-pencil" 
          @click='editarPropietario(pro.id_propietario)'></span>
            </td>
          </tbody>
        </table>                              
        <div class="modal fade" tabindex="-1" role="dialog" id="add_propietario">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" @click="">x</span></button>
                <h4 class="modal-tittle">Actualizar datos</h4>
              </div>
              <div class="modal-body">
                 <input type="text" placeholder="Nombre de Usuario" class="form-control" v-model="nombre_usuario" required onkeypress="return soloLetras(event);"><br>
                <input type="text" placeholder="Contraseña" class="form-control" v-model="password"><br>

                <input type="text" placeholder="Nombre" class="form-control" v-model="nombre" required onkeypress="return soloLetras(event);"><br>
                <input type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop" required onkeypress="return soloLetras(event);"><br>
                <input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom" required onkeypress="return soloLetras(event);"><br>
                <input type="text" placeholder="CURP" class="form-control" v-model="curp"><br>
                <input type="text" maxlength="2" placeholder="Edad" class="form-control" v-model="edad" onkeypress="return soloNumeros(event);" required><br>
                <input type="text" maxlength="10" placeholder="Celular" class="form-control" v-model="celular" onkeypress="return soloNumeros(event);" required><br>
                <input type="text" maxlength="3" placeholder="Calle" class="form-control" v-model="calle" onkeypress="return soloNumeros(event);" required><br>
                <input type="text" maxlength="3" placeholder="Cruzamiento" class="form-control" v-model="cruzamientos"><br>
                <input type="text" placeholder="Localidad" class="form-control" v-model="localidad" required onkeypress="return soloLetras(event);"><br>
                <input type="text" placeholder="Municipio" class="form-control" v-model="municipio" required onkeypress="return soloLetras(event);">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" @click="actualizarPropietario()">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
   <script src="js/propietario.js"></script>
   <!-- <script type="text/javascript" src="js/vue-resource.js"></script> -->
 
@endpush
<input type="hidden" name="route" value="{{url('/')}}">