<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .button-group {
        display: flex;
    }

    .button-group button {
        margin-right: 5px;
    }

    .edit-form {
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
    }

    .edit-form label {
        display: block;
        margin-bottom: 5px;
    }

    .edit-form input {
        margin-bottom: 10px;
    }
</style>

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
