<?php

include_once '../Conexao.php';

class Orcamento
{
    protected $id_orcamento;
    protected $valor_orcamento;
    protected $qt_convidados;
    protected $id_salao;
    protected $id_cliente;

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

    /**
     * @return mixed
     */
    public function getValorOrcamento()
    {
        return $this->valor_orcamento;
    }

    /**
     * @param mixed $valor_orcamento
     */
    public function setValorOrcamento($valor_orcamento)
    {
        $this->valor_orcamento = $valor_orcamento;
    }

    /**
     * @return mixed
     */
    public function getQtConvidados()
    {
        return $this->qt_convidados;
    }

    /**
     * @param mixed $qt_convidados
     */
    public function setQtConvidados($qt_convidados)
    {
        $this->qt_convidados = $qt_convidados;
    }

    /**
     * @return mixed
     */
    public function getIdSalao()
    {
        return $this->id_salao;
    }

    /**
     * @param mixed $id_salao
     */
    public function setIdSalao($id_salao)
    {
        $this->id_salao = $id_salao;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT o.id_orcamento, o.qt_convidados, o.valor_orcamento, s.logradouro, c2.nome as nome_cliente, tf.nome as nome_tipo_festa
                FROM orcamento o join salao s on o.id_salao = s.id_salao join cliente c2 on o.id_cliente = c2.id_cliente
                join tipo_festa tf on s.id_tipo_festa = tf.id_tipo_festa";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_orcamento)
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM orcamento WHERE id_orcamento = '$id_orcamento'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_orcamento    = $dados[0]['id_orcamento'];
        $this->valor_orcamento = $dados[0]['valor_orcamento'];
        $this->qt_convidados   = $dados[0]['qt_convidados'];
        $this->id_salao        = $dados[0]['id_salao'];
        $this->id_cliente      = $dados[0]['id_cliente'];
    }

    public function inserir($dados)
    {
        $valor_orcamento = $dados['valor_orcamento'];
        $qt_convidados   = $dados['qt_convidados'];
        $id_salao        = $dados['id_salao'];
        $id_cliente      = $dados['id_cliente'];

        $conexao = new Conexao();

        $sql = "INSERT INTO orcamento (valor_orcamento, qt_convidados, id_salao, id_cliente)
                VALUES ('$valor_orcamento', '$qt_convidados', '$id_salao', '$id_cliente')
        ";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_orcamento    = $dados['id_orcamento'];
        $valor_orcamento = $dados['valor_orcamento'];
        $qt_convidados   = $dados['qt_convidados'];
        $id_salao        = $dados['id_salao'];
        $id_cliente      = $dados['id_cliente'];

        $conexao = new Conexao();

        $sql = "UPDATE orcamento SET
                        valor_orcamento = '$valor_orcamento', 
                        qt_convidados = '$qt_convidados', 
                        id_salao = '$id_salao', 
                        id_cliente = '$id_cliente' 
                WHERE id_orcamento = '$id_orcamento'
        ";

        return $conexao->executar($sql);
    }

    public function excluir($id_orcamento)
    {
        $conexao = new Conexao();

        $sql = "DELETE FROM orcamento WHERE id_orcamento = $id_orcamento;";

        return $conexao->executar($sql);
    }
}
