/*Recomendacion para trabajar con js tener la consola abierta */

// Declarar array global que contendra la lista de categorias
//var arrMovies = []
showMovies()
//LLamar función de jquery para acción click del botón addElement
//con el id del boton de new Movie se llama, en este caso es addElemnet
$("#addElement").click(function (e) { //esto es jquery
	//Deshabilitar el envio por Http  para que no se vaya a ningun lado
	//metodo para deshabilitar
	e.preventDefault()
	/*para saber si ya ingresamos por js se puede utilizar el console.long("ingreso")*/
    /*aqui se llama el selector de la vista new de movie con el id = category*/
	let idMovie = $("#movie").val()
	/*aqui obtenemos los datos de la opcion seleccionada */
	let nameMovie = $("#movie option:selected").text()

    /*validamos que  el id seleccionado sea diferente de vacio*/
	if(idMovie != '') {
		//hacemos la validacion en donde nos dice que si es identico a undefind no  existe y podemos agregarlo al array
		if(typeof existMovie(idMovie) === 'undefined') {			
			//agregar categoria al array de esta manera podemos agregar un nuevo objeto a un array (con el metodo array push)
			arrMovies.push({
				'Id': idMovie,
				'name': nameMovie
			})	

		} else {
			//si es falso nos da un alert para validar que una categoria ya se encuentra seleccionada
			alert("La Peliculas ya se Encuentra Seleccionada")
		}
		//se coloca el else para que nos muestre una alerta de que  debe seleccionar una categoria  
		// Metodo para mostrar en Html el array de las categorias(validacion)
		showMovies()
	} else {
		alert("Debe Seleccionar una Pelicula")
	}
});
 
 // creamos un metodo para validar que no se repita una categoria
 function existMovie(idMovie) {   // esto es jquery  
 	//se crea una variable que se igual a arrCategories y existe un metodo para encontrar la categoria repetida 
 	//el find actua como un foreach y compara con el existCategory lo que encontro 
	let existMovie = arrMovies.find(function (movie) {
		return movie.id == idMovie
	})
	//nos retorna el array que encontro
	return existMovie
}
//imprime la informacion que tiene el array
function showMovies() {
	//se vacio el array
	$("#list-movies").empty()

    //de esta forma me muestra los elementos seleccionados en html
	arrMovies.forEach(function (movie) {
		//se imprime uno a uno en  los elementos seleccionados             //el remove element es para eliminar la categoria  mostrada                                        //este boton es para pode eliminar las categorias que me muesta 
		$("#list-movies").append('<div class="form-group"><button onclick="removeElement('+movie.id+')" class="btn btn-danger">X</button><span>'+movie.name+'</span></div>')
	})
}

//funcion para elminar la categoria seleccionada
function removeElement(idMovie) {
	//se encuentra el numero de indice donde se encuentra  (posicion del array ) se llama indice  
	let index = arrMovies.indexOf(existMovie(idMovie))
	//se quita del array el indice  
	arrMovies.splice(index, 1)
	//me muestra de nuevo el array
	showMovies()
}

//Generar el metodo de envio al backend
//este es el submit del botton guardar (el id es submit) 
//cuando se de click hara las siguinetes  funciones 
//java script siempre esta escuchando los id 
$("#submit").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()
    //la url a la cual va ir la peticion
	let url = "?controller=rentals&method=save"
	//se arma un objeto con los parametros que van a llegar al controlador
	let params = {   //objeto llamado params
 	                      //estos son los nombres de los id  y con el val se trae el valor del id
 	                 
		start_date: 	$("#start_date").val(),
		end_date: 	    $("#end_date").val(),
		total: 		    $("#total").val(),
		user_id: 		$("#user_id").val(),
		unit_price:     $("#unit_price").val(),
		movies: 	arrMovies

	}

	//metodo post usando ajax para enviar la información al backend
	       //parametros que se van a enviar y una funcion anonima que va ser la repuesta del  request
	$.post(url, params, function (response) {
		//Respuesta del Request
		//si la repuesta del error es diferenre a undefine nos muestra la respuesta con  el error que tiene
		if(typeof response.error !== 'undefined') {
			alert(response.message)
		} else {
			//si no es difern a undefine nos muestre mensaje exito
			alert("Inserción Satisfactoria")
			//redirección al modulo de listar peliculas por medio del location
			location.href = "?controller=rentals"
		}
		//la respuesta va ser  en formato json
	}, 'json').fail(function (error) {
		//en caso de que falle se genera un error   NOTA: en js la concatanacin es con  +
		alert("Inserción Fallida ("+error.responseText+")")
		console.log(error)
	});
	
});

$("#update").click(function (e) {
	e.preventDefault()

	let url = "?controller=rentals&method=update"
	let params = {		
		id: 			$("#id").val(),
		start_date : 	$("#start_date").val(),
		end_date : 		$("#end_date").val(),
		total : 		$("#total").val(),
		status_id: 		$("#status_id").val(),
		user_id :  		$("#user_id").val(),
		movies: 		arrMovies
	}

	$.post(url, params, function (response) {
		if(typeof response.error !== 'undefined') {
			alert(response.message)
		} else {
			alert("Actualización Satisfactoria")
			location.href = "?controller=rentals"
		}
	}, 'json').fail(function (error) {
		alert("Actualización Fallida ("+error.responseText+")")
		console.log(error)
	});
	
});