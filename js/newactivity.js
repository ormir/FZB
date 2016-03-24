var sortingCircleContainer = $(".sortingcirclecontainer");

var svgCircleActivity =$("#circleactivity");
var svgCircleGroup =$("#circlegroup");
var svgCirclePlace =$("#circleplace");
var circleImage=$(".circleimage");
var formularObjekte=$(".formular");


circleImage.attr("style","width: 80%;border: 3px solid #e0dfdf;border-radius:100%;background-color:#a7ce39;");

sortingCircleContainer.attr("style","width: 25%; background-color:white;border:0;");
formularObjekte.attr("style","height:2%;");
$(".datetime").attr("style","height:2%;width:50%;");

	$("#newactivityimage").attr("style","width: 80%;border: 3px solid #ff0000;border-radius:100%;background-color:#a7ce39;");

$(document).ready(function() {


	//resizeCircle(sortingCircleContainer);	
	sortingCircleContainer.click(function(){
	circleImage.attr("style","width: 80%;border: 3px solid #e0dfdf;border-radius:100%;background-color:#a7ce39;");
	var circle = $(this).children("img");
	circle.attr("style","width: 80%;border: 3px solid #ff0000;border-radius:100%;background-color:#a7ce39;");
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
/*$( window ).resize(function() {
	resizeCircle(sortingCircleContainer);	
});*/