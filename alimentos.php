<?php   
    require_once 'rota/init.php';

    // Pega dados do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $nome_fantasia = isset($_POST['nome_fantasia']) ? $_POST['nome_fantasia'] : null;
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    // Valida para evitar dados vazios
    if (!empty($_POST['acao']) && (empty($nome) || empty($nome_fantasia))) {
        echo "Preencha os campos Nome e nome_fantasia";
        exit;
    }

    $PDO = connectDB();

    if (isset($_POST['acao']) && $_POST['acao'] == 'novo') {
        try {
            // Insere no banco
            $sql = "INSERT INTO bd_alimentos (nome, nome_fantasia, cnpj, cidade) VALUES (:nome, :nome_fantasia, :cnpj, :cidade)";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':nome_fantasia', $nome_fantasia);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':cidade', $cidade);

            if ($stmt->execute()) {
                header('Location: ' . APP . 'index.php');
            } else {
                echo "Erro ao cadastrar";
                print_r($stmt->errorInfo());
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') { // Código para violação de restrição UNIQUE
                echo "<script>alert('E-mail/cidade já cadastrado. Por favor, valide!');</script>";
            } else {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] == 'edita') {
        try {
            // Atualiza o registro no banco
            $sql = "UPDATE bd_alimentos SET nome = :nome, nome_fantasia = :nome_fantasia, cnpj = :cnpj, cidade = :cidade WHERE id = :id";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':nome_fantasia', $nome_fantasia);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                header('Location: ' . APP . 'index.php');
            } else {
                echo "Erro ao alterar";
                print_r($stmt->errorInfo());
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') { // Código para violação de restrição UNIQUE
                echo "<script>alert('E-mail/cidade já cadastrado. Por favor, valide!');</script>";
            } else {
                echo "Erro ao alterar: " . $e->getMessage();
            }
        }
    } elseif (isset($_GET['acao']) && $_GET['acao'] == 'deletar') {
        $id  = isset($_GET['id']) ? $_GET['id'] : null;
        // Valida o ID
        if (empty($id)) {
            echo "ID não informado";
            exit;
        }

        try {
            // Remove do banco
            $sql = "DELETE FROM bd_alimentos WHERE id = :id";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header('Location: ' . APP . 'index.php');
            } else {
                echo "Erro ao remover";
                print_r($stmt->errorInfo());
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') { // Código para violação de restrição UNIQUE
                echo "<script>alert('Não é possível remover o registro. E-mail/cidade já cadastrado.');</script>";
            } else {
                echo "Erro ao remover: " . $e->getMessage();
            }
        }
    }
?>
