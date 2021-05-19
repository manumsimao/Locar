<?php
    class modelVeiculo {
        public $id;
        public $placa;
        public $modelo;
        public $tipoTranmissao;
        public $tipoCarroceria;
        public $status;

        public function setVeiculoFromDataBase($linha) {
            $this->setId($linha["id"])
                ->setPlaca($linha["placa"])
                ->setModelo($linha["modelo"])
                ->setTipoTransmissao($linha['tipoTranmissao'])
                ->setTipoCarroceria($linha['tipoCarroceria'])
                ->setStatus($linha['status']);
        }
        public function setVeiculoFromPOST() {
            $this->setId($_POST["id"])
                ->setPlaca($_POST["placa"])
                ->setModelo($_POST["modelo"])
                ->setTipoTransmissao($_POST['tipoTranmissao'])
                ->setTipoCarroceria($_POST['tipoCarroceria'])
                ->setStatus($_POST['status']);
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
    
        public function setModelo($modelo) {
            $this->modelo = $modelo;
            return $this;
        }
    
        public function getModelo() {
            return $this->modelo;
        }
    
        public function setTipoTransmissao($tipoTranmissao) {
            $this->tipoTranmissao = $tipoTranmissao;
            return $this;
        }
    
        public function getTipoTransmissao() {
            return $this->tipoTranmissao;
        }
    
        public function setTipoCarroceria($tipoCarroceria) {
            $this->tipoCarroceria = $tipoCarroceria;
            return $this;
        }
    
        public function getTipoCarroceria() {
            return $this->tipoCarroceria;
        }
    
        public function setStatus($status) {
            $this->status = $status;
            return $this;
        }
    
        public function getStatus() {
            return $this->status;
        }
    }
?>