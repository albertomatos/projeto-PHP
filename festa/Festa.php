<?php

include_once '../Conexao.php';

class Festa
{
    protected $id_festa;
    protected $data;
    protected $id_orcamento;

    /**
     * @return mixed
     */
    public function getIdFesta()
    {
        return $this->id_festa;
    }

    /**
     * @param mixed $id_festa
     */
    public function setIdFesta($id_festa)
    {
        $this->id_festa = $id_festa;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getIdOrcamento()
    {
        return $this->id_orcamento;
    }

    /**
     * @param mixed $id_orcamento
     */
    public function setIdOrcamento($id_orcamento)
    {
        $this->id_orcamento = $id_orcamento;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT f.id_festa, f.data, o.valor_orcamento, o.qt_convidados, c.nome as nome_cliente
                FROM festa f join orcamento o on f.id_orcamento = o.id_orcamento join cliente c on o.id_cliente = c.id_cliente
                ";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_festa)
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM festa WHERE id_festa = '$id_festa'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_festa    = $dados[0]['id_festa'];
        $this->data = $dados[0]['data'];
        $this->id_orcamento        = $dados[0]['id_orcamento'];
    }

    public function inserir($dados)
    {
        $data = $dados['data'];
        $id_orcamento        = $dados['id_orcamento'];

        $conexao = new Conexao();

        $sql = "INSERT INTO festa (data, id_orcamento)
                VALUES ('$data', '$id_orcamento')
        ";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_festa    = $dados['id_festa'];
        $data = $dados['data'];
        $id_orcamento        = $dados['id_orcamento'];

        $conexao = new Conexao();

        $sql = "UPDATE festa SET
                        data = '$data', 
                        id_orcamento = '$id_orcamento' 
                WHERE id_festa = '$id_festa'
        ";

        return $conexao->executar($sql);
    }

    public function excluir($id_festa)
    {
        $conexao = new Conexao();

        $sql = "DELETE FROM festa WHERE id_festa = $id_festa;";

        return $conexao->executar($sql);
    }
}
