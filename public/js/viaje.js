var route = document.querySelector("[name=route]").value;
var urlViaje= route + '/apiViaje';
var urlAmbulancia= route + '/apiAmbulancia';
var urlDestino= route + '/apiDestino';
var urlChofer= route + '/apiChofer';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#viajes',
	created:function(){
		this.getViaje();
		this.getAmbulancia();
		this.getDestino();
		this.getChofer();

	},
	data:{
		buscar:'',
		viajes:[],
		ambulancias:[],
		destinos:[],
		choferes:[],
		id_viaje:'',
		personas:'',
		fecha_viaje:'',
		hora_viaje:'',
		id_destino:'',
		id_ambulancia:'',
		id_chofer:'',
		saludo:'HOLA',
		editar:false
	},
	methods:
	{
		showModal:function(){
			$('#datos').modal('show');
		},

		getViaje:function()
		{
			this.$http.get(urlViaje).then(function(response)
			{
				this.viajes=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		getAmbulancia:function(){
			this.$http.get(urlAmbulancia).then(function(response)
			{
				this.ambulancias=response.data;
			}
			).catch(function(response){
				console.log(response);
			});

		},
		getDestino:function(){
			this.$http.get(urlDestino).then(function(response)
			{
				this.destinos=response.data;
			}
			).catch(function(response){
				console.log(response);
			});

		},
		getChofer:function(){
			this.$http.get(urlChofer).then(function(response)
			{
				this.choferes=response.data;
			}
			).catch(function(response){
				console.log(response);
			});

		},

		agregarViaje:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			this.editar=false;
			var viajes={id_viaje:this.id_viaje,
						 personas:this.personas,
						 fecha_viaje:this.fecha_viaje,
						 hora_viaje:this.hora_viaje,
						 id_destino:this.id_destino,
						 id_ambulancia:this.id_ambulancia,
						 id_chofer:this.id_chofer
						}
			 console.log(viajes);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlViaje,viajes).then(function(response){
				this.getViaje();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
		},

		editarViaje:function(id){
			this.editar=true;
			this.$http.get(urlViaje + '/' + id)
			.then(function(response){
				this.id_viaje = response.data.id_viaje
				this.personas = response.data.personas
				this.fecha_viaje= response.data.fecha_viaje
				this.hora_viaje=response.data.hora_viaje
				this.id_destino = response.data.id_destino
				this.id_ambulancia = response.data.id_ambulancia
				this.id_chofer = response.data.id_chofer
				$('#datos').modal('show');
			});
		},

		actualizarViaje:function(){
			var viajes={
						 id_viaje:this.id_viaje,
						 personas:this.personas,
						 fecha_viaje:this.fecha_viaje,
						 hora_viaje:this.hora_viaje,
						 id_destino:this.id_destino,
						 id_ambulancia:this.id_ambulancia,
						 id_chofer:this.id_chofer
						};
			
			console.log(viajes);
			this.$http.put(urlViaje + '/' + this.id_viaje,viajes)
			.then(function(response){
			this.editar=false;
			this.getViaje();

			this.id_viaje='';
			this.personas='';
			this.fecha_viaje='';
			this.hora_viaje='';
			this.id_destino='';
			this.id_ambulancia='';
			this.id_chofer='';
			});
			$('#datos').modal('hide');
		},

		eliminarViaje:function(id){
			var res = confirm("¿Está seguro de eliminar el viaje?: " + id)
			if (res==true)
			{
			this.$http.delete(urlViaje + '/' + id)
			.then(function(json){
				this.getViaje();
			});
		
			}
		},
		salir:function(){
			this.id_viaje='';
			this.personas='';
			this.fecha_viaje='';
			this.hora_viaje='';
			this.id_destino='';
			this.id_ambulancia='';
			this.id_chofer='';
		},

	},
	computed:{
		filtroViajes:function(){
			return this.viajes.filter((viaje)=>{
				return viaje.fecha_viaje. toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}


});