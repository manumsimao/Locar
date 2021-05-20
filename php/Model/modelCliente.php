<?php
class modelCliente {
    public $cpf;
    public $nome;
    public $cnh;
    public $endereco;
    public $email;
    public $telefone;


    public function setClienteFromDataBase($linha) {
        $this->setCpf($linha["cpf"])
            ->setNome($linha["nome"])
            ->setCnh($linha["cnh"])
            ->setEndereco($linha['endereco'])
            ->setEmail($linha['email'])
            ->setTelefone($linha['telefone']);
    }
    public function setClienteFromPOST() {
        $this->setCpf($_POST["cpf"])
            ->setNome($_POST["nome"])
            ->setCnh($_POST["cnh"])
            ->setEndereco($_POST['endereco'])
            ->setEmail($_POST['email'])
            ->setTelefone($_POST['telefone']);
    }

    public function updateClienteFromPOST(){
        $this->setCpf($_POST["cpf"])
            ->setNome($_POST["nome"])
            ->setCnh($_POST["cnh"])
            ->setEndereco($_POST['endereco'])
            ->setEmail($_POST['email'])
            ->setTelefone($_POST['telefone']);
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCnh($cnh) {
        $this->cnh = $cnh;
        return $this;
    }

    public function getCnh() {
        return $this->cnh;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }

    public function getTelefone() {
        return $this->telefone;
    }
}
