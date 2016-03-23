$(document).ready(function(){
	$('.select-tag').change(function(event) {
		var txt = $(this).find(':selected').text();
		$('#tmp-selected-option').html(txt);
		$(this).width($('#tmp-select').width() + 50);
		$('#tmp-selected-option').html('');
		$(this).children('img').attr('src', 'images/close.png')
							.css('top', '10px');
	});

});