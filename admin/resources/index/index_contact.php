<?php

set_time_limit(0);
ini_set('memory_limit', '512M');


//-------------------------------------------------------------
setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
date_default_timezone_set('America/Caracas');
$time = date("d-m-Y h:i:s a");
$actual = date("d/m/Y");

//$modelos = new querys_remumen_modelo();
		$nombre = $_POST['name'];
        $email = $_POST['email'];
		$mensaje = $_POST['message'];
        $subject = $_POST['subject'];


echo $encabezado = "

<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'
xmlns:v='urn:schemas-microsoft-com:vml'
xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
<!--[if gte mso 9]><xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml><![endif]-->
<!-- fix outlook zooming on 120 DPI windows devices -->
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>

<title>CM & SM Systems</title>

<table width='800' border='0' cellpadding='0' align='center' cellspacing='0' class='force-row' >

<tr>
<th>
<img src='../../assets/img/logo.png' alt='Logo' width='210' height='100' style='display: block;' />
</th>

<td style=' color: black; font-family:Trebuchet MS; font-size:24px; '>
<strong> &nbsp;&nbsp;CM & SM Systems</strong>
</td>

</tr>

</table>

<table width='1000' border='0' cellpadding='0' align='center' cellspacing='0' class='force-row' >

<tr>
<th style=' color: black; font-family:Trebuchet MS; font-size:24px; '>
<p style='font-size:14px; text-align:center; '> Fecha: $time</p>
</th>

</tr>

<tr>
<th style=' color: black; font-family:Trebuchet MS; font-size:24px; '>
<p style='font-size:14px; text-align:center; '> Nombre: $nombre</p>
</th>

</tr>

<tr>
<th style=' color: black; font-family:Trebuchet MS; font-size:24px; '>
<p style='font-size:14px; text-align:center; '> Email: $email</p>
</th>

</tr>
</table>
";

/*cuerpo_mensaje*/
echo $cuerpo_mensaje = "

<br>

<table width='600' border='0' cellpadding='0' align='center' cellspacing='0' class='force-row' >

<td  style='font-family:Trebuchet MS;font-size:16px;font-weight:600;color:#2469A0;padding-bottom:10px; border-bottom: 2px solid #2469A0;'>
MENSAJE
</td>

</table>

<br>
<table width='600' border='0' cellpadding='0' align='center' cellspacing='0' class='force-row'  >


<td valign='top' style='font-family:Trebuchet MS;font-size:14px;border-bottom:1px solid white; border-top:1px solid white;font-size:14px;color:#565458; line-height:2em;'>
" . $mensaje . "

</td>
</tr>

</table>

<br>
";




echo $footer = "
<br>
<table width='1000' border='0' cellpadding='0' align='center' cellspacing='0' class='force-row' >


</table>

<div class='hr' style='height:1px;border-bottom:1px solid #FFFFFF;clear: both; background-color: #BA4949; height:80px; text-align:center;color:#FFFFFF;'> &nbsp;

<p style='font-family:Trebuchet MS; '>CM & SM Systems</p>

</div>

<!--/600px container -->
<br>

</td>
</tr>

</html>

";

?>
<?php

require_once("../PHPMailer\class.phpmailer.php");
require_once("../PHPMailer\class.smtp.php");

/*require_once 'PHPMailer\class.phpmailer.php';
require_once 'PHPMailer\class.smtp.php';*/

$fecha = date('d-m-Y');

$mail = new PHPMailer();
$mail->SetLanguage("en", 'phpMailer/language/');

//Indicamos a la clase phpmailer donde se encuentra la clase smtp
$mail->PluginDir = "";

//Indicamos que vamos a conectar por smtp
$mail->Mailer = "smtp";

//Nuestro servidor smtp. Como ves usamos cifrado ssl
$mail->Host = "mail.gconfisur.com";

//Puerto de gmail 465
$mail->Port = "587";

//Le indicamos que el servidor smtp requiere autenticación
$mail->SMTPAuth = true;
$mail->CharSet = "utf-8";

$mail->Username = "noreply@gconfisur.com";
$mail->Password = "@a#&;)hl2@H)";
$mail->From = "noreply@gconfisur.com";
$mail->FromName = $Subject;
$mail->Timeout = 30;

$mail->AddAddress("ajcastillo@gconfisur.com");

date_default_timezone_set('America/Caracas');
$time = date("Y-m-d h:i:s a");
$mail->Subject = $Subject ;
$mail->Body = "
$encabezado $cuerpo_mensaje $footer
";

$mail->AltBody = "CM & SM Systems";
$mail->IsHTML(true);

if ($mail->Send()) {
  
                        $output = [
                            "mensaje" => "Enviado con Exito!",
                            "icono"   => "success"
                        ];
 
  echo "<script>console.log('EXITO: Ejecucion Exitosa.');</script>";
  }else{
						$output = [
                            "mensaje" => "Ocurrió un error al Enviar Mensaje!",
                            "icono"   => "error"
                        ];

	echo "<script>console.log('ERROR: ERROR ".$mail->ErrorInfo."');</script>";
  }
echo json_encode($output);
//echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
?>
