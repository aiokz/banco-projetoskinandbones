<?php
include_once("../connection/connection.php");

if (!empty($_GET['user_id'])) {

    $user_id = $_GET['user_id'];
    $sql_select = "SELECT * FROM tb_user WHERE user_id = $user_id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {

        while ($user_data = mysqli_fetch_assoc($result)) {
            $name = $user_data['user_name'];
            $email = $user_data['user_email'];
        }
    } else {
        header('Location: ../../index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/edit_user.css">
    <link rel="stylesheet" href="../global/css/style.css">
    <script src="js/bootstrap.min.js"></script>

    <script>
        function changeAction() {
            let myform = document.getElementById("myform")
            myform.action = "service/user_update.php"
        }
    </script>
</head>

<body>

    <div class="container">

        <img class="banner-thunnar" src="../global/img/BannerThunnar.png" alt="">

       
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                        <a class="navbar-brand " href="../../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="navbar-brand " href="index.php">User</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div class="manager-user">
            <h1>Cadastro e edição de usuários!</h1>
        </div>

        <form method="post" action="service/process.php" class="m-5" id="myform" autocomplete="off">
            <div class="card-form">
                <div class="inputs">
                    <label for="">Nome</label>
                    <input type="text" name="name" placeholder="Digite o nome completo" value="" autocomplete="off">
                </div>

                <div class="inputs">

                    <label for="">Email</label>

                    <input type="email" name="email" placeholder="Digite o seu e-mail" value="" autocomplete="off">

                </div>
                <div class="inputs">
                    <label for="">Senha</label>
                    <input type="password" name="password" placeholder="Digite a senha" autocomplete="off">
                </div>

                <input class="btn btn-primary" type="submit" value="Cadastrar">

                <input type="hidden" name="id" value="">

                <input onclick="changeAction()" class="btn btn-primary" type="submit" value="Atualizar" name="update" <?php if ($result->num_rows == 0) { ?> disabled="disable" <?php } ?>>

                <a href="index.php" class="btn btn-secondary">Voltar</a>
            </div>


        </form>
    </div>

    <div class="footer">
        <p>Developed for <strong>Saulo Setzer</strong></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>