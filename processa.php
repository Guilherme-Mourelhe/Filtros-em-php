<?php 

include_once 'conecta_banco.php';

var_dump($_POST);

if(isset($_POST['enviar'])){

    $erros = [];

    //Validando input de email
    if(!$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){

        $erros[] = 'Email inválido';
    }

    //validando input de idade
    if(!$idade = filter_input(INPUT_POST, 'idade',FILTER_VALIDATE_INT)){

        $erros[] = 'Idade precisa ser um número inteiro';
    }

    //Validando input de peso
    if(!$peso = filter_input(INPUT_POST,'peso',FILTER_VALIDATE_FLOAT)){

        $erros[] = 'Peso precisa ser no formato nn.n';
    }

    //Validando input de investimento
    if(!$investimento = filter_input(INPUT_POST, 'investimento',FILTER_VALIDATE_FLOAT)){

        $erros[] = 'Investimento precisa ser no formato nn.n';
    }

    if(!empty($erros)){

        foreach($erros as $erro){

            print ('<li>' . $erro . '</li>');
        }
    }else{

        $email = $_POST['email'];
        $idade = $_POST['idade'];
        $peso = $_POST['peso'];
        $investimento = $_POST['investimento'];


        $inserir_dados = "INSERT INTO teste_filtro2 (Email, Idade, Peso, Investimento) VALUES
        ('$email', '$idade','$peso', '$investimento')";

        $query_inserir = mysqli_query($conexao,$inserir_dados);

        print ('<br> Dados cadastrados com sucesso!');


    }   
}

?>