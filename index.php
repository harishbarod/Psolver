<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Psolver</title>
  </head>
  <body>
 <?php
 include 'partials/_nav.php';
 include 'partials/_dbconnect.php';
 ?>

<!-- showing all signup login alerts -->
<?php
if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=='true'){
echo '<div class=" my-0 alert alert-success alert-dismissible fade show" role="alert">
<strong>Signup Succeess! </strong>You can now login.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// user exist alert
if(isset($_GET['userexist'])){
  echo '<div class=" my-0 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>failed!</strong> Username already exist. Please try with different username.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
</div>';
}
if(isset($_GET['passwordmatch'])){
  echo '<div class=" my-0 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>failed!</strong> Password does not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
</div>';
}

// login alerts
if(isset($_GET['loginpasswordunmatch'])){
  echo '<div class=" my-0 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>login failed!</strong> Password does not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
</div>';
}

if(isset($_GET['loginfailed'])){
  echo '<div class=" my-0 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>login failed!</strong> Username not exist
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
</div>';
}

if(isset($_GET['login'])){
  echo '<div class=" my-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>logged in</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </button>
</div>';
}




?>
<!-- alerts has been shown successfully -->

<!-- carousel start here -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/3.png" height="450px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/4.png"height="450px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/1.jpg" height="450px"class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- carousel end here -->

<h1 class="h1 mt-4 text-center "> <em>Psolver - Categories</em></h1>

<!-- cards start here -->
<div class="container mt-5">
<div class="row">

<!-- fetching categories from database -->
<?php
$sql= "SELECT * FROM categories" ;
$result= mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  $category_id=$row['category_id'];
$category_name= $row['category_name'];
$category_description= substr($row['category_description'],0,80); 

echo ' <div class="col-md-4 mt-4">
<div class="card " style="width: 18rem;">
<a  href="threadlist.php?category_id='.$category_id.'" >
<img src="img card/'.$category_id.'.png" height="200px" class="card-img-top" alt="..."> </a>
<div class="card-body">
<h5 class="card-title"> <a class= "text-dark" href="threadlist.php?category_id='.$category_id.'">'.$category_name .'</a></h5>
<p class="card-text">'.$category_description.'...</p>
<a href="threadlist.php?category_id='.$category_id .'" class="btn btn-primary">View Threads</a>
</div>
</div>
</div>';


}
?>
</div>
</div>

<!-- cards end here -->
<!-- categories fetched -->




<?php


include 'footer.php';
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  </body>
</html>