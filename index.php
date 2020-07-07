<?php 
include('includes/header.php');
include('includes/classes/User.php');
include('includes/classes/Post.php');
#session_destroy();

if (isset($_POST['post'])) {
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'],'none');
}

?>



			<div class="user_details column">
				<a href="<?php echo $userLoggedIn; ?>"><img src="<?php echo $user['profile_pic']; ?>"></a>
				<!-- basic details of user here -->		
				<div class="user_details_left_right">
					<a href="<?php echo $userLoggedIn; ?>">
						<?php 
							echo $user['first_name']. " " . $user['last_name'];
						?>
					</a><br>
					<?php 
						echo "Posts: ". $user['num_post']. "<br>";
						echo "Likes: ". $user['num_likes'];
					?>
				</div>
			</div>

			<div class="main_column column">
				<form action="index.php" method="POST" class="form-group">
					<textarea class="form-control" name="post_text" id="post_text" placeholder="Got something to say?? Post here..."></textarea>
					<input type="submit" name="post" id="post_button" value="Post" class="btn btn-primary">
					<hr>
				</form>
				<?php 

				$user_obj = new User($con, $userLoggedIn);
				echo $user_obj->getFirstAndLastName();


				?>

			</div>
		</div>
	</div>


</body>
</html>
