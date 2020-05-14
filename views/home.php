
<?php require_once 'header/header.php'; ?>



	<div class="container">
		<div class="row center pt-5">
			<div class="col-md-8">
				<div class="jumbotron">
					
				Bienvenido: <strong><?php echo $user->getName() . ' ' . $user->getLastName(); ?></strong>
				</div>
			</div>
		</div>
	</div>