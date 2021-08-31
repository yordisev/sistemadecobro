<?php
 require_once('../../config/database.php');

$action = (isset($_REQUEST['action']));
if($action == 'ajax'){
	
    
    $query = "SELECT * FROM tmp_ventas order by id_venta";
$resultado = mysqli_query($conn, $query);
if(!$resultado){
    die('La consulta fallo'. mysqli_error($conn));
}

	$items=1;
    $suma=0;
    

while($row = mysqli_fetch_array($resultado)){

			$total=$row['cantidad']*$row['precio'];
			$total=number_format($total,2,'.','');
        ?>
        

	<tr>
		<td class='text-center'><?php echo $items;?></td>
		<td class='text-center'><?php echo $row['cantidad'];?></td>
		<td class='text-center'><?php echo $row['unidad'];?></td>
		<td><?php echo $row['descripcion'];?></td>
		<td class='text-right'><?php echo $row['precio'];?></td>
		<td class='text-right'><?php echo $total;?></td>
		<td class='text-right'><a class="btn btn-danger btn-xs" href="#" onclick="eliminar_item('<?php echo $row['id_venta']; ?>')" ><i class="fa fa-trash-o"></i></a></td>
    </tr>	
    

		<?php
		$items++;
		$suma+=$total;
	}
	?>
	<tr>
		<td colspan='5' class='text-right'>
			<h4>TOTAL USD</h4>
		</td>
		<th class='text-right'>
			<h4><?php echo number_format($suma,2);?></h4>
		</th>
		<td></td>
	</tr>
<?php

}
?>