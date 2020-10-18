let x;

const borders = [];
borders["X"] = ["-5", "3"];
borders["Y"] = ["-3", "3"];

function validate(form) {

	let X = form.X.value.replace("," , ".");
	let Y = form.Y.value.replace("," , ".");
	let R = form.R.values();

	form.Y.value = Y;

	let valid = true;

	if (!isPresented(X, "X") && validateParam(X, "X")) {
		valid = false;
	}
	if (!(isPresented(Y, "Y") && validateParam(Y, "Y"))) {
		valid = false;
	}
	if (!isPresented(R, "R")) {
		valid = false;
	}

	form.uniqid.value = ID();
	return valid;
	
}

function isPresented(param, paramName) {
	if (param == "" || param == null) {
		showWarning(paramName + " должен быть указан", paramName);
		return false;
	} else {
		showWarning("", paramName);
	}

	return true;
}

function validateParam(param, paramName) {
	if (!(!isNaN( Number(param) ) && param.lastIndexOf('.') != (param.length - 1))) {
		showWarning(paramName + " должен быть числом", paramName);
		return false;
	} else {
		showWarning("", paramName);
	}
	let bottomBorder = borders[paramName][0];
	let topBorder = borders[paramName][1];

	if (!(Number(param) > bottomBorder && Number(param) < topBorder)) {
		showWarning(paramName + " не входит в необходимый диапазон (" + bottomBorder + " ... " + topBorder +")", paramName);
		return false;
	} else {
		showWarning("", paramName);
	}
	
	return true;
}

function showWarning(warningMessage, paramName) {
	
	let warningContainer = document.getElementById("warning-container-" + paramName);
	
	if (warningContainer != null) {
		warningContainer.textContent = warningMessage;
	}
	
}

function ID() {
  return '_' + Math.random().toString(36).substr(2, 9);
}

const checkboxList = document.querySelectorAll('.checkbox');
checkboxList.forEach(checkBox => checkBox.onchange = function () {
	checkboxList.forEach(i => i.checked = false );
	this.checked = true;
});
