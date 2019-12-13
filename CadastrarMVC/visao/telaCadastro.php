<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>OnYH - Cadastre-se</title>
        <?php
        include_once './Include/css.php';
        include_once './Include/js.php';
        ?>


    </head>

    <body>
        <?php
        include_once './Include/cabecalho.php';
        //print_r($_GET);
        ?>

        
        <div class="divFormulario">
            
            
            <fieldset class="fieldsetCentral">
                <h1>Abra uma conta</h1>
                <h2>É totalmente gratuito</h2>
               
                <form method="post" action="Funcoes/cadastrarUsuario.php">


                    <div id="opcoes">
                        
                    
                    <?php
                    if (isset($_GET["tipoUsuario"])) {
                        echo '<label for="rbtClienteComum">';
                        echo '  Usuário cliente</label>';
                        echo '<input onclick="onClickRadioButtons(this)" value="0" type="radio" name="tipoUsuario" id="rbtClienteComum" onChange="verificaNomeEmpresa(this)"> <br>';
                        echo '<label for="rbtClienteEmpresario">';
                        echo '  Usuário empreendedor</label>';
                        echo'<input onclick="onClickRadioButtons(this)" value="1" type="radio" name="tipoUsuario" id="rbtClienteEmpresario" checked onChange="verificaNomeEmpresa(this)">';
                    } else {
                        echo '<label for="rbtClienteComum">';
                        echo '  Usuário cliente</label>';
                        echo'<input onclick="onClickRadioButtons(this)" value="0" type="radio" name="tipoUsuario" id="rbtClienteComum" checked  onChange="verificaNomeEmpresa(this)"><br>';
                        echo '<label for="rbtClienteEmpresario">';
                        echo '  Usuário empreendedor</label>';
                        echo'<input onclick="onClickRadioButtons(this)" value="1" type="radio" name="tipoUsuario" id="rbtClienteEmpresario" onChange="verificaNomeEmpresa(this)">';
                    }
                    ?>
                    </div>
                  
                    <div class="input-grupo">
                    <label for="txtNomeCompleto" id="nomecomple">

                        Nome completo:
                    </label>
                    <input type="text" id="txtNomeCompleto" autofocus name="txtNomeCompleto" placeholder="Nome completo">
                    </div>
                    
                   
                    <div class="input-grupo">
                    <label for="txtChamado">
                        Como gostaria de ser chamado:
                    </label>
                    <input type="text" id="txtChamado" name="txtChamado" placeholder="Nickname">
                    </div>
                    
                    <div class="input-grupo">
                    <label for="txtEmail">

                        Email:
                    </label>
                    <input type="text" id="txtEmail" name="txtEmail" placeholder="Digite seu Email"> 
                    </div>
                    
                    <div class="input-grupo">
                    <label for="txtSenha">

                        Senha:
                    </label>
                    <input type="password" id="txtSenha" name="txtSenha" placeholder="Digite sua senha">
                    </div>
                    
                    
                    <div class="input-grupo">
                    <label for="txtConfirmarSenha">
                        Confirmar Senha:
                    </label>
                    <input type="password" id="txtConfirmarSenha" name="txtConfirmarSenha" placeholder="Confirme sua senha">
                    </div>
                    
                   
<!--como eu não coloquei no diagrama os daos do endereco comentei essa parte      -->
                        
<!--                         <div class="input-grupo">
                    
                    <label for="txtPais">

                       </label>
                    <input type="text" id="txtPais" name="txtPais" placeholder="Digite seu país">
                         </div>
                         <div class="input-grupo">
                     <label for="txtEstado">

                        Estado:
                    </label>
                    <input type="text" id="txtEstado" name="txtEstado" placeholder="Digite seu estado">
                         </div>
                     <div class="input-grupo">
                    <label for="txtCidade">

                        Cidade:
                    </label>
                    
                    <input type="text" id="txtCidade" name="txtCidade" placeholder="Digite sua cidade">
                     </div>
                     <div class="input-grupo">
                    <label for="txtCep">

                        CEP:
                    </label>
                    <input type="text" id="txtCep" name="txtCep" placeholder="Digite o CEP de sua cidade">
                     </div>
                     <div class="input-grupo">
                    <label for="txtLogradouro">

                        Logradouro:
                    </label>
                    <input type="text" id="txtLogradouro" name="txtLogradouro" placeholder="Digite seu Logradouro">
                     </div>
                     
                     <div class="input-grupo">
                    <label for="txtBairro">

                        Bairro:
                    </label>
                    <input type="text" id="txtBairro" name="txtBairro" placeholder="Digite seu bairro">
                     </div>
                    
                     <div class="input-grupo">
                    <label for="txtNumero">    Pais:
                 

                        Número:
                    </label>
                    <input type="text" id="txtNumero" name="txtNumero" placeholder="Digite o número">
                    </div>
                     
                    
                     
                     
                    
                    <div class="input-grupo">
                    <label for="txtNomeEmpresa" class="usuarioComum">
                        Nome da Empresa:

                    </label>
                    <input type="text" id="txtNomeEmpresa" class="usuarioComum" name="txtNomeEmpresa" placeholder="Nome da Empresa">
                    </div>-->
                    
 
<!--                    <div class="input-grupo">
                        
                    
                        <input type="button" id="btnTelefone" onclick="addTelefone(this)"value="Adicionar Tel" class="botoes" >
                   </div>-->
                   
<!--                    <div class="input-grupo">
                    <label for="SelecaoServicos" class="usuarioComum" id="servicodisp">

                        Selecione quais serviços você dispõe:
                    </label>
                    </div> 
                    
                       <?php
//                        include_once './Include/listaDeNegocios.php';
                        ?>
                    <div id="divServicos"> 
                        
                        
                        <input type="button" id="btnServico" value="Adicionar Serviço" onclick="addNovoServico(this)" id ="addservico" class="botoes">
                       
                        
                    </div>-->
                    
                    <div class="divBotoes">
                        <input type="submit" value="Cadastrar" class="botoes">
                    </div>
                </form>
            </fieldset>
        
        </div>

        <?php
        if (isset($_SESSION['msg'])) {
            echo '<script> onclick("myModal") </script>';
            unset($_SESSION['msg']);
            unset($_SESSION['msg2']);
        }

        include_once './Include/rodape.php';
        ?>
        
    </body>
</html>
