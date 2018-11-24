
/* CREADO POR:dzvjc5
FECHA: 31/10/2018
FUNCION:Validaciones en javascript
*/




/*FUNCIONES PARA VALIDAR LOS FORMULARIOS

comprobarVacio(campo) 
comprobarTexto(campo, size)
comprobarExpresionRegular(campo, exprreg, size)
comprobarAlfabetico(campo, size) 
comprobarEntero(campo, valormenor, valormayor) 
comprobarReal(campo, numero decimales, valormenor, valormayor)
comprobarDni(campo)
comprobarTelf(campo) // teléfono español, tanto nacional como internacional

*/

function comprobarVacio(campo) { //Comprueba si es vacio

	var valor = document.getElementById(campo).value; //Coje el valor del input

	if (valor == "") {
		document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
		return false;
	}
	document.getElementById(campo).borderColor = "green"; //pinta el input de verde
	return true;

}

function comprobarTexto(campo, size) { //Comrpueba si es texto

	var expr = /^([^\s\t]+)+$/; //Expresion regular permite todo menos espacios tabuladores etc..
	

	if (comprobarExpresionRegular(campo, expr, size)) { //Comprobamos la expresion regular

		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	}
	document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
	return false;

}

function comprobarExpresionRegular(campo, exprreg, size) { //Comprueba si el valor de un input coincide con la expresion regular y el length de el campo es menor que el size

	var valor = document.getElementById(campo).value; //Coje el valor del input



	if (comprobarVacio(campo) && exprreg.test(valor) && valor.length <= size) { // Comprueba si es vacio, la expresion y el size
		return true;
	}
	return false;

}

function comprobarAlfabetico(campo, size) {//Comprueba si es solo letras de nuestro alfabeto

	var expr = /^([a-zñáéíóúA-ZÁÉÍÓÚ]+[\s]*)+$/; //Expresion regular permite letras minusculas y mayusculas y espacios entre ellas

	if (comprobarExpresionRegular(campo, expr, size)) { //Comprobamos la expresion regular
		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	}
	document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo


	return false;

}

function comprobarEntero(campo, valormenor, valormayor) { //Comprueba si el valor del input es un entero y está entre esos dos valores

	var expr = /^[0-9]+$/; //Expresion regular permite enteros
	var valor = document.getElementById(campo).value; //Coje el valor del input


	if (valor >= valormenor && valor <= valormayor && expr.test(valor)) { //Comprobamos que la variable sea aceptada por la expresion y que su tamaño esté entre los marcados
		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	} else {//Si la variable no coincide con la Expresion regular o el tamaño excede el size
		document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
		return false;
	}
}
function comprobarReal(campo, numeros_decimales, valormenor, valormayor) { //Comprueba si el valor del input es un real y está entre esos dos valores y tiene tantos numeros decimales como la variable numerosdecimales


	var expr = "^[0-9]*.[0-9]{1," + numeros_decimales + "}$"; 
	var expr2 = new RegExp(expr); //Creamos una expresion regular con la variable anterior que es un real
	var valor = document.getElementById(campo).value; //Coje el valor del input


	if (valor >= valormenor && valor <= valormayor && expr2.test(valor)) { // Comprobamos que la variable sea aceptada y esté entre los valores
		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	}
	document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
	return false;

}
function comprobarDni(campo, size) { //Comprobamos si el campo es un dni

	var valor = document.getElementById(campo).value; //Coje el valor del input
	var expr = /^\d{8}[a-zA-Z]?$/ //Expresion regular que permite 8 enteros y puede meter o no la letra
	var numero;
	var modulo;
	var letra = 'TRWAGMYFPDXBNJZSQVHLCKET'; //Sirve para calcular la letra que tienes a partir de los numeros
	var letraIntroducida;
	if (comprobarExpresionRegular(campo, expr, size)) { //Comprobamos que cumple la expresion regular
		if (valor.length == 8) { //Si solo mete numeros calculamos la letra
			numero = valor.substr(0, valor.length);
			modulo = numero % 23;
			letra = letra.substring(modulo, modulo + 1);
			valor = valor + letra;

			document.getElementById(campo).value = valor;

		}
		else { // Comprobamos que la letra coincide
			numero = valor.substr(0, valor.length - 1);
			letraIntroducida = valor.substr(valor.length - 1, valor.length);
			modulo = numero % 23;
			letra = letra.substring(modulo, modulo + 1);
			if (letraIntroducida.toUpperCase() != letra) {// Si no coincide la letra
				document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
				return false;
			}
		}
		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	}
	document.getElementById(campo).style.borderColor = "red";  //pinta el input de rojo
	return false;

}
function comprobarTelf(campo){ //Comprobamos que sea un número del telefono
	var valor = document.getElementById(campo).value; //Guardamos la variable recibida con id=campo
    var expr = /^(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/; //Expresión regular para los telefonos nacionales e internacionales en españa
    
     if(expr.test(valor)){ //Comprobamos si el valor se corresponde con la expresion regular
        document.getElementById(campo).style.borderColor="green"; //pinta el input de verde
        return true;
       }else{//Si la variable no coincide con la expresion regular
        document.getElementById(campo).style.borderColor="red"; //pinta el input de rojo
           return false;
       }
}

function comprobarEmail(campo, size) { //Comprobamos que sea un email
    
    var valor = document.getElementById(campo).value; //Guardamos la variable recibida con id=campo
    var expr = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/; //Expresión regular para los correos electronicos
    
    if(comprobarExpresionRegular(campo, expr, size)){ //Comprobamos si el valor se corresponde con la ER
        document.getElementById(campo).style.borderColor="green"; //pinta el input de verde
        return true;
       }else{//Si la variable no coincide con la expresion regular
        document.getElementById(campo).style.borderColor="red"; //pinta el input de rojo
           return false;
       }
    
}
function registrar(){ //Confirmamos nuevamente si todo esta OK

	if(comprobarDni("dniAdd",9) && comprobarTelf("telefonoAdd") && comprobarTexto("usuarioAdd",25) && comprobarTexto("contraseñaAdd",20) && comprobarVacio("dateAdd") && comprobarEmail("emailAdd",50) &&  comprobarAlfabetico("nombreAdd",25) && comprobarAlfabetico("apellidosAdd",50) && validateFileNotEmpty("fotoAdd")){
		return true;
	}
	alert('Error insertando');
	return false;
}

function editar(){ //Confirmamos nuevamente si todo esta OK
	if(comprobarDni("dniEdit",9) && comprobarTelf("telefonoEdit") && comprobarTexto("contraseñaEdit",20) && comprobarVacio("dateEdit") && comprobarEmail("emailEdit",50) &&  comprobarAlfabetico("nombreEdit",25) && comprobarAlfabetico("apellidosEdit",50) && comprobarAlfabetico("titulacionEdit",60)){
		return true;
	}
	alert('Error al editar');
	return false;
}

function addLot(){
	if(comprobarEmail("emailAdd",50) && comprobarAlfabetico("nombreAdd",25) && comprobarAlfabetico("apellidosAdd",50) && comprobarEntero("participacionAdd",0,999) && comprobarEntero("premioAdd",0,999999) && validateFileNotEmpty("resguardo")){
		return true;
	}
	alert('Error insertando');
	return false;
}

function validateFileNotEmpty(campo){
	if(document.getElementById(campo).files.length == 0){
		document.getElementById(campo).style.borderColor="red";
		return false;
	}else{
		document.getElementById(campo).style.borderColor="red";
		return true;
	}
}

