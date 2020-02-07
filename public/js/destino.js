var route = document.querySelector("[name=route]").value;
var urlDestino= route + '/apiDestino';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#destinos',
	created:function(){
		this.getDestino();
	},
	data:{
		buscar:'',
		destinos:[],
		id_destino:'',
		nombre:'',
		distancia:'',
		saludo:'HOLA',
		editar:false
	},
	methods:
	{
		showModal:function(){
			$('#datos').modal('show');
		},

		getDestino:function()
		{
			this.$http.get(urlDestino).then(function(response)
			{
				this.destinos=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		agregarDestino:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			this.editar=false;
			var destinos={id_destino:this.id_destino,
						 nombre:this.nombre,
						 distancia:this.distancia,
						}
			 console.log(destinos);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlDestino,destinos).then(function(response){
				this.getDestino();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
		},

		editarDestino:function(id){
			this.editar=true;
			this.$http.get(urlDestino + '/' + id)
			.then(function(response){
				this.id_destino = response.data.id_destino
				this.nombre = response.data.nombre
				this.distancia = response.data.distancia
				$('#datos').modal('show');
			});
		},

		actualizarDestino:function(){
			var destinos={
						 id_destino:this.id_destino,
						 nombre:this.nombre,
						 distancia:this.distancia,
						};
			
			console.log(destinos);
			this.$http.put(urlDestino + '/' + this.id_destino,destinos)
			.then(function(response){
			this.editar=false;
			this.getDestino();

			this.id_destino='';
			this.nombre='';
			this.distancia='';
			});
			$('#datos').modal('hide');
		},

		eliminarDestino:function(id){
			var res = confirm("¿Está seguro de eliminar el destino?: " + id)
			if (res==true)
			{
			this.$http.delete(urlDestino + '/' + id)
			.then(function(json){
				this.getDestino();
			});
		
			}
		},

		salir:function(){
			this.id_destino='';
			this.nombre='';
			this.distancia='';
		},

	},
	computed:{
		filtroDestinos:function(){
			return this.destinos.filter((destino)=>{
				return destino.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}

});