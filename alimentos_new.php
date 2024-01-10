<?php
    require_once 'rota/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Criação de Contato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/page_estilo.css" media="screen">
</head>

<body>
    <div class="container">
        <center><h1 class="title">CRIAÇÃO DO CONTATO</h1></center>
        <br>

        <form method="post" action="<?= APP  ?>alimentos.php">
            <br>
            <br>
            <div class="col-md-12">
                <div class="form-group row">
                    <!-- <label for="nome" class="col-4 col-form-label">Nome</label> -->
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">NOME</div>
                            </div>
                            <input id="nome" name="nome" placeholder="Ex.: João" type="text" pattern="^[A-Za-z]+$" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="nome_fantasia" class="col-4 col-form-label">nome_fantasia</label> -->
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">nome_fantasia</div>
                            </div>
                            <input id="nome_fantasia" name="nome_fantasia" placeholder="Ex.: Santos Silva" type="text" pattern="^[A-Za-z\s]+$" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="cnpj" class="col-4 col-form-label">cnpj</label> -->
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">cnpj</div>
                            </div>
                            <input id="cnpj" name="cnpj" placeholder="Ex.: 12345678000190" type="text" pattern="\d{14}" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="cidade" class="col-4 col-form-label">cidade</label> -->
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">cidade</div>
                            </div>
                            <input id="cidade" name="cidade" placeholder="Ex.: São Paulo" type="text" pattern="^[A-Za-z]+$" required class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <center><button name="submit" type="submit" class="btn btn-success">Gravar</button></center>
            <center><a href="<?= APP  ?>index.php" class="btn btn-secondary">Voltar</a></center>
            <input type="hidden" name="acao" value="novo" >
        </form>

    </div>
</body>

</html>