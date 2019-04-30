<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Notificacao_Controller extends Pattern_Controller
{

	/*
		Envia email para usuário.
		@param $destinatario = String - endereço de e-mail a ser enviado
		@param $assunto = String - Assunto do e-mail
		@param $mensagem = String - Texto da mensagem
		@return = String - "Sent" se ok, "Error" se não
	*/
	public function email($destinatario, $assunto, $mensagem)
	{

		$headers = "From: Thoth <noreply@lesse.com.br> \r\n"
							."MIME-Version: 1.0 \r\n"
							."Content-Type: text/html; charset=UTF-8 \r\n";

		if( mail($destinatario, $assunto, $mensagem, $headers) )
		{
			return "Sent";
		}
		else
		{
			return "Error";
		}
		
	}
}
