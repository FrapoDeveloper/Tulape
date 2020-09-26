<!DOCTYPE html>
<html>
<head>
    <?php include('view/headboard.php')?>
    <title>Login || Tulape</title>
   <link rel="stylesheet" href="style.css">
</head>
<body >
	<?php include('controller/session_login.php')?>
	<img class="wave" src="resource/wave.png">
	<div class="container">
		<div class="img">
			<img src="resource/logo.png">
		</div>
		<div class="login-content">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
				<img src="resource/profile.svg">
				<h2 class="title">Tulape</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
							  <input type="text" class="input" name="f_user" 
							  value="<?php if(isset($_POST['f_send']) 
							  && !empty($_POST['f_user'])){echo $_POST['f_user'];} ?>">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
						   <input type="password" class="input" name="f_password"
						   value="<?php if(isset($_POST['f_send'])
						   && !empty($_POST['f_password'])){echo $_POST['f_password'];} ?>">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login" name="f_send">
				<?php if(!empty($errores)): ?>
				<div class="alert alert-danger" role="alert">
                <?php echo $errores; ?>
           		</div>
			 <?php endif; ?>
			</form>
			

		</div>
		
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
<style>

</style>
</html>
