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

function validarPass() {
	var pass1 = $("#pass");
	var errPass = $("#errPassword");
	if (pass1.val().length < 6 ) {
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
	return validarNome() & validarMail() & validarPass();
}