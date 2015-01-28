<?php

function validarCedula($CedulaDeIdentidad) {
	/*
		Validación de Cédula de Identidad Uruguaya

		Creador: DiMaNacho http://obrusly.com
		Créditos a nprieto23 http://bit.ly/1CKYjKI
	*/

	$regexCI = '/^([0-9]{1}[.]?[0-9]{3}[.]?[0-9]{3}[-]?[0-9]{1}|[0-9]{3}[.]?[0-9]{3}[-]?[0-9]{1})$/';

	if (!preg_match($regexCI, $CedulaDeIdentidad)) {
		return false;
	} else {
		// Limpiamos los puntos y guiones para solo quedarnos con los números.
		$numeroCedulaDeIdentidad = preg_replace("/[^0-9]/","",$CedulaDeIdentidad);

		// Armarmos el array que va a permitir realizar las multiplicaciones necesarias en cada digito.
		$arrayCoeficiente = [2,9,8,7,6,3,4,1];

		// Variable donde se va a guardar el resultado de la suma.
		$suma = 0;

		// Simplemente para que se entienda que esto es el cardinal de digitos que tiene el array de coeficiente.
		$lenghtArrayCoeficiente = 8;

		// Contamos la cantidad de digitos que tiene la cadena de números de la CI que limpiamos.
		$lenghtCedulaDeIdentidad = strlen($numeroCedulaDeIdentidad);

		// Esto nos asegura que si la cédula es menor a un millón, para que el cálculo siga funcionando, simplemente le ponemos un cero antes y funciona perfecto.
		if ($lenghtCedulaDeIdentidad == 7) {
			$numeroCedulaDeIdentidad = 0 . $numeroCedulaDeIdentidad;
			$lenghtCedulaDeIdentidad++;
		}

		for ($i = 0; $i < $lenghtCedulaDeIdentidad; $i++) {
			// Voy obteniendo cada caracter de la CI.
			$digito = substr($numeroCedulaDeIdentidad, $i, 1);

			// Ahora lo forzamos a ser un int.
			$digitoINT = intval($digito);

			// Obtengo el coeficiente correspondiente a esta posición.
			$coeficiente = $arrayCoeficiente[$i];

			// Multiplico el caracter por el coeficiente y lo acumulo a la suma total
			$suma = $suma + $digitoINT * $coeficiente;
		}

		// si la suma es múltiplo de 10 es una ci válida
		if (($suma % 10) == 0) {
			return true;
		} else {
			return false;
		}		
	}
}

?>