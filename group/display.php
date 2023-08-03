<?php 
  include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Updated Recipes</title>
  <style>
    /* Additional CSS styling for the table */
    .table {
      margin-top: 20px;
    }
    .table th {
      text-align: center;
    }
    .table td {
      vertical-align: middle;
    }
    .btn {
      padding: 5px 10px;
      margin: 2px;
    }
    .btn a {
      color: white;
      text-decoration: none;
    }
    .btn-delete {
      background-color: #dc3545;
    }
    .btn-update {
      background-color: #007bff;
    }
  </style>
</head>
<body>
  <a href="createrecipe.php" class="btn btn-primary" style="display: block; text-align: center;">Add New Recipe</a>
  <h1 class="text-center">Updated Recipe</h1>
  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Recipe Name</th>
        <th scope="col">Ingredients</th>
        <th scope="col">Instructions</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      // Retrieve data from the database
      $sql = "SELECT * FROM createrecipe";
      $result = mysqli_query($connect, $sql);
      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $recipename = $row['recipename'];
          $ingredients = $row['ingredients'];
          $instructions = $row['instructions'];
          echo "<tr>
                  <td>{$id}</td>
                  <td>{$recipename}</td>
                  <td>{$ingredients}</td>
                  <td>{$instructions}</td>
                  <td><button class='btn btn-delete'><a href='delete.php?deleteid={$id}'>Delete</a></button></td>
                  <td><button class='btn btn-update'><a href='update.php?updateid={$id}'>Update</a></button></td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No recipes found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>


