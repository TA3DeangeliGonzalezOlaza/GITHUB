<?php
require_once('config.php');
//include("../PHPMailer-master/class.phpmailer.php");
//include("../PHPMailer-master/class.smtp.php");
/*
 *OTRA FUNCION CONECTAR
function conectar()
{
    try {  
        $conexion = new PDO('mysql:host=localhost;dbname=7curso', 'root', '');
        $conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($conexion);
    } catch (PDOException $e) {
        
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";

        exit();
    }
}
*/

function conectar()
{
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=e-comerce', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return($conexion);
    } catch (PDOException $e) {
        
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";

        exit();
    }
}

function desconectar($conexion)
{
   $conexion=null;
  
}

function salir() {
	session_unset();
	session_destroy();

}

//Función para enviar correo
//Envía correo
    function enviarCorreo($destinatario,$asunto,$cuerpoCont,$cc)
    {
                          
        //Setea el servidor de correo a utilizar
        ini_set('SMTP',"smtp.gmail.com");    

        $cuerpo = "<html>
                    <body>"
                    
                    .$cuerpoCont.
                    
                    "<P style='LINE-HEIGHT: 100%'>
                    <SPAN style='COLOR: green; FONT-FAMILY: Webdings'>
                    <FONT face=Webdings color=green size=6>P</FONT>
                    </SPAN>
                    <br /><br />
                    <FONT face=Tahoma color=green size=1>
                    <SPAN style='FONT-SIZE: 8pt; COLOR: green; FONT-FAMILY: Tahoma'>
                        Si puedes evitarlo, no imprimas este mensaje. El medio ambiente está en tus manos.</SPAN>
                    </FONT>
                    </P>

                    </body>
                   </html>";

        //para el envío en formato HTML
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //Dirección del Remitente
        $headers .= "From: ".'Administrador <fabrizioolaza@gmail.com>'."\r\n";

        //Dirección de Respuesta.

        $headers .= "Reply-To: ".'fabrizioolaza@gmail.com'."\r\n";
        if (trim($cc)<>'')
        {
          $headers.="Cc:".'fabrizioolaza@gmail.com'."\r\n";
        }
       

        return(mail($destinatario,$asunto,$cuerpo,$headers));
    }
    
    
function enviarCorreo2() {

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	//$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "";
	$mail->Password = "";
	$mail->From = "";
	$mail->FromName = "";
	$mail->Subject = "";
	$mail->AltBody = "Este es un mensaje de prueba.";
	$mail->MsgHTML("<b>Este es un mensaje de prueba</b>.");
	//$mail->AddAttachment("files/files.zip");
	//$mail->AddAttachment("files/img03.jpg");
	$mail->AddAddress("", "");
	$mail->IsHTML(true);
	if(!$mail->Send()) {
	 echo "Error: " . $mail->ErrorInfo;
	 } else {
	 echo "Mensaje enviado correctamente";
	 }
}
    


function enviarCorreo3() {

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "aledomin@gmail.com";
	$mail->Password = "California67";
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> >>
	//====== DE QUIEN ES ========
	$mail->From = "aledomin@gmail.com";
	$mail->FromName = "Alejandra Domínguez";
	//====== PARA QUIEN =====================
	$mail->Subject = "E-mail ";
	$body =" Notificacion ";
	$mail->Body = "cuerpo";
	$mail->AltBody = ".";	
	$mail->AddAddress("aledomin@gmail.com","Correo");


if($mail->Send()) {
} else {
echo "Error al enviar mensaje: " . $mail->ErrorInfo;
}  
} 
?>    