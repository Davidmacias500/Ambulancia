var route = document.querySelector("[name=route]").value;
var urlUsuario= route + '/apiUsuario';
var urlArchivos= route + '/apiArchivos';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#usuarios',
	created:function(){
		this.getUsuario();
	},
	data:{
		buscar:'',
		usuarios:[],
		curp:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		direccion:'',
		referencia:'',
		celular:'',
		foto_credencial:'',
		foto_curp:'',
		foto_recibo_luz:'',
		saludo:'HOLA',
		auxcurp:'',
		editar:false
	},
	methods:
	{
		alSeleccionarine(event){
			this.foto_credencial=event.target.files[0];
			this.preview=URL.createObjectURL(this.foto_credencial);
		},
		alSeleccionarcurp(event){
			this.foto_curp=event.target.files[0];
			//console.log(this.foto);
			this.preview=URL.createObjectURL(this.foto_curp);
		},
		alSeleccionarrecibo(event){
			this.foto_recibo_luz=event.target.files[0];
			//console.log(this.foto);
			this.preview=URL.createObjectURL(this.foto_recibo_luz);
		},

		showModal:function(){
			$('#datos').modal('show');
		},

		getUsuario:function()
		{
			this.$http.get(urlUsuario).then(function(response)
			{
				this.usuarios=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		agregarUsuario:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			this.editar=false;
			var usuarios={curp:this.curp,
						 nombre:this.nombre,
						 apellidop:this.apellidop,
						 apellidom:this.apellidom,
						 direccion:this.direccion,
						 referencia:this.referencia,
						 celular:this.celular,
						 foto_credencial:this.foto_credencial,
						 foto_curp:this.foto_curp,
						 foto_recibo_luz:this.foto_recibo_luz
						}
			 console.log(usuarios);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlUsuario,usuarios).then(function(response){
				this.getUsuario();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
		},

		editarUsuario:function(id){
			this.editar=true;
			this.$http.get(urlUsuario + '/' + id)
			.then(function(response){
				this.curp = response.data.curp
				this.nombre = response.data.nombre
				this.apellidop = response.data.apellidop
				this.apellidom = response.data.apellidom
				this.direccion = response.data.direccion
				this.referencia = response.data.referencia
				this.celular = response.data.celular
				this.foto_credencial = response.data.foto_credencial
				this.foto_curp = response.data.foto_curp
				this.foto_recibo_luz= response.data.foto_recibo_luz
				$('#datos').modal('show');
			});
		},

		actualizarUsuario:function(){
			var usuarios={
						 curp:this.curp,
						 nombre:this.nombre,
						 apellidop:this.apellidop,
						 apellidom:this.apellidom,
						 direccion:this.direccion,
						 referencia:this.referencia,
						 celular:this.celular,
						 foto_credencial:this.foto_credencial,
						 foto_curp:this.foto_curp,
						 foto_recibo_luz:this.foto_recibo_luz,
						};
			
			console.log(usuarios);
			this.$http.put(urlUsuario + '/' + this.curp,usuarios)
			.then(function(response){
			this.editar=false;
			this.getUsuario();

			this.curp='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.direccion='';
			this.referencia='';
			this.celular='';
			this.foto_credencial='';
			this.foto_curp='';
			this.foto_recibo_luz='';
			});
			$('#datos').modal('hide');
		},

		eliminarUsuario:function(id){
			var res = confirm("¿Está seguro de eliminar el usuario?: " + id)
			if (res==true)
			{
			this.$http.delete(urlUsuario + '/' + id)
			.then(function(json){
				this.getUsuario();
			});
		
			}
		},

		salir:function(){
			this.curp='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.direccion='';
			this.referencia='';
			this.celular='';
			this.foto_credencial='';
			this.foto_curp='';
			this.foto_recibo_luz='';
		},

		cargarine:function()
		{
			var dataine = new FormData();
			dataine.append('foto_credencial',this.foto_credencial);
			dataine.append('curp',this.auxcurp);

			var configine={
				header:{'Content-Type':'pdf'}
			}

			this.$http.post(urlArchivos,dataine,configine)
			.then(function(json){
				alert('Archivo agregado con éxito');
				this.getUsuario();
				$('#datos').modal('hide');
				//Recarga la página window.location.reload();
			})
			.catch(function(json){
				console.log(json)
			})
		},

		cargarcurp:function()
		{
			var datacurp = new FormData();
			datacurp.append('foto_curp',this.foto_curp);
			datacurp.append('curp',this.auxcurp);

			var configcurp={
				header:{'Content-Type':'pdf'}
			}

			this.$http.post(urlArchivos,datacurp,configcurp)
			.then(function(json){
				alert('Archivo agregado con éxito');
				this.getUsuario();
				$('#datos').modal('hide');
				//Recarga la página window.location.reload();
			})
			.catch(function(json){
				console.log(json)
			})
		},

		cargarrecibo:function()
		{
			var datarecibo = new FormData();
			datarecibo.append('foto_recibo_luz',this.foto_recibo_luz);
			datarecibo.append('curp',this.auxcurp);

			var configrecibo={
				header:{'Content-Type':'pdf'}
			}

			this.$http.post(urlArchivos,datarecibo,configrecibo)
			.then(function(json){
				alert('Archivo agregado con éxito');
				this.getUsuario();
				$('#datos').modal('hide');
				//Recarga la página window.location.reload();
			})
			.catch(function(json){
				console.log(json)
			})
		}
	},
	computed:{
		filtroUsuarios:function(){
			return this.usuarios.filter((usuario)=>{
				return usuario.curp.toLowerCase().match(this.buscar.trim().toLowerCase()) 
				||usuario.nombre.toLowerCase().match(this.buscar.trim().toLowerCase())  
				||usuario.apellidop.toLowerCase().match(this.buscar.trim().toLowerCase())
				||usuario.apellidom.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}

});