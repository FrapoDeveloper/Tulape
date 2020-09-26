<?php
include('../../model/database_connect.php');
$valorX = array();
$valorY = array();

$query = "SELECT fecha_venta, importe_venta FROM venta";
$statement = $conn->prepare($query);
$resultado= $statement->execute();
while($row = $statement->fetch()){
  $valorX[] = $row[1];
  $valorY[] = $row[0];
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
<nav class ="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="line_graphics">
      <div>
            <script type="text/javascript">
            
             datosX = cadena_lineal('<?php echo $datosX?>');
             datosY = cadena_lineal('<?php echo $datosY?>');

            
              var trace1 = {
              x: datosX,
              y: datosY,
              type: 'scatter'
            };

          
            var data = [trace1];
            Plotly.newPlot('line_graphics', data);
            </script>

       </div> 
 </nav>