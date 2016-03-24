$(document).ready(function(){
	var userInteres = [];
	var  tmpSelect;
	createInterestTag();
	function createInterestTag () {
			$.ajax({
			url: 'json/all_interest.php',
			type: 'post',
			success: function(data){
				createFromTemplate('./template/select_tag.mustache.html', '#interests-select-container', data);

			}

		});
	}


	function createFromTemplate(templateSource, destinationID, inData){
		$.get(templateSource, function(data) {
			var dataFilter = $(data).filter('#template');
			var dataHtml = dataFilter.html();
			var interestTemplate = dataHtml;
			$(destinationID).append(Mustache.render(interestTemplate, inData));
		});
	}

	// Change select tag size on option selected
	$('.profilecontainer-description')
		.on('mousedown', '.select-tag', function(event) {
			 tmpSelect = $(this).find(':selected').val();
			console.log( tmpSelect);
		})
		.on('keydown', '.select-tag', function(event) {
			 tmpSelect = $(this).find(':selected').val();
			console.log( tmpSelect);
		})
		.on('change', '.select-tag', function(event) {
			var txt = $(this).find(':selected').text();
			var thisVal = $(this).find(':selected').val();
			$('#tmp-selected-option').html(txt);
			$(this).animate({ width : $('#tmp-select').width() + 50});
			$('#tmp-selected-option').html('');
			$(this).children('img').attr('src', 'images/close.png')
								.css('top', '10px');

			if( tmpSelect != thisVal){
				var tmpIndex = userInteres.indexOf( tmpSelect);
				if (tmpIndex > -1) userInteres.splice(tmpIndex, 1);
				userInteres.push(thisVal);
			}
			if(tmpSelect == 0 || tmpSelect === undefined) createInterestTag();
			console.log(userInteres);
		})
		.on('click', 'img', function(event) {
			var parent = $(this).parent();
			parent.animate({
				width: 0,
				opacity: 0},
				'fast', function() {
					var val = parent.find(':selected').val();
					var valIndex = userInteres.indexOf(val);
					if (valIndex > -1) userInteres.splice(valIndex, 1);
					parent.remove();
					console.log(userInteres);
			});
			
		});


});