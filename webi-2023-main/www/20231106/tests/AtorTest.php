<?php
use PHPUnit\Framework\TestCase;

require 'vendor/autoload.php';
require 'src/model/Ator.php';
require 'src/controller/AtorController.php';
require 'src/utils/db.php';

class AtorTest extends TestCase
{
    public function testAddAtor()
    {
        $novoAtor = new Ator(15, 'Nome4', 'Nacionalidade4', '1990-01-04');
        $controller = new AtorController();
        $resultado = $controller->adicionarAtor($novoAtor);
        $this->assertTrue($resultado);
    }
    public function testExcluirAtor()
    {
        $db = new Database();
        $db->conectar();
        $idExcluir = 3;
        $query = "DELETE FROM atores WHERE id = $idExcluir";
        $resultado = $db->executarQuery($query);
        $this->assertTrue($resultado);
    }

    public function testAtualizarAtor()
    {
        $db = new Database();
        $db->conectar();

        $idParaAtualizar = 2;
        $novoNome = 'Novo Nome do Ator1';
        $novaNacionalidade = 'Nova Nacionalidade1';
        $novaDataNascimento = '1995-01-01';

        $query = "UPDATE atores SET nome = '$novoNome', nacionalidade = '$novaNacionalidade', dataNascimento = '$novaDataNascimento' WHERE id = $idParaAtualizar";
        $resultado = $db->executarQuery($query);

        $this->assertTrue($resultado);
    }

    public function testBuscarAtor()
    {
        $db = new Database();
        $db->conectar();

        $idParaBuscar = 1;

        $query = "SELECT * FROM atores WHERE id = $idParaBuscar";
        $resultado = $db->executarQuery($query);

        $this->assertNotEmpty($resultado);
    }
}
