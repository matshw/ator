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
    $ator_id = $_POST['excluir'];
    $atorController->excluirAtor($ator_id);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
    $ator_id = $_POST['editar'];
    $nome_edit = $_POST['nome_edit'];
    $nacionalidade_edit = $_POST['nacionalidade_edit'];
    $dataNascimento_edit = $_POST['dataNascimento_edit'];

    $atorController->atualizarAtor($ator_id, $nome_edit, $nacionalidade_edit, $dataNascimento_edit);
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

    <h2>Lista de Atores</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Data de Nascimento</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
    <?php
    $atores = $atorController->buscarAtor();
    foreach ($atores as $ator) {
        ?>
        <tr id="<?php echo $ator['id']; ?>">
            <td>
                <?php echo $ator['nome']; ?>
            </td>
            <td>
                <?php echo $ator['nacionalidade']; ?>
            </td>
            <td>
                <?php echo $ator['dataNascimento']; ?>
            </td>
            <td>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="hidden" name="excluir" value="<?php echo $ator['id']; ?>">
                    <input type="submit" value="Excluir">
                </form>

                <!-- Formulário de Edição para cada ator -->
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="hidden" name="editar" value="<?php echo $ator['id']; ?>">
                    <input type="submit" value="Editar">
                </form>
            </td>
        </tr>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar']) && $_POST['editar'] == $ator['id']) {
            ?>
            <tr>
                <td>
                    <input type="text" name="nome_edit" value="<?php echo $ator['nome']; ?>">
                </td>
                <td>
                    <input type="text" name="nacionalidade_edit" value="<?php echo $ator['nacionalidade']; ?>">
                </td>
                <td>
                    <input type="date" name="dataNascimento_edit" value="<?php echo $ator['dataNascimento']; ?>">
                </td>
                <td>
                    <input type="submit" name="salvar" value="Salvar">
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
</tbody>

    </table>
</body>

</html>