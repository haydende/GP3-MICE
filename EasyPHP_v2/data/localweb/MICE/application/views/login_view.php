<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>

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

<form action="main/home">

  <div class="container" align='center'>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>

  </div>

</form> 

</head>
<body>
