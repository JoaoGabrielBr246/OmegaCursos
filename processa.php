<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['cpf'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "joaogabldr@outlook.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "joaogabldr@outlook.com");
        $content = new SendGrid\Content("text/html", "Olá Paulo, 
        <br><br>Nova mensagem de contato<br>
        <br>Nome: $nome<br>
        Email: $email <br>
        CPF: $cpf<br>
        Telefone: $telefone"
    );
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>
