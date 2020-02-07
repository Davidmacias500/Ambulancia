var route = document.querySelector("[name=route]").value;
var urlAmbulancia= route + '/apiAmbulancia';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#ambulancias',
	created:function(){
		this.getAmbulancia();
	},
	data:{
		buscar:'',
		ambulancias:[],
		id_ambulancia:'',
		placa:'',
		kilometraje:'',
		gasolina:'',
		id_chofer:'',
		saludo:'HOLA',
		editar:false
	},
	methods:
	{
		showModal:function(){
			$('#datos').modal('show');
		},

		getAmbulancia:function()
		{
			this.$http.get(urlAmbulancia).then(function(response)
			{
				this.ambulancias=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		agregarAmbulancia:function(){
			//construyendo un objeto de tipo js para enviar ala Api.		
			var ambulancias={id_ambulancia:this.id_ambulancia,
						 placa:this.placa,
						 kilometraje:this.kilometraje,
						 gasolina:this.gasolina,
						 id_chofer:this.id_chofer,
						}
			 console.log(ambulancias);
			//para poder entrar al metodo store necesitamos un post y se envia el JSON
			this.$http.post(urlAmbulancia,ambulancias).then(function(response){
				this.getAmbulancia();
				// alert('exitoso');
				$('#datos').modal('hide');
				console.log(response);
				
			});
			this.editar=false;
		},

		editarAmbulancia:function(id){
			this.editar=true;
			this.$http.get(urlAmbulancia + '/' + id)
			.then(function(response){
				this.id_ambulancia = response.data.id_ambulancia
				this.placa = response.data.placa
				this.kilometraje = response.data.kilometraje
				this.gasolina = response.data.gasolina
				this.id_chofer = response.data.id_chofer
				$('#datos').modal('show');
			});
		},

		actualizarAmbulancia:function(){
			this.editar=false;
			var ambulancias={
						 id_ambulancia:this.id_ambulancia,
						 placa:this.placa,
						 kilometraje:this.kilometraje,
						 gasolina:this.gasolina,
						 id_chofer:this.id_chofer,
						};
			
			console.log(ambulancias);
			this.$http.put(urlAmbulancia + '/' + this.id_ambulancia,ambulancias)
			.then(function(response){
			this.getAmbulancia();
			

			this.id_ambulancia='';
			this.placa='';
			this.kilometraje='';
			this.gasolina='';
			this.id_chofer='';

			});
			$('#datos').modal('hide');
		},

		eliminarAmbulancia:function(id){
			var res = confirm("¿Está seguro de eliminar la Ambulancia?: " + id)
			if (res==true)
			{
			this.$http.delete(urlAmbulancia + '/' + id)
			.then(function(json){
				this.getAmbulancia();
			});
			}
		},

		salir:function(){
			this.id_ambulancia='';
			this.placa='';
			this.kilometraje='';
			this.gasolina='';
			this.id_chofer='';
		},

	},
	computed:{
		filtroAmbulancias:function(){
			return this.ambulancias.filter((ambulancia)=>{
				return ambulancia.placa. toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}

});