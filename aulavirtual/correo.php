<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['submit'])){
        
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $msg = $_POST['message'];
            $phone = $_POST['phone'];

            //echo $name, $email, $msg, $phone;
    
            //llamar la libreria
            require './PHPMailer/Exception.php';
            require './PHPMailer/PHPMailer.php';
            require './PHPMailer/SMTP.php';

            //Load Composer's autoloader
            //require 'vendor/autoload.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            header('Location: index.html');

            try {
                //Server settings
                $mail->SMTPDebug = 2;
                $mail->isSMTP();

                $mail->Host       = 'smtp.gmail.com';

                $mail->SMTPAuth   = true;

                $mail->Username   = 'infofuture2022@gmail.com';
                $mail->Password   = 'infofuture12';

                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
            
                //Recipients
                $mail->addAddress('davidrami2000@gmail.com');
                $mail->setFrom('infofuture2022@gmail.com', 'InfoFuture');
                $content = "<b>Email de: ".$email."<br> Nombre y apellidos: ".$name."<br> Teléfono móvil: ".$phone."<br> Nuevo comentario de un usuario: ".$msg."</b>";
            
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Hola. Gracias por contactar con InfoFuture, enseguida te enviaremos mas informacion';
                $mail->MsgHTML($content);
                $mail->send();
                
            } catch (Exception $e) {
                header('Location: index.html');
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
            
        }

    }
?>