<?php
class Ator
{
    private $id;
    private $nome;
    private $nacionalidade;
    private $dataNascimento;

    public function __construct($id, $nome, $nacionalidade, $dataNascimento)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->dataNascimento = $dataNascimento;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

}
