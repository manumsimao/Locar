<?php
    class modelLocacao {
        public $id;
        public $clienteCpf;
        public $veiculoId;
        public $prazo;
        public $opcao;
        public $preco;

        public function setLocacaoFromDataBase($linha) {
            $this->setId($linha["id"])
                ->setClienteCpf($linha["clienteCpf"])
                ->setVeiculoId($linha["veiculoId"])
                ->setPrazo($linha["prazo"])
                ->setOpcao($linha["opcao"])
                ->setPreco($linha["preco"]);
        }
        public function setLocacaoFromPOST() {
            $this->setId($_POST["id"])
                ->setClienteCpf($_POST["clienteCpf"])
                ->setVeiculoId($_POST["veiculoId"])
                ->setPrazo($_POST["prazo"])
                ->setOpcao($_POST["opcao"])
                ->setPreco($_POST["preco"]);
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setClienteCpf($clienteCpf) {
            $this->clienteCpf = $clienteCpf;
            return $this;
        }
    
        public function getClienteCpf() {
            return $this->clienteCpf;
        }

        public function setVeiculoId($veiculoId) {
            $this->veiculoId = $veiculoId;
            return $this;
        }
    
        public function getVeiculoId() {
            return $this->veiculoId;
        }

        public function setPrazo($prazo) {
            $this->prazo = $prazo;
            return $this;
        }
    
        public function getPrazo() {
            return $this->prazo;
        }

        public function setOpcao($opcao) {
            $this->opcao = $opcao;
            return $this;
        }
    
        public function getOpcao() {
            return $this->opcao;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
            return $this;
        }
    
        public function getPreco() {
            return $this->preco;
        }
    
        
    }
