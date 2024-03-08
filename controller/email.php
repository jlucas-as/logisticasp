<?php
if (isset($_GET['sub_page']) AND $_GET['sub_page'] == 'enviar') {
    require_once(MODEL .'phpmailer/class.phpmailer.php');

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(true);
    $mail->Host       = "mail.logisticasp.com.br";
    $mail->Username   = 'site@logisticasp.com.br';
    $mail->Password   = 'nbKSm}X^nkEr';
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    // $mail->SMTPDebug  = 2;
    $mail->CharSet    = 'utf-8';
    $mail->From       = $_POST['email'];
    $mail->FromName   = $_POST['name'];
    $mail->Subject    = 'Contato do site'; // Assunto da mensagem

    $mail->AddAddress('comercial@logisticasp.com.br');
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->Body       = body($_POST);
    $enviado          = $mail->Send();

    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();

    // Exibe uma mensagem de resultado
    echo ($enviado) ? "<script>alert('E-mail enviado com sucesso!');</script>" : "<script>alert('Erro ao enviar seu e-mail');</script><b>Informações do erro:</b> " . $mail->ErrorInfo;
}

echo '<script>location.href="'. ROOT .'";</script>';

function body($post) {
    $body = '';
    if (isset($post['name']) AND $post['name'] != '') $body .= "Nome: {$post['name']} <br>";
    if (isset($post['email']) AND $post['email'] != '') $body .= "E-mail: {$post['email']} <br>";
    if (isset($post['tel']) AND $post['tel'] != '') $body .= "Telefone: {$post['tel']} <br><br>";
    $body .= nl2br($post['message']);
    return $body;
}
