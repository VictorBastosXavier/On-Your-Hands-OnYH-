<?php
require_once dirname(__FILE__) .'/../Dao/UsuarioDao.php';
require_once dirname(__FILE__).'./Endereco.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author PI OnYH
 */
class Usuario {
    //put your code here
    private $id;
    private $nomeCompleto;
    private $nomeUsuario;
    private $email;
    private $senha;
    private $telefones;
    private $endereco;
    private $tipoUsuario;
    private $servicos;
    private $nomeEmpresa;
    
    function __construct() {
        $this->telefones=array();
    }

    
    function getId() {
        return $this->id;
    }
    function getNomeEmpresa() {
        return $this->nomeEmpresa;
    }

    function setNomeEmpresa($nomeEmpresa) {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    
    function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTelefone() {
        return $this->telefones;
    }

    

    function setId($id) {
        $this->id = $id;
    }

    function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    function setNomeUsuario($chamadoComo) {
        $this->nomeUsuario = $chamadoComo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTelefone($telefone) {
        if(is_array($telefone)){
            $this->telefones=$telefone;
        } else {
            $this->telefones[] = $telefone;
        }
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }
    function getServicos() {
        return $this->servicos;
    }

    function setServicos($servicos) {
        $this->servicos = $servicos;
    }

    function getEndereco() {
        $e = Endereco::buscarPorId($this->id);
        return "O endereço do(a) $this->nomeUsuario é: "
                . "\n Pais: " . $e->getPais() .""
                . "\n Estado: " . $e->getEstado(). ""
                . "\n Cidade: " . $e->getCidade() . ""
                . "\n Bairro: " . $e->getBairro() . ""
                . "\n Logradouro: " . $e->getLogradouro(). ""
                . "\n Número do estabelecimento: " . $e->getNumero();
        
    }
//Metodo salvar 
    public function salvar(){
//       Direciona para o Dao e lá faz o insert no banco 
        return UsuarioDao::salvar($this->tipoUsuario, $this->nomeCompleto, $this->nomeUsuario, $this->email, $this->senha, $this->telefones
                ,$this->servicos, $this->nomeEmpresa, '$this->enderecos');
        
    } 
//    public static function resgatarDados(){
//       $meuArray = array();
//       $dadosTabela = UsuarioDao::resgatarDados();
//      
//        if(is_object($dadosTabela)){
//            
//            while ($linha = $dadosTabela->fetch_assoc()){
//                $algumaCoisa = new Usuario();
//                $algumaCoisa->setEmail($linha["email"]);
//                //$algumaCoisa->setEndereco($linha["endereco"]);
//                $algumaCoisa->setId($linha["idUsuario"]);
//                $algumaCoisa->setNomeCompleto($linha["nomeCompleto"]);
//                $algumaCoisa->setNomeUsuario($linha["nomeUsuario"]);
//                $algumaCoisa->setSenha($linha["senha"]);
////                $algumaCoisa->setTelefone($linha["telefone"]);
//                $algumaCoisa->setTipoUsuario($linha["tipoUsuario"]);
//                
//                $meuArray[] = $algumaCoisa;
//            }
//            
//        }
//        return $meuArray;
//    }
//    public static function login($email,$senha){
//        $dadosTabela = UsuarioDao::login($email, $senha);
//        //print_r($dadosTabela);
//        if(is_object($dadosTabela)){
//            while ($linha = $dadosTabela->fetch_assoc()){
//                $algumaCoisa = new Usuario();
//                $algumaCoisa->setEmail($linha["email"]);
//                //$algumaCoisa->setEndereco($linha["endereco"]);
//                $algumaCoisa->setId($linha["idUsuario"]);
//                $algumaCoisa->setNomeCompleto($linha["nomeCompleto"]);
//                $algumaCoisa->setNomeUsuario($linha["nomeUsuario"]);
//                $algumaCoisa->setSenha($linha["senha"]);
////                $algumaCoisa->setTelefone($linha["telefone"]);
//                $algumaCoisa->setTipoUsuario($linha["tipoUsuario"]);
//                //print_r($algumaCoisa);
//                return $algumaCoisa;
//            }
//            
//        }
//        return "Email ou senha inválidos(as)";
//    }
//    public static function buscarUsuarioPorId($idUsuario){
//        $dadosTabela = UsuarioDao::buscarUsuarioPorId($idUsuario);
//        //print_r($dadosTabela);
//        if(is_object($dadosTabela)){
//            while ($linha = $dadosTabela->fetch_assoc()){
//                $algumaCoisa = new Usuario();
//                $algumaCoisa->setEmail($linha["email"]);
//                //$algumaCoisa->setEndereco($linha["endereco"]);
//                $algumaCoisa->setId($linha["idUsuario"]);
//                $algumaCoisa->setNomeCompleto($linha["nomeCompleto"]);
//                $algumaCoisa->setNomeUsuario($linha["nomeUsuario"]);
//                $algumaCoisa->setSenha($linha["senha"]);
////                $algumaCoisa->setTelefone($linha["telefone"]);
//                $algumaCoisa->setTipoUsuario($linha["tipoUsuario"]);
//                $algumaCoisa->setNomeEmpresa($linha["nomeEmpresa"]);
//                //print_r($algumaCoisa);
//                return $algumaCoisa;
//            }
//            
//        }
//        return "id inválidos(as)";
//    }
//    
//    public static function buscarPorNomeEmpresa($nomeEmpresa){
//        $empresa = UsuarioDao::buscarPorNomeEmpresa($nomeEmpresa); 
//        $empresas = array();
//        if(is_object($empresa)){
//            while ($linha = $empresa->fetch_assoc()){
//                $algumaCoisa = new Usuario();
//                $algumaCoisa->setEmail($linha["email"]);
//                //$algumaCoisa->setEndereco($linha["endereco"]);
//                $algumaCoisa->setId($linha["idUsuario"]);
//                $algumaCoisa->setNomeCompleto($linha["nomeCompleto"]);
//                $algumaCoisa->setNomeUsuario($linha["nomeUsuario"]);
//                $algumaCoisa->setSenha($linha["senha"]);
////                $algumaCoisa->setTelefone($linha["telefone"]);
//                $algumaCoisa->setNomeEmpresa($linha["nomeEmpresa"]);
//                $algumaCoisa->setTipoUsuario($linha["tipoUsuario"]);
//                //print_r($algumaCoisa);
//                $empresas[] = $algumaCoisa;
//            }
//            
//        }
//        return $empresas;
//    }
    
}
