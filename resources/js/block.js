$(document).ready(function(){
	$('form').submit(function(){
		$(this).find('*[type=submit]').prop('disabled', true);
	});
});