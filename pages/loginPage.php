<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous"
    />
    <title>DesafioPHP</title>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <h1 class="fs-6 fw-semibold text-center mb-3">Desafio toDoList</h1>
                <form action="php/login.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-0" id="floatingInput" placeholder="E-mail" name="email">
                        <label for="floatingInput">E-mail</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Senha" name="password">
                        <label for="floatingPassword">Senha</label>
                    </div>

                    <?php
                        if(isset($_GET['error']) && $_GET['error'] === 'data_err'){
                            echo '
								<div id="mess_time" class="alert alert-danger text-center mt-3 rounded-0" role="alert">
									Dados Incorretos, tente novamente.
								</div>
							';
                        }
                    ?>
                    <button type="submit" class="btn btn-danger rounded-0 border-0 mt-3 w-100" style="font-size:12px;">Entrar</button>
                    <a class="btn btn-danger rounded-0 border-0 mt-3 w-100" style="font-size:12px;" href="register.php">Registrar usuário</a>
                </form>
            </div>
        </div>
    </div>
    
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>

    <script>
        setTimeout(function(){
            document.getElementById('mess_time').style.display = 'none';
        },1600);
    </script>
</body>
</html>