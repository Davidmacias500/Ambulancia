var route = document.querySelector("[name=route]").value;
var urlChofer= route + '/apiChofer';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#choferes',
	created:function(){
		this.getChofer();
	},
	data:{
		buscar:'',
		choferes:[],
		id_chofer:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		celular:'',
		saludo:'HOLA',
		editar:false
	},
	methods:
	{
		showModal:function(){
			$('#datos').modal('show');
		},

		getChofer:function()
		{
			this.$http.get(urlChofer).then(function(response)
			{
				this.choferes=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		agregarChofer:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			this.editar=false;
			var choferes={id_chofer:this.id_chofer,
						 nombre:this.nombre,
						 apellidop:this.apellidop,
						 apellidom:this.apellidom,
						 celular:this.celular,
						}
			 console.log(choferes);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlChofer,choferes).then(function(response){
				this.getChofer();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
		},

		editarChofer:function(id){
			this.editar=true;
			this.$http.get(urlChofer + '/' + id)
			.then(function(response){
				this.id_chofer = response.data.id_chofer
				this.nombre = response.data.nombre
				this.apellidop = response.data.apellidop
				this.apellidom = response.data.apellidom
				this.celular = response.data.celular
				$('#datos').modal('show');
			});
		},

		actualizarChofer:function(){
			var choferes={
						 id_chofer:this.id_chofer,
						 nombre:this.nombre,
						 apellidop:this.apellidop,
						 apellidom:this.apellidom,
						 celular:this.celular,
						};
			
			console.log(choferes);
			this.$http.put(urlChofer + '/' + this.id_chofer,choferes)
			.then(function(response){
			this.editar=false;
			this.getChofer();

			this.id_chofer='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.celular='';
			});
			$('#datos').modal('hide');
		},

		eliminarChofer:function(id){
			var res = confirm("¿Está seguro de eliminar el Chofer?: " + id)
			if (res==true)
			{
			this.$http.delete(urlChofer + '/' + id)
			.then(function(json){
				this.getChofer();
			});
		
			}
		},

		salir:function(){
			this.id_chofer='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.celular='';
		},

	},
	computed:{
		filtroChoferes:function(){
			return this.choferes.filter((chofer)=>{
				return chofer.nombre.toLowerCase().match(this.buscar.trim().toLowerCase()) 
				||chofer.apellidop.toLowerCase().match(this.buscar.trim().toLowerCase())  
				 ||chofer.apellidom.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}

});