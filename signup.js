function validate () {
	var name = $("#name input").val();
	var email = $("#email input").val();
	var user = $("#username input").val();
	var pwd = $("#pwd input").val();
	var pwdTwo = $("#pwdTwo input").val();
	var count = 0;
	var emailValid = /^.+@.+\..+$/;

	// Validate name
	if (name.length == 0) {
		$("#name").removeClass().addClass("form-group has-error has-feedback");
		$("#name input").removeClass().addClass("form-control form-control-error");

		if ($("#name").children('small').length === 0) {
			jQuery('<small/>', {class: 'form-text', text: 'Please enter a valid name.'}).appendTo('#name');
			jQuery('<span/>', {class: 'glyphicon glyphicon-remove form-control-feedback'}).appendTo('#name');
		}
		else {
			$("#name small").text("Please enter a valid name.");
			$("#name span").removeClass().addClass("glyphicon glyphicon-remove form-control-feedback");
		}
	}

	else {
		$("#name").removeClass().addClass("form-group has-success has-feedback");
		$("#name input").removeClass().addClass("form-control form-control-success");
		if ($("#name").children('span').length === 0 ) {
			jQuery('<small/>', {class: 'form-text'}).appendTo('#name');
			jQuery('<span/>', {class: 'glyphicon glyphicon-ok form-control-feedback'}).appendTo('#name');
		}
		else {
			$("#name small").text("");
			$("#name span").removeClass().addClass("glyphicon glyphicon-ok form-control-feedback");
		}
		count = count + 1;
	}

	// Validate email
	if (email.match(emailValid) == null) {
		$("#email").removeClass().addClass("form-group has-error has-feedback");
		$("#email input").removeClass().addClass("form-control form-control-error");

		if ($("#email").children('small').length === 0) {
			jQuery('<small/>', {class: 'form-text', text: 'Please enter a valid email.'}).appendTo('#email');
			jQuery('<span/>', {class: 'glyphicon glyphicon-remove form-control-feedback'}).appendTo('#email');
		}
		else {
			$("#email small").text("Please enter a valid email.");
			$("#email span").removeClass().addClass("glyphicon glyphicon-remove form-control-feedback");
		}
	}

	else {
		$("#email").removeClass().addClass("form-group has-success has-feedback");
		$("#email input").removeClass().addClass("form-control form-control-success");
		if ($("#email").children('small').length === 0 ) {
			jQuery('<small/>', {class: 'form-text'}).appendTo('#email');
			jQuery('<span/>', {class: 'glyphicon glyphicon-ok form-control-feedback'}).appendTo('#email');
		}
		else {
			$("#email small").text("");
			$("#email span").removeClass().addClass("glyphicon glyphicon-ok form-control-feedback");
		}
		count = count + 1;
	}

	// Validate username
	if (user.length < 6 || user.length > 20) {
		$("#username").removeClass("form-group").addClass("form-group has-error has-feedback");
		$("#username input").removeClass("form-control").addClass("form-control form-control-error");

		if ($("#username").children('small').length === 0) {
			jQuery('<small/>', {class: 'form-text', text: 'Please enter a valid username.'}).appendTo('#username');
			jQuery('<span/>', {class: 'glyphicon glyphicon-remove form-control-feedback'}).appendTo('#username');
		}
		else {
			$("#username small").text("Please enter a valid username.");
			$("#username span").removeClass().addClass("glyphicon glyphicon-remove form-control-feedback");
		}
	}

	else {
		$("#username").removeClass().addClass("form-group has-success has-feedback");
		$("#username input").removeClass().addClass("form-control form-control-success");
		if ($("#username").children('small').length === 0 ) {
			jQuery('<small/>', {class: 'form-text'}).appendTo('#username');
			jQuery('<span/>', {class: 'glyphicon glyphicon-ok form-control-feedback'}).appendTo('#username');
		}
		else {
			$("#username small").text("");
			$("#username span").removeClass().addClass("glyphicon glyphicon-ok form-control-feedback");
		}
		count = count + 1;
	}

	// Validate password
	if (pwd.length < 8 || pwd.length > 20) {
		$("#pwd").removeClass("form-group").addClass("form-group has-error has-feedback");
		$("#pwd input").removeClass("form-control").addClass("form-control form-control-error");

		if ($("#pwd").children('small').length === 0 ) {
			jQuery('<small/>', {class: 'form-text', text: 'Please enter a valid password.'}).appendTo('#pwd');
			jQuery('<span/>', {class: 'glyphicon glyphicon-remove form-control-feedback'}).appendTo('#pwd');
		}
		else {
			$("#pwd small").text("Please enter a valid password.");
			$("#pwd span").removeClass().addClass("glyphicon glyphicon-remove form-control-feedback");
		}
	}

	else {
		$("#pwd").removeClass().addClass("form-group has-success has-feedback");
		$("#pwd input").removeClass().addClass("form-control form-control-success");
		if ($("#pwd").children('small').length === 0 ) {
			jQuery('<small/>', {class: 'form-text'}).appendTo('#pwd');
			jQuery('<span/>', {class: 'glyphicon glyphicon-ok form-control-feedback'}).appendTo('#pwd');
		}
		else {
			$("#pwd small").text("");
			$("#pwd span").removeClass().addClass("glyphicon glyphicon-ok form-control-feedback");
		}
		count = count + 1;
	}

	// Validate password match
	if (pwdTwo.length == 0 || pwdTwo.match(pwd) == null) {
		$("#pwdTwo").removeClass("form-group").addClass("form-group has-error has-feedback");
		$("#pwdTwo input").removeClass("form-control").addClass("form-control form-control-error");

		if ($("#pwdTwo").children('small').length === 0) {
			jQuery('<small/>', {class: 'form-text', text: 'Passwords do not match.'}).appendTo('#pwdTwo');
			jQuery('<span/>', {class: 'glyphicon glyphicon-remove form-control-feedback'}).appendTo('#pwdTwo');
		}
		else {
			$("#pwdTwo small").text("Passwords do not match.");
			$("#pwd span").removeClass().addClass("glyphicon glyphicon-remove form-control-feedback");
		}
	}

	else {
		$("#pwdTwo").removeClass().addClass("form-group has-success has-feedback");
		$("#pwdTwo input").removeClass().addClass("form-control form-control-success");
		if ($("#pwdTwo").children('small').length === 0 ) {
			jQuery('<small/>', {class: 'form-text'}).appendTo('#pwdTwo');
			jQuery('<span/>', {class: 'glyphicon glyphicon-ok form-control-feedback'}).appendTo('#pwdTwo');
		}
		else {
			$("#pwdTwo small").text("");
			$("#pwdTwo span").removeClass().addClass("glyphicon glyphicon-ok form-control-feedback");
		}
		count = count + 1;
	}

	if (count == 5) {
		return true;
	}
	else {
		return false;
	}
}