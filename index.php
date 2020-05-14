<?php 
	
	require_once 'config/config.php';
	require_once 'conexion/Conexion.php';
	require_once 'users/user.php';
	require_once 'users/UserSession.php';

	$userSession = new UserSession;
	$user = new User;

	/* --------------------------------------------------------------------- */
	/* este "Evento" valida los datos enviados por el formulario de Registro */
	/* --------------------------------------------------------------------- */

	if (isset($_POST['name']) && isset($_POST['lastName']) && isset($_POST['userName']) && isset($_POST['pass'])){
		
		$data  = array(
						'name' => $_POST['name'],
						'lastName' => $_POST['lastName'],
						'userName' => $_POST['userName'],
						'pass' => $_POST['pass']
					);
		
		// Validar si el Usuario existe
		if ($user->regUser($data)) {
		
			//Si no existe, lo redirecciona a la página del Login
			$userReg = 'Usuario Registrado';
			require_once 'views/login.php';

		} else {

			//de Existir el usuario, manda un error
			$userError = 'usuario existe';
			require_once 'views/singup.php';
		}

		// Este "Evento" es para cuando haya una session y se cierre el navegador, Al abrirlo, continue la sesion
	} else if (isset($_SESSION['user'])) {
		
		$user->setUser($userSession->getCurrentUser());
		require_once 'views/home.php';
 		
		/* -------------------- */
 		/* Validacion del login */
 		/* -------------------- */
	} else if (isset($_POST['userName']) && isset($_POST['pass'])) {
		
		$userForm = $_POST['userName'];
		$passForm = $_POST['pass'];

		$user = new User;

		if ($user->userExists($userForm, $passForm)) {

			$userSession->setCurrentUser($userForm);
			$user->setUser($userForm);

			//Redireccionar a vista de usuario logueado
			require_once 'views/home.php';

		 /* ---------------------------------------------------------------- */
		 /* Al existir error con el usuario y/o contraseña, muestra un error */
		 /* ---------------------------------------------------------------- */
		} else {

			$errorLogin = 'Nombre de Usuario y/o Password Incorrectos';
			// Redireccionar a vista de login
			require_once 'views/login.php';

		}


	/* ------------------------------------------------------------------------------ */
	/* Al no Existir ninguna sesion abierta, me redirecciona al home de la aplicacion */
	/* ------------------------------------------------------------------------------ */
	} else {
		// Redireccionar a vista del Home
		require_once 'views/home.php';

	}

 ?>