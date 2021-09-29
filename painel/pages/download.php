<?php
	
 	if(isset($_GET['file'])){

	$fileName = @basename($filePath);
	$filePath = $_GET['file'];

	if(file_exists($filePath)){
	
		header('Content-Description: File Transfer');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename='.basename($filePath));
		header('Content-Control: public');

		readfile($filePath);

		exit;
	
	}else{

		echo '<script> alert("Usuário ou senha incorretos!") </script>';
		
	}
}

?>