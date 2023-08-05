<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$useremail = $_POST['useremail'];
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    

	$sql = "INSERT INTO recipe(useremail,username,userpassword) VALUES('$useremail','$username','$userpassword')";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		//echo "<div>Signup successful. Go to <a href='login.php'>Login</a></div>";
		header("location:recipe.html");
	} else{
		echo "not successful";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
    /* Internal CSS starts here */
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      background-color:white;
      background-position: center;
		  background-size: cover;
      border-image-width: 90%; 
      background-image: url(image7.avif);
    }

    header {
      background-color: #3262a8;
      color: #353739;
      padding: 10px;
    }

    nav {
      display: flex;
      justify-content: center;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .centered-heading {
      text-align: center;
    }
    

    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 3px solid #3d3d3d;
      border-radius: 30px;
      background-color: #b3b9bd;
    }

    .login label {
      display: block;
      margin-bottom: 5px;
    }

    .login input[type="text"],
    .login input[type="email"],
    .login input[type="password"],
    .login input[type="name"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .login input[type="submit"] {
      background-color:black;
      color: black;
      cursor: pointer;
    }

    .login input[type="submit"]:hover {
      background-color:black;
    }
    /* Assuming you have a class "centered-button" in your CSS */
.centered-button {
  /* Add your desired styles here */
  display: block;
  margin: 0 auto; /* This centers the button horizontally */
  padding: 10px 20px;
  background-color:white;
  color:black;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}
    /* Internal CSS ends here */
  </style>
</head>
<body>
  <header>
<nav>
			<a href="recipehome.html">Home</a>
			<a href="recipeabout.html">About</a>
			<a href="recipe.html">Recipes</a>
      <a href="profile.html">User Profile</a>
			<a href="adminmodule.html">Admin Module</a>
		</nav>
  </header>
<h2 class="centered-heading">Sign Up</h2>

  <form method="post" >
    <div class="login">
    <label>Username</label>
    <input type="name" name="username" placeholder="Enter Name"><br>
    <label>Email</label>
    <input type="email" name="useremail" placeholder="Enter Email"><br>
    <label>Password</label>
    <input type="password" name="userpassword" placeholder="Enter Password"><br> 

    <button type="submit" class="centered-button">Sign Up</button><br>
   
    </div> 
  </form>
</body>
</html>
