<?php
include 'config.php';

if(isset($_POST['submit'])){

    if(strlen($_POST['password']) > 16){
            //verificar se a senha é menor que 16 caracteres
    echo "

        <script>
            alert('Sua senha deve ter até 16 caracteres.');
            window.location.href = 'signup.html';
        </script>

    ";
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = md5($_POST['password']);

    $email_dup = mysqli_query($con, " SELECT email FROM tbUsuario WHERE email LIKE '$email'");

    if(mysqli_num_rows($email_dup)){
        //verificar se o email é existente
    echo "

        <script>
            alert('Esse Email já está cadastrado :(');
            window.location.href = 'signup.html';
        </script>

    ";
    } else {
        //inserir dados
    mysqli_query($con, " INSERT INTO tbUsuario(id, nome, email, numero, senha) VALUES (default, '$name','$email','$number','$password');");

    echo "

        <script>
            alert('Registrado com sucesso!');
            window.location.href = 'login.html';
        </script>

    ";
    }
}