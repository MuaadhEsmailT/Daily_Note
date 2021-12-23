<?php // details

$conn= mysqli_connect('localhost','username','password','myDB');

if(!$conn){
	echo 'connection error '. mysqli_connect_error();
}

if(isset($_POST['delete'])){
    $id_to_delete= mysqli_real_escape_string($conn,$_POST['id_to_delete']);

$sql= "DELETE FROM webnote WHERE id = $id_to_delete";

if(mysqli_query($conn, $sql)){

    header('Location: index.php');

}else{
    echo 'query error'. mysqli_error($conn);

}

}


// chack for data
if(isset($_GET['id'])){


    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = " SELECT * FROM webnote WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $webnote = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<div class="details">
<?php if($webnote):?>
<h4> Created by: <?php echo htmlspecialchars($webnote['user']); ?></h4>
<div class="note_div">
<h5 class="center" > <?php echo htmlspecialchars($webnote['title']); ?></h5>
<p class="center"> <?php echo htmlspecialchars($webnote['note']); ?></p>
<p class="center"><?php echo htmlspecialchars($webnote['creater']); ?></p>
</div>
<!-- delete-->
<div class="Delete">
<form action="More_info.php" method="POST">
<input type="hidden" name="id_to_delete" value= "<?php echo $webnote['id'] ?>">
<input class="grabbing" type="submit" name="delete" value="delete">

</div>
</form>
<?php endif;?>
</div>


