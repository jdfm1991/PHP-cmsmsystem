<?php
/*
set_time_limit(0);


include_once '../acceso/conection.php';
session_name('4dm0n0nl1ne*C0nf1t3r14');
session_start();
$correo = $_POST['correo'];
$recupera_correo = $bd->getRecuperaCorreo($correo);
if ($recupera_correo) {
  $new_pass = $bd->randomString();
  $correo_a = array(
    'pass' => md5($new_pass),
    'correo' => $correo,
  );
  $update_correo = $bd->updateUsuarioCorreoAdmin($correo_a);
  if ($update_correo) {
    include_once"conf_correo.php";
   $mail->FromName = "Confimania! Sistema administrativo";
   $mail->Timeout = 15;
   $mail->Subject = "Confimania! Recuperación de contraseña";
   $mail->AddAddress($correo);
   $mail->AddBCC('webmaster@confimania.com');
   */
   $body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
   <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
   <head>
   <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
   <meta name='x-apple-disable-message-reformatting' />
   <meta name='viewport' content='width=device-width, initial-scale=1.0' />
   <style type='text/css'>
   body, .maintable { height:100% !important; width:100% !important; margin:0; padding:0;}
   img, a img { border:0; outline:none; text-decoration:none;}
   p {margin-top:0; margin-right:0; margin-left:0; padding:0;}
   .ReadMsgBody {width:100%;}
   .ExternalClass {width:100%;}
   .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
   img {-ms-interpolation-mode: bicubic;}
   body, table, td, p, a, li, blockquote {-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;}
   </style>
   <style type='text/css'>
   @media only screen and (max-width: 480px) {
     .rtable {width: 100% !important;}
     .rtable tr {height:auto !important; display: block;}
     .contenttd {max-width: 100% !important; display: block; width: auto !important;}
     .contenttd:after {content: '; display: table; clear: both;}
     .hiddentds {display: none;}
     .imgtable, .imgtable table {max-width: 100% !important; height: auto; float: none; margin: 0 auto;}
     .imgtable.btnset td {display: inline-block;}
     .imgtable img {width: 100%; height: auto !important;display: block;}
     table {float: none;}
     .mobileHide {display: none !important;}
   }
   </style>
   <!--[if gte mso 9]>
   <xml>
   <o:OfficeDocumentSettings>
   <o:AllowPNG/>
   <o:PixelsPerInch>96</o:PixelsPerInch>
   </o:OfficeDocumentSettings>
   </xml>
   <![endif]-->
   <title></title>
   </head>
   <body style='overflow: auto; padding:0; margin:0; font-size: 12px; font-family: arial, helvetica, sans-serif; cursor:auto; background-color:#444545'>
   <table cellspacing='0' cellpadding='0' width='100%' bgcolor='#444545'>
   <tr>
   <td style='FONT-SIZE: 0px; HEIGHT: 0px; LINE-HEIGHT: 0'></td>
   </tr>
   <tr>
   <td valign='top'>
   <table class='rtable' style='WIDTH: 600px; MARGIN: 0px auto' cellspacing='0' cellpadding='0' width='600' align='center' border='0'>
   <tr>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 600px; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 0px; TEXT-ALIGN: left; PADDING-TOP: 0px; PADDING-LEFT: 0px; BORDER-LEFT: medium none; PADDING-RIGHT: 0px; BACKGROUND-COLOR: #feffff'>
   <table style='WIDTH: 100%' cellspacing='0' cellpadding='0' align='left'>
   <tr style='HEIGHT: 124px' height='124'>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 114px; VERTICAL-ALIGN: top; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 5px; TEXT-ALIGN: left; PADDING-TOP: 5px; PADDING-LEFT: 15px; BORDER-LEFT: medium none; PADDING-RIGHT: 15px; BACKGROUND-COLOR: transparent'><!--[if gte mso 12]>
   <table cellspacing='0' cellpadding='0' border='0' width='100%'><tr><td align='center'>
   <![endif]-->
   <table class='imgtable' style='MARGIN: 0px auto' cellspacing='0' cellpadding='0' align='center' border='0'>
   <tr>
   <td style='PADDING-BOTTOM: 2px; PADDING-TOP: 2px; PADDING-LEFT: 2px; PADDING-RIGHT: 2px' align='center'>
   <table cellspacing='0' cellpadding='0' border='0'>
   <tr>
   <td style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; BACKGROUND-COLOR: transparent'><img style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; DISPLAY: block' alt='' src='https://www.confimania.com/img/logos/logo_mail_registro.png' width='110' hspace='0' vspace='0' /></td>
   </tr>
   </table>
   </td>
   </tr>
   </table>
   <!--[if gte mso 12]>
   </td></tr></table>
   <![endif]--></th>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 426px; VERTICAL-ALIGN: middle; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 5px; TEXT-ALIGN: left; PADDING-TOP: 5px; PADDING-LEFT: 15px; BORDER-LEFT: medium none; PADDING-RIGHT: 15px; BACKGROUND-COLOR: transparent'>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 24px; FONT-FAMILY: geneve, arial, helvetica, sans-serif; COLOR: #7b7c7c; TEXT-ALIGN: left; MARGIN-TOP: 0px; LINE-HEIGHT: 37px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='left'>LA CONFITER&Iacute;A&nbsp;ONLINE</p>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 10px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #7c7c7c; TEXT-ALIGN: left; MARGIN-TOP: 0px; LINE-HEIGHT: 12px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='left'>&nbsp;</p>
   </th>
   </tr>
   </table>
   </th>
   </tr>
   <tr>
   <th class='contenttd' style='BORDER-TOP: #70b4f9 5px solid; BORDER-RIGHT: medium none; WIDTH: 600px; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 0px; TEXT-ALIGN: left; PADDING-TOP: 0px; PADDING-LEFT: 0px; BORDER-LEFT: medium none; PADDING-RIGHT: 0px; BACKGROUND-COLOR: #feffff'>
   <table style='WIDTH: 100%' cellspacing='0' cellpadding='0' align='left'>
   <tr style='HEIGHT: 338px' height='338'>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 570px; VERTICAL-ALIGN: top; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 20px; TEXT-ALIGN: left; PADDING-TOP: 20px; PADDING-LEFT: 15px; BORDER-LEFT: medium none; PADDING-RIGHT: 15px; BACKGROUND-COLOR: transparent'>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 24px; FONT-FAMILY: geneve, arial, helvetica, sans-serif; COLOR: #2d2d2d; TEXT-ALIGN: left; MARGIN-TOP: 0px; LINE-HEIGHT: 37px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='left'>Recuperar contrase&ntilde;a</p>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 14px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #575757; TEXT-ALIGN: justify; MARGIN-TOP: 0px; LINE-HEIGHT: 22px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='justify'>Estimado(a):<br />
   <br />
   Su solicitud de&nbsp;recuperar su&nbsp;contrase&ntilde;a de usuario administrativo&nbsp;se&nbsp;ha realizado exitosamente.<br />
   Los datos son los siguientes:</p>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 14px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #575757; TEXT-ALIGN: center; MARGIN-TOP: 0px; LINE-HEIGHT: 22px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='center'><span size='+0'><strong>Contrase&ntilde;a provisional: $new_pass</strong></span></p>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 14px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #575757; TEXT-ALIGN: justify; MARGIN-TOP: 0px; LINE-HEIGHT: 22px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='justify'>En caso de no haber realizado esta solicitud, hacer caso omiso a este correo.</p>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 11px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #575757; TEXT-ALIGN: justify; MARGIN-TOP: 0px; LINE-HEIGHT: 17px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='justify'><em>El presente correo es enviado autom&aacute;ticamente por nuestro sistema, por favor, no responda ni reenv&iacute;e mensajes a esta cuenta</em></p>
   </th>
   </tr>
   </table>
   </th>
   </tr>
   <tr>
   <th class='contenttd' style='BORDER-TOP: #70b4f9 5px solid; BORDER-RIGHT: medium none; WIDTH: 600px; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 0px; TEXT-ALIGN: left; PADDING-TOP: 0px; PADDING-LEFT: 0px; BORDER-LEFT: medium none; PADDING-RIGHT: 0px; BACKGROUND-COLOR: #feffff'>
   <table style='WIDTH: 100%' cellspacing='0' cellpadding='0' align='left'>
   <tr style='HEIGHT: 92px' height='92'>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 570px; VERTICAL-ALIGN: top; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 20px; TEXT-ALIGN: left; PADDING-TOP: 20px; PADDING-LEFT: 15px; BORDER-LEFT: medium none; PADDING-RIGHT: 15px; BACKGROUND-COLOR: transparent'>
   <div style='PADDING-BOTTOM: 10px; TEXT-ALIGN: center; PADDING-TOP: 10px; PADDING-LEFT: 10px; PADDING-RIGHT: 10px'>
   <table class='imgtable' style='DISPLAY: inline-block' cellspacing='0' cellpadding='0' border='0'>
   <tr>
   <td style='PADDING-RIGHT: 5px'><a href='https://www.facebook.com/laconfiteriaonline' target='_blank'><img title='Facebook' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; DISPLAY: block' alt='Facebook' src='https://www.confimania.com/img/logos/logo_facebook_registro.png' width='32' /></a> </td>
   <td><a href='https://www.instagram.com/confimania' target='_blank'><img title='Instagram' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; DISPLAY: block' alt='Instagram' src='https://www.confimania.com/img/logos/logo_instagram_registro.png' width='32' /></a> </td>
   </tr>
   </table>
   </div>
   </th>
   </tr>
   </table>
   </th>
   </tr>
   <tr>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 600px; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 1px; TEXT-ALIGN: left; PADDING-TOP: 1px; PADDING-LEFT: 0px; BORDER-LEFT: medium none; PADDING-RIGHT: 0px; BACKGROUND-COLOR: transparent'>
   <table style='WIDTH: 100%' cellspacing='0' cellpadding='0' align='left'>
   <tr style='HEIGHT: 59px' height='59'>
   <th class='contenttd' style='BORDER-TOP: medium none; BORDER-RIGHT: medium none; WIDTH: 570px; VERTICAL-ALIGN: top; BORDER-BOTTOM: medium none; FONT-WEIGHT: normal; PADDING-BOTTOM: 1px; TEXT-ALIGN: left; PADDING-TOP: 1px; PADDING-LEFT: 15px; BORDER-LEFT: medium none; PADDING-RIGHT: 15px; BACKGROUND-COLOR: transparent'>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 10px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #7c7c7c; TEXT-ALIGN: center; MARGIN-TOP: 0px; LINE-HEIGHT: 12px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='center'><strong>Confimania La Confiter&iacute;a OnLine</strong>&nbsp;- Ciudad Guayana, Edo. Bol&iacute;var, Venezuela<br />
   <a style='COLOR: #dfe0e0' href='https://www.confimania.com/'>www.confimania.com</a></p>
   <p style='MARGIN-BOTTOM: 1em; FONT-SIZE: 10px; FONT-FAMILY: arial, helvetica, sans-serif; COLOR: #7c7c7c; TEXT-ALIGN: center; MARGIN-TOP: 0px; LINE-HEIGHT: 12px; BACKGROUND-COLOR: transparent; mso-line-height-rule: exactly' align='center'>&copy;2019 Confimania. Todos los derechos reservados.</p>
   </th>
   </tr>
   </table>
   </th>
   </tr>
   </table>
   </td>
   </tr>
   <tr>
   <td style='FONT-SIZE: 0px; HEIGHT: 8px; LINE-HEIGHT: 0'>&nbsp;</td>
   </tr>
   </table>
   <!-- Created with MailStyler 2.5.5.100 -->
   </body>
   </html>
   ";

   echo $body;
   /*d
   $mail->Body = $body;
   $mail->Send();
   $mensaje = array(
    'titulo' => 'Contraseña recuperada',
    'descripcion' => 'Se ha enviado un correo electrónico con su nueva clave',
    'tipo' => 'success',
  );
 } else {
  $mensaje = array(
    'titulo' => 'Error',
    'descripcion' => 'Se ha producido un error',
    'tipo' => 'danger',
  );
}
$_SESSION['mensaje'] = $mensaje;
} else {
  $mensaje = array(
    'titulo' => 'Error',
    'descripcion' => 'El correo electrónico no se encuentra registrado',
    'tipo' => 'danger',
  );
  $_SESSION['mensaje'] = $mensaje;
}
header('Location: ' . $ruta_admin);

<?php
/*
require_once("../PHPMailer\class.phpmailer.php");
require_once("../PHPMailer\class.smtp.php");

/*require_once 'PHPMailer\class.phpmailer.php';
require_once 'PHPMailer\class.smtp.php';

$fecha = date('d-m-Y');

$mail = new PHPMailer();
$mail->SetLanguage("en", 'phpMailer/language/');

//Indicamos a la clase phpmailer donde se encuentra la clase smtp
$mail->PluginDir = "";

//Indicamos que vamos a conectar por smtp
$mail->Mailer = "smtp";

//Nuestro servidor smtp. Como ves usamos cifrado ssl
$mail->Host = "mail.serviciosnavalesdelsur.com";

//Puerto de gmail 465
$mail->Port = "587";

//Le indicamos que el servidor smtp requiere autenticación
$mail->SMTPAuth = true;
$mail->CharSet = "utf-8";

$mail->Username = "gerenteadministrativo@serviciosnavalesdelsur.com";
$mail->Password = "Murcielago2020";
$mail->From = "gerenteadministrativo@serviciosnavalesdelsur.com";
$mail->FromName = 'asunto del mensaje';
$mail->Timeout = 30;

$mail->AddAddress("jovannifranco@gmail.com");

date_default_timezone_set('America/Caracas');
$time = date("Y-m-d h:i:s a");
$mail->Subject = 'asunto del mensaje' ;
$mail->Body = "kjksjskjk";

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
