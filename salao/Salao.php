<?php

include_once '../Conexao.php';

class Salao
{
    protected $id_salao;
    protected $cep;
    protected $logradouro;
    protected $uf;
    protected $bairro;
    protected $id_tipo_festa;

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
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

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

    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT s.id_salao, s.logradouro, s.cep, tf.nome as nome_tipo_festa
                FROM salao s
                join tipo_festa tf on s.id_tipo_festa = tf.id_tipo_festa 
        ";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_salao)
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM salao WHERE id_salao = '$id_salao'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_salao      = $dados[0]['id_salao'];
        $this->cep           = $dados[0]['cep'];
        $this->logradouro    = $dados[0]['logradouro'];
        $this->uf            = $dados[0]['uf'];
        $this->bairro        = $dados[0]['bairro'];
        $this->id_tipo_festa = $dados[0]['id_tipo_festa'];
    }

    public function inserir($dados)
    {
        $cep           = $dados['cep'];
        $logradouro    = $dados['logradouro'];
        $uf            = $dados['uf'];
        $bairro        = $dados['bairro'];
        $id_tipo_festa = $dados['id_tipo_festa'];

        $conexao = new Conexao();

        $sql = "INSERT INTO salao (cep, logradouro, uf, bairro, id_tipo_festa)
                VALUES ('$cep', '$logradouro', '$uf', '$bairro', '$id_tipo_festa')
        ";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_salao      = $dados['id_salao'];
        $cep           = $dados['cep'];
        $logradouro    = $dados['logradouro'];
        $uf            = $dados['uf'];
        $bairro        = $dados['bairro'];
        $id_tipo_festa = $dados['id_tipo_festa'];

        $conexao = new Conexao();

        $sql = "UPDATE salao SET
                        cep = '$cep', 
                        logradouro = '$logradouro', 
                        uf = '$uf', 
                        bairro = '$bairro', 
                        id_tipo_festa = '$id_tipo_festa' 
                WHERE id_salao = '$id_salao'
        ";

        return $conexao->executar($sql);
    }

    public function excluir($id_salao)
    {
        $conexao = new Conexao();

        $sql = "DELETE FROM salao WHERE id_salao = $id_salao;";

        return $conexao->executar($sql);
    }
}
