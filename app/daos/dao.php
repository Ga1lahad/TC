<?php

namespace Daos;

use ArrayObject;

abstract class Dao
{
    /**Insere no banco de dados o objeto*/
    abstract function Inserir(object $Obj);
    /**Remove do banco de dados o objeto*/
    abstract function Remover(object $Obj);
    /**Retorna um array/arrayDeObjeto com o todos as instancias da tabela*/
    abstract function ListarTodos(): array;
    /**Retorna uma intancia na tabela atraves da pesquisa*/
    abstract function Listar($busca): object;
    /**Atualiza uma instancia ja existente no banco*/
    abstract function Atualizar(object $Obj);
}
