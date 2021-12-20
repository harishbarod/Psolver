<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&family=Ubuntu:wght@700&display=swap" rel="stylesheet"> 

    <title>Psolver</title>
    <style>
     
        .jumbotron {
            margin-top: 20px;
  padding: 2rem 1rem;
  margin-bottom: 2rem;
  background-color: #e9ecef;
  border-radius: .3rem;
  
}
.username{
  float: right;
  margin-top: -50px;
 
}
    </style>
  </head>
  <body>
 <?php
 include 'partials/_nav.php';
 include 'partials/_dbconnect.php';
 ?>



<!-- fetching thread data -->



<!-- inserting comments into database -->
<?php
$commentfound=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
  $comment_content=$_POST['comment_content'];
  $comment_thread_id=$_GET['thread_id'];

  $comment_content= str_replace('<','&lt;', $comment_content);
  $comment_content= str_replace('>','&gt;', $comment_content);
$comment_by=$_POST['thread_user_id'];
$sql= "INSERT INTO `comments` (`comment_content`, `comment_thread_id`, `comment_by`, `comment_time`) VALUES ('$comment_content', '$comment_thread_id', '$comment_by', current_timestamp())";

$result= mysqli_query($conn,$sql);
$commentfound=true;
if($result){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Comment has been inserted successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}
//  <!-- insertion completed -->




$sql= "SELECT * FROM threads WHERE thread_id=$_GET[thread_id]";
$result=mysqli_query($conn,$sql);

if($row=mysqli_fetch_assoc($result)){
  $thread_user_id=$row['thread_user_id'];
    $thread_title=$row['thread_title'];
    $thread_description=$row['thread_description'];
    $sql2="SELECT username FROM `users`WHERE user_id=$thread_user_id";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$username=$row2['username'];
echo '<!-- jumbotron start here -->
<div class="container">
<div class="jumbotron ">
  <h2>Welcome to '.$thread_title.' </h2>
  <p class="lead">'.$thread_description.'</p>
<h5> Posted by : <strong> '.$username.' </strong></h5>
</div>
</div>
<!-- jumbotron end here -->';}
else{
  echo 'found error';
}
?>



 <h1 class="text-center">Post a Comment</h1>
<?php
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']=='true'){
echo '
<div class="container col-md-5 mt-4">
<form action='.$_SERVER['REQUEST_URI'].' method="POST"> 
  <div class="form-group">
 
    <label class= "my-1"for="exampleFormControlTextarea1">Type your comment</label>
    <textarea class="form-control my-1" id="comment_content" name="comment_content" rows="3"></textarea>
  </div>
  <input  type="hidden" name= "thread_user_id" value='.$_SESSION['thread_user_id'].'>
  <button type="submit" class="mb-5 my-4 ml-1 btn btn-primary">Post </button>
</form>
</div>
</div>';}
else{
  echo '<mark>You are not loggedin please login to post a comment</mark>';
}

?>


<!-- comment inserted successfully -->




 <h2 class="h2 text-center my-3">Comments</h2>

 
<!-- fetching threads from database -->
<?php
$commentfound=true;
$comment_thread_id=$_GET['thread_id'];
$sql= "SELECT * FROM `comments`WHERE comment_thread_id= $comment_thread_id";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){


  $comment_content=$row['comment_content'];
  $comment_by=$row['comment_by'];
$commentfound=false;

$sql2="SELECT username FROM `users` WHERE user_id='$comment_by'";

$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$username=$row2['username'];    
echo 
'<div class=container>
 <div class="media d-flex mt-4 ">
<img src="img/contact.png" height=64 width=64 class="align-self-start" alt="...">
<div class="media-body my-2">

  <h3 class="my-3">'.$comment_content.'</h3>
</div>
</div>
<h2> <strong><em class="username">'.$username.'</em></strong></h2>
</div>';
}
?>

<?php
if($commentfound){echo '<!-- jumbotron start here -->
  <div class="container">
  <div class="jumbotron ">
    <h1 class= "text-center">No Comment Found </h1>
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

    

  
    <!-- Option 2: Separate Popper and Bootstrap JS -->
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
</html>