<?php //index
$conn= mysqli_connect('localhost','username','password','myDB');

if(!$conn){
	echo 'connection error '. mysqli_connect_error();
}
// write for 
$sql = ' SELECT user,title,note,id FROM webnote ORDER BY creater';
//get result
$result = mysqli_query($conn,$sql);
//into arr
$webnote = mysqli_fetch_all($result ,MYSQLI_ASSOC);



//free rusult from memory
mysqli_free_result($result);
//close
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

	<?php include('header.php'); ?>
	<h4>notes!</h4>
<div class="container">
		<?php foreach($webnote as $webnote){ ?>

			<div class="column">
				<div class="card">
					<div >
						<h1 class="titel_text"><?php echo htmlspecialchars($webnote['title']); ?></h1>
						<div class="note_text"><h5><?php echo htmlspecialchars($webnote['note']); ?></h5></div>
					</div>
					<div class="info_Buttons">
						<a class="brand-text" href="More_info.php?id=<?php echo $webnote['id']?>">More Info</a>
					</div>
				</div>
			</div>

		<?php } ?>
</div>
</html> 
