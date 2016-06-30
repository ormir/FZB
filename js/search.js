
var divPlace=$(".orte");
var divActivity=$(".activitaet");
var divGroup=$(".gruppe");
var divUser=$(".benutzer");

var checkPlace=$("#sPlace");
var checkActivity=$("#sActivity");
var checkGroup=$("#sGroup");
var checkUser=$("#sUser");


function showCheck(showVar,hideVar1,hideVar2,hideVar3,checkVar1,checkVar2,checkVar3)
{
		showVar.fadeIn();
		if(!checkVar1.prop('checked'))
		hideVar1.fadeOut();
		if(!checkVar2.prop('checked'))
		hideVar2.fadeOut();
		if(!checkVar3.prop('checked'))
		hideVar3.fadeOut();
}
function hideCheck(showVar,hideVar1,hideVar2,hideVar3,checkVar1,checkVar2,checkVar3)
{
		
		if(!checkVar1.prop('checked')&&!checkVar2.prop('checked')&&!checkVar3.prop('checked')){
			showVar.fadeIn();hideVar1.fadeIn();hideVar2.fadeIn();hideVar3.fadeIn();
		}
		else
			showVar.fadeOut();
		
}


$(document).ready(function(){

checkUser.change(function(){
	
	if(checkUser.prop('checked'))
	{
		showCheck(divUser,divGroup,divActivity,divPlace,checkGroup,checkActivity,checkPlace);
	}else
	{
		hideCheck(divUser,divGroup,divActivity,divPlace,checkGroup,checkActivity,checkPlace);
	}

});
checkActivity.change(function(){
	
	if(checkActivity.prop('checked'))
	{
		showCheck(divActivity,divGroup,divUser,divPlace,checkGroup,checkUser,checkPlace);
	}else
	{
		hideCheck(divActivity,divGroup,divUser,divPlace,checkGroup,checkUser,checkPlace);
	}
	
});
checkPlace.change(function(){
	
	if(checkPlace.prop('checked'))
	{
		showCheck(divPlace,divGroup,divActivity,divUser,checkGroup,checkActivity,checkUser);
	}else
	{
		hideCheck(divPlace,divGroup,divActivity,divUser,checkGroup,checkActivity,checkUser);
	}
	
});
checkGroup.change(function(){
	
	if(checkGroup.prop('checked'))
	{
		showCheck(divGroup,divUser,divActivity,divPlace,checkUser,checkActivity,checkPlace);
	}else
	{
		hideCheck(divGroup,divUser,divActivity,divPlace,checkUser,checkActivity,checkPlace);
	}
	
});
	
});