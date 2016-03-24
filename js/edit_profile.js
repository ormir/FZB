$(document).ready(function(){

	// Change select tag size on option selected
	$('.select-tag').change(function(event) {
		var txt = $(this).find(':selected').text();
		$('#tmp-selected-option').html(txt);
		$(this).animate({ width : $('#tmp-select').width() + 50});
		$('#tmp-selected-option').html('');
		$(this).children('img').attr('src', 'images/close.png')
							.css('top', '10px');
	});

	var dataInterest = {interest: [
		{id: '41', name: 'Laverne'},
		{id: '19', name: 'Dorinda'},
		{id: '28', name: 'Matt'},
		{id: '47', name: 'Rory'},
		{id: '37', name: 'Deidre'},
		{id: '70', name: 'Augustine'},
		{id: '71', name: 'Juan'},
		{id: '94', name: 'Joelle'},
		{id: '88', name: 'Sherryl'},
		{id: '91', name: 'Farah'},
		{id: '15', name: 'Buffy'},
		{id: '71', name: 'Vivien'},
	]};
	// var interestTemplate = $('#template-test').html();
	// var interestTemplate = '';
	// $.get('./template/select_tag.mustache.html', function(data) {
		// 	var dataFilter = $(data).filter('#template');
		// 	var dataHtml = dataFilter.html();
		// 	var interestTemplate = dataHtml;
		// 	$('#interests-select-container').append(Mustache.render(interestTemplate, dataInterest));
		// });
	
	createFromTemplate('./template/select_tag.mustache.html', '#interests-select-container', dataInterest);

	function createFromTemplate(templateSource, destinationID, inData){
		$.get(templateSource, function(data) {
			var dataFilter = $(data).filter('#template');
			var dataHtml = dataFilter.html();
			var interestTemplate = dataHtml;
			$(destinationID).append(Mustache.render(interestTemplate, inData));
		});
	}

	

});