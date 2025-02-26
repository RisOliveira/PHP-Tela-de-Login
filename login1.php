<?php
include 'config.php';

if(isset($_POST['login'])){
    
    $uAcesso = $_POST['userConta'];
    $uPassword = md5($_POST['userPassword']);

    $resul = mysqli_query($con, " SELECT * FROM tbUsuario WHERE (email = '$uAcesso' or numero = '$uAcesso') AND senha = '$uPassword';");

    if(mysqli_num_rows($resul)){
        echo "

        <script>
            alert('sucesso!!');
            window.location.href = '/../php/Calculadora.php';
        </script>
        
    ";
    } else { //caso não exista esse usuario
        echo "

        <script>
            window.location.href = 'login.html';
            alert('Usuario ou/e senha inválidos');
        </script>
        
    ";
        }
    }