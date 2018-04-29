<?php
    $idMarca=$_GET["marca"];
    conectar();
    $sql="SELECT * FROM modelos WHERE id_marca = '".$idMarca."' order by titulo";
    echo "<select id='modelo' name='modelo'>";
    echo "<option>Seleccione modelo...</option>";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)){
    echo "<option value='".$row['ID']."'>".$row['titulo']."</option>";
    }
    echo "</select>";

?>