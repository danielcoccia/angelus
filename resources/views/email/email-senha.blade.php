<?php
        $para="moisesshalon72@gmail.com";


        // $txtnome=$_POST['nome'];
        // $txtelefone=$_POST['telefone'];
        // $txtemail=$_POST['email'];
        // $txtempresa=$_POST['assunto'];
        // $txtmensagem=$_POST['textoEmail'];

        $texto="Contato: Teste";

        //Monta Cabeçalho da Mensagem
        $headers  = "From: $para\n";
        $headers .= "X-Sender: <moisesshalon72@gmail.com> \n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";


        //Envia Email
        if (mail($para, "Contato do Site", $texto,$headers)) {
            //Caso O email tenha sido enviado com sucesso chama a página de Email OK
            //$redirecionar="http://www.misterlimpe.com.br/view/contato.php";
            //header("Location: $redirecionar");
            echo 'oks';
        }
        else {
            //Exibe mensagem caso algo de errado tenha ocorrido
            echo "Ocorreu um erro durante o envio do email.";
        }
