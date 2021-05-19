<?php
class modelOrcamento {
    public $total;
    public $tipo;
    public $seguro;
    public $opicionais;

    public function setLOrcamentoFromDataBase($linha) {
        $this->setTotal($linha["total"])
            ->setTipo($linha["tipo"])
            ->setiSeguro($linha["seguro"])
            ->setOpicionais($linha["opicionais"]);
    }
    public function setOrcamentoFromPOST() {
        $this->setTotal($_POST["total"])
            ->setTipo($_POST["tipo"])
            ->setiSeguro($_POST["seguro"])
            ->setOpicionais($_POST["opicionais"]);
    }

    public function setCpfCliente($cpfCliente) {
        $this->cpfCliente = $cpfCliente;
        return $this;
    }

    public function getCpfCliente() {
        return $this->cpfCliente;
    }

    public function setPrazo($prazo) {
        $this->prazo = $prazo;
        return $this;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function setIdVeiculo($idVeiculo) {
        $this->idVeiculo = $idVeiculo;
        return $this;
    }

    public function getIdVeiculo() {
        return $this->idVeiculo;
    }
}
