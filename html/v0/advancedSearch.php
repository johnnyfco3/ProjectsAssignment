<!DOCTYPE html>
<!--Written By Eli Lainez-->
<html lang="en-US">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Advanced Search Test</title>
</head>

<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- NavBar Section -->
  <!-- NavBar Section -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Knowledge Base</a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
  <br>

  <form class="form-check-inline" action="" method="post">
    <div class="container-fluid align-items-center">
      <div class="form-row">
        <div class="form-check col-auto">
          <input class="form-check-input" type="radio" name="vietnam" value="a">
          <label class="form-check-label" for="vietnam">
            Medicinal Plants in Vietnam
          </label>
        </div>
        <div class="form-check col-auto">
          <input class="form-check-input" type="radio" name="korea" value="b">
          <label class="form-check-label" for="korea">
            Medicinal Plants in the Republic of Korea
          </label>
        </div>
        <div class="form-chec col-auto">
          <input class="form-check-input" type="radio" name="china" value="c">
          <label class="form-check-label" for="china">
            Medicinal Plants in China
          </label>
        </div>
        <div class="form-check col-auto">
          <input class="form-check-input" type="radio" name="southPacific" value="d">
          <label class="form-check-label" for="southPacific">
            Medicinal Plants in the South Pacific
          </label>
        </div>
      </div>
      <div class="form-row col-auto">
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
      </div>
    </div>
  </form>
  <br>

  <?php
  if (isset($_POST['vietnam'])) {
    echo "<form action='advancedSearchVietnam.php' method='post'>
    <div class='container'>
      <div class='form-row'>
        <div class='form-group col-auto'>
          <label for='Plant_Name' class='form-label'>Plant Name:</label>
          <input type='text' id='Plant_Name' name='Plant_Name'
          placeholder='Plant Name'>
        </div>
        <div class='form-group col-auto'>
          <label for='English_Names' class='form-label'>English Name:</label>
          <input type='text' id='English_Names' name='English_Names'
          placeholder='English Name'>
        </div>
        <div class='form-group col-auto'>
          <label for='Flowering_Period' class='form-label'>Flowering Period:</label>
          <input type='text' id='Flowering_Period' name='Flowering_Period'
          placeholder='Flowering Period'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-auto'>
          <label for='Chemical_Composition' class='form-label'>Chemical Composition:</label>
          <input type='text' id='Chemical_Composition' name='Chemical_Composition'
          placeholder='Chemical Composition'>
        </div>
        <div class='form-group col-auto'>
          <label for='Therapeutic_Uses' class='form-label'>Therapeutic Uses:</label>
          <input type='text' id='Therapeutic_Uses' name='Therapeutic_Uses'
          placeholder='Therapeutic Uses'>
        </div>
        <div class='form-group col-auto'>
          <label for='Distribution' class='form-label'>Distribution (Environment):</label>
          <input type='text' id='Distribution' name='Distribution'
          placeholder='Distribution'>
        </div>
      </div>
      <div class='form-row'>
        <div class='col'>
          <input type='submit' name='submit' value='submit' class='btn btn-primary'>
        </div>
      </div>
    </div>
  </form>";
  } else if (isset($_POST['korea'])) {
    echo "<form action='advancedSearchKorea.php' method='post'>
      <div class='container'>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Plant_Name' class='form-label'>Plant Name:</label>
            <input type='text' id='Plant_Name' name='Plant_Name'
            placeholder='Plant Name'>
          </div>
          <div class='form-group col-auto'>
            <label for='English_Name' class='form-label'>English Name:</label>
            <input type='text' id='English_Name' name='English_Name'
            placeholder='English Name'>
          </div>
          <div class='form-group col-auto'>
            <label for='Korean_Name' class='form-label'>Korean Name</label>
            <input type='text' id='Korean_Name' name='Korean_Name'
            placeholder='Korean Name'>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Parts_Used' class='form-label'>Parts Used:</label>
            <input type='text' id='Parts_Used' name='Parts_Used'
            placeholder='Parts Used'>
          </div>
          <div class='form-group col-auto'>
            <label for='Traditional_Uses' class='form-label'>Traditional Uses:</label>
            <input type='text' id='Traditional_Uses' name='Traditional_Uses'
            placeholder='Traditional Uses'>
          </div>
          <div class='form-group col-auto'>
            <label for='Description' class='form-label'>Description:</label>
            <input type='text' id='Description' name='Description'
            placeholder='Description'>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Habitat' class='form-label'>Habitat:</label>
            <input type='text' id='Habitat' name='Habitat'
            placeholder='Habitat'>
          </div>
          <div class='form-group col-auto'>
            <label for='Distribution' class='form-label'>Distribution:</label>
            <input type='text' id='Distribution' name='Distribution'
            placeholder='Distribution'>
          </div>
          <div class='form-group col-auto'>
            <label for='Bio-Activities' class='form-label'>Bio-Activities:</label>
            <input type='text' id='Bio-Activities' name='Bio-Activities'
            placeholder='Bio-Activities'>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
              <label for='Chemical_Components' class='form-label'>Chemical Components:</label>
              <input type='text' id='Chemical_Components' name='Chemical_Components'
              placeholder='Chemical Components'>
          </div>
          <div class='col-auto'>
            <input type='submit' name='submit' value='submit' class='btn btn-primary'>
          </div>
        </div>
      </div>
    </form>";
  } else if (isset($_POST['china'])) {
    echo "<form action='advancedSearchChina.php' method='post'>
      <div class='container'>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Plant_Name' class='form-label'>Plant Name:</label>
            <input type='text' id='Plant_Name' name='Plant_Name'
            placeholder='Plant Name'>
          </div>
          <div class='form-group col-auto'>
            <label for='English_Name' class='form-label'>English Name:</label>
            <input type='text' id='English_Name' name='English_Name'
            placeholder='English Name'>
          </div>
          <div class='form-group col-auto'>
            <label for='Chinese_Name' class='form-label'>Chinese Name</label>
            <input type='text' id='Chinese_Name' name='Chinese_Name'
            placeholder='Chinese Name'>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Parts_Used' class='form-label'>Parts Used:</label>
            <input type='text' id='Parts_Used' name='Parts_Used'
            placeholder='Parts Used'>
          </div>
          <div class='form-group col-auto'>
            <label for='Description' class='form-label'>Description:</label>
            <input type='text' id='Description' name='Description'
            placeholder='Description'>
          </div>
          <div class='form-group col-auto'>
            <label for='Habitat' class='form-label'>Habitat:</label>
            <input type='text' id='Habitat' name='Habitat'
            placeholder='Habitat'>
          </div>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Distribution' class='form-label'>Distribution:</label>
            <input type='text' id='Distribution' name='Distribution'
            placeholder='Distribution'>
          </div>
          <div class='form-group col-auto'>
            <label for='Indications' class='form-label'>Indications:</label>
            <input type='text' id='Indications' name='Indications'
            placeholder='Indications'>
          </div>
          <div class='form-group col-auto'>
              <label for='Dosage' class='form-label'>Dosage:</label>
              <input type='text' id='Dosage' name='Dosage'
              placeholder='Dosage'>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-auto'>
            <input type='submit' name='submit' value='submit' class='btn btn-primary'>
          </div>
        </div>
      </div>
    </form>";
  } else if (isset($_POST['southPacific'])) {
    echo "<form action='advancedSearchSouthPacific.php' method='post'>
      <div class='container'>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Plant_Name' class='form-label'>Plant Name:</label>
            <input type='text' id='Plant_Name' name='Plant_Name'
            placeholder='Plant Name'>
          </div>
          <div class='form-group col-auto'>
            <label for='English_Name' class='form-label'>English Name:</label>
            <input type='text' id='English_Name' name='English_Name'
            placeholder='English Name'>
          </div>
          <div class='form-group col-auto'>
            <label for='Local_Name' class='form-label'>Local Name</label>
            <input type='text' id='Local_Name' name='Local_Name'
            placeholder='Local Name'>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Description' class='form-label'>Description:</label>
            <input type='text' id='Description' name='Description'
            placeholder='Description'>
          </div>
          <div class='form-group col-auto'>
            <label for='Habitat' class='form-label'>Habitat:</label>
            <input type='text' id='Habitat' name='Habitat'
            placeholder='Habitat'>
          </div>
          <div class='form-group col-auto'>
            <label for='Distribution' class='form-label'>Distribution:</label>
            <input type='text' id='Distribution' name='Distribution'
            placeholder='Distribution'>
          </div>
        </div>
        <div class='form-row'>
          <div class='form-group col-auto'>
            <label for='Constituents' class='form-label'>Constituents:</label>
            <input type='text' id='Constituents' name='Constituents'
            placeholder='Constituents'>
          </div>
          <div class='form-group col-auto'>
            <label for='Biological_Activity' class='form-label'>Biological Activity:</label>
            <input type='text' id='Biological_Activity' name='Biological_Activity'
            placeholder='Biological Activity'>
          </div>
          <div class='form-group col-auto'>
              <label for='Traditional_Uses' class='form-label'>Traditional Uses:</label>
              <input type='text' id='Traditional_Uses' name='Traditional_Uses'
              placeholder='Traditional Uses'>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-auto'>
            <input type='submit' name='submit' value='submit' class='btn btn-primary'>
          </div>
        </div>
      </div>
    </form>";
  }
  ?>
</body>

</html>