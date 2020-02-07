var urlSoli='http://localhost/Ambulancia/public/apiSolicitud';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#solicitudes',
	created:function(){
		this.getSolicitudes();
	},
	data:{
		solicitudes:[],
		id_solicitud:'',
		fecha_solicitud:'',
		fecha_uso:'',
		estatus_solicitud:'',
		curp:'',
		saludo:'HOLA',
		editar:false
	},
	methods:
	{
		showModal:function(){
			$('#datos').modal('show');
		},

		getSolicitudes:function()
		{
			this.$http.get(urlSoli).then(function(response)
			{
				this.solicitudes=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		agregarSolicitud:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var solicitudes={id_solicitud:this.id_solicitud,
						 fecha_solicitud:this.fecha_solicitud,
						 fecha_uso:this.fecha_uso,
						 estatus_solicitud:this.estatus_solicitud,
						 curp:this.curp}
			 console.log(solicitudes);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlSoli,solicitudes).then(function(response){
				this.getSolicitudes();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
		},

		editarSolicitud:function(id){
			this.editar=true;
			this.$http.get(urlSoli + '/' + id)
			.then(function(response){
				this.id_solicitud = response.data.id_solicitud
				this.fecha_solicitud = response.data.fecha_solicitud
				this.fecha_uso = response.data.fecha_uso
				this.estatus_solicitud = response.data.estatus_solicitud
				this.curp= response.data.curp
				$('#datos').modal('show');
			});
		},

		actualizarSolicitud:function(){
			var solicitudes={
						 id_solicitud:this.id_solicitud,
						 fecha_solicitud:this.fecha_solicitud,
						 fecha_uso:this.fecha_uso,
						 estatus_solicitud:this.estatus_solicitud,
						 curp:this.curp
						};
			this.id_solicitud='';
			this.fecha_solicitud='';
			this.fecha_uso='';
			this.estatus_solicitud='';
			this.curp='';
			// console.log(alumnos);
			this.$http.patch(urlSoli + '/' + this.id_solicitud,solicitudes)
			.then(function(response){
			this.editar=false;
			this.getSolicitudes();
			});
			$('#datos').modal('hide');
		},

		eliminarSolicitud:function(id){
			var res = confirm("¿Está seguro de eliminar la solicitud?: " + id)
			if (res==true)
			{
			this.$http.delete(urlSoli + '/' + id)
			.then(function(json){
				this.getSolicitudes();
			});
		
			}
		},

		salir:function(){
				this.id_solicitud='';
				this.fecha_solicitud='';
				this.fecha_uso='';
				this.estatus_solicitud='';
				this.curp='';
		},

	}

});