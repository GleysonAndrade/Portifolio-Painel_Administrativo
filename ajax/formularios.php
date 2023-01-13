<?php
	include('../config.php');
	$data = array();
	$assunto = 'Nova mensagem do site!';
	$corpo = '';
	foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).": ".$value;
		$corpo.="<hr>";
	}
	$info = array('assunto'=>$assunto,'corpo'=>$corpo);
	$mail = new Email('mail.lauralacosatelie.com.br','contato@lauralacosatelie.com.br','LfGhB&LpBM3w','Gleyson');
	$mail->addAddress('gleysondev@yahoo.com','Gleyson');
	$mail->formatarEmail($info);
	if ($mail->enviarEmail()) {
		$data['sucesso'] = true;
	} else {
		$data['erro'] = true;
	}

	// $data['retorno'] = 'sucesso';

	die(json_encode($data));
?>