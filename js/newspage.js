var buttonPersons = document.getElementsByClassName("buttonpersons");
var adminBlog=document.getElementById("adminblog");
var moderatorBlog=document.getElementById("moderatorblog");
var integrationBlog=document.getElementById("integrationblog");

moderatorBlog.style.display="none";
integrationBlog.style.display="none";



function clickOnPerson(value)
{
	
	if(value==1)
	{
		integrationBlog.style.display="none";
		moderatorBlog.style.display="none";
		adminBlog.style.display="block";
	}
	if(value==2)
	{
		integrationBlog.style.display="none";
		adminBlog.style.display="none";
		moderatorBlog.style.display="block";
	}
	if(value==3)
	{
		moderatorBlog.style.display="none";
		adminBlog.style.display="none";
		integrationBlog.style.display="block";
	}
}