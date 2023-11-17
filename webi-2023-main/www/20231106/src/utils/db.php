<?php

class Database
{
    private $host = 'db-mysql';
    private $user = 'root';
    private $senha = 'root';
    private $banco = 'Atores';
    public $conexao;

    public function conectar()
    {
        $this->conexao = new mysqli($this->host, $this->user, $this->senha, $this->banco);
        if ($this->conexao->connect_error) {
            die("Erro de conexão: " . $this->conexao->connect_error);
        }
    }

    public function desconectar()
    {
        $this->conexao->close();
    }

    public function executarQuery($query)
    {
        return $this->conexao->query($query);
    }
}
