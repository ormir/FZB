// Initalisation of graphical elements
var loginInputEmail = document.getElementById("logininputEmail");
var loginInputPassword = document.getElementById("logininputPassword");
var loginCheck = document.getElementById("logincheck");
var loginBtn = document.getElementById("loginbtn");

var regName = document.getElementById("regname");
var regLastName = document.getElementById("reglastname");
var regEmail = document.getElementById("regemail");
var regBDay = document.getElementById("regbday");
var regPlace = document.getElementById("regplace");
var regPass = document.getElementById("regpass");
var regCheck = document.getElementById("regcheck");
var regButton = document.getElementById("regbutton");

// Vaulues for Developers
// Delete in end product
loginInputEmail.value="team@a";
loginInputPassword.value="1234";

loginInputEmail.style.display="none";
loginInputPassword.style.display="none";
loginCheck.style.display="none";
loginBtn.style.display="none";

regName.style.display="none"; //regname
regLastName.style.display="none"; // reglastname
regEmail.style.display="none"; // regemail
regBDay.style.display="none"; // regbday
regPlace.style.display="none"; // regplace
regPass.style.display="none"; // regpass
regCheck.style.display="none"; // regcheck
regButton.style.display="none"; // regbutton

document.getElementById("containerlogin").setAttribute("onmouseover","bgBlurIn(true)");
document.getElementById("containerlogin").setAttribute("onmouseout","bgBlurOut(true)");
document.getElementById("containerregister").setAttribute("onmouseover","bgBlurIn(false)");
document.getElementById("containerregister").setAttribute("onmouseout","bgBlurOut(false)");

var loginBackground= document.getElementById("loginbg");
var registerBackground=document.getElementById("registerbg");

var isAnimating=false;
var loginSelected=false;
var registerSelected=false; 

var beginBlur=true;

//Zähle 1-100
for(var di=1;di<101;di++)
{
	//Tage
	if(di<32)
	{
		var opt = document.createElement("option");
		opt.value= di;
		opt.innerHTML = di;
		
		document.getElementById("regday").appendChild(opt);
		
	}
	//Monate
		if(di<13)
	{
		var opt = document.createElement("option");
		opt.value= di;
		opt.innerHTML = di;
		
		document.getElementById("regmonth").appendChild(opt);
		
	}
	//Jahre
		if(di<101)
	{
		var d = new Date();
		var opt = document.createElement("option");
		var n= d.getFullYear()-101;
		var addyear =n+di;
		
		opt.value= addyear;
		opt.innerHTML = addyear;
		
		document.getElementById("regyear").appendChild(opt);
		
	}
	//Bezirke
	if(di<24)
	{
		var opt = document.createElement("option");
		opt.value= (100+di)*10;
		opt.innerHTML = (100+di)*10;
		document.getElementById("selbezirk").appendChild(opt);
	}
	
}

/*
Blur flemch
*/

function bgBlurOut(bgBlur)
{
	
	if(beginBlur)
	{
				//BlurOut, Login
			if(bgBlur){	
				loginBackground.style.filter="blur(0px)";
				loginBackground.style["-webkit-filter"] ="blur(0px)";
				loginBackground.style["-ms-filter"] ="blur(0px)";
				loginBackground.style["-o-filter"] ="blur(0px)";
				loginBackground.style["-moz-filter"] ="blur(0px)";
			}
			//BlurOut,Register
			else if(!bgBlur )
			{
				registerBackground.style.filter="blur(0px)";
				registerBackground.style["-webkit-filter"] ="blur(0px)";
				registerBackground.style["-ms-filter"] ="blur(0px)";
				registerBackground.style["-o-filter"] ="blur(0px)";
				registerBackground.style["-moz-filter"] ="blur(0px)";
			}
		
	}else{
			//BlurOut, Login
			if(!loginSelected ){	
				loginBackground.style.filter="blur(0px)";
				loginBackground.style["-webkit-filter"] ="blur(0px)";
				loginBackground.style["-ms-filter"] ="blur(0px)";
				loginBackground.style["-o-filter"] ="blur(0px)";
				loginBackground.style["-moz-filter"] ="blur(0px)";
			}
			//BlurOut,Register
			else if(!registerSelected)
			{
				registerBackground.style.filter="blur(0px)";
				registerBackground.style["-webkit-filter"] ="blur(0px)";
				registerBackground.style["-ms-filter"] ="blur(0px)";
				registerBackground.style["-o-filter"] ="blur(0px)";
				registerBackground.style["-moz-filter"] ="blur(0px)";
			}
	}
}

function bgBlurIn(bgBlur)
{
	
	if(beginBlur){
	
	if(bgBlur ){
		loginBackground.style.filter="blur(5px)";
		loginBackground.style["-webkit-filter"] ="blur(5px)";
		loginBackground.style["-ms-filter"] ="blur(5px)";
		loginBackground.style["-o-filter"] ="blur(5px)";
		loginBackground.style["-moz-filter"] ="blur(5px)";
	}
	
	else if(!bgBlur)
	{
		registerBackground.style.filter="blur(5px)";
		registerBackground.style["-webkit-filter"] ="blur(5px)";
		registerBackground.style["-ms-filter"] ="blur(5px)";
		registerBackground.style["-o-filter"] ="blur(5px)";
		registerBackground.style["-moz-filter"] ="blur(5px)";
	
	}
	
	}else
	{
			if(loginSelected){
				loginBackground.style.filter="blur(5px)";
				loginBackground.style["-webkit-filter"] ="blur(5px)";
				loginBackground.style["-ms-filter"] ="blur(5px)";
				loginBackground.style["-o-filter"] ="blur(5px)";
				loginBackground.style["-moz-filter"] ="blur(5px)";
			}
			
			else if(registerSelected)
			{
				registerBackground.style.filter="blur(5px)";
				registerBackground.style["-webkit-filter"] ="blur(5px)";
				registerBackground.style["-ms-filter"] ="blur(5px)";
				registerBackground.style["-o-filter"] ="blur(5px)";
				registerBackground.style["-moz-filter"] ="blur(5px)";
			
			}
	}
	
	
	

}




	$(document).ready(function(){
    $("#containerlogin").click(function(){
		
		if(!isAnimating){
			isAnimating=true;
			
			//Bluren auf einer Seite zulassen, bei Klick.
			loginSelected=true;
			registerSelected=false;
			
			//LoginBlur activated
			bgBlurIn(true);
			bgBlurOut(false);
			
			beginBlur=false;

			//Register Fadeout
			$("#regname").fadeOut();
			$("#reglastname").fadeOut();
			$("#regemail").fadeOut();
			$("#regbday").fadeOut();
			$("#regplace").fadeOut();
			$("#regpass").fadeOut();
			$("#regcheck").fadeOut();
			$("#regbutton").fadeOut();
			
			//Login FadeIn
			$("#logininputEmail").fadeIn();
			$("#logininputPassword").fadeIn();
			$("#logincheck").fadeIn();
			$("#loginbtn").fadeIn();
			setTimeout(function(){ isAnimating=false; }, 1000);
		}
			
		
		
    });
	
	$("#containerregister").click(function(){
		
		if(!isAnimating)
		{
			isAnimating=true;
			
			//Bluren auf einer Seite zulassen, bei Klick.
			loginSelected=false;
			registerSelected=true;
			
			bgBlurIn(false);
			bgBlurOut(true);
			
			beginBlur=false;
			
			$("#logininputEmail").fadeOut();
			$("#logininputPassword").fadeOut();
			$("#logincheck").fadeOut();
			$("#loginbtn").fadeOut();
			
			$("#registertitel").fadeIn();
			$("#regname").fadeIn();
			$("#reglastname").fadeIn();
			$("#regemail").fadeIn();
			$("#regbday").fadeIn();
			$("#regplace").fadeIn();
			$("#regpass").fadeIn();
			$("#regcheck").fadeIn();
			$("#regbutton").fadeIn();
			setTimeout(function(){ isAnimating=false; }, 1000);
		}
	
    });
});

function bklick()
{
	var email; var pasw;var myForm;	
	
	email=loginInputEmail.value;
	pasw= loginInputPassword.value;
	myForm= document.getElementById("loginform");

	if(email=="team@a" && pasw=="1234")
	{
		myForm.setAttribute("action","index.html");
	}

    

}

function divclicks(divs)
{
	if(divs==1)
	{
		
	}

}
