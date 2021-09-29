
<?php

if(isset($_POST['x'])){

			$dadosfunci = "%{$_POST['x']}%";
		
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nomecomp LIKE ? ");
		
       		$sql->execute($dadosfunci);

       		if($sql->rowCount() > 0){

        	$resultado = $sql->fetchAll();

        	foreach ($resultado as $resultado){ ?>

        		<li>
        			<a href=""></a><?=$resultado['nomecomp']?>
        		</li>

        	<?php

        	} 

        }else echo "Não existe este funcionário";

	}

	?>