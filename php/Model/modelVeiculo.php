<?php
    class modelVeiculo {
        public $id;
        public $placa;
        public $transmissao;
        public $carroceria;
        public $status;
        public $preco;

        public function setVeiculoFromDataBase($linha) {
            $this->setId($linha["id"])
                ->setPlaca($linha["placa"])
                ->setTransmissao($linha['transmissao'])
                ->setCarroceria($linha['carroceria'])
                ->setStatus($linha['status'])
                ->setPreco($linha['preco']);
        }
        public function setVeiculoFromPOST() {
            $this->setId($_POST["id"])
                ->setPlaca($_POST["placa"])
                ->setTransmissao($_POST["transmissao"])
                ->setCarroceria($_POST['carroceria'])
                ->setStatus($_POST['status'])
                ->setPreco($_POST['preco']);
        }

        public function updateVeiculoFromPOST(){
            $this->setId($_POST["id"])
                ->setPlaca($_POST["placa"])
                ->setTransmissao($_POST["transmissao"])
                ->setCarroceria($_POST['carroceria'])
                ->setStatus($_POST['status'])
                ->setPreco($_POST['preco']);
        }
    
        public function setId($id) {
            $this->id = $id;
            return $this;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setPlaca($placa) {
            $this->placa = $placa;
            return $this;
        }
    
        public function getPlaca() {
            return $this->placa;
        }
    
        public function setTransmissao($tranmissao) {
            $this->tranmissao = $tranmissao;
            return $this;
        }
    
        public function getTransmissao() {
            return $this->tranmissao;
        }
    
        public function setCarroceria($carroceria) {
            $this->carroceria = $carroceria;
            return $this;
        }
    
        public function getCarroceria() {
            return $this->carroceria;
        }
    
        public function setStatus($status) {
            $this->status = $status;
            return $this;
        }
    
        public function getStatus() {
            return $this->status;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
            return $this;
        }
    
        public function getPreco() {
            return $this->preco;
        }
    }
?>