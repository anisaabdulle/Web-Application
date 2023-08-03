<?php 
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM createrecipe WHERE id=$id";
$result = mysqli_query($connect,$sql);
if ($result) {
	$row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $recipename = $row['recipename'];
    $ingredients = $row['ingredients'];
    $instructions = $row['instructions'];
}


if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $row['id'];
    $recipename = $row['recipename'];
    $ingredients = $row['ingredients'];
    $instructions = $row['instructions'];
}

	$sql = "UPDATE createrecipe set recipename='$recipename',ingredients='$ingredients',instructions='$instructions' WHERE id=$id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		//echo "updated successfully";
		header('location:createrecipe.php');
	} else{
		echo "not successful";
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Recipe Details</title>
</head>
<body>
	<h1 style="text-align: center;">Update</h1>
	<form method="post">
    <label for="recipe-name">Recipe Name:</label>
        <input type="text" id="recipe-name" name="recipename" placeholder="Enter the recipe name" value="<?php echo $recipename; ?>">

        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" placeholder="Enter the ingredients" required value="<?php echo $ingredients ?>"></textarea>

        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" placeholder="Enter the cooking instructions" required value="<?php echo $instructions ?>"></textarea>
	
		<input type="submit" name="submit" value="update">
	</form>
</body>
</html>