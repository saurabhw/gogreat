function sendPost(postName, postValue, page) { // posts a name-value pair to a page to be accessed
	var form = document.createElement('form');
	form.setAttribute('action', page);
	form.setAttribute('method', 'POST');
	var input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('name', postName);
	input.setAttribute('value', postValue);
	form.appendChild(input);
	document.body.appendChild(form);
	form.submit();
}
