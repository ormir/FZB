$(document).ready(function(){
	var ajaxLoaded = false;

	$.ajax({
		url: 'json/all_interest.php',
		type: 'post',
		success: function(data){
			createFromTemplate('./template/select_tag.mustache.html', '#interests-select-container', data);

		}

	});
	
	// createFromTemplate('./template/select_tag.mustache.html', '#interests-select-container', dataInterest);

	function createFromTemplate(templateSource, destinationID, inData){
		$.get(templateSource, function(data) {
			var dataFilter = $(data).filter('#template');
			var dataHtml = dataFilter.html();
			var interestTemplate = dataHtml;
			$(destinationID).append(Mustache.render(interestTemplate, inData));
		});
	}

	// Change select tag size on option selected
	setTimeout(function(){
		$('.select-tag').change(function(event) {
			var txt = $(this).find(':selected').text();
			$('#tmp-selected-option').html(txt);
			$(this).animate({ width : $('#tmp-select').width() + 50});
			$('#tmp-selected-option').html('');
			$(this).children('img').attr('src', 'images/close.png')
								.css('top', '10px');
		});
	}, 2000);

	// $('.select-tag').change(function(event) {
	// 	var txt = $(this).find(':selected').text();
	// 	$('#tmp-selected-option').html(txt);
	// 	$(this).animate({ width : $('#tmp-select').width() + 50});
	// 	$('#tmp-selected-option').html('');
	// 	$(this).children('img').attr('src', 'images/close.png')
	// 						.css('top', '10px');
	// });

});