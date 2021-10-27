<?php
    session_start();
    require "config.php";
    error_reporting(0);
?>

<!DOCTYPE html>
<!-- Written by Adriel Martinez -->
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Home Page</title>
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
  <div class="container-fluid">
    <h2>
      <strong>Browse:</strong>
    </h2>
  </div>
  <div class="container-fluid">
    <h3>
      Medicinal Plants in Viet Nam
    </h3>
  </div>
  
  <strong>
  <div class="container-fluid">Plant Name: </div>
  </strong>
  <form action="result1.php" method="post"  class="container-fluid">
    <select id="sel_plantName" name="plantName" style="width:300px">
      <option value="0">-- Select Plant Name --</option>
      <?php
                $sql_plantName = "SELECT Plant_Name FROM `book1-Medicinal_plants_in_Viet_Nam` WHERE Plant_Name NOT LIKE ' '";
                $plantName_data = mysqli_query($conn,$sql_plantName);
                while($row = mysqli_fetch_assoc($plantName_data)){
                    $plant_name = $row['Plant_Name'];
                    $plant_id = $row['ID'];
                    echo "<option value='".$plant_name."' >".$plant_name."</option>";
                }
                $book_name = 'book1-Medicinal_plants_in_Viet_Nam';
                $_SESSION["book_name"] = $book_name;
                $_SESSION["type1"] = 'plant';
                ?>
    </select>
    <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
  </form>
            <strong>
            <div class="container-fluid">English Name: </div>
            </strong>
            <form  action="result2.php" method="post" class="container-fluid">
              <select id="sel_englishName" name="englishName" style="width:300px">
                <option value="0">-- Select English Name --</option>
                <?php
                $sql_englishNames = "SELECT English_Names FROM `book1-Medicinal_plants_in_Viet_Nam` WHERE English_Names NOT LIKE ' '";
                $englishName_data = mysqli_query($conn,$sql_englishNames);
                while($row = mysqli_fetch_assoc($englishName_data)){
                    $english_name = $row['English_Names'];
                    echo "<option value='".$english_name."' >".$english_name."</option>";
                }
                $book_name = 'book1-Medicinal_plants_in_Viet_Nam';
                $_SESSION["book_name"] = $book_name;
                $_SESSION["type2"] = 'english';
                ?>
              </select>
              <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
            </form>
        <br>
      <div class="container-fluid">
        <h3>
          Medicinal Plants in the Republic of Korea
        </h3>
      </div>
      <strong>
      <div class="container-fluid">Plant Name: </div>
      </strong>
      <form id="form3" action="result3.php" method="post" name="form3" class="container-fluid">
      <select id="sel_plantName" name="plantName" style="width:300px">
      <option value="0">-- Select Plant Name --</option>
      <?php
                $sql_plantName = "SELECT Plant_Name FROM `book2-Medicinal_Plants_of_Korea` WHERE Plant_Name NOT LIKE '   '";
                $plantName_data = mysqli_query($conn,$sql_plantName);
                while($row = mysqli_fetch_assoc($plantName_data)){
                    $plant_name = $row['Plant_Name'];
                    $plant_id = $row['ID'];
                    echo "<option value='".$plant_name."' >".$plant_name."</option>";
                }
                $book_name = `book2-Medicinal_Plants_of_Korea`;
                ?>
      </select>
      <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
      </form>
        <strong>
        <div class="container-fluid">English Name: </div> 
        </strong>
            <form id="form2" action="result4.php" method="post" name="form2" class="container-fluid">
              <select id="sel_englishName" name="englishName" style="width:300px">
                <option value="0">-- Select English Name --</option>
                <?php
                $sql_englishNames = "SELECT English_Name FROM `book2-Medicinal_Plants_of_Korea` WHERE English_Name NOT LIKE ' '";
                $englishName_data = mysqli_query($conn,$sql_englishNames);
                while($row = mysqli_fetch_assoc($englishName_data)){
                    $english_name = $row['English_Name'];
                    echo "<option value='".$english_name."' >".$english_name."</option>";
                }
                $book_name = `book2-Medicinal_Plants_of_Korea`;
                ?>
              </select>
              <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
            </form>
            
        <br>
        <div class="container-fluid">
        <h3>
          Medicinal Plants in China
        </h3>
        </div>
        <strong>
        <div class="container-fluid">Plant Name: </div>
        </strong>
        <form id="form3" action="result5.php" method="post" name="form3" class="container-fluid">
        <select id="sel_plantName" name="plantName" style="width:300px">
        <option value="0">-- Select Plant Name --</option>
        <?php
                $sql_plantName = "SELECT Plant_Name FROM `book3-Medicinal_plants_in_China` WHERE Plant_Name NOT LIKE ' '";
                $plantName_data = mysqli_query($conn,$sql_plantName);
                while($row = mysqli_fetch_assoc($plantName_data)){
                    $plant_name = $row['Plant_Name'];
                    $plant_id = $row['ID'];
                    echo "<option value='".$plant_name."' >".$plant_name."</option>";
                }
                $book_name = `book3-Medicinal_Plants_in_China`;
                ?>
      </select>
      <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
      </form>

        <strong>
        <div class="container-fluid">English Name: </div> 
        </strong>
            <form id="form2" action="result6.php" method="post" name="form2" class="container-fluid">
              <select id="sel_englishName" name="englishName" style="width:300px">
                <option value="0">-- Select English Name --</option>
                <?php
                $sql_englishNames = "SELECT English_Name FROM `book3-Medicinal_plants_in_China` WHERE English_Name NOT LIKE ' '";
                $englishName_data = mysqli_query($conn,$sql_englishNames);
                while($row = mysqli_fetch_assoc($englishName_data)){
                    $english_name = $row['English_Name'];
                    echo "<option value='".$english_name."' >".$english_name."</option>";
                }
                $book_name = `book3-Medicinal_Plants_in_China`;
                ?>
              </select>
              <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
            </form>
        <br>
        <div class="container-fluid">
        <h3>
          Medicinal Plants in the South Pacific
        </h3>
        </div>
        <strong>
        <div class="container-fluid">Plant Name: </div>
        </strong>
        <form id="form3" action="result7.php" method="post" name="form3" class="container-fluid">
        <select id="sel_plantName" name="plantName" style="width:300px">
        <option value="0">-- Select Plant Name --</option>
        <?php
                $sql_plantName = "SELECT Plant_Name FROM `book4-Medicinal_plants_South_Pacific` WHERE Plant_Name NOT LIKE ' '";
                $plantName_data = mysqli_query($conn,$sql_plantName);
                while($row = mysqli_fetch_assoc($plantName_data)){
                    $plant_name = $row['Plant_Name'];
                    $plant_id = $row['ID'];
                    echo "<option value='".$plant_name."' >".$plant_name."</option>";
                }
                $book_name = `book4-Medicinal_plants_in_the_South_Pacific`;
                ?>
      </select>
      <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
      </form>

        <strong>
        <div class="container-fluid">English Name: </div> 
        </strong>    
            <form id="form2" action="result8.php" method="post" name="form2" class="container-fluid">
              <select id="sel_englishName" name="englishName" style="width:300px">
                <option value="0">-- Select English Name --</option>
                <?php
                $sql_englishNames = "SELECT English_Name FROM `book4-Medicinal_plants_South_Pacific` WHERE English_Name NOT LIKE ' '";
                $englishName_data = mysqli_query($conn,$sql_englishNames);
                while($row = mysqli_fetch_assoc($englishName_data)){
                    $english_name = $row['English_Name'];
                    echo "<option value='".$english_name."' >".$english_name."</option>";
                }
                $book_name = `book4-Medicinal_plants_in_the_South_Pacific`;
                ?>
              </select>
              <input type="submit" name="submit" class="btn btn-primary btn-sm"/>
            </form>
            
        <br>
</body>
</html>
