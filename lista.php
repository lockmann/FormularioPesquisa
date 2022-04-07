<?php 

// Trecho em PHP que lista as informações inseridas, basta remover a tag de comentários.

/*$localhost = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cadastro"; 
 
$connect = new mysqli($localhost, $username, $password, $dbname); 

$sql = "SELECT * FROM members ORDER BY fname ASC";
$sql_res = mysqli_query($connect, $sql);

$sql1 = "SELECT * FROM members";
$sql_count =  mysqli_query($connect, $sql1);

$total = mysqli_num_rows($sql_count);
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/style/css/bootstrap.css" />
    <script src="assets/style/jquery/jquery.js"></script>
    <meta charset="utf-8">
    <title>Lista Atualizada</title>
    <style type="text/css">
    	.setores {
    		display: none;
    	}
    </style>
</head>
<body>
	<div class="container">
		<table class="rounded table table-striped table-hover table-sm m-0 text border border-right-0 border-left-0">
			<tbody class="text-left">
					<tr>
						<td class="text-center"><b>Gestor</b></td>
						<td class="pl-3"><b>Setor</b></td>
						<td class="text-center"><b>Ramal</b></td>
					</tr>
				<?php while($row = mysqli_fetch_array($sql_res)){ ?>
					<tr>
					<td class="text-center"><?php echo utf8_decode($row['gestor']) ?></td>
					<td class="pl-3"><?php echo utf8_decode($row['fname']) ?></td>
					<td class="text-center"><?php echo $row['framal'] ?></td>
					</tr>
				<?php }; echo "<b>Total de registros: ".$total."</b>"; ?>
			</tbody>
		</table><br>
		<div class="setores mt-4">
			<table class="rounded table table-striped table-hover table-sm m-0 text border border-right-0 border-left-0">
			<tbody class="text-left">
					<tr>
						<td class=""><b>Setores</b></td>
					</tr>
				<?php while($row = mysqli_fetch_array($sql_res2)){ ?>
					<tr>
					<td class="p-2"><?php echo utf8_encode($row['name']) ?></td>
					</tr>
				<?php }; echo "<b class='mt-4'>Total de registros: ".$totalsetor."</b>"; ?>
			</tbody>
		</table>
		</div>
		
	</div>

</body>
</html>