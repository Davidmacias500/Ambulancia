@extends('layouts.master')
@section('titulo','Crear cuenta')
@section('contenido')
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Regístrate</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a><b>Crear </b>cuenta</a>
  </div>

  <div class="card">
    <div class="card-body register-card-block">
      <p class="login-box-msg">Crear una nueva cuenta</p>

      <div class="row">
      <div class="col-md-9">
        <input type="text" placeholder="Escriba sus nombres" class="form-control" v-model="nick"><br>

        <input type="password" placeholder="Escriba una contraseña" class="form-control" v-model="password"><br>

        <input type="text" placeholder="Escriba su nombre" class="form-control" v-model="nombre"><br>

        <input type="text" placeholder="Escriba sus apellidos" class="form-control" v-model="apellidos"><br>


        <input type="file" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024"><br>

        <button class="btn btn-primary btn-block" @click="guardarUser()">Guardar</button>
      </div>

      <div class="col-md-12">
      <img v-bind:src="preview" class="img img-rounded" width="400px" height="250px" v-if="preview">
    </div>
    </div>
  </div><!--Fin del contenedor-->
  </div><!--Fin del Vue-->
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</body>
<!-- /.register-box -->
@endsection

<!--Sección de scripts-->
@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/usuarios.js"></script>
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
@endpush


