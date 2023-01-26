function RoundCorrect(num, precision = 2) {
	// half epsilon to correct edge cases.
	var c = 0.5 * Number.EPSILON * num
	//	var p = Math.pow(10, precision); //slow
	var p = 1
	while (precision-- > 0) p *= 10
	if (num < 0) p *= -1
	return Math.round((num + c) * p) / p
}

function postParams(actionName, formArray) {
	var returnArray = {}
	for (var i = 0; i < formArray.length; i++) {
		returnArray[formArray[i]['name']] = formArray[i]['value']
	}
	return JSON.stringify({
		action: actionName,
		data: JSON.stringify(returnArray)
	})
}

function populateForm(frm, data) {
	$.each(data, function(key, value) {
		var ctrl = $('[name=' + key + ']', frm)
		switch (ctrl.prop('type')) {
			case 'radio':
			case 'checkbox':
				ctrl.each(function() {
					$(this).prop('checked', false)
					if ($(this).attr('value') == value) $(this).prop('checked', true)
				})
				break
			default:
				ctrl.val(value)
		}
	})
}
