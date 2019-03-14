<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		
		
/*body css*/
body {
	font-family: source-sans-pro;
	background-color: #f2f2f2;
	margin-top: 15px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	font-style: normal;
	font-weight: 200;
}		
		

/*container css*/
#container {
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	background-color: #FFFFFF;
	overflow: hidden;
	
}		

		#logo{
			float: left;
			
		}
		
		#login{
			overflow: hidden;
			padding: 30px 30px 30px 30px;
		}
		

		form {
		  border: 3px solid #f1f1f1;
		}

		/* Full-width inputs */
		input[type=text], input[type=password] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}

		<!--Set a style for all buttons-->
		button {
		  background-color: black;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		}

		<!--Add a hover effect for the buttons (change colour)-->
		button:hover {
		  opacity: 0.8;
		}

		}	
		

		
</style>
	
<div id="container" style="background-color:#ffffff">

<form action="main/home">

  
	  
	  <div id="logo">
	  
		<img src="../../assets/images/MICE_LOGO.jpg" alt="MICE_LOGO" height="260" width="380">
	  
	  </div>
	  
	  
	  <div id="login" align="center">
    		<label for="uname"><b>Username</b></label>
    		<input type="text" placeholder="Enter Username" name="uname" required>

   			<label for="psw"><b>Password</b></label>
    		<input type="password" placeholder="Enter Password" name="psw" required>

    		<button type="submit">Login</button>
	  </div>
	</div>

</form> 

</head>
<body>
