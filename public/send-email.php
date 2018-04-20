<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(!empty($_POST))
{
    $form = $_POST;

    # Topo
    $body .= '<!DOCTYPE html><html><head></head><body style="background-color: #ebebeb;">';
        $body .= '<table width="730" cellspacing="0" cellpadding="0" height="50"></table>';
        $body .= '<table width="730" cellspacing="0" cellpadding="0" align="center" style="background-color: #fff;">';
            $body .= '<tr>';
                $body .= '<td width="50"></td>';
                $body .= '<td>';

                    $body .= '<table width="630" cellspacing="0" cellpadding="0" align="center" style="font-family: Verdana, Arial, sans-serif; background-color: #fff;">';
                        $body .= '<tr height="30"></tr>';
                        $body .= '<tr>';
                            $body .= '<td width="45"></td>';
                            $body .= '<td width="640">';
                                $logo_principal = '';
                                $body .= '<img src="http://citroentrianon.com.br/toriba/c4-lounge-tendance/img/logo.png" width="200" >';
                            $body .= '</td>';
                            $body .= '<td width="45"></td>';
                        $body .= '</tr>';
                        $body .= '<tr height="30"></tr>';
                    $body .= '</table>';

                    $body .= '<table width="630" cellspacing="0" cellpadding="0" align="center" style="font-family: Verdana, Arial, sans-serif; background-color: #fff;">';
                        $body .= '<tr><td colspan="2" align="center"><h3>Contato via site</h3></td></tr>';

                        if ($form['url'] != '') {
                            $body .= '<tr><td style="padding-right:4px; width:24%;"><b>Link:</b> </td><td>'. $form['url'] .'</td></tr>';
                        }
                        if ($form['nome'] != '') {
                            $body .= '<tr><td style="padding-right:4px; width:24%;"><b>Nome:</b> </td><td>'. $form['name'] .'</td></tr>';
                        }
                        if ($form['email'] != '') {
                            $body .= '<tr><td style="padding-right:4px; width:24%;"><b>E-mail:</b> </td><td>'. $form['email'] .'</td></tr>';
                        }
                        if ($form['mensagem'] != '') {
                            $body .= '<tr><td style="padding-right:4px; width:24%;"><b>Mensagem:</b> </td><td>'. $form['mensagem'] .'</td></tr>';
                        }
                        if ($form['endereco'] != '') {
                            $body .= '<tr><td style="padding-right:4px; width:24%;"><b>Endereco:</b> </td><td>'. $form['endereco'] .'</td></tr>';
                        }
                        if ($form['cor'] != '') {
                            $body .= '<tr><td style="padding-right:4px; width:24%;"><b>Cor:</b> </td><td>'. $form['cor'] .'</td></tr>';
                        }
                    $body .= '</table>';

                    # Rodapé
                    $body .= '<table width="630" cellspacing="0" cellpadding="0" align="center" style="font-family: Verdana, Arial, sans-serif; background-color: #fff;">';
                        $body .= '<tr height="30"></tr>';
                        $body .= '<tr>';
                            $body .= '<td width="45"></td>';
                            $body .= '<td width="640">';
                                $body .= '<small><b style="color: #000;">Mensagem de e-mail confidencial.</b></small><br>';
                            $body .= '</td>';
                            $body .= '<td width="45"></td>';
                        $body .= '</tr>';
                        $body .= '<tr height="30"></tr>';
                    $body .= '</table>';

                $body .= '</td>';
                $body .= '<td width="50"></td>';
            $body .= '</tr>';
        $body .= '</table>';
        $body .= '<table width="730" cellspacing="0" cellpadding="0" height="50"></table>';
    $body .= '</body></html>';

    $mail = new PHPMailer(true);
    //Server settings
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'Email';                 // SMTP username
    $mail->Password = 'Senha';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('no-reply@---.com.br', '');

    $mail->addAddress('Email que Ira Receber');
    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Titulo do Email';
    $mail->Body    = $body;

    $mensagem = array();
    if($mail->send())
    {
        $mensagem = array('Mensagem enviada com sucesso.');
    }
    else
    {
        $mensagem = array('Erro ao tentar enviar a mensagem.');
    }
    echo json_encode($mensagem);
}

?>