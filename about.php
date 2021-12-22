<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&family=Ubuntu:wght@700&display=swap" rel="stylesheet">


    <title>search</title>

    <style>
      body{
        background-color: #5a4b5830 !important;
}
      .container{
        margin-top:70px;
        font-family: 'Roboto', sans-serif;
      }



#aboutimg{
  width: 50vw;
  height: 70vh;
  object-fit: cover;
  opacity: 0.7;
  border-radius: 20px;
}
.para{

  word-spacing: 2px;
  line-height: 40px;
}
.h1{
  font-family: 'Ubuntu', sans-serif;
}

@media screen and (max-width:768px) {
  #aboutimg{
    margin-top: 6rem;}
}
@media screen and (max-width:425px) {
  #aboutimg{
width: 90vw;
height: 50vh;
margin-right: .25rem !important;

  }
}



    </style>
  </head>
  <body>
<?php
include 'partials/_nav.php';
include 'partials/_dbconnect.php';
?>
<div class="container">
  <div class="row">
    <div class=" column col-sm">
 
  <h4 class="para mt-5  ">We started this forum website for solving queries of coders and general one. Our team continuously making efforts to make this forum website as faster and helpful as we can make it. 
  We collect data from official documents so we can serve you best results .
  </h4>
    </div>
    <div class="column col-sm">
    <img id="aboutimg" src="img card/about1.jpg" alt="">
    </div>
  </div>
</div>
 


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