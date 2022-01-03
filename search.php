<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>search</title>
    <style>
      .container{
        min-height: 350px;
      }
      .searchtitle{
        text-decoration: none;
    
      }
      .h1{
        margin-bottom: 25px;
      }
      .search{
        text-decoration: none;
        color: black;
      }
    </style>
  </head>
  <body>
<?php
include 'partials/_nav.php';
include 'partials/_dbconnect.php';
?>
  <?php
  $query=$_GET['query'];
  echo '<div class="container mt-5"><div class="jumbotron ">
<h2 class="display-4 mx-4 "> Search Results for <em>'.$query.'</em></h2></div></div>';
  echo'<div class="container">';
$query=$_GET['query'];
$sql="SELECT * FROM `threads` WHERE MATCH(`thread_title`,`thread_description`)against('$query')";
$result=mysqli_query($conn,$sql);
echo'<h3 class="mb-4"> <mark> '.mysqli_num_rows($result).'</mark> search results found</h3>';
$search=true;
while($row=mysqli_fetch_assoc($result)){
  $num=mysqli_num_rows($result);

  if($num>0){
  $thread_cat_id=$row['thread_cat_id'];
  $thread_id=$row['thread_id'];
  $title=$row['thread_title'];
  $description=$row['thread_description'];
  $search=false;
echo ' 
<a class="search"href="thread.php?thread_id='.$thread_id.'"><h1> '.$title.'</h1> </a>
<h3> '.$description.'</h3>  <hr>
';


   }
 
  }

  if($search){
 echo '<div class="container "><div class="jumbotron ">
    <h2 class="display-4 mx-4 ">no search result found </h2><br> <h4>  Please try with different keyword </h4> </em></div></div>';
  
  }
 
     echo '</div>';
 
    ?>
    <?php
    include 'footer.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
  </body>
</html>