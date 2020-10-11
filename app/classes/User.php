<?php 

Namespace app\classes;

class User{
	public function dbConnect(){
		$link=mysqli_connect('localhost','root','','formvalidation');
		return $link;
	}
	public function adminLoginCheck(){
		$password=md5($_POST['password']);
		$sql="SELECT* FROM users WHERE email='$_POST[email]' AND password='$password'";
		if ($result=mysqli_query($this->dbConnect(),$sql)) {
			$user=mysqli_fetch_assoc($result);
			if($user){
				session_start();
				$_SESSION['id']=$user['id'];
				$_SESSION['name']=$user['name'];
				header('Location:view.php');
			}
			else{
				return "invalid email or password!";
			}
		} 
		else{
			die(mysqli_error($this->dbConnect()));
		}
		
	}
	public function adminLogout(){
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		header('Location:login.php');
	}
}



 ?>