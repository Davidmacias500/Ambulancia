new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#funcion',
	created:function(){
		this.xd();
	},
	data:{
		saludo:'HOLA',
	},
	methods:
	{
		xd:function()
		{
			for(var i = 0; i < 4; i++) { setTimeout((i) => { console.log(i); }, 0,i); }
		},
	}
});