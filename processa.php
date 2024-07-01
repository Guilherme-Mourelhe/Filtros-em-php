<?php 

include_once 'conecta_banco.php';

var_dump($_POST);

if(isset($_POST['enviar'])){

    $erros = [];

    //Validando input de email

    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $erros[] = 'Email inválido';
    }

    //validando input de idade
    $idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_NUMBER_INT);
    if(!filter_var($idade,FILTER_VALIDATE_INT)){

        $erros[] = 'Idade precisa ser um número inteiro';
    }

    //Validando input de peso
    $peso = filter_input(INPUT_POST,'peso',FILTER_SANITIZE_NUMBER_FLOAT);
    if(!filter_var($peso,FILTER_VALIDATE_FLOAT)){

        $erros[] = 'Peso inválido. Exemplo de formato: 76.5';
    }

    //Validando input de investimento
    $investimento = filter_input(INPUT_POST,'investimento',FILTER_SANITIZE_NUMBER_FLOAT);
    if(!filter_var($investimento,FILTER_VALIDATE_FLOAT)){

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