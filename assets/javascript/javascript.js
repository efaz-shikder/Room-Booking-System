var button = document.getElementById('mainButton');
var button2 = document.getElementById('mainButton2');
var openForm = function() {
	button.className = 'active';
};
var openForm2 = function() {
	button2.className = 'active';
};

var checkInput = function(input) {
	if (input.value.length > 0) {
		input.className = 'active';
	} else {
		input.className = '';
	}
};

var closeForm = function() {
	button.className = '';
	button2.className = '';
};


// Close form by pressing escape or enter on keyboard
document.addEventListener("keyup", function(e) {
	if (e.keyCode == 27 || e.keyCode == 13) {
		closeForm();
	}
});

var inputPass = document.getElementById('password');
var inputChk  = document.getElementById('chk');
var label = document.getElementById('showhide');

var inputPass2 = document.getElementById('password2');
var inputPass3 = document.getElementById('password3');
var inputChk2  = document.getElementById('chk2');
var label2 = document.getElementById('showhide2');


inputChk.onclick = function () {
	if(inputChk.checked) {
		inputPass.setAttribute('type', 'text');
		label.textContent = 'Hide Passowrd';
	}
	else {
		inputPass.setAttribute('type', 'password');;
		label.textContent = 'Show Passowrd';
	}
}

inputChk2.onclick = function () {
	if(inputChk2.checked) {
		inputPass2.setAttribute('type', 'text');
		inputPass3.setAttribute('type', 'text');

		label2.textContent = 'Hide Passowrd';
	}
	else {
		inputPass2.setAttribute('type', 'password');
		inputPass3.setAttribute('type', 'password');
		label2.textContent = 'Show Passowrd';
	}
}
