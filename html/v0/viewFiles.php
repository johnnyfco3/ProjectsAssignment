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
    <title>View Files</title>
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

</br>

<!--Buttons to upload files-->
<div class="container-fluid">
<form action="" method="post" enctype="multipart/form-data" class="form-inline mx-auto">
  <label class="mr-2" for="upload">Upload a File to Scan</label>
  <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />
  <input type="file" name="userfile">
  <input class="btn btn-info" type="submit" value="Upload File" name="submit">
</form>  
</div> 


<!--Table to display PDF Files-->  
<div class="container-fluid">
<div class="table-responsive">
<table id="table" class="table table-sm table-striped">
 <thead>
  <tr>
      <th scope="col">Book Title</th>
      <!-- <th scope="col">File Size</th> -->
      <th scope="col">Open Book</th>
  </tr>
 <thead>
 <tbody>
<?php
include 'upload.php';
//Search through the "doc" folder to get the resulted book titles and file size
//then display them on a table
$directory = '/var/www/projects/s21-05/html/files/books';
$bookFiles = array_diff(scandir($directory), array('..', '.'));  
$PDFPrep = 'files/books/'; //This line is will be concatenated with the filename so that the pdf opens when the button is clicked
$fileSize = 0;
$humanReadableFileSize = "";
foreach($bookFiles as $files){
  if(!is_file($files)){
  echo "<tr>
        <td>{$files}</td>";
  $fileDirectory = $directory. $files;
  //Prepare file size and pdf to open
  // $filesize = filesize($fileDirectory);
  //$humanReadableFileSize = FileSizeConvert($filesize);
  $PDFDirectory = $PDFPrep . $files;  
  echo "<!--<td>{$humanReadableFileSize}</td>-->
        <td>
          <a class='btn btn-primary' href='{$PDFDirectory}' role='button'>Open Book</a>
        </td>
        </tr>\n";
  }
  }

//Upload File script
if(isset($_POST['submit'])){
  echo uploadFile();
  //header('viewFiles.php');
}
?>

<?php
//Taken from PHP.net
/**
* Converts bytes into human readable file size.
*
* @param string $bytes
* @return string human readable file size (2,87 Мб)
* @author Mogilev Arseny
*/
function FileSizeConvert($bytes)
{	
    if($bytes == 0){ 
      return "0 MB";
    }
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
?> 
</body>
</html>
