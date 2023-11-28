//Capturamos o submit. Se non cumple validar non se fai o submit
$("#formulario1").submit(function (event) {
	if (!validar()) event.preventDefault();
});

function validarNome() {
	var usu = $("#nome");
	var errUsu = $("#errNome");
	if (usu.val().length < 4) {
		errUsu.removeClass("oculta");
		return false;
	}
	errUsu.addClass("oculta");
	return true;
}

function validarMail() {
	var mail = $("#email")
	var errMail = $("#errMail");
	if (!mail.val().match("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$")) {
			errMail.removeClass("oculta");
			return false;
	}
	errMail.addClass("oculta");
	return true;
}

if(validarNome() == true && validarMail() == true) {
	var insertar = $("#insertar");
	var errInsertar = $("#errInsertar");
	if (insertar == true) {
		errInsertar.removeClass("oculta");
		return false;
	}
	errInsertar.addClass("oculta");
	return true;
}

function validar() {
	return validarNome() & validarMail();
}