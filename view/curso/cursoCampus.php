<!DOCTYPE html>
<html lang="en">
<?php $path = 'http://' . $_SERVER["HTTP_HOST"] . '/devweb2'; ?>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Curso</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="<?php echo $path; ?>/arquivos/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $path; ?>/arquivos/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include("../../menu.php") ?>
    <div class="container">
        <div class="row mb-4 mt-4">
            <div class="alert alert-light" role="alert">
                <h1>Cadastro de Curso</h1>
            </div>
        </div>
        <form action="<?php echo $path; ?>/repositorio/curso/salvarCurso.php" method="POST">
            <div class="row mb-3">
                <div class="col col-md-8">
                    <label class="form-label" for="idnome2">Nome do Curso</label>
                    <input class="form-control" type="text" name="nome" id="idnome2">
                </div>

                <div class="col col-md-8">
                    <label class="form-label" for="idnome3">Nota Curso</label>
                    <input class="form-control" type="text" name="nome" id="idnome3">
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>

        <div class="row">
            <?php
                try
                {
                    $conexao = new PDO("mysql:host=localhost; dbname=devweb2", "root", "");
                }catch(PDOException $e)
                {
                    die('aconteceu um erro: ' . $e->getMessage());
                }

                try
                {
                    $sql = "select * from campus";
                    $resultado = $conexao->query($sql);
                    if($resultado->rowCount() > 0)
                    {
                    ?>

                            <select class="form-control" name="Campus">
                            <?php
                            while($linha = $resultado->fetch())
                            {
                                echo "<option value=\"" . $linha['idCampus'] . "\">" . $linha['nomeCampus'] . "</option>" ;
                            }
                            ?>
                            </select>
                            <?php
                    }
                }catch(PDOException $e){
                    die('aconteceu um erro: ' . $e->getMessage());
                }
            ?>
        </div>



        <div class="row">
            <?php
            try{
                $conexao = new PDO("mysql:host=localhost; dbname=devweb2", "root", "");
            }catch(PDOException $e){
                die('aconteceu um erro: ' . $e->getMessage());
            }

            try{
                $sql = "select * from area";
                $resultado = $conexao->query($sql);
                if($resultado->rowCount() > 0){
                    ?>
                    
                    <select class="form-control" name="Area">
                    <?php
                    while($linha = $resultado->fetch()){

                        echo "<option value=\"" . $linha['idArea'] . "\">" . $linha['nomeArera'] . "</option>" ;

                    }
                    ?>
                    </select>

                    <?php
                }
            }catch(PDOException $e){
                die('aconteceu um erro: ' . $e->getMessage());
            }
            ?>
        </div>
    </div>
</body>

</html>