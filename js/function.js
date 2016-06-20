var largeFont=false;
$(document).ready(function(){
	 var viewportHeight =$(document).height()-$("#navbar").height();
	 $(".content").css("min-height",viewportHeight+"px");
	
	var fontSize = parseInt($('body').css('font-size'),10);
    $('#changefontsize').on('click',function(){
	if(!largeFont){
		  fontSize+=3;
        $('body').css('font-size',fontSize+'px');
		largeFont=true;
	}else
	{
		fontSize-=3;
        $('body').css('font-size',fontSize+'px');
		largeFont=false;
	}	
    });
	});
function resizeCircle(backgroundContainer){
	
	var elementGroup = backgroundContainer.children();
	var background = elementGroup.children("circle");
	var image = elementGroup.children("image");
	var text = elementGroup.children("text");
	var squareSlideFlipClick;
	//sorting circle container width
	var sccWidth = backgroundContainer.width();
	sccWidth *= 0.8; // 80% of the width
	backgroundContainer.height(sccWidth);
	elementGroup.height(sccWidth);

	elementGroup.width(sccWidth);
	background.attr("r", sccWidth/2);
	background.attr("cx" ,sccWidth/2);
	background.attr("cy", sccWidth/2);

	imgWidth = sccWidth * 0.65;
	// console.log("ImageWidth: "+imgWidth);

	image.attr("width", imgWidth);
	image.attr("height", imgWidth);

	var translate = "translate(-"+ imgWidth/2 +", -"+ imgWidth/2 +")";
	image.attr("transform", translate);
	
	// Check if circle has text
	if(isEmpty(text)){
		var fs = text.attr("font-size");

		// Avoid mozilla bug 874811
		if(text.width() != 0){
			while(text.width() < imgWidth){
				
				var newFontSize = Number(text.attr("font-size")) + 20;
				text.attr("font-size", newFontSize);
				// console.log("Text Width: " + text.width() + "++	ImageWidth: " + imgWidth);
			} 

			while(text.width() > imgWidth){
				
				var newFontSize = Number(text.attr("font-size")) - 5;
				text.attr("font-size", newFontSize);
				// console.log("Text Width: " + text.width() + "--	ImageWidth: " + imgWidth);
			} 
		}
	}	
}

function isEmpty(obj){
    return (Object.getOwnPropertyNames(obj).length === 0);
}

function getSquareSlideFlipClick() {
	return squareSlideFlipClick;
}

/*
	Flip, Panel & Siblings are jQuery objects
	Sibling is JavaScript object
*/
function squareSlide(flip, panel, siblings){
	flip.click(function(){
		squareSlideFlipClick=flip.selector;
		for(var i = 0; i < siblings.length; i++){
			var sibling = siblings[i];
			var display = sibling.style.display;
			var siblingID = sibling.getAttribute("id");

			if(display != "none" && siblingID != panel.attr("id")){
				$("#" + siblingID).slideToggle("slow");
			}
		}

        panel.slideToggle("slow");
        resizeSlidingPanel(panel);
        resizeListImage(panel.find(".listimagecontainer"));
    });
}

function resizeElement(container, type, containerResize, imageResize){
	var elementGroup = container.children();
	var background = elementGroup.find(type);
	var image = elementGroup.find("image");
	var text = elementGroup.children("text");
	var strokeWidth = background.attr("stroke-width");

	// Container width
	var containerWidth = container.width();
	containerWidth *= containerResize; // % of the width
	elementGroup.width(containerWidth);
	container.css({ "minHeight": containerWidth});
	elementGroup.css({ "minHeight": containerWidth});

	// Only rect and circle must have height equal to width
	if(type == "rect" || type == "circle"){
		container.height(containerWidth);
		elementGroup.height(containerWidth);
	}

	if(type == "circle"){
		background.attr("r", containerWidth/2);
		background.attr("cx" ,containerWidth/2);
		background.attr("cy", containerWidth/2);

	} else if(type == "rect"){
		// Background Element Resize
		background.attr("x", strokeWidth);
		background.attr("y", strokeWidth);
		background.attr("width", containerWidth - strokeWidth*2);
		background.attr("height", containerWidth - strokeWidth*2);

		background.attr("rx", "10");
		background.attr("ry", "10");
		background.attr("stroke-width", "5");

	} else{
		console.log("Type '" + type + "' not recognised.");
	}

	// Resize Image
	imgWidth = containerWidth * imageResize;
	image.attr("width", imgWidth);
	image.attr("height", imgWidth);
	var translate = "translate(-"+ imgWidth/2 +", -"+ imgWidth/2 +")";
	image.attr("transform", translate);
	
	// Check if circle has text
	// if(isEmpty(text)){
		var fs = text.attr("font-size");

		// Avoid mozilla bug 874811
		if(text.width() != 0){
			while(text.width() < imgWidth){
				
				var newFontSize = Number(text.attr("font-size")) + 20;
				text.attr("font-size", newFontSize);
				// console.log("Text Width: " + text.width() + "++	ImageWidth: " + imgWidth);
			} 

			while(text.width() > imgWidth){
				
				var newFontSize = Number(text.attr("font-size")) - 5;
				text.attr("font-size", newFontSize);
				// console.log("Text Width: " + text.width() + "--	ImageWidth: " + imgWidth);
			} 
		}
	// }	
}

function resizeListImage(container){
	var elementGroup = container.children();
	var image = elementGroup.find("image");

	// Container width
	var containerWidth = container.width();// % of the width
	elementGroup.width(containerWidth);
	container.css({ "minHeight": containerWidth});
	elementGroup.css({ "minHeight": containerWidth+20});

	// Image Scale
	image.attr("width", containerWidth);
	image.attr("height", containerWidth);

	// Image Position
	image.attr("y", 20);
}

function resizeSlidingPanel(panel){
	// var bMargin = 15; // Bootstrap default margin for row
	// var parentActivityContainer = panel.parents("#activitycontainer");
	// var parentRow = panel.offsetParent();
	// var marginDifference = (parentActivityContainer.width() - parentRow.width())/2 - bMargin;
	// panel.width(parentActivityContainer.width() - bMargin*2);
	// panel.css("margin-left", -marginDifference);

}
