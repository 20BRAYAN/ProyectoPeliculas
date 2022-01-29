/*Recomendacion para trabajar con js tener la consola abierta */

// Declarar array global que contendra la lista de categorias
//var arrCategories = []
showCategories()

//LLamar función de jquery para acción click del botón addElement
//con el id del boton de new Movie se llama, en este caso es addElemnet
$("#addElement").click(function (e) { //esto es jquery
	//Deshabilitar el envio por Http  para que no se vaya a ningun lado
	//metodo para deshabilitar
	e.preventDefault()
	/*para saber si ya ingresamos por js se puede utilizar el console.long("ingreso")*/
    /*aqui se llama el selector de la vista new de movie con el id = category*/
	let idCategory = $("#category").val()
	/*aqui obtenemos los datos de la opcion seleccionada */
	let nameCategory = $("#category option:selected").text()

    /*validamos que  el id seleccionado sea diferente de vacio*/
	if(idCategory != '') {
		//hacemos la validacion en donde nos dice que si es identico a undefind no  existe y podemos agregarlo al array
		if(typeof existCategory(idCategory) === 'undefined') {			
			//agregar categoria al array de esta manera podemos agregar un nuevo objeto a un array (con el metodo array push)
			arrCategories.push({
				'Id': idCategory,
				'name': nameCategory
			})	

		} else {
			//si es falso nos da un alert para validar que una categoria ya se encuentra seleccionada
			alert("La Categoría ya se Encuentra Seleccionada")
		}
		//se coloca el else para que nos muestre una alerta de que  debe seleccionar una categoria  
		// Metodo para mostrar en Html el array de las categorias(validacion)
		showCategories()
	} else {
		alert("Debe Seleccionar una Categoría")
	}
});
 
 // creamos un metodo para validar que no se repita una categoria
 function existCategory(idCategory) {   // esto es jquery  
 	//se crea una variable que se igual a arrCategories y existe un metodo para encontrar la categoria repetida 
 	//el find actua como un foreach y compara con el existCategory lo que encontro 
	let existCategory = arrCategories.find(function (category) {
		return category.id == idCategory
	})
	//nos retorna el array que encontro
	return existCategory
}
//imprime la informacion que tiene el array
function showCategories() {
	//se vacio el array
	$("#list-categories").empty()

    //de esta forma me muestra los elementos seleccionados en html
	arrCategories.forEach(function (category) {
		//se imprime uno a uno en  los elementos seleccionados             //el remove element es para eliminar la categoria  mostrada                                        //este boton es para pode eliminar las categorias que me muesta 
		$("#list-categories").append('<div class="form-group"><button onclick="removeElement('+category.id+')" class="btn btn-danger">X</button><span>'+category.name+'</span></div>')
	})
}

//funcion para elminar la categoria seleccionada
function removeElement(idCategory) {
	//se encuentra el numero de indice donde se encuentra  (posicion del array ) se llama indice  
	let index = arrCategories.indexOf(existCategory(idCategory))
	//se quita del array el indice  
	arrCategories.splice(index, 1)
	//me muestra de nuevo el array
	showCategories()
}

//Generar el metodo de envio al backend
//este es el submit del botton guardar (el id es submit) 
//cuando se de click hara las siguinetes  funciones 
//java script siempre esta escuchando los id 
$("#submit").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()
    //la url a la cual va ir la peticion
	let url = "?controller=movie&method=save"
	//se arma un objeto con los parametros que van a llegar al controlador
	let params = {   //objeto llamado params
 	                      //estos son los nombres de los id  y con el val se trae el valor del id
		name: 			$("#name").val(),
		description: 	$("#description").val(),
		user_id: 		$("#user_id").val(),
		categories: 	arrCategories
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
			location.href = "?controller=movie"
		}
		//la respuesta va ser  en formato json
	}, 'json').fail(function (error) {
		//en caso de que falle se genera un error   NOTA: en js la concatanacin es con  +
		alert("Inserción Fallida ("+error.responseText+")")
		console.log(error)
	});

});

	//PARA EDITAR ES IGUAL QUE NEW SOLO SE CAMBIA EL ID Y LA RUTA
	//aqui se pone el id 
	$("#update").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()
                          //se dirige al metodo update
	let url = "?controller=movie&method=update"
	let params = {		
		Id: 			$("#Id").val(),
		name: 			$("#name").val(),
		description: 	$("#description").val(),
		user_id: 		$("#user_id").val(),
		status_id: 		$("#status_id").val(),
		categories: 	arrCategories
	}

	//metodo post usando ajax para enviar la información al backend
	$.post(url, params, function (response) {
		//Respuesta del Request
		if(typeof response.error !== 'undefined') {
			alert(response.message)
		} else {
			alert("Actualización Satisfactoria")
			//redirección al modulo de listar peliculas
			location.href = "?controller=movie"
		}
	}, 'json').fail(function (error) {
		alert("Actualización Fallida ("+error.responseText+")")
		console.log(error)
	});
		
	
});