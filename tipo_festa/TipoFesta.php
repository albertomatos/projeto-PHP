<?php

include_once '../Conexao.php';

class TipoFesta
{

    protected $id_tipo_festa;
    protected $nome;
    protected $descricao;

    /**
     * @return mixed
     */
    public function getIdTipoFesta()
    {
        return $this->id_tipo_festa;
    }

    /**
     * @param mixed $id_tipo_festa
     */
    public function setIdTipoFesta($id_tipo_festa)
    {
        $this->id_tipo_festa = $id_tipo_festa;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM tipo_festa order by 2 asc";

        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_tipo_festa)
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM tipo_festa WHERE id_tipo_festa = '$id_tipo_festa'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_tipo_festa = $dados[0]['id_tipo_festa'];
        $this->nome = $dados[0]['nome'];
        $this->descricao = $dados[0]['descricao'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $descricao = $dados['descricao'];

        $conexao = new Conexao();
        $sql = "INSERT INTO tipo_festa (nome,descricao) VALUES ('$nome', '$descricao')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_tipo_festa = $dados['id_tipo_festa'];
        $nome          = $dados['nome'];
        $descricao     = $dados['descricao'];

        $conexao = new Conexao();

        $sql = "UPDATE tipo_festa SET nome = '$nome', descricao = '$descricao'
                WHERE id_tipo_festa = '$id_tipo_festa'
        ";

        return $conexao->executar($sql);
    }

    public function excluir($id_tipo_festa)
    {
        $conexao = new Conexao();
        $sql = "DELETE FROM tipo_festa WHERE id_tipo_festa = $id_tipo_festa;";

        return $conexao->executar($sql);
    }
}
