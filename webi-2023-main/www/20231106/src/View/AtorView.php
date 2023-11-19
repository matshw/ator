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
                    
                    <button onclick="toggleEditForm(<?php echo $ator['id']; ?>)">Editar</button>

                </td>
            </tr>
            <tr id="editForm_<?php echo $ator['id']; ?>" style="display: none;">
                <td colspan="4">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <input type="hidden" name="id_edit" value="<?php echo $ator['id']; ?>">
                        <label for="nome_edit_<?php echo $ator['id']; ?>">Nome:</label>
                        <input type="text" id="nome_edit_<?php echo $ator['id']; ?>" name="nome_edit" value="<?php echo $ator['nome']; ?>" required><br><br>

                        <label for="nacionalidade_edit_<?php echo $ator['id']; ?>">Nacionalidade:</label>
                        <input type="text" id="nacionalidade_edit_<?php echo $ator['id']; ?>" name="nacionalidade_edit" value="<?php echo $ator['nacionalidade']; ?>" required><br><br>

                        <label for="dataNascimento_edit_<?php echo $ator['id']; ?>">Data de Nascimento:</label>
                        <input type="date" id="dataNascimento_edit_<?php echo $ator['id']; ?>" name="dataNascimento_edit" value="<?php echo $ator['dataNascimento']; ?>" required><br><br>

                        <input type="submit" value="Salvar">
                        <button type="button" onclick="toggleEditForm(<?php echo $ator['id']; ?>)">Cancelar</button>
                    </form>
                </td>
            </tr>
            
        <?php } ?>
    </tbody>

</table>
<script>
    function toggleEditForm(id) {
        var form = document.getElementById("editForm_" + id);
        if (form.style.display === "none") {
            form.style.display = "table-row";
        } else {
            form.style.display = "none";
        }
    }
</script>
