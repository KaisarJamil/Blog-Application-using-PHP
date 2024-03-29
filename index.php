<?php

	include 'config/config.php';
	include 'config/db.php';
	//create query
	$query='SELECT * FROM posts ORDER BY created_at DESC';

	//result
	$result=mysqli_query($connect,$query);

	$posts=mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	//var_dump($posts);

	//free result
	mysqli_free_result($result);

	//close connection
	mysqli_close($connect);
?>
<?php include('inc/header.php'); ?>
	<div class="container">
		<h2>News Feed</h2>
			<?php foreach($posts as $post): ?>
				<div class="well">
					<h4> <?php echo $post['title']; ?> </h4>
					<small> Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?>
							 </small>
					<p><?php echo $post['body']; ?></p>
					<a class="btn btn-default" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>

				</div>
			<?php endforeach; ?>
	</div>
<?php include('inc/footer.php'); ?>
