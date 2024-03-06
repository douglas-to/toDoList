<?php
    include_once('../php/db.php');
    include_once('../php/protect.php');
?>
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
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-clipboard-check me-2 text-danger"></i>
                toDoList
            </a>
            <a class="btn btn-danger rounded-0 border-0" style="font-size:12px;" href="../php/logout.php">Sair</a>
        </div>  
    </nav>
    
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-danger rounded-0 border-0 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Criar nova tarefa
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content rounded-0 border-0">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-6" id="exampleModalLabel">Cadastrar tarefa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="../php/listRegister.php" method="POST">
                                <div class="modal-body  border-0">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Título do evento" name="title">
                                        <label for="floatingInput">Título do evento</label>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingInput" placeholder="Data inicial" name="initialDate">
                                        <label for="floatingInput">Data Inicial</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingInput" placeholder="Data final" name="finalDate">
                                        <label for="floatingInput">Data final</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="floatingInput" placeholder="Descrição" name="description"></textarea>
                                        <label for="floatingInput">Descrição</label>
                                    </div>
                                </div>
                                
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-danger rounded-0 border-0">Cadastrar</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        $stmt = $conn->prepare('SELECT * FROM list');
        $stmt->execute();
        $event = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($event as $events){
            ?>
                <div class="container">
                    <div class="card rounded-0 p-2 mt-4 bg-danger" style="width:100%;">
                        <div class="card-body">
                            <h5 class="card-title text-light"><?php echo $events['title'] ?></h5>
                            <p class="card-text text-light">Data inicial do evento: <?php echo $events['initialDate']?></p>
                            <p class="card-text text-light">Data final do evento: <?php echo $events['finalDate'] ?></p>
                            <p class="card-text text-light"><?php echo $events['description'] ?></p>
                            <form action="../php/excluir_atividade.php" method="POST">
                                <input type="hidden" name="atividade_id" value="<?php echo $events['id']; ?>">
                                <button type="submit" class="btn btn-light border-0 rounded-0">Excluir Atividade</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
        };
    ?>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/80eb25f2e1.js" crossorigin="anonymous"></script>
</body>
</html>


