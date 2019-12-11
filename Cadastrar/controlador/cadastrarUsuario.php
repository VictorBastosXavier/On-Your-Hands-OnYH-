<?php

require_once dirname(__FILE__) . '/../Classes/Usuario.php';
require_once dirname(__FILE__) .'/../Classes/Endereco.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
print_r($_POST);
$usuario = new Usuario();
$usuario->setTipoUsuario($_POST["tipoUsuario"]);
$usuario->setNomeCompleto($_POST["txtNomeCompleto"]);
$usuario->setNomeUsuario($_POST["txtChamado"]);
$usuario->setEmail($_POST["txtEmail"]);
$usuario->setSenha($_POST["txtSenha"]);
$usuario->setTelefone($_POST["txtTelefone"]);
$usuario->setServicos($_POST["listaDeNegocios"]);
$usuario->setNomeEmpresa($_POST["txtNomeEmpresa"]);

$endereco = new Endereco();
$endereco->setPais($_POST["txtPais"]);
$endereco->setEstado($_POST["txtEstado"]);
$endereco->setCidade($_POST["txtCidade"]);
$endereco->setCep($_POST["txtCep"]);
$endereco->setBairro($_POST["txtBairro"]);
$endereco->setLogradouro($_POST["txtLogradouro"]);
$endereco->setNumero($_POST["txtNumero"]);

if ($usuario->getTipoUsuario() == NULL or $usuario->getNomeCompleto() == null
        or $usuario->getNomeUsuario() == null or $usuario->getEmail() == NULL
        or $usuario->getSenha() == null or $usuario->getTelefone() == NULL
        or $usuario->getServicos() == NULL) {
    header('location: ../telaCadastro.php');
    $_SESSION['msg'] = 'Preencha todas as informações! Por favor, tente novamente!';
    $_SESSION['msg2'] = 'Já possui uma conta? <a href="telaLogin.php"> Entre agora!</a>';
} else if ($usuario->getSenha() != $_POST["txtConfirmarSenha"]) {
    header('location: ../telaCadastro.php');

    $_SESSION['msg'] = 'Confirme sua senha corretamente!';
    $_SESSION['msg2'] = 'Já possui uma conta? <a href="telaLogin.php"> Entre agora!</a>';
} else {
//chamando o metodo salvar
    $idU = $usuario->salvar();
    
    $endereco->setIdUsuario($idU);
    $endereco->salvar();
    
    header('location: ../telaLogin.php');
    $_SESSION['msg'] = 'Conta criada com sucesso!!';
    $_SESSION['msg2'] = 'Faça loguin já! <a href="telaLogin.php"> Entre agora!</a>';
}