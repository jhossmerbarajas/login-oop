<?php require_once 'header/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-5 pt-5 mx-auto">
				<form action="../index.php" method="POST">
					<?php  if(isset($errorLogin)) { ?>
						<div class="alert alert-danger" role="alert">
						  	<?php echo $errorLogin; ?>
						</div>	
					<?php	} ?>
				  <div class="form-group">
				    <label for="exampleInputEmail1"> User Name</label>
				    <input type="text" class="form-control" name="userName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UserName">
				  </div>
				
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
				  </div>
				
				  <button type="submit" class="btn btn-primary"> Login </button>
				</form>
			</div>
		</div>
	</div>