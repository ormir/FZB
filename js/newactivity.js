var sortingCircleContainer = $(".sortingcirclecontainer");
var sortingCircleSvg = $(".sortingcirclesvg");
var allCircle=sortingCircleSvg.children("circle");
var svgCircleActivity =$("#svgcircleactivity");
var svgCircleGroup =$("#svgcirclegroup");
var svgCirclePlace =$("#svgcircleplace");


$(document).ready(function() {
	resizeCircle(sortingCircleContainer);	
	sortingCircleSvg.click(function(){
	allCircle.attr("stroke","#e0dfdf");
	var circle = $(this).children("circle");
	circle.attr("stroke","#ff0000");
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