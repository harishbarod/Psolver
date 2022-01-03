<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>nav</title>
<style>
@media only screen and (max-width:2560px){
#searchform{
margin: 1rem;
}

.me-2{
  margin-left: -1rem;
}
.form-control {
    
    width: 20rem !important;


}
}


</style>


  

  </head>
  <body>

      <!-- navbar start here  -->
      <?php


echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> Psolver</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" href="index.php " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php ">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

          include '_dbconnect.php';
          $sql='SELECT * FROM  categories LIMIT 3';
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
            $category_name=$row['category_name'];
            $category_id=$row['category_id'];
         echo'
            <li><a class="dropdown-item" href="threadlist.php?category_id='.$category_id.'">'.$category_name.'</a></li>';
          }
         echo'</ul>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">About</a>
        </li>
        <li class="nav-item">
          <a href="contact.php" class="nav-link">Contact Us</a>
        </li>
      </ul>';
      



      session_start();
      $alertloggedin=false;
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
  echo' <h5 class="mt-2 text-light" > '.$_SESSION['username'].'</h5>';
        $alertloggedin=true;}

      echo'<form id="searchform" action="search.php?query" method="GET" class="d-flex mx-3">
        <input class="searchcolor form-control me-2" type="search" id= "query" name= "query" placeholder="Search" aria-label="Search">
        <button class="search btn btn-outline-success" type="submit">Search</button>
      </form>';
       
      if($alertloggedin){
        echo '<a href="partials/_logout.php"><button class="btn btn-success" type="submit">logout</button></a>
        ';}
      else{
     echo'<button class="signup btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal" type="submit">SignUp</button>

   <button class="login btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#loginModal"type="submit">login</button>';}
    echo'</div>
  </div>
</nav>' 
?>
<?php
include 'partials/_signupmodal.php';
include 'partials/_loginmodal.php';
?>
      <!-- navbar end here -->

  
    <!-- Optional JavaScript; choose one of the two! -->




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
</html>