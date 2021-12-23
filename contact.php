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
background: url('img card/contact.jpg');
z-index: 1;
min-height: 100vh;
background-repeat: no-repeat;
background-size: cover;

  }
  .container{
      width: 20vw;
      font-family: 'Roboto', sans-serif;
  }

    </style>
  </head>
  <body>
<?php
include 'partials/_nav.php';
include 'partials/_dbconnect.php';
?>
<?php
if(isset($_GET['formfill'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Thank You !</strong> Your form has been updated successfully;
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
 <div class="container col-md-4 mt-5">
  <h1 class="text-center mb-5">Contact Us</h1>
  <form id="contact-form"action="partials/_handlecontact.php" method="POST">
            <input type="text"name="name" class="form-control" placeholder="Enter Your Name"required><br>
            <input type="text"name="mobileno" class="form-control" placeholder="Enter Your Mobile No."required><br>
            <input type="email"name="email" class="form-control" placeholder="Enter Your Email"required><br>
            <textarea name="message" placeholder="Message" class="form-control" cols="30" rows="4"></textarea>
            <br>
            <button type="submit" class="btn btn-success">Send Message</button>

        </form>
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