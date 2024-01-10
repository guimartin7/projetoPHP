<?php
    require_once 'rota/init.php';
    if (empty($_GET["id"])) {
        header("Location:  ".APP."index.php");
    }

    $db = connectDB();
    //Seleciona os registros
    // Prepara a query de listagem
    $stmt = $db->prepare("SELECT * FROM bd_alimentos WHERE id = :id ORDER BY nome ASC");
    // Atribui ao valor ficticio :id o valor real que vem do get
    $stmt->bindParam(":id", $_GET["id"]);
    // Executa a query
    $stmt->execute();

    // armazena o resultado do banco na variavel
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Edição de Fornecedores de Alimentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/page_estilo.css" media="screen">
</head>

<body>
    <div class="container">
        <h1 class="title">Edição do Contato</h1>
        <br>

        <form method="post" action="<?= APP  ?>alimentos.php">
            <button name="submit" type="submit" class="btn btn-success">Gravar</button>   
            <a href="<?= APP  ?>index.php" class="btn btn-secondary">Voltar</a>
            
            <br>
            <br>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="nome" class="col-4 col-form-label">Nome</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">*</div>
                            </div>
                            <input id="nome" name="nome" type="text" value="<?= $user['nome'] ?>" required="required" pattern="^[A-Za-z]+$" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nome_fantasia" class="col-4 col-form-label">Nome Fantasia</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">*</div>
                            </div>
                            <input id="nome_fantasia" name="nome_fantasia" type="text" value="<?= $user['nome_fantasia'] ?>" required="required" pattern="^[A-Za-z\s]+$" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cnpj" class="col-4 col-form-label">cnpj</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">*</div>
                            </div>
                            <input id="cnpj" name="cnpj" placeholder="Ex.: 12345678000190" type="text" pattern="\d{11}" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cidade" class="col-4 col-form-label">Cidade</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">*</div>
                            </div>
                            <input id="cidade" name="Cidade" placeholder="Ex.: São Paulo" type="text" value="<?= $user['cidade'] ?>" pattern="^[A-Za-z\s]+$" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="acao" value="edita" >
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>" >
        </form>

    </div>
</body>

</html>