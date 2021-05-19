<?php
    class modelLocacao {
        public $cpfCliente;
        public $prazo;
        public $idVeiculo;

        public function setLocacaoFromDataBase($linha) {
            $this->setCpfCliente($linha["cpfCliente"])
                ->setPrazo($linha["prazo"])
                ->setidVeiculo($linha["idVeiculo"]);
        }
        public function setLocacaoFromPOST() {
            $this->setCpfCliente($_POST["cpfCliente"])
                ->setPrazo($_POST["prazo"])
                ->setidVeiculo($_POST["idVeiculo"]);
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
