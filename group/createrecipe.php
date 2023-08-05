/*<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$recipename = $_POST['recipename'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    

	$sql = "INSERT INTO createrecipe(recipename,ingredients,instructions) VALUES('$recipename','$ingredients','$instructions')";
	$result = mysqli_query($connect,$sql);
	/*if ($result) {
		//echo "<div>Signup successful. Go to <a href='login.php'>Login</a></div>";*/
		header("location:display.php");
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipename = $_POST['recipename'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    // Handling image upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions for image
    $valid_extensions = array("jpg", "jpeg", "png", "gif");

    // Check if the uploaded file is a valid image
    if (in_array($imageFileType, $valid_extensions)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Image uploaded successfully, now insert the recipe data into the database
            $sql = "INSERT INTO createrecipe (recipename, ingredients, instructions, image) VALUES ('$recipename', '$ingredients', '$instructions', '$image')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                header("location: display.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($connect);
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Invalid file format. Allowed formats: " . implode(", ", $valid_extensions);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Recipe</title>
    <style>
        /* Internal CSS starts here */
	body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      background-position: center;
		    background-size: contain;
            border-image-width: 90%; background-image: url(image7.avif);
    }
    nav {
			display: flex;
			justify-content: center;
		}

	nav a {
			color: #fff;
			text-decoration: none;
			margin: 0 10px;
		}

	nav a:hover {
			text-decoration: underline;
		}
     header {
			background-color: #3262a8;
			color: #fff;
			padding: 10px;

		}
		main {
			padding: 10px;
		}
    

        main {
            padding: 20px;
        }

        .create-recipe {
            max-width: 600px;
            margin: 0 auto;
        }

        .create-recipe h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #f2f2f2;
            text-align: center;
            padding: 10px;
        }
        /* Internal CSS ends here */
    </style>
</head>
<body>
    <!-- The rest of your HTML code remains unchanged -->

<!-- ... Your existing HTML code ... -->

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

    <main>
        <section class="create-recipe">
            <h2>Create Recipe</h2>
            <form id="create-recipe-form" method="post">
                <label for="recipe-name">Recipe Name:</label>
                <input type="text" id="recipe-name" name="recipename" placeholder="Enter the recipe name" value="recipe-name">

                <label for="ingredients">Ingredients:</label>
                <textarea id="ingredients" name="ingredients" placeholder="Enter the ingredients" required></textarea>

                <label for="instructions">Instructions:</label>
                <textarea id="instructions" name="instructions" placeholder="Enter the cooking instructions" required></textarea>

                <label for="image">Choose an Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <input type="submit" value="Create Recipe" class="submit-button">
            </form>
            <form action="logout.php" method="post">
                <input type="submit" value="Logout" class="submit-button">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Recipe Sharing Platform. All rights reserved.</p>
    </footer>
</body>
</html>
