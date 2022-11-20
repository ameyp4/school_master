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



	<?php if ($this->session->flashdata('success')) { ?>
		<div class="box-header">
			<div class="col-lg-6">
				<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
			</div>
		</div>

	<?php } else if ($this->session->flashdata('error')) {  ?>
		<div class="box-header">
			<div class="col-lg-6">
				<div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?></div>
			</div>
		</div>
	<?php } else if ($this->session->flashdata('warning')) {  ?>
		<div class="box-header">
			<div class="col-lg-6">
				<div class="alert alert-warning"><?php echo $this->session->flashdata('warning'); ?></div>
			</div>
		</div>
	<?php } else if ($this->session->flashdata('info')) {  ?>
		<div class="box-header">
			<div class="col-lg-6">
				<div class="alert alert-info"><?php echo $this->session->flashdata('info'); ?></div>
			</div>
		</div>
	<?php } ?>


	<div class="back">


		<div class="div-center">


			<div class="content">


				<h3>Login</h3>
				<hr />
				<form action="<?php echo base_url('login/userLogin'); ?>" method="post">

					<div class="form-group">
						<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
						<label for="username" class="">Username</label>
						<input type="text" class="form-control" autocomplete="off" placeholder="Username" name="username" />
					</div>

					<div class="form-group">
						<!-- <i class="glyphicon glyphicon-barcode"></i> -->
						<label for="password" class="">Password</label>
						<input type="password" class="form-control" autocomplete="off" placeholder="Password" name="password" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Login<i class="glyphicon glyphicon-log-in"></i></button>
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
						<p>Not a member? <a href="<?php echo base_url('register'); ?>">Register</a></p>
					</div>
				</form>

			</div>


			</span>
		</div>
</body>

</html>