var route = document.querySelector("[name=route]").value;
var urlCuenta= route + '/apiCuenta';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#cuentas',
	created:function(){
		this.getCuenta();
	},
	data:{
		buscar:'',
		cuentas:[],
		id_cuenta:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		celular:'',
		direccion:'',
		usuario:'',
		password:'',
		rol:'',
		auxid:'',
		saludo:'HOLA',
		editar:false
	},
	methods:
	{
		showModal:function(){
			$('#datos').modal('show');
		},
		getCuenta:function(){
			this.$http.get(urlCuenta).then(function(response)
			{
				this.cuentas=response.data;
			}
			).catch(function(response){
				console.log(response);
			});

		},

		agregarCuenta:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			this.editar=false;
			var cuentas={id_cuenta:this.id_cuenta,
						 nombre:this.nombre,
						 apellidop:this.apellidop,
						 apellidom:this.apellidom,
						 celular:this.celular,
						 direccion:this.direccion,
						 usuario:this.usuario,
						 password:this.password,
						 rol:this.rol
						}
			 console.log(cuentas);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlCuenta,cuentas).then(function(response){
				this.getCuenta();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
		},

		editarCuenta:function(id){
			this.editar=true;
			this.$http.get(urlCuenta + '/' + id)
			.then(function(response){
				this.id_cuenta = response.data.id_cuenta
				this.nombre = response.data.nombre
				this.apellidop= response.data.apellidop
				this.apellidom=response.data.apellidom
				this.celular = response.data.celular
				this.direccion = response.data.direccion
				this.usuario = response.data.usuario
				this.password = response.data.password
				this.rol = response.data.rol
				$('#datos').modal('show');
			});
		},

		actualizarCuenta:function(){
			var cuentas={
						 id_cuenta:this.id_cuenta,
						 nombre:this.nombre,
						 apellidop:this.apellidop,
						 apellidom:this.apellidom,
						 celular:this.celular,
						 direccion:this.direccion,
						 usuario:this.usuario,
						 password:this.password,
						 rol:this.rol
						};
			
			console.log(cuentas);
			this.$http.put(urlCuenta + '/' + this.id_cuenta,cuentas)
			.then(function(response){
			this.editar=false;
			this.getCuenta();

			this.id_cuenta='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.celular='';
			this.direccion='';
			this.usuario='';
			this.password='';
			this.rol='';
			});
			$('#datos').modal('hide');
		},

		eliminarCuenta:function(id){
			var res = confirm("¿Está seguro de eliminar la cuenta?: " + id)
			if (res==true)
			{
			this.$http.delete(urlCuenta + '/' + id)
			.then(function(json){
				this.getCuenta();
			});
		
			}
		},
		salir:function(){
			this.id_cuenta='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.celular='';
			this.direccion='';
			this.usuario='';
			this.password='';
			this.rol='';
		},

	},
	computed:{
		filtroCuentas:function(){
			return this.cuentas.filter((cuenta)=>{
				return cuenta.nombre. toLowerCase().match(this.buscar.trim().toLowerCase()) 
				|| cuenta.apellidop. toLowerCase().match(this.buscar.trim().toLowerCase())
				|| cuenta.apellidom. toLowerCase().match(this.buscar.trim().toLowerCase()); 
			});
		}
	}


});