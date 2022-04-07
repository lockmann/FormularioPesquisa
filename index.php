<?php   

// Trecho em PHP que insere os dados no banco, basta remover a tag de comentário.

/*ifdefine('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'cadastro');

$connect = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
($_POST) {
    $gestor = utf8_encode($_POST['gestor']);
    $setor = utf8_encode($_POST['setor']);
    $espec = $_POST['espec'];
    $ramal = $_POST['ramal'];
    $pp = $_POST['pp'];
    $dt = date("Y-m-d H:i");
     
            
    foreach ($espec as $index => $fname ) { 
        $sql = "INSERT INTO members (gestor, fname, framal, fstatus, dt) VALUES ('$gestor', '$setor - $fname', '$ramal[$index]', '$pp[$index]', '$dt')";
        $insert = $connect->prepare($sql);
        $insert->bindParam(':fname', $fname);
        if ($insert->execute()) {
            $cont_insert = true;
        } else {
            $cont_insert = false;
        };
    };
    $inserido = "<div class='alert alert-success text-center m-4'role='alert'>
						Dados enviados, Obrigado pela colaboração.
				</div>";
    header("refresh: 2 ");
}

*/
?>

<style type="text/css">
    
.mybox{
    max-width: 700px;
    margin: 0 auto;
}

.myform{
    width: 80%;
}
.myform2{
    width: 25%;
}

.list li{
    padding-bottom: 5px;
}

</style>

<!DOCTYPE HTML>
<html lang="pt-br">  
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/style/css/bootstrap.css" />
    <script src="assets/style/jquery/jquery.js"></script>
    <meta charset="utf-8">
    <title>Atualização de ramais</title>
</head>
<body>
<div class="mybox shadow border rounded mt-3">
    <div class="container-fluid text-center mt-3">
        <h3 class="m-0">Atualização de ramais - 2020</h3><br>
    </div>
    <div class="container-fluid">
    	<?php
    		if(isset($inserido)){
    			echo $inserido;    			
    		}else{ ?>
                <div class="alert alert-danger p-2" style="font-size: 12px;">
                            <h6 class="pl-2 text-center">Instruções de preenchimento do formulário</h6>
                            <ul class="pl-4 list">
                                <li><b>Campos *Nome do gestor e *Nome do setor:</b> Preencha com as informações corretas. </li>
                                <li><b>Campo *Departamento/Localidade:</b> Descreva detalhes do ramal, exemplo: Recepção, Sala de reunião, Guichê.</li>
                                <li><b>Campo *Ramal:</b> Digite o número do ramal.</li>
                                <li><b>Campo *Status:</b> Escolha entre Público ou Privado.</li>
                                    <ul>
                                        <li>Público: O ramal ficará disponível para toda a empresa.</li>
                                        <li>Privado: O ramal ficará disponível apenas para uso interno em seu setor.</li>
                                    </ul>
                                <li><b>Adicionar campos:</b> Clique no botão <img src="assets/image/add.png" style="width: 1.6rem; height: 1.6rem;"> para adicionar mais campos.</li>
                            </ul>
                        </div>
		        <form action="" method="POST">
		            <div id="formulario" class="form-group">
		                <div>
		                    <h6>Nome do Gestor</h6>
		                    <input type="text" class="form-control mb-3" name="gestor" required="required" maxlength="20">
		                    <h6>Nome do Setor</h6>
		                    <input type="text" class="form-control mb-3" name="setor" required="required" maxlength="50">
		                </div>
		                <div class="d-flex flex-row bd-highlight mb-2">
		                        <div class="flex-fill mr-2 myform"><input type="text" class="form-control" name="espec[]" required="required" placeholder="Departamento / Localidade" maxlength="30"></div>
		                        <div class="flex-fill mr-2"><input type="text" class="form-control" name="ramal[]" placeholder="Ramal" required="required" maxlength="4"></div>
                                <div class="flex-fill mr-2 myform2"><select class="form-control" name="pp[]"><option value="2">Privado</option><option selected="selected" value="1">Público</option></select></div>
		                        <div class="flex-fill"><button type="button" class="btn btn-success" id="add-campo">+</button></div>
		                </div>
		            </div>
		            <div class="form-group">
		                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
		            </div>
		        </form>
		    <?php }; 	?>
    </div>
</div>
        <script>
            var cont = 1;
            //https://api.jquery.com/click/
            $('#add-campo').click(function () {
                cont++;
                //https://api.jquery.com/append/
                $('#formulario').append('<div class="d-flex flex-row bd-highlight mb-2" id="campo' + cont + '"><div class="flex-fill mr-2 myform"><input type="text" class="form-control" name="espec[]" required="required" placeholder="Departamento / Localidade"></div><div class=" flex-fill mr-2"><input type="text" class="form-control" name="ramal[]" placeholder="Ramal" required="required"></div><div class="flex-fill mr-2 myform2"><select class="form-control" name="pp[]"><option value="2">Privado</option><option selected="selected" value="1">Público</option></select></div><button type="button" id="' + cont + '" class="btn-apagar btn btn-danger">-</button></div>');
            });

            $('form').on('click', '.btn-apagar', function () {
                var button_id = $(this).attr("id");
                $('#campo' + button_id + '').remove();
            });
        </script>
</body>
</html>
