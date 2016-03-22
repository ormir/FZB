var sortingCircleContainer = $(".sortingcirclecontainer");

var svgCircleActivity =$("#circleactivity");
var svgCircleGroup =$("#circlegroup");
var svgCirclePlace =$("#circleplace");
var circleImage=$(".circleimage");

circleImage.attr("style","width: 80%");
sortingCircleContainer.attr("style","width: 25%;");

$(document).ready(function() {


	//resizeCircle(sortingCircleContainer);	
	sortingCircleContainer.click(function(){
	sortingCircleContainer.attr("style","border: 3px solid #e0dfdf;");
	var circle = $(this);
	circle.attr("style","border: 3px solid #ff0000;");
	});
	
		$("#createnewactivity").css("display","block");
		$("#createnewplace").css("display","none");
		$("#createnewgroup").css("display","none");
		
	
	
	svgCircleActivity.click(function(){
		$("#createnewactivity").css("display","block");
		$("#createnewplace").css("display","none");
		$("#createnewgroup").css("display","none");
	});
	
	svgCircleGroup.click(function(){
		$("#createnewactivity").css("display","none");
		$("#createnewplace").css("display","none");
		$("#createnewgroup").css("display","block");
	});
	
	svgCirclePlace.click(function(){
		$("#createnewactivity").css("display","none");
		$("#createnewplace").css("display","block");
		$("#createnewgroup").css("display","none");
	});
	
	
	
});

$( window ).resize(function() {
	resizeCircle(sortingCircleContainer);	
});