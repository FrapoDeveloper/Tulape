<?php
include('../../model/database_connect.php');
$valorX = array();
$valorY = array();

$query = "SELECT id_proveedor_fk,cantidad_productos FROM venta";

$statement = $conn->prepare($query);
$resultado= $statement->execute();
while($row = $statement->fetch()){
  $valorX[] = $row[0];
  $valorY[] = $row[1];
};

 $datosX = json_encode($valorX);
 $datosY = json_encode($valorY);

?>

<script type="text/javascript">
  function cadena_lineal(json){
    var parsed = JSON.parse(json);
    var arr = [];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }

</script>

<nav class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bar_graphics">
  <div>
  <script type="text/javascript">
            
            datosX = cadena_lineal('<?php echo $datosX?>');
            datosY = cadena_lineal('<?php echo $datosY?>');

             var trace1 = {
             x: datosX,
             y: datosY,
             type: 'bar'
           };
           var data = [trace1];
        Plotly.newPlot('bar_graphics', data);
      </script>
  </div>
</nav>