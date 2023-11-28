//Capturamos o submit. Se non cumple validar non se fai o submit
$("#rexistro").submit(function (event) {
	if (!validar()) event.preventDefault();
});

function validarNome() {
	var usu = $("#usuario");
	var errUsu = $("#errUsuario");
	if (usu.val().length < 4) {
		errUsu.removeClass("oculta");
		return false;
	}
	errUsu.addClass("oculta");
	return true;
}



function validarPassLong() {
	var pass1 = $("#pass");
	var pass2 = $("#pass2");
	var errPass = $("#errPassword");
	/* if ((pass1.val().length > 5  && (preg_match('@[A-Z]@', $pass1))) || (pass2.val().length > 5  && (preg_match('@[A-Z]@', $pass2)))) {
		errPass.addClass("oculta");
		return true;
	} */

	//Valores		//&& (preg_match('@[A-Z]@', $pass)));
	$pass1long = pass1.val().length > 5;
	$pass2long = pass2.val().length > 5;

	if ($pass1long && preg_match('@[A-Z]@', $pass1long)  || pass2long && preg_match('@[A-Z]@', $pass2long)) {
		errPass.addClass("oculta");
		return true;
	}
	errPass.removeClass("oculta");
	return false;
}

function validarPass() {
	var pass1 = $("#pass");
	var pass2 = $("#pass2");
	var errPass = $("#errPassword2");
	if (pass1.val() !== pass2.val() ) {
		errPass.removeClass("oculta");
		return false;
	}
	errPass.addClass("oculta");
	return true;
}

function validarMail() {
	var mail = $("#mail")
	var errMail = $("#errMail");
	if (!mail.val().match("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$")) {
			errMail.removeClass("oculta");
			return false;
	}
	errMail.addClass("oculta");
	return true;
}
function validar() {
	return validarNome() & validarMail() & validarPassLong() & validarPass() ;
}