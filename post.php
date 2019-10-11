<?php
	
	require('config/config.php');
	require('config/db.php');

	// Check For Delete
	if(isset($_POST['delete'])){
		// Get form data
		$delete_id = mysqli_real_escape_string($connect, $_POST['delete_id']);
		$title = mysqli_real_escape_string($connect, $_POST['title']);
		$body = mysqli_real_escape_string($connect, $_POST['body']);
		$author = mysqli_real_escape_string($connect,$_POST['author']);

		$query = "DELETE FROM posts WHERE id={$delete_id}";

		if(mysqli_query($connect, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($connect);
		}
	}

	//get id
	$id = mysqli_real_escape_string($connect, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	//result
	$result = mysqli_query($connect,$query);

	$post = mysqli_fetch_assoc($result);
	
	//var_dump($posts);

	//free result
	mysqli_free_result($result);

	//close connection
	mysqli_close($connect);
?>
	<?php include('inc/header.php'); ?>
		<div class="container">
			<a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
			<h1><?php echo $post['title']; ?> </h1>
			<small> Created on <?php echo $post['created_at']; ?> by <?php echo $post['author'];?>	</small>
			<p><?php echo $post['body']; ?></p>
			<hr>

			<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn btn-danger">
			</form>

			<a href="<?php ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class='btn btn-default'>Edit</a>
		</div>
	<?php include('inc/footer.php'); ?> 