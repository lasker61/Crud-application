<?php 

if(isset($_SESSION['id'])){
  header('Location:view.php');
}
require 'vendor/autoload.php';
use app\classes\Students;
$student=new Students();
$result=$student->editStudentInfo($_GET['id']);
$STUDENTS=mysqli_fetch_assoc($result);

if (isset($_POST['btn'])) {
  $student->updateStudentinfo($_GET['id']);
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
   			
   			<div class="card">
   				<div class="card-header">
   					<span>Edit Students</span>
   				<a href="view.php" class="float-right">view students</a>	
   				</div>
   				<div class="card-body">
   					<form method="post">
					  <div class="form-group">
					    <label>Name</label>
					    <input type="text" class="form-control" name="name" value="<?php echo $STUDENTS['name'] ?>">
					  </div>
					  <div class="form-group">
					    <label>Email</label>
					    <input type="email" class="form-control" name="email" value="<?php echo $STUDENTS['email'] ?>">
					  </div>
					  <div class="form-group">
					    <label>Phone Number</label>
					    <input type="text" class="form-control" name="phone" value="<?php echo $STUDENTS['phone'] ?>">
					  </div>
					  <div class="form-group">
					    <label>Adress</label>
					    <textarea class="form-control" name="adress" ><?php echo $STUDENTS['adress'] ?></textarea>
					  </div>			  
					  <button type="submit" class="btn btn-primary" name="btn">Update</button>
					</form>
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
