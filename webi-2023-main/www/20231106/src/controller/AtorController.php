<?php
    require_once '../utils/db.php';

class AtorController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->conectar();
    }

    public function __destruct()
    {
        $this->db->desconectar();
    }


    public function adicionarAtor(Ator $ator)
    {

        $nome = $this->db->conexao->real_escape_string($ator->getNome());
        $nacionalidade = $this->db->conexao->real_escape_string($ator->getNacionalidade());
        $dataNascimento = $this->db->conexao->real_escape_string($ator->getDataNascimento());

        $query = "INSERT INTO atores (nome, nacionalidade, dataNascimento) VALUES ('$nome', '$nacionalidade', '$dataNascimento')";

        $resultado = $this->db->executarQuery($query);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function excluirAtor($id)
    {
        $id = (int) $id;

        $query = "DELETE FROM atores WHERE id = $id";
        $resultado = $this->db->executarQuery($query);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function buscarAtor()
    {
        $query = "SELECT * FROM atores";
        $result = $this->db->executarQuery($query);

        if ($result) {
            $atores = $result->fetch_all(MYSQLI_ASSOC);
            return $atores;
        } else {
            return array(); 
        }
    }
    public function atualizarAtor($id, $nome, $nacionalidade, $dataNascimento)
    {
        $id = (int) $id;
        $nome = $this->db->conexao->real_escape_string($nome);
        $nacionalidade = $this->db->conexao->real_escape_string($nacionalidade);
        $dataNascimento = $this->db->conexao->real_escape_string($dataNascimento);

        $query = "UPDATE atores SET nome = '$nome', nacionalidade = '$nacionalidade', dataNascimento = '$dataNascimento' WHERE id = $id";
        $resultado = $this->db->executarQuery($query);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
}
