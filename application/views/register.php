<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Content Platform</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<link href="<?php echo base_url('assets/css/custom.css'); ?>" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<style type="text/css">



	</style>
</head>

<body class="grey lighten-5">

	<div class="back">
		<div class="div-center">
		<h3>Register</h3>
				<hr />
			<form action="<?php echo base_url('register/registerUser'); ?>" method="post">
				<div class="form-group">
					<label for="exampleInputName">Name</label>
					<input type="text" name="name1" class="form-control" id="exampleInputName" placeholder="Enter Name">

				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email1" class="form-control" id="exampleInputEmail1" placeholder="Enter email">

				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="form-group">
						<?php
						if (!empty($response['status'])) { ?>
							<div class="alert alert-danger ">
								<button class="close" data-close="alert"></button>
								<span><?php echo $response['ErrorDesc']; ?> </span>
							</div>

						<?php }	?>

					</div>
				<div class="text-center">
					<p>Already a member? <a href="<?php echo base_url('login'); ?>">Login</a></p>
				</div>
			</form>
		</div>
	</div>
</body>

</html>