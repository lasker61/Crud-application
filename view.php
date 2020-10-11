 <?php 
 session_start();
 if($_SESSION['id']==null){
  header('Location:login.php');
 }
require 'vendor/autoload.php';
use app\classes\Students;
use app\classes\User;
$student=new Students();
$user=new User();
$result=$student->viewStudentInfo();
if(isset($_GET['delete'])){
  $student->deleteStudentInfo($_GET['id']);
}
if(isset($_POST['btn'])){
  $result=$student->searchStudentInfo();
  }
  if(isset($_GET['logout'])){
    $user->adminLogout();

  }


 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>FORM</title>
  </head>
  <body>
   <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto pt-3">
        <form  method="post" class="form-inline">
          <div class="form-group mb-2 mr-1 float-left">
            <input type="text" name="search_text" class="form-control "  placeholder="search students....">
          </div>
          <button type="submit" name="btn"class="btn btn-primary mb-2 ">search</button>
          <div class="float-right">
            <a style="margin-left: 365px;"href="?logout" class="mb-2  btn btn-danger">logout</a>
          </div>
        </form>
        <div class="card">
          <div class="card-header">
            <span>Students</span>
          <a href="create.php" class="float-right">Add Students</a>  
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>adress</th>
                <th>Action</th>
              </tr>
                <?php
                 $i=1;
                while($STUDENTS=mysqli_fetch_assoc($result)){ ?>
              <tr>

               
                <td><?php echo $i++; ?></td>
                <td><?php echo $STUDENTS['name']; ?></td>
                <td><?php echo $STUDENTS['email']; ?></td>
                <td><?php echo $STUDENTS['phone']; ?></td>
                <td><?php echo $STUDENTS['adress']; ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $STUDENTS['id'] ?>">Edit</a>
                  <a href="?delete&id=<?php echo $STUDENTS['id'] ?>" onclick="return confirm('Do you really want to delete it?!')" class="text-danger">Delete</a>
                </td>
              
              </tr>
              <?php } ?>
            </table>
            
          </div>
        </div>
        
      </div>
    </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>