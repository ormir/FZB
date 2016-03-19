
document.getElementById("circlecreate").onclick=function () {
	window.location = "newactivity.php";
};
// var sortingCircleGroup = $("#circlegroup");
var sortingCircleGroupSvg = $(".sortingcircle");
var sqaureSvg = $(".square");
var arrowSvgLeft = $(".squarearrowsvgleft");
arrowSvgLeft.attr("height","170");
var arrowSvgRight = $(".squarearrowsvgright");
arrowSvgRight.attr("height","170");
var squareContainer = $(".squarecontainer");
var sortingCircleSvg= $(".sortingcirclesvg");
var divActivity = document.getElementById("activitycontent");
var divGroup= document.getElementById("groupcontent");
var divPlace= document.getElementById("placecontent");

divPlace.style.display="none";
divGroup.style.display="none";
divActivity.style.display="block";

// sorting Circle Group SVG Children
 $(".circleText").attr("style","display: none;");
 $(".squareText").attr("style","display: none;");
 // $("#squarecoffeelist").attr("style","display: none;");
 $(".squarelist").attr("style","display: none;");




$(document).ready(function() {
	// Resize Elements
	resizeCircle($(".sortingcirclecontainer"));	
	resizeElement($(".squarecontainer"), "rect", 0.8, 0.8);
	


	// Slide elements
	squareSlide($("#squarecoffee"), $("#squarecoffeelist"), $(".squarelist"));
	squareSlide($("#squarecinema"), $("#squarecinemalist"), $(".squarelist"));
	squareSlide($("#squaremusic"), $("#squaremusiclist"), $(".squarelist"));
	squareSlide($("#squarebook"), $("#squarebooklist"), $(".squarelist"));
	squareSlide($("#squaretheatre"), $("#squaretheatrelist"), $(".squarelist"));
	squareSlide($("#squarefootball"), $("#squarefootballlist"), $(".squarelist"));
	squareSlide($("#squarezoo"), $("#squarezoolist"), $(".squarelist"));
	squareSlide($("#squaredance"), $("#squaredancelist"), $(".squarelist"));
	
	
	arrowSvgLeft.click(function(){
		var thisElementId = getSquareSlideFlipClick();
		var elementId="#"+ squareContainer[0].getAttribute("id");
		if(!(thisElementId==elementId))
		{
			var i;
			for(i=0; i<squareContainer.length;i++)
			{
				elementId="#"+ squareContainer[i].getAttribute("id");
				if(thisElementId==elementId)
				{
					break;
				}
			}
			i--;
			if(i>=0)
			 squareContainer[i].click();
		}
		 
		 // var idd= squareContainer[0].getAttribute("id");
	});
	arrowSvgRight.click(function(){
		var squareContainerLength= Number( squareContainer.length-1);
		var thisElementId = getSquareSlideFlipClick();
		var elementId="#"+ squareContainer[squareContainerLength].getAttribute("id");
		if(!(thisElementId==elementId))
		{
			var i;
			for(i=0; i<squareContainer.length;i++)
			{
				elementId="#"+ squareContainer[i].getAttribute("id");
				if(thisElementId==elementId)
				{
					break;
				}
			}
			i++;
			if(i<=squareContainerLength)
			 squareContainer[i].click();
		}
		
	});
	
	
	var duration=150;
	
	sortingCircleGroupSvg.mouseenter(function(){
		var elementOverImg =  $(this).next();
		var elementOverText = elementOverImg.next();
		
		elementOverImg.stop();
		elementOverText.stop();

		elementOverImg.fadeOut();
		elementOverText.fadeIn();

		//elementOverImg.hide(duration);
		//elementOverText.show(duration); 
		
	});
	
	sqaureSvg.mouseenter(function(){
		var elementOverImg =  $(this).next();
		var elementOverText = elementOverImg.next();
		
		elementOverImg.stop();
		elementOverText.stop();

		

		elementOverImg.fadeOut();
		elementOverText.fadeIn();
		//elementOverImg.hide(duration);
		//elementOverText.show(duration); 
	});
	   
	sortingCircleGroupSvg.mouseleave(function(){
		
		var elementOverImg = $(this).next();
		var elementOverText = elementOverImg.next();
		 if(!elementOverText.is(":hover")&&!elementOverImg.is(":hover")){
			
			elementOverImg.stop();
			elementOverText.stop();


			elementOverImg.fadeIn();
			elementOverText.fadeOut();
			//elementOverImg.show(duration);
			//elementOverText.hide(duration); 
		 }
	});
		sqaureSvg.mouseleave(function(){
		
		var elementOverImg = $(this).next();
		var elementOverText = elementOverImg.next();
		 if(!elementOverText.is(":hover")&&!elementOverImg.is(":hover")){
			
			elementOverImg.stop();
			elementOverText.stop();

			elementOverText.fadeIn();

			elementOverImg.fadeIn();
			elementOverText.fadeOut();
			//elementOverImg.show(duration);
			//elementOverText.hide(duration); 
		 }
	});
	sortingCircleSvg.click(function(){
		var textSvg=$(this).children();
		var textSvgContent= textSvg[2].innerHTML;
		var aa = $(".circleText")[0].innerHTML;
		
		if(textSvgContent=="Aktivit\u00e4t")
		{
			divPlace.style.display="none";
			divGroup.style.display="none";
			divActivity.style.display="block";
		}
		if(textSvgContent=="Gruppe")
		{
			divPlace.style.display="none";
			divActivity.style.display="none";
			divGroup.style.display="block";
		}
		if(textSvgContent=="Orte")
		{
			divActivity.style.display="none";
			divGroup.style.display="none";
			divPlace.style.display="block";
			
		}

		
	});

	
});

$( window ).resize(function() {
	resizeCircle($(".sortingcirclecontainer"));	
	resizeElement($(".squarecontainer"), "rect", 0.8, 0.8);
});