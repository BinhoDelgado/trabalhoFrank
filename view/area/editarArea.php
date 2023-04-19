<!DOCTYPE html>
<html lang="en">
<?php $path = 'http://' . $_SERVER["HTTP_HOST"] . '/devweb2'; ?>
<head>
    <meta charset="UTF-8">
    <title>Editar de Area</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="<?php echo $path; ?>/arquivos/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $path; ?>/arquivos/js/bootstrap.bundle.min.js"></script>
    <script>
        var idArea=0;
        function guardaIdArea()
        {
            let id = document.getElementById('idArea');
            idArea = id.value;
            alert(idArea);
        }
    </script>
</head>

<body onload="guardaIdArea()">
    <?php include("../../menu.php") ?>
    <div class="container">
        <div class="row mb-4 mt-4">
            <div class="alert alert-light" role="alert">
                <h1>Editar de Area</h1>
            </div>
        </div>


        <?php
                try{
                    $conexao = new PDO("mysql:host=localhost; dbname=devweb2","root","");
                }catch(PDOException $e){
                    die("Ocorreu um erro inesperado " . $e->getMessage());
                }

                $idArea = $_GET['idArea'];

                try
                {
                    $sql = "select * from area where idArea = " . $idArea;
                    $resultado = $conexao->query($sql);
                    if($resultado->rowCount() > 0)
                    {
                        $linha = $resultado->fetch();

                    }
                    echo "editado com sucesso !!!";
                }catch(PDOException $e)
                {
                    die("Ocorreu um erro " . $e->getMessage());
                }
        ?>


        <form action="<?php echo $path; ?>/repositorio/Area/editarArea.php" method="POST">
        <input value="<?php echo $linha['idArea'] ?>" type="text" name="idArera" id='idArea'hidden>

            <div class="row mb-3">
                <div class="col col-md-8">
                    <label class="form-label" for="idnome1">Nome</label>
                    <input class="form-control" value="<?php echo $linha['nomeArera'] ?>" type="text" name="nome" id="idnome1">
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>
    </div>
</body>

</html>