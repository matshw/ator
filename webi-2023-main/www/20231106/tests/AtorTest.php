<?php
use PHPUnit\Framework\TestCase;

require 'vendor/autoload.php';
require 'src/model/Ator.php';
require 'src/controller/AtorController.php';

class AtorTest extends TestCase
{
    public function testAdicionarAtor()
    {
        $novoAtor = new Ator(15, 'Nome', 'Nacionalidade', '2000-10-01');
        $controller = new AtorController();
        $resultado = $controller->adicionarAtor($novoAtor);
        $this->assertTrue($resultado);
    }

    public function testExcluirAtor()
    {
        $atorController = new AtorController();
        $idExcluir = 1; 
        $resultado = $atorController->excluirAtor($idExcluir);
        $this->assertTrue($resultado);
    }

    public function testBuscarAtor()
    {
        $atorController = new AtorController();
        $atores = $atorController->buscarAtor();
        $this->assertIsArray($atores);
    }

    public function testAtualizarAtor()
    {
        $atorController = new AtorController();
        $idAtualizar = 1; 
        $resultado = $atorController->atualizarAtor($idAtualizar, 'nomenovo', 'nacnova', 'datanova');
        $this->assertTrue($resultado);
    }
}