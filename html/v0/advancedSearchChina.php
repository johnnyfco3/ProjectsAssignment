<!DOCTYPE html>
<html lang="en-US">
<head>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
    <title>Page Title</title>
</head>
<body>
    <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
    <!-- NavBar Section -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Knowledge Base</a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          <a class="nav-link" href="advancedSearch.php">Advanced Search</a>
          <a class="nav-link" href="login.html">Login</a>
        </div>
      </div>
    </div>
  </nav> 

<!--Table Section -->
<?php
$conn = mysqli_connect("localhost","p_s21_5","n5or7p","p_s21_5_db");
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $fields = array('Plant_Name','English_Name','Chinese_Name','Parts_Used','Description','Habitat','Distribution','Indications','Dosage');
    $conditions = array();
    //loop through the defined fields
    foreach($fields as $field){
        //if the field is set and not empty
        if(isset($_POST[$field]) && $_POST[$field] != '') {
            //create a new condition while escaping the value inputed by the user (SQL Injection)
            $conditions[] = " `$field` LIKE '%" . mysqli_real_escape_string($conn,$_POST[$field]) . "%'";
        }
    }
    // builds the query 
    $query = "SELECT * FROM `book3-Medicinal_plants_in_China` ";
    //if there are conditions defined
    if(count($conditions) > 0) {
        // append the conditions
        $query .= "WHERE " . implode (' OR ', $conditions);//
    }
    echo "</br>";
    $result = mysqli_query($conn,$query);
}
?>
<div class="container-fluid">
<div class="table-responsive">
<table id="table" class="table table-sm table-striped">
 <thead>
  <tr>
      <th scope="col">Plant Name</th>
      <th scope="col">Chinese Name</th>
      <th scope="col">English Name</th>
      <th scope="col">Parts Used</th>
      <th scope="col">Description</th>
      <th scope="col">Habitat</th>
      <th scope="col">Distribution</th>
      <th scope="col">Indications</th>
      <th scope="col">Dosage</th>
      <th scope="col">Image Link</th>
  </tr>
 <thead>
 <tbody>
<?php 
while($row = mysqli_fetch_assoc($result)){
  echo "<tr>
      <td>{$row['Plant_Name']}</td>
      <td>{$row['Chinese_Name']}</td>
      <td>{$row['English_Name']}</td>
      <td>{$row['Parts_Used']}</td>
      <td>{$row['Description']}</td>
      <td>{$row['Habitat']}</td>
      <td>{$row['Distribution']}</td>
      <td>{$row['Indications']}</td>
      <td>{$row['Dosage']}</td>
      <td>
         <a class='btn btn-primary' href='/p/s21-05/{$row['Image_Link']}' role='button'>Plant Image</a>    
      </td>
    </tr>\n";
}
echo "</tbody>
</table>
</div>
</div>";
?>
</body>
</html>
