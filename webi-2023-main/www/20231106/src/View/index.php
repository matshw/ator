<?php
require_once '../Controller/AtorController.php';
require_once '../Model/Ator.php';

$atorController = new AtorController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $dataNascimento = $_POST['dataNascimento'];

    $novoAtor = new Ator(null, $nome, $nacionalidade, $dataNascimento);
    $atorController->adicionarAtor($novoAtor);
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir'])) {
    $idAtor = $_POST['excluir'];
    $atorController->excluirAtor($idAtor);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar'])) {
    $id = $_POST['editar'];
    $nome = $_POST['nome_edit'];
    $nacionalidade = $_POST['nacionalidade_edit'];
    $dataNascimento = $_POST['dataNascimento_edit'];

    $atorController->atualizarAtor($id, $nome, $nacionalidade, $dataNascimento);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

?>

<html>
<head>
    <title>Adicionar Ator</title>
    
</head>


<body>
    <h1>Adicionar Ator</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" id="nacionalidade" name="nacionalidade" required><br><br>

        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" id="dataNascimento" name="dataNascimento" required><br><br>

        <input type="submit" name="submit" value="Adicionar Ator">
    </form>
    <?php include 'AtorView.php'; ?>
</body>

</html>