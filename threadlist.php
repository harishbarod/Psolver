<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Psolver</title>
    <style>
        .jumbotron {
            margin-top: 20px;
  padding: 2rem 1rem;
  margin-bottom: 2rem;
  background-color: #e9ecef;
  border-radius: .3rem;
}
.thread_title{
  text-decoration: none;
  color: black;
}
.username{
 float: right;
 
}
    </style>
  </head>
  <body>
 <?php
 include 'partials/_nav.php';
 include 'partials/_dbconnect.php';
 ?>


<?php   
$showAlertthread=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
  $thread_cat_id=$_GET['category_id'];
  $thread_title= $_POST['thread_title'];
  
  $thread_title= str_replace('<','&lt;', $thread_title);
$thread_title= str_replace('>','&gt;', $thread_title);

$thread_description=$_POST['thread_description'];

$thread_description= str_replace('<','&lt;', $thread_description);
$thread_description= str_replace('>','&gt;', $thread_description);
$thread_user_id=$_POST['thread_user_id'];
$sql= "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`,`thread_user_id`, `thread_time`) VALUES ('$thread_title','$thread_description', '$thread_cat_id','$thread_user_id', current_timestamp())";
$result=mysqli_query($conn,$sql);
$showAlertthread=true;

}

?>
<?php
// Alerts are here
if($showAlertthread){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your thread has been inserted successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>



<!-- fetching categories data -->
<?php
$category=false;
$sql= "SELECT * FROM categories WHERE category_id=$_GET[category_id]";
$result=mysqli_query($conn,$sql);

if($row=mysqli_fetch_assoc($result)){
    $category_name=$row['category_name'];
    $category_description=$row['category_description'];

echo '<!-- jumbotron start here -->
<div class="container">
<div class="jumbotron ">
  <h1 class="display-4">Welcome to '.$category_name.' </h1>
  <p class="lead">'.$category_description.'</p>
  <hr class="my-4">
  <p>This forum is only for queries purpose please cann\'t write nonsense here. 
      All your activities has been recorded here.
  </p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
</div>
<!-- jumbotron end here -->';}
else{
  echo 'found error';    
}
?>


<?php
// <!-- form for thread insertion -->
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
echo '<h1 class="text-center">Start a Discussion</h1>
<div class="container col-md-5 ">
<form action='.$_SERVER['REQUEST_URI'].' method="POST"> 
  <div class="form-group">
   
  <div class="form-group my-4">
    <label class="my-1" for="exampleInputPassword1">Thread title</label>
    <input type="text" class="form-control" name="thread_title" id="thread_title">
  </div>
  <input type="hidden" name="thread_user_id" value='.$_SESSION['thread_user_id'].'>
  <div class="form-group">
    <label class= "my-1"for="exampleFormControlTextarea1">Thread Description</label>
    <textarea class="form-control" id="thread_description" name="thread_description" rows="3"></textarea>
  </div>
  <button type="submit" class="mb-5 my-4 ml-1 btn btn-primary">Post </button>
</form>
</div>
</div>';}
else{
  echo '<mark> You are not loggedin Please login and start a discussion</mark>';
}


?>
<!-- form end -->



<!-- inserting threads into database -->

 <h2 class="h2 text-center my-3">Browse Threads</h2>
 
<!-- fetching threads from database -->
<?php
$thread_cat_id=$_GET['category_id'];
$sql= "SELECT * FROM `threads`  WHERE thread_cat_id= $thread_cat_id";
$result=mysqli_query($conn,$sql);
$threadfound=true;


while($row=mysqli_fetch_assoc($result)){
  $thread_id=$row['thread_id'];
  $thread_title=$row['thread_title'];
  $thread_description=$row['thread_description'];
  $thread_user_id=$row['thread_user_id'];
  $threadfound=false;
  $sql2="SELECT username FROM `users`WHERE user_id=$thread_user_id";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
if($row2){
  $username=$row2['username'];
  echo 
  '<div class=container>
   <div class="media d-flex mt-4 ">
  <img src="img/contact.png" height=64 width=64 class="align-self-start" alt="...">
  <div class="media-body my-2">

    <h3 class="mt-0"> <a class= thread_title text-dark href= "thread.php?thread_id='.$thread_id.'">'. substr($thread_title,0,50) .'...</a> <em class="username">'.$username.'</em></h3>
    <p>'.substr($thread_description,0,200) .' ....</p>
  </div>
  </div>
</div>
<hr>';}
}

?>
<?php
if($threadfound){
  echo '<!-- jumbotron start here -->
  <div class="container">
  <div class="jumbotron ">
    <h1 class= "text-center">No Thread Found </h1>
  </div>
  </div>
  <!-- jumbotron end here -->';
 }


?>

<?php
include 'footer.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  </body>
</html>