<?php require_once 'header/header.php'; ?>

<div class="container">
	<div class="row pt-5">
		<div class="col-md-6 mx-auto">
			<form action="../index.php" method="POST">

				<?php if(isset($userError)) { ?>
					<div class="alert alert-danger" role="alert">
						 <?php echo $userError; ?>
					</div>
				<?php	} ?>
				<p></p>
				<h2>Registro de Usuario</h2>
				<div class="row">
					<div class="form-group col-md-6">
						<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
					<div class="form-group col-md-6">
						<input type="text" name="lastName" class="form-control" placeholder="LastName">
					</div>
				</div>

				<div class="row center">
					<div class="from-grup col-md-6">
						<input type="text" name="userName" class="form-control" placeholder="User Name">
					</div>
					<div class="form-goup col-md-6">
						<input type="password" name="pass" class="form-control" placeholder="Password">
					</div>
				</div>

				<p></p>

				<div class="row">
					<div class="form-group col-md-12">
						<input type="submit" class="btn btn-primary form-control" value="Sing Up">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>