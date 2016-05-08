$(document).ready(function(){
	var userInteres = [],
		userPlaces = [],
		tmpSelect,
		interestData,
		placeData,
		tagType;

	// TODO set profile pic of user if already set
	// Initial profile crop pic
	$('#profile-pic-crop').croppie({
	    url: 'images/user_blue.png',
	    // points: [0,0,200,200],
	    viewport: {
			    width: 170,
			    height: 170,
			    type: 'circle'
			},
		boundary: { 
			width: 200,
			height: 200
			},
	});
	
	createInterestTag();
	createPlaceTag();

	$('#edit-profile-pic').change(function(event) {
		// console.log("New pic upload");
		var img = URL.createObjectURL(event.target.files[0]);
		$('#profileuserimage').attr('src', img);
		$('#profile-pic-crop').croppie('bind', {
	    	url: img,
		});
	});

	function restoreDuplicate (that) {
		// Get interest/place name
		var name;
		var selectedVal = tmpSelect;
		var mylist = (tagType == 'interest') ? interestData : placeData;
		$.each(mylist.list, function(index, val) {
			if (selectedVal == val.id) {
				name = val.name;
				return false;
			}
		});

		// Get all siblings
		var s = that.siblings();

		// Iterate through each sibling
		for (var i = 0; i < s.length; i++){
			var appendClass = Number(tmpSelect);
			var appendOption = null;

			// Search first existing option to append
			while (!appendOption){
				appendClass --;
				appendOption = $(s[i]).find('.'+ appendClass);
			}

			// Append new option to the found option
			$('<option value="'+ selectedVal +'" class="'+ selectedVal +'">'+ name +'</option>').insertAfter(appendOption);
		}
	}

	function deleteDuplicates(that){
		var s = that.siblings();
		var mylist = (tagType == 'interest') ? userInteres : userPlaces;

		// Iterate through the selected tag list
		for (var i = 0; i < mylist.length; i++)
		for (var j = 0; j < s.length; j++) { // Iterate each sibling
			// Get selected value of sibling
			var siblingVal = $(s[j]).find(':selected').val();
			if (siblingVal != mylist[i]) {
				// Remove not selected option from sibling
				$(s[j]).find('.' + mylist[i]).remove();
			}
		}
	}

	function createInterestTag () {
		if (interestData === undefined){
			$.ajax({
				url: 'json/all_interest.php',
				type: 'post',
				success: function(data){
					interestData = data;
					createFromTemplate('./template/select_tag.mustache.html', '#interests-select-container', interestData);
				}
			});
		} else {
			createFromTemplate('./template/select_tag.mustache.html', 
				'#interests-select-container', 
				interestData);
		}
	}

	function createPlaceTag () {
		if (placeData === undefined){
			$.ajax({
				url: 'json/all_places.php',
				type: 'post',
				success: function(data){
					placeData = data;
					createFromTemplate('./template/select_tag.mustache.html', '#place-select-container', placeData);
				}
			});
		} else {
			createFromTemplate('./template/select_tag.mustache.html', 
				'#place-select-container', 
				placeData);
		}
	}

	function createFromTemplate(templateSource, destinationID, inData){
		$.get(templateSource, function(data) {
			var dataFilter = $(data).filter('#template');
			var dataHtml = dataFilter.html();
			var interestTemplate = dataHtml;
			$(destinationID).append(Mustache.render(interestTemplate, inData));
		});
	}

	// Handling select tag changing events
	$('.profilecontainer-description')
		.on('mousedown', '.select-tag', function(event) {
			tmpSelect = $(this).find(':selected').val();
		})
		.on('keydown', '.select-tag', function(event) {
			tmpSelect = $(this).find(':selected').val();
		})
		.on('change', '.select-tag', function(event) {			
			var txt = $(this).find(':selected').text();
			var thisVal = $(this).find(':selected').val();

			// Fill the tag with the chosen text
			$('#tmp-selected-option').html(txt);
			$(this).animate({ width : $('#tmp-select').width() + 50});
			$('#tmp-selected-option').html('');

			// Change to 'x' icon on tag  chosen
			$(this).children('img').attr('src', 'images/close.png')
								.css('top', '10px');

			// Find if tag is interest or place
			var parentID = $(this).parent().attr('id');
			if (parentID.indexOf('interests') != -1) {
				tagType = 'interest';
			} else if (parentID.indexOf('place') != -1) {
				tagType = 'place';
			}

			// Delete old vale from array
			if(tmpSelect != thisVal){
				if (tagType == 'interest'){
					var tmpIndex = userInteres.indexOf(tmpSelect);
					if (tmpIndex > -1) userInteres.splice(tmpIndex, 1);
					userInteres.push(thisVal);
				} else if (tagType == 'place'){
					var tmpIndex = userPlaces.indexOf(tmpSelect);
					if (tmpIndex > -1) userPlaces.splice(tmpIndex, 1);
					userPlaces.push(thisVal);
				}
				if (tmpSelect != 0) restoreDuplicate($(this));
			}

			// Create new select tag
			if(tmpSelect == 0 || tmpSelect === undefined){ 
				if(tagType == 'interest'){
					createInterestTag();
					console.log("New Interest " + userInteres);
				} else if (tagType == 'place') {
					createPlaceTag();
					console.log("New Place " + userPlaces);
				}
			}
			
			// Delete dulplicates
			var that = $(this);
			setTimeout(function() {
				deleteDuplicates(that);
			}, 100);
			
		})
		.on('click', 'img', function(event) {
			// Check if 'x' image is showing
			if ($(this).attr('src').indexOf('close') > -1) {
				var parent = $(this).parent();
				parent.animate({
					width: 0,
					opacity: 0},
					'fast', function() {
						var val = parent.find(':selected').val();

						// Remove from selected array
						if (tagType == 'interest') {
							var valIndex = userInteres.indexOf(val);
							if (valIndex > -1) userInteres.splice(valIndex, 1);
							console.log("Removed Interest " + userInteres);
						} else if (tagType == 'place') {
							var valIndex = userPlaces.indexOf(val);
							if (valIndex > -1) userPlaces.splice(valIndex, 1);
							console.log("Removed Place " + userPlaces);
						}
						restoreDuplicate(parent);
						parent.remove();
						
				});
			}
			
		});
});