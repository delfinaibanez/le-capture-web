<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactoController {
    public function index() {
        require_once __DIR__ . '/../views/contacto/index.php';
    }

    public function enviar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /leCapture_web/le-capture-web/contacto');
            exit;
        }

        $nombre  = trim($_POST['nombre'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $mensaje = trim($_POST['mensaje'] ?? '');

        if (empty($nombre) || empty($email) || empty($mensaje)) {
            header('Location: /leCapture_web/le-capture-web/contacto?error=1');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: /leCapture_web/le-capture-web/contacto?error=1');
            exit;
        }

        require_once __DIR__ . '/../../config/mail.php';
        require_once __DIR__ . '/../libs/PHPMailer/src/Exception.php';
        require_once __DIR__ . '/../libs/PHPMailer/src/PHPMailer.php';
        require_once __DIR__ . '/../libs/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USERNAME;
            $mail->Password   = MAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = MAIL_PORT;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            $mail->addAddress(MAIL_TO);
            $mail->addReplyTo($email, $nombre);

            $mail->isHTML(true);
            $mail->Subject = 'Nueva consulta de ' . $nombre;
            $mail->Body    = "
                <div style='font-family:sans-serif;max-width:600px;margin:0 auto;padding:32px;'>
                    <h2 style='color:#a89585;margin-bottom:24px;'>Nueva consulta desde Le Capture</h2>
                    <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
                    <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                    <p><strong>Mensaje:</strong></p>
                    <p style='background:#f5efe8;padding:16px;border-radius:8px;line-height:1.7;'>" 
                    . nl2br(htmlspecialchars($mensaje)) . "</p>
                    <hr style='border:none;border-top:1px solid #ede5dc;margin:24px 0;'>
                    <p style='color:#aaa;font-size:12px;'>Le Capture Fotografía — Mendoza, Argentina</p>
                </div>
            ";

            $mail->send();
            header('Location: /leCapture_web/le-capture-web/contacto?enviada=1');

        } catch (Exception $e) {
            die('Error al enviar: ' . $mail->ErrorInfo);
        }
        exit;
    }
}

