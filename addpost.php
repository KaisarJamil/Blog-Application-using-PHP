<?php

	include 'config/config.php';
	include 'config/db.php';

	if (isset($_POST['submit'])) {
		//get form data

		$title=mysqli_real_escape_string($connect , $_POST['title']);
		$author=mysqli_real_escape_string($connect , $_POST['author']);
		$body=mysqli_real_escape_string($connect , $_POST['body']);

		$query= "INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";

		if (mysqli_query($connect,$query)) {
			header('Location:' .ROOT_URL.'');
		}
		else{
			echo 'EROOR:' . mysqli_error($connect);
		}
	}
?>
<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Create New Post</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Tittle</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>
