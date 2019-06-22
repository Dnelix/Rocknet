/* function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "email"){
		rx = /[' "]/gi;
	} else if(elem == "logemail"){
		rx = /[' "]/gi;
	} else if(elem == "e"){
		rx = /[' "]/gi;
	} else if(elem == "phone"){
		rx = /[^0-9]/gi;
	} else if(elem == "repcontactphone"){
		rx = /[^0-9]/gi;
	} else if(elem == "username"){
		rx = /[^a-z0-9]/gi;
	} else if(elem == "discount"){
		rx = /[^0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
function emptyElement(x){
	_(x).innerHTML = "";
}

function checkusername(){
	var u = _("username").value;
	if(u != ""){
		_("unamestatus").innerHTML = 'checking <img src="fbksmall.gif"/>';
		_("signupbtn").disabled = true;
		var ajax = ajaxObj("POST", "signup.php"); //this sends the POST request to "signup.php"
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
				_("signupbtn").disabled = false;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
function checkemail(){
	var e = _("email").value;
	if(e != ""){
		_("emailstatus").innerHTML = 'checking <img src="fbksmall.gif"/>';
		_("signupbtn").disabled = true;
		var ajax = ajaxObj("POST", "signup.php"); //this sends the POST request to "signup.php"
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("emailstatus").innerHTML = ajax.responseText;
				_("signupbtn").disabled = false;
	        }
        }
        ajax.send("emailcheck="+e);
	}
}
function checkphone(){
	var p = _("phone").value;
	if(p != ""){
		_("phonestatus").innerHTML = 'checking... <img src="fbksmall.gif"></img>';
		_("signupbtn").disabled = true;
		var ajax = ajaxObj("POST", "signup.php"); //this sends the POST request to "signup.php"
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("phonestatus").innerHTML = ajax.responseText;
				_("signupbtn").disabled = false;
	        }
        }
        ajax.send("phonecheck="+p);
	}
}
function signup(){
	var u = _("username").value;
	var e = _("email").value;
	var p = _("phone").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;

	var status = _("status");
	
	if(u == "" || e == "" || p == "" || p1 == "" || p2 == ""){
		status.innerHTML = "Fill out all of the form data";
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else if(_("terms").checked != 1){
		status.innerHTML = "You must accept Terms & Conditions to signup";
	} else {
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait <img src="fbksmall.gif"/>';
		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "Thanks for registering. Please check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to make posts on this site until you successfully activate your account.";
				}
			
			}
        }
        ajax.send("u="+u+"&e="+e+"&p="+p+"&pw="+p1);
	}
} */
/*
function logcheck(){
	var un = _("un").value;
	var pw = _("pw").value;
	if(un == "" || pw == ""){
		_("stat").innerHTML = "Fill out all of the form data";
		return false;
	} else {
		_("loginbtn").style.display = "none";
		_("stat").innerHTML = 'please wait <img src="img/fbksmall.gif"/>';
		var ajax = ajaxObj("POST", "login.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("stat").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn").style.display = "block";
				} else {
				   	window.location = "index.php?u="+ajax.responseText;
				}
	        }
        }
        ajax.send("u="+un+"&p="+pw);
		return true;
		}
	}
/*function addEvents(){
	_("oldamt").addEventListener("click", func, false);
}
window.onload = addEvents;*/

/*-----------------------##########################################################################################------------------------------*
function login2(){
	var e = _("email").value;
	var p = _("password").value;
	if(e == "" || p == ""){
		_("status").innerHTML = "Fill out all of the form data";
	} else {
		_("loginbtn2").style.display = "none";
		_("status").innerHTML = 'please wait <img src="fbksmall.gif"/>';
		var ajax = ajaxObj("POST", "login.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("status").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn2").style.display = "block";
				} else {
					window.location = "index.php?u="+ajax.responseText;
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
/*-----------------------##########################################################################################------------------------------*
function loginfromhome(){
	var e = _("logemail").value;
	var p = _("logpassword").value;
	if(e == "" || p == ""){
		_("logstatus").innerHTML = "Fill out all of the form data";
	} else {
		_("loginbtn2").style.display = "none";
		_("logstatus").innerHTML = 'please wait <img src="img/fbksmall.gif"/>';
		var ajax = ajaxObj("POST", "user/login.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("logstatus").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn2").style.display = "block";
				} else {
					window.location = "user/index.php?u="+ajax.responseText;
				} 
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
/*-----------------------##########################################################################################------------------------------*
function forgotpass(){
	var em = _("em").value;
 	if(em == ""){
		_("stat").innerHTML = "Type in your email address";
	} else {
		_("forgotpassbtn").style.display = "none";
		_("stat").innerHTML = 'please wait <img src="fbk.gif"/>';
		var ajax = ajaxObj("POST", "forgot_password.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
				var response = ajax.responseText;
				if(response == "success"){
					_("forgotpassform").innerHTML = '<h3>Step 2. Check your email inbox in a few minutes</h3><p>You can close this window or tab if you like.</p><p>';
				} else if (response == "no_exist"){
					_("stat").innerHTML = "Sorry that email address is not in our system";
				} else if(response == "email_send_failed"){
					_("stat").innerHTML = "Mail function failed to execute";
				} else {
					_("stat").innerHTML = "An unknown error occurred"+ajax.responseText;
				}
	        }
        }
        ajax.send("e="+em);
	}
}
/*-----------------------##########################################################################################------------------------------*
function checkusername2(){
	var u = _("username").value;
	if(u != ""){
		_("unamestatus").innerHTML = 'checking <img src="img/fbksmall.gif"/>';
		_("signupbtn").disabled = true;
		var ajax = ajaxObj("POST", "user/signup.php"); //this sends the POST request to "signup.php"
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
				_("signupbtn").disabled = false;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
/*-----------------------##########################################################################################------------------------------*
function checkemail2(){
	var e = _("email").value;
	if(e != ""){
		_("emailstatus").innerHTML = 'checking <img src="img/fbksmall.gif"/>';
		_("signupbtn").disabled = true;
		var ajax = ajaxObj("POST", "user/signup.php"); //this sends the POST request to "signup.php"
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("emailstatus").innerHTML = ajax.responseText;
				_("signupbtn").disabled = false;
	        }
        }
        ajax.send("emailcheck="+e);
	}
}
/*-----------------------##########################################################################################------------------------------*
function checkphone2(){
	var p = _("phone").value;
	if(p != ""){
		_("phonestatus").innerHTML = 'checking... <img src="img/fbksmall.gif"></img>';
		_("signupbtn").disabled = true;
		var ajax = ajaxObj("POST", "user/signup.php"); //this sends the POST request to "signup.php"
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("phonestatus").innerHTML = ajax.responseText;
				_("signupbtn").disabled = false;
	        }
        }
        ajax.send("phonecheck="+p);
	}
}

/*-----------------------##########################################################################################------------------------------*
function updateprofile(){
	var u_n = _("u_n").value;
	var e_m = _("e_m").value;
	var f_n = _("fname").value;
	var l_n = _("lname").value;
	var w = _("website").value;
	var a = _("address").value;

	var status = _("updatestatus");
	
	if(u_n == "" || f_n == "" || l_n == "" || a == ""){
		status.innerHTML = "<font color='red'>You have not completed all the required fields</font>";
	} else {
		_("update_buttons").style.display = "none";
		status.innerHTML = 'please wait <img src="fbksmall.gif"/>';
		var ajax = ajaxObj("POST", "profile.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "update_success"){
					status.innerHTML = ajax.responseText;
					_("update_buttons").style.display = "block";
				} else {
					_("profileForm").innerHTML = "Congratulations, your details have been updated sucessfully";
				}
			}
        }
        ajax.send("u_n="+u_n+"&e_m="+e_m+"&f_n="+f_n+"&l_n="+l_n+"&w="+w+"&a="+a);
	}
}
/*-----------------------##########################################################################################------------------------------*
function updatepassword(){
	var n_p = _("n_p").value;
	var c_p = _("c_p").value;

	var status = _("pwupdatestatus");
	
	if(n_p == "" || c_p == ""){
		status.innerHTML = "<font color='red'>You have not completed all the required fields</font>";
	} else if (n_p != c_p){
		status.innerHTML = "<font color='red'>Your password fields does not match</font>";
	} else {
		_("pwbuttons").style.display = "none";
		status.innerHTML = 'please wait <img src="fbksmall.gif"/>';
		var ajax = ajaxObj("POST", "changepw.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "change_success"){
					status.innerHTML = ajax.responseText;
					_("pwbuttons").style.display = "block";
				} else {
					_("changepwform").innerHTML = "Congratulations, your details have been updated sucessfully";
				}
			}
        }
        ajax.send("n_p="+n_p+"&c_p="+c_p);
	}
}

/*-----------------------##########################################################################################------------------------------*
function contactus(){
	var n = _("contactname").value;
	var e = _("e").value;
	var p = _("contactphone").value;
	var s = _("subj").value;
	var m = _("comments").value;
	var status = _("statusz");
	if(n == "" || m == "" || p == "" || s == ""){
		status.innerHTML = "<strong style='color:#F00;'>Please fill out all the required data</strong>";
	} 
	else {
		/* _("submitbtn").style.display = "none"; *
		status.innerHTML = 'please wait... <img src="ajax-loader.gif"></img>';
		var ajax = ajaxObj("POST", "contact.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "success"){
					status.innerHTML = ajax.responseText;
					/* _("submitbtn").style.display = "block"; *
				} else {
					_("contactform").innerHTML = "<strong style='color:#0a0;'>Thank You "+n+", for contacting us. We will reply you promptly via email: <u>"+e+"</u> or message you on: "+p+"</strong>";
				}
			}
        }
        ajax.send("n="+n+"&e="+e+"&p="+p+"&s="+s+"&m="+m);
	}
}