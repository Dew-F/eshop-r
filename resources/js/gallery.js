$(document).ready(function(){
	$('.gallery .image').click(function (){ 
		$('#frameimage').attr('src',$(this).attr('src'));
		$('.gallery .image').css('border-color', 'var(--lightgray)');
		$(this).css('border-color', 'var(--red)');
	});
});