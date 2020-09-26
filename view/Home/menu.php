<?php
session_start();
if (empty($_SESSION)) {
  header("location: ../index.php");
} else {
  $name_user =  $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../headboard.php') ?>
  <title>Administración</title>
  <link rel="icon" type="image/png" href="../../resource/favicon.png">

  <link rel="stylesheet" href="../flexboxgrid.min.css">
  <link rel="stylesheet" href="admin.css">
  <script src="plotly-latest.min.js"></script>
  <script src="sweetalert.min.js"></script>
</head>

<body>
  <div class=" row">
       <!-- SECCION DEL PANEL MENU-->
      <nav id="menu-bar" style="z-index:2000;" class="menu-bar pt-1">
            <div class="scroll row middle-xs pt-2 center-xs">
                  <h3 style="padding-left:2em;   text-shadow: 3px 3px 3px #000000;" class="center-xs col-xs-10">Tulape</h3>
                  <span class="row pb-4 center-xs col-xs-2" style="font-size: 1.3em; color: #d9d9d9;  text-shadow: 2px 2px 2px #000000;"" >
                    <a id='icon-menu' style=' text-decoration:none;
                      color:#d9d9d9; outline-style: none; cursor:pointer;'>

                      <i class="fas fa-bars"></i>
                    </a>
                  </span>
                  <?php if ($name_user == 'ysidro_admin@tulape.pe') : ?>
                      <img style="width:5em;" src="../../resource/user1.jpg" class="rounded-circle pt-3" title="Usuario">
                  <?php endif; ?>
                  <!--Nombre de usuario traido desde el inicio de sesión -->
                  <p style="font-size:13px;" class="col-xs-12"><?php echo  $_SESSION['user']; ?></p>
                
                  <div class="services">
                        <a id="Home" class="py-2 item" style='text-decoration:none;
                              outline-style: none; cursor:pointer; display:flex;
                              justify-content:center; width:100%; '>
                          <span style="font-size:1em;  text-shadow: 2px 2px 2px #000000;">

                            <i class="fas fa-home"></i></span>
                          <p style="text-shadow: 2px 2px 2px #000000;" class="pl-3">Pedidos</p>
                        </a>
                        <style> #Home:hover{background: #d3944d65; border-radius:15px; } </style>
                      

                        <a id="Reports"  class="py-2 item " style='text-decoration:none;
                              outline-style: none; cursor:pointer; display:flex; 
                              justify-content:center;  width:100%; color:#d9d9d9; '>
                          <span style="font-size:1em; text-shadow: 2px 2px 2px #000000;">
                            <i class="fas fa-table"></i>
                          </span>
                          <p style="text-shadow: 2px 2px 2px #000000;"  class="pl-3">Reportes</p>
                        </a>
                        <style> #Reports:hover{background: #d3944d65; border-radius:15px; } </style>

                        <a id="Drivers" class="py-2 item" style='text-decoration:none;
                              outline-style: none; cursor:pointer; display:flex; 
                              justify-content:center; width:100%; '>
                          <span style="font-size:1em; text-shadow: 2px 2px 2px #000000; ">
                            <i class="fas fa-users"></i> </span>
                          <p style="text-shadow: 2px 2px 2px #000000;"  class="pl-3">Proveedor</p>
                        </a>
                        <style> #Drivers:hover{background: #d3944d65; border-radius:15px; } </style>

                        <a id="Productos" class="py-2 item" style='text-decoration:none;
                              outline-style: none; cursor:pointer; display:flex; 
                              justify-content:center; width:100%; '>
                          <span style="font-size:1em; text-shadow: 2px 2px 2px #000000;">
                            <i class="fas fa-clock"></i></span>

                          <p style="text-shadow: 2px 2px 2px #000000;" class="pl-3">Productos</p>
                        </a>
                        <style> #Productos:hover{background: #d3944d65; border-radius:15px; } </style>

                </div>

            </div> 
            <p style="text-shadow: 2px 2px 2px #000000;"  style="font-size:13px;" class="pl-4 pt-2">Ajustes</p>
            <div style="font-size: 12px;" class="row end-xs Ajustes">
                
                <a class="item2 " style='text-decoration:none; 
                    outline-style: none; cursor:pointer;  color:#d9d9d9; 
                    padding-right:3em;  width:100%; ' href="../../controller/getout.php">
                  <span style="font-size:1em; text-shadow: 2px 2px 2px #000000;">
                    <i class="fas fa-sign-out-alt"></i>
                  </span>
                  <p style="text-shadow: 2px 2px 2px #000000;"  class="pl-3 pb-4">Salir</p>
                </a>
            </div>

      </nav>

      <?php include('../header.php'); ?>

      <!-- SECCION DEL PANEL DE PEDIDOS DE CLIENTES-->
      <nav id="Home_section" class="table col-md-12" style="margin-top:3.5em; z-index:10;">
         <table  class="bg-primary  table table-bordered table-sm text-center" >
              <thead id="Client_wanted">
              </thead>      
         </table>
         
         
          <nav>
            <table class="bg-primary  table table-bordered table-sm text-center">
              <!--tabla pequeña com borde-->
              <thead>
                <tr>
                  <td style="font-family: sans-serif; font-size: 14px;"><strong>Fecha y Hora</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Proveedor</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Producto</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Presentación</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Cantidad</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Importe</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Pago</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Acción</strong></td>

                </tr>
              </thead>

              <tbody id="clients" style="font-size:13px;">

              </tbody>
            </table>
          </nav>
      </nav>

      <!-- SECCION PARA AGREGAR Y VISUALIZAR CHOFERES-->
      <nav id="Drivers_section" style="width:100%; margin-top: 4em;" class="row">
         <div class="row  ">
             <div class="card col-xs-9 col-sm-4 col-md-3 col-lg-3 ">
                        <nav style="display:flex; justify-content:center; ">
                          <div style="text-align: center; margin-left:3em;"  >
                          <h4 class="text-dark">Agregar Proveedor</h4>
                          </div>
                        </nav>
                          
                        <div class="card-body" style="margin-left:3em;">
                                <form  method="post" id="drivers-form"  enctype="multipart/form-data">
                                    
                                    <label for="photo_driver" style="cursor: pointer;">
                                        <img  class="col-md-12"src="../../resource/defaunt_img.png" >
                                    </label>
                                    <div class="form-group" >
                                        <input id="photo_driver" class="navbar text-center" type="file" name="foto_proveedor" 
                                        style="font-size:11px; outline: none;">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nombre_proveedor"
                                        id="enrollment_driver" placeholder="Nombre del proveedor "  style="font-size:11px; ">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nombre_usuario"
                                        id="enrollment_driver" placeholder="Crea un nombre de usuario "  style="font-size:11px; ">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type="text" name="direccion_proveedor" 
                                        id="name_driver"  placeholder="Dirección "  style="font-size:11px; ">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="number" step="any" name="telefono_proveedor"  
                                        id="dni_driver" placeholder="Teléfono" style="font-size:11px; ">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="dni_proveedor"   
                                        id="phone_driver" placeholder="DNI" style="font-size:11px; ">
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" name="send_driver"  id="send_driver" value="Registrar" class="btn btn-primary text-center btn-block"> <!--Texto centrado y que ocupe toda el card-->
                                    </div>
                                   

                                </form>
                        </div>
            </div>
          
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
              
                    <table  class="bg-info  table table-bordered table-sm text-center align-self-center ">
                    <!--tabla pequeña com borde-->
                    <thead>
                      <tr>
                      <td style="font-family: sans-serif; font-size: 14px;"><strong>Foto</strong></td>
                        <td style="font-family: sans-serif; font-size: 14px;"><strong>Nombre</strong></td>
                        <td style="font-family: sans-serif;font-size: 14px;"><strong>Dirección</strong></td>
                        <td style="font-family: sans-serif;font-size: 14px;"><strong>Dni</strong></td>
                        <td style="font-family: sans-serif;font-size: 14px;"><strong>Teléfono</strong></td>
                        <td style="font-family: sans-serif;font-size: 14px;"><strong>Acción</strong></td>
                      </tr>
                    </thead>
                    <tbody id="drivers" style="font-size:14px;" > 
                    </tbody>
                    </table>
            </div>
         </div>
      </nav>      

      <!-- SECCION DEL LOS REPORTES GRÁFICOS-->
      <nav id="Reports_section" class="row center-xs container around-xs bg-light py-4 pr-4" style="width:100%; margin:auto; margin-top: 4em;"  >          
               <h3 style="color:#000000; margin-top:2em;">Reporte de clientes y utilidad</h3>
               <?php include('Graphics_Reports/line_graphics.php'); ?> 
               <h3 style="color:#000000; margin-top:2em;">Ingresos mensuales de ciudades </h3>

               <?php include('Graphics_Reports/bar_graphics.php'); ?>
               <h3 style="color:#000000; margin-top:2em;">Gráfico de secciones estatégicas</h3>
               <?php include('Graphics_Reports/pie_grapichs.php'); ?>
      </nav>

      <!-- SECCION  PARA MOSTRAR Y AGREGAR PRODUCTOS -->

      <div id="Products_section">

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="../../resource/slide1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="../../resource/slide3.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="../../resource/slide2.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
          </div>

          <style>
              .carouselExampleIndicators, .carousel-inner > .carousel-item > img {
              margin-top: 3em;
              height: 60vh;
            }

            #carouselExampleIndicators{
              width: 100vw;
            }
            
            @media only screen and (max-width: 600px) {
              .carouselExampleIndicators, .carousel-inner > .carousel-item > img {
              margin-top: 3em;
              height: 30vh;
        
            }
            #carouselExampleIndicators{
              width: 100%;
            }
           
            }
          </style>

          <div id="btn-newproduct" style="display:flex;  justify-content:center; margin-top:6em;">
            <input type="su bmit" name="send_driver"  id="send_driver" value="Agregar producto" class="btn btn-warning text-center "> <!--Texto centrado y que ocupe toda el card-->
          </div>

          <div id="New_product" class="card-body container bg-light" style="max-width:30vw; margin-top:4em;">
              <form  method="post" id="products-form"  enctype="multipart/form-data">
                  <label for="photo_product" style="cursor: pointer;">
                      <img  class="col-md-12"src="../../resource/defaunt_img.png" >
                  </label>
                  <div class="form-group" >
                      <input id="photo_product" class="navbar text-center" type="file" name="foto_cerveza" 
                      style="font-size:11px; outline: none;">
                  </div>
                  <div class="form-group">
                      <input class="form-control" type="text" name="nombre_producto"
                      id="enrollment_driver" placeholder="Nombre del producto "  style="font-size:14px; ">
                  </div>

                  <div class="form-group">
                      <input class="form-control" type="text" name="descripcion_producto"
                      id="enrollment_driver" placeholder="Descripción del producto" style="font-size:14px; ">
                  </div>

                  <div class="form-group">
                      <input class="form-control" type="text" name="presentacion_producto"
                      id="enrollment_driver" placeholder="Presentación"  style="font-size:14px; ">
                  </div>      

                  <div class="form-group">
                      <input class="form-control" type="number" step="0.01" name="precio_producto"
                      id="enrollment_driver" placeholder="Precio"  style="font-size:14px; ">
                  </div>  

                  

                  <input type="submit" name="send_driver"  id="send_driver" value="Agregar" class="btn btn-success btn-block text-center "> <!--Texto centrado y que ocupe toda el card-->

                      
              </form>
          </div>

          <nav id="Listar_product" class="container" style="display:flex; justify-content:center; align-items:center; flex-wrap:wrap;">
              
          </nav>

      </div>
      
  </div>

  <script src="../../app/jquery.min.js"></script>
  <script src="menu.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>



<style>
  input[type="file"] {
    color: transparent;


}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] { -moz-appearance:textfield; }
  @media only screen and (max-width: 600px) {
  }
</style>
</html>