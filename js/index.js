
document.getElementById("circlecreate").onclick=function () {
	window.location = "newactivity.php";
};
// var sortingCircleGroup = $("#circlegroup");
var sortingCircleGroupSvg = $(".sortingcirclecontainer");
var sqaureSvg = $(".square");
var arrowSvgLeft = $(".squarearrowsvgleft");
arrowSvgLeft.attr("height","170");
var arrowSvgRight = $(".squarearrowsvgright");
arrowSvgRight.attr("height","170");
var squareContainer = $(".squarecontainer");
var divActivity = document.getElementById("activitycontent");
var divGroup= document.getElementById("groupcontent");
var divPlace= document.getElementById("placecontent");
var offMaps= $("#map");
var mapShow=false;
var stopAnimation=false;
divPlace.style.display="none";
divGroup.style.display="none";
divActivity.style.display="block";
//Hide Maps default
offMaps.attr("style","display: none;");

//Sortier Circle Text 
$(".sortiertext").attr("style","display: none;");
sortingCircleGroupSvg.attr("style","width:11.5%;");
squareContainer.attr("style","width:10%; margin-top:2%;");
$("#squarecoffeelist").attr("style","display:none;")


$(document).ready(function() {
	// Resize Elements
//	resizeCircle($(".sortingcirclecontainer"));	
//	resizeElement($(".squarecontainer"), "rect", 0.8, 0.8);
	
	//Windowsize
	//var windowheight = $(window).height();
	//console.log(windowheight);

	//Toggle Maps



    $("#hidemaps").click(function(){
    	offMaps.stop();
    	stopAnimation=true;
        offMaps.slideToggle("slow",function(){stopAnimation=false;});
        5
        if(!mapShow)
        	mapShow=true;
        else
        	mapShow=false;

    });

	// Slide elements
	squareSlide($("#squarecoffee"), $("#squarecoffeelist"), $(".squarelist"));
	
	
	
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
		var elementOverImg =  $(this).children(".sortierimage");
		var elementOverText = $(this).children(".sortiertext");
		
		//hide or Show the object(Text or Image)
		hideShow(elementOverImg,elementOverText);

	});
	
	$(".squarecontainer").mouseenter(function(){
		var elementOverImg =  $(this).children(".activityimage");
		var elementOverText = $(this).children(".sortiertext");

		hideShow(elementOverImg,elementOverText);

	});
	   
	sortingCircleGroupSvg.mouseleave(function(){
		
		var elementOverImg =  $(this).children(".sortierimage");
		var elementOverText = $(this).children(".sortiertext");
		 if(!elementOverText.is(":hover")&&!elementOverImg.is(":hover")){

		hideShow(elementOverText,elementOverImg);
			
		 }
	});
		$(".squarecontainer").mouseleave(function(){
		
		var elementOverImg =  $(this).children(".activityimage");
		var elementOverText = $(this).children(".sortiertext");
		 if(!elementOverText.is(":hover")&&!elementOverImg.is(":hover")){
			
			hideShow(elementOverText,elementOverImg);
		 }
	});
	sortingCircleGroupSvg.click(function(){
		
		var textSvgContent= $(this).children(".sortiertext").html();
		
		
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
//function which hides or shows the Object Text or Image
function hideShow(oHide,oShow)
{
		oHide.stop();
		oShow.stop();
		oHide.fadeOut("fast",function(){
		oShow.fadeIn("fast");
		if(oShow.attr('class')=="sortiertext")
		{
			if(!mapShow){
				if(oHide.attr('class')=="sortierimage")
					oShow.attr("style","height:103px; padding-top:30%;");
				else
					oShow.attr("style","height:61px; padding-top:29%;");
			}else
			{
				if(oHide.attr('class')=="sortierimage")
					oShow.attr("style","height:103px; padding-top:30%;");
				else
					oShow.attr("style","height:61px; padding-top:29%;");

			}

		}
		});

}


/*$( window ).resize(function() {
	console.log($(window).height()+":::::::: "+$(window).width());

<<<<<<< HEAD
$( window ).resize(function() {

	//console.log($(window).height()+":"+$(window).width());
	if($(window).width() < 600){
		console.log(1);
	}

=======
>>>>>>> refs/remotes/origin/SVG_IMG
	resizeCircle($(".sortingcirclecontainer"));	
	resizeElement($(".squarecontainer"), "rect", 0.8, 0.8);
});*/