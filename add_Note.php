<?php 
$conn= mysqli_connect('localhost','username','password','myDB');

if(!$conn){
	echo 'connection error '. mysqli_connect_error();
}

	$user = $title = $note = '';
	$errors = array('user' => '', 'title' => '', 'note' => '');

	if(isset($_POST['submit'])){

		// check user
		if(empty($_POST['user'])){
			$errors['user'] = 'An user is required';
		} else{
			$user = $_POST['user'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $user)){
				$errors['user'] = 'user must be letters and spaces only';
			}
		}

		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

		// check note
		if(empty($_POST['note'])){
			$errors['note'] = 'At least one word is required';
		} else {
			$note = $_POST['note'];
			}
		

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {

		$user = mysqli_real_escape_string($conn,$_POST['user']);
		$title = mysqli_real_escape_string($conn,$_POST['title']);
		$note = mysqli_real_escape_string($conn,$_POST['note']);
		$sql = " INSERT INTO webnote(user,title,note)VALUES('$user','$title','$note')";
		//save to 
		if(mysqli_query($conn,$sql)){
			header ('Location: index.php');
			
		}else{
			echo 'query error :' . mysqli_error($conn);
		}
	}
}// end POST check	
?>


<!DOCTYPE html>
<html>

	<?php include('header.php'); ?>

	<div class="login-box">
  <form action="add_Note.php" method="POST">
    <div class="user-box">
	<label class="color1"><h3>Username</h3></label>
	<div class="red-text"><?php echo $errors['user']; ?></div>

      <input class="text" type="text" name="user" value="<?php echo htmlspecialchars($user) ?>" >
     
    </div>
    
    <div class="user-box">
	<label class="color1"><h3> Title </h3></label>
	<div class="red-text"><?php echo $errors['title']; ?></div>
	
      <input class="text" type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
      
    </div>
    
    <div class="user-box">
	<label class="color1"><h3>Note</h3></label>
	<div class="red-text"><?php echo $errors['note']; ?> </div>
	
      <input class="text" type="text" name="note" value="<?php echo htmlspecialchars($note)  ?>">
      

      
    
   <div>		
   <input class="grabbing" type="submit" name="submit" value="Submit">
	</div>
  </form>
</div>

	

</html> 