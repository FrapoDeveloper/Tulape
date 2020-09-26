<!--EDITADO PARA GIT-->
<!DOCTYPE html>
<html>
<head>
    <?php include('view/headboard.php')?>
    <title>Login</title>
    <link rel="icon" href="resource/icon.png">
    <link rel="stylesheet" href="view/Login/style.css">

</head>
<body>
	<?php include('controller/session_login.php')?>
	<img class="wave" src="resource/wave.png">
	<div  class="container">
		<div class="img">
			<img src="resource/tulape.png">
		</div>
		<div  class="login-content">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
				<img src="resource/profile.svg">
				<h2 class="title" style="color: #FFFFFF;">Tulape</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div" >
							<input type="text" style="color: #FFFFFF;" placeholder="Usuario" class="input" name="f_user" 
							  value="<?php if(isset($_POST['f_send']) 
							  && !empty($_POST['f_user'])){echo $_POST['f_user'];} ?>">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	  <input type="password"  style="color: #FFFFFF;"  placeholder="Contraseña" class="input" name="f_password"
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
    <script type="text/javascript" src="view/Login/main.js"></script>
	
</body>
<style>
body{

  background-image: url(resource/fondoWeb.png);
}

</style>

</html>
