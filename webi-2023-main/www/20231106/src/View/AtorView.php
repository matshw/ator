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
                <td><?php echo $ator['nome']; ?></td>
                <td><?php echo $ator['nacionalidade']; ?></td>
                <td><?php echo $ator['dataNascimento']; ?></td>
                <td>
                <div class="button-group">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <input type="hidden" name="excluir" value="<?php echo $ator['id']; ?>">
                        <input type="submit" value="Excluir">
                    </form>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <input type="hidden" name="editar" value="<?php echo $ator['id']; ?>">
                        <button type="button" onclick="botaoEditar(<?php echo $ator['id']; ?>)">Editar</button>
                    </form>
                </div>
                </td>
            </tr>
            <tr id="formEditar<?php echo $ator['id']; ?>" style="display: none;">
                <td colspan="4">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <input type="hidden" name="editar" value="<?php echo $ator['id']; ?>">
                        <label for="editNome<?php echo $ator['id']; ?>">Nome:</label>
                        <input type="text" id="editNome<?php echo $ator['id']; ?>" name="nome_edit" value="<?php echo $ator['nome']; ?>" required><br><br>

                        <label for="editNac<?php echo $ator['id']; ?>">Nacionalidade:</label>
                        <input type="text" id="editNac<?php echo $ator['id']; ?>" name="nacionalidade_edit" value="<?php echo $ator['nacionalidade']; ?>" required><br><br>

                        <label for="editData<?php echo $ator['id']; ?>">Data de Nascimento:</label>
                        <input type="date" id="editData<?php echo $ator['id']; ?>" name="dataNascimento_edit" value="<?php echo $ator['dataNascimento']; ?>" required><br><br>

                        <input type="submit" value="Salvar">
                        <button type="button" onclick="botaoEditar(<?php echo $ator['id']; ?>)">Cancelar</button>
                    </form>
                </td>
            </tr>
            
        <?php } ?>
    </tbody>

</table>
<script>
    function botaoEditar(id) {
        var form = document.getElementById("formEditar" + id);
        if (form.style.display === "none") {
            form.style.display = "table-row";
        } else {
            form.style.display = "none";
        }
    }
</script>
</body>
</html>
