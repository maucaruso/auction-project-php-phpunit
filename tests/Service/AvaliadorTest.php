<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
  public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemCrescente()
  {
    // Arrumo a casa para o teste / Arrange / Given
    $leilao = new Leilao('Renault Clio 2007');

    $maria = new Usuario('Maria');
    $joao = new Usuario('João');

    $leilao->recebeLance(new Lance($joao, 2000));
    $leilao->recebeLance(new Lance($maria, 2500));

    $leiloeiro = new Avaliador();

    $leiloeiro->avalia($leilao);

    $maiorValor = $leiloeiro->getMaiorValor();

    self::assertEquals(2500, $maiorValor);
  }
  
  public function testAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemDecrescente()
  {
    $leilao = new Leilao('Renault Clio 2007');

    $maria = new Usuario('Maria');
    $joao = new Usuario('João');

    $leilao->recebeLance(new Lance($joao, 2000));
    $leilao->recebeLance(new Lance($maria, 2500));

    $leiloeiro = new Avaliador();

    $leiloeiro->avalia($leilao);

    $maiorValor = $leiloeiro->getMaiorValor();


    self::assertEquals(2500, $maiorValor);
  }
  
  public function testAvaliadorDeveEncontrarOMenorValorDeLancesEmOrdemDecrescente()
  {
    $leilao = new Leilao('Renault Clio 2007');

    $maria = new Usuario('Maria');
    $joao = new Usuario('João');

    $leilao->recebeLance(new Lance($maria, 2500));
    $leilao->recebeLance(new Lance($joao, 2000));

    $leiloeiro = new Avaliador();

    $leiloeiro->avalia($leilao);

    $menorValor = $leiloeiro->getMenorValor();


    self::assertEquals(2000, $menorValor);
  }
  
  public function testAvaliadorDeveEncontrarOMenorValorDeLancesEmOrdemCrescente()
  {
    $leilao = new Leilao('Renault Clio 2007');

    $maria = new Usuario('Maria');
    $joao = new Usuario('João');

    $leilao->recebeLance(new Lance($maria, 2500));
    $leilao->recebeLance(new Lance($joao, 2000));

    $leiloeiro = new Avaliador();

    $leiloeiro->avalia($leilao);

    $menorValor = $leiloeiro->getMenorValor();


    self::assertEquals(2000, $menorValor);
  }
}
