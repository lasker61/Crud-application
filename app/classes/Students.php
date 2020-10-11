<?php 
Namespace app\classes;

class Students{
	public function dbConnect(){
		$link=mysqli_connect('localhost','root','','formvalidation');
		return $link;
	}
	public function addStudent(){
		$sql="INSERT INTO students(name,email,phone,adress)VALUES('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[adress]')";
		if (mysqli_query($this->dbConnect(),$sql)) {
			return"STUDENT ADDED SUCCESSFULLY!";
		}else{
			die(mysqli_error($this->dbConnect()));
		}
	}
	public function viewStudentInfo(){
		$sql="SELECT * FROM students";
		if ($result=mysqli_query($this->dbConnect(),$sql)) {
			return $result;
		}
		else{
			die(mysqli_error($this->dbConnect()));
		}
	}
	public function editStudentInfo($id){
		$sql="SELECT * FROM students WHERE id='$id'";
		if ($result=mysqli_query($this->dbConnect(),$sql)) {
			return $result;
		}
		else{
			die(mysqli_error($this->dbConnect()));
		}
	}
	public function updateStudentInfo($id){
		$sql="UPDATE students SET name='$_POST[name]',email='$_POST[email]',phone='$_POST[phone]',adress='$_POST[adress]' WHERE id='$id'";
		if (mysqli_query($this->dbConnect(),$sql)) {
			return header('Location:view.php');
		}
		else{
			die(mysqli_error($this->dbConnect()));
		}
	}
	public function deleteStudentInfo($id){
		$sql="DELETE FROM students WHERE id='$id'";
		if (mysqli_query($this->dbConnect(),$sql)) {
			return header('Location:view.php');
		}
		else{
			die(mysqli_error($this->dbConnect()));
		}
	}
	public function searchStudentInfo(){
		$sql="SELECT * FROM students WHERE name LIKE'%$_POST[search_text]%' OR email LIKE'%$_POST[search_text]%' OR phone LIKE'%$_POST[search_text]%'  OR adress LIKE'%$_POST[search_text]%'";
		if ($result=mysqli_query($this->dbConnect(),$sql)) {
			return $result;
		}
		else{
			die(mysqli_error($this->dbConnect()));
		}
		

	}
}


 ?>