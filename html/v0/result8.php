<?php
    #session_start();
    #require "config.php";
    require "home.php";
    error_reporting(0);
?>

<!DOCTYPE html>
<!--Written By Adriel Martinez-->
<html lang="en-US">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Results Page</title>
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
  <div class="container-fluid">
    <h2>
      <strong>Result:</strong>
    </h2>
  </div>

  <div class="container-fluid">
            <div class="table-responsive">              
                <table id="table" class="table table-sm table-striped">
                  <thead>
                    <tr class="d-flex">
                      <th scope="col" class="col-2">Plant Name</th>
                      <th scope="col" class="col-2">Local Name</th>
                      <th scope="col" class="col-2">English Name</th>
                      <th scope="col" class="col-2">Description</th>
                      <th scope="col" class="col-2">Distribution</th>
                      <th scope="col" class="col-2">Habitat</th>
                      <th scope="col" class="col-2">Traditional Uses</th>
                      <th scope="col" class="col-2">Constituents</th>
                      <th scope="col" class="col-2">Biological Activity</th>
                      <th scope="col" class="col-3">Image Link</th>
                    </tr>
                    <thead>
                    <tbody>
                      <?php
            $Plant_Name = "";
            $Local_Name = "";
            $English_Name = "";
            $Description = "";
            $Distribution = "";
            $Constituents = "";
            $Habitat = "";
            $Traditional_Uses = "";
            $Biological_Activity = "";
            $Image_Link = "";
            $selected_val = "";
            if(isset($_POST['submit'])){
                $selected_val = $_POST['englishName'];
            }
            $sql = "SELECT * FROM `book4-Medicinal_plants_South_Pacific` WHERE English_Name LIKE '$selected_val'";
            $result = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_assoc($result)){
            echo "<tr class='d-flex'>
                    <td class='col-2'>{$row['Plant_Name']}</td>
                    <td class='col-2'>{$row['Local_Name']}</td>
                    <td class='col-2'>{$row['English_Name']}</td>
                    <td class='col-2'>{$row['Description']}</td>
                    <td class='col-2'>{$row['Distribution']}</td>
                    <td class='col-2'>{$row['Habitat']}</td>
                    <td class='col-2'>{$row['Traditional_Uses']}</td>
                    <td class='col-2'>{$row['Constituents']}</td>
                    <td class='col-2'>{$row['Biological_Activity']}</td>
                    <td class='col-3'>
                        <a class='btn btn-primary' href='/p/s21-05/{$row['Image_Link']}' role='button'>Plant Image</a>    
                    </td> 
                    </tr>\n";
        }
                echo "</tbody>
        </table>
        </div>
        </div>";
        ?>
        <br>
        </body>
        </html>
