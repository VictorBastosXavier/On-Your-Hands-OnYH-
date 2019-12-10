<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Disponibilidade</title>
               <?php
        include_once './Include/css2.php';
        include_once './Include/js.php';
        ?>
        <script src="Js/jquery.min.js"></script>
        <script src="Js/jquery-ui.min.js"></script>
        <script src="Js/formulario.js"></script>
        <script src="Js/botoesSemana.js"></script>
        


    </head>
    <body id="telaDisponibilidade">
        <?php
        include_once './Include/cabecalho.php';
        $usuario = $_SESSION['usuario'];
        ?>
        <div class="divs">
            <div class="titulo">
        <h1>Cadastrar Disponibilidade</h1>
         </div>
         
            <div id="BotoesDisponibilidade" >
        <h1>Dias da Semana</h1>
        <form method="post" action="Funcoes/cadastrarDisponibilidade.php">       
            <input type="hidden" value="<?= $usuario->getId(); ?>" name="idUsuario">
            
                <div class="disponibilidadeG">
                    <div class="selectorDisponibilidade" id="divDom" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Dom" name="dia[]" id="Dom">
                    <label for="Dom" onclick="onClickDiaSemana('#divDom')" >Dom</label>
                </div> 

                    <div class="selectorDisponibilidade" id="divSeg" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Seg" name="dia[]"  id="Seg">
                    <label for="Seg" onclick="onClickDiaSemana('#divSeg')">Seg</label>
                </div>

                    <div class="selectorDisponibilidade" id="divTer" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Ter" name = "dia[]" id="Ter">
                    <label for="Ter" onclick="onClickDiaSemana('#divTer')">Ter</label>
                </div>

                    <div class="selectorDisponibilidade" id="divQua" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Qua" name="dia[]" id="Qua">
                    <label for="Qua" onclick="onClickDiaSemana('#divQua')">Qua</label>
                </div>

                    <div class="selectorDisponibilidade" id="divQui" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Qui" name="dia[]" id="Qui">
                    <label for="Qui" onclick="onClickDiaSemana('#divQui')">Qui</label>
                </div>

                    <div class="selectorDisponibilidade" id="divSex" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Sex" name="dia[]" id="Sex">
                    <label for="Sex" onclick="onClickDiaSemana('#divSex')">Sex</label>
                </div>

                    <div class="selectorDisponibilidade" id="divSab" onclick="onClickDiaSemana(this)">
                    <input type="checkbox" value="Sab" name="dia[]" id="Sab">
                    <label for="Sab" onclick="onClickDiaSemana('#divSab')">Sáb</label>
                </div>
            </div>
            </div>
           
            
            <div class="titulo">
        <h1>Digite sua Disponibilidade</h1>
         </div>
     
            <div id="divDisponibilidade">
            
            <div id="divDisponibilidade1">
            <label>Dia Inicial:</label>
            <input placeholder="Digite o dia inicial"type="text" name="diaI"  class="calendario" autocomplete="off" onkeypress="mascaraData(this)" maxlength="10">
            <br>
            <label>Dia Final:</label>
            <input placeholder="Digite o dia final" type="text" name="diaF" class="calendario" autocomplete="off" onkeypress="mascaraData(this)" maxlength="10">
            <br>
<!--            <textarea id="oioi5" name="materiaisUtilizados" placeholder="Materiais de atendimento"></textarea>-->
            <label>Hora Inicial</label>
            <input placeholder="Digite a hora Inicial"type="text" name="horaI" class="Hora" id="horaInicial" onkeyup="mascara_Hora(this.value,'horaInicial')" maxlength="8">
            <br>
            <label>Hora Final:</label>
            <input placeholder="Digite a hora final" type="text" name="horaF" class="Hora" id="horaFinal" onkeyup="mascara_Hora(this.value,'horaFinal')" maxlength="8">
            <br>
            <label>Intervalo de cada agendamento:</label>
            <input placeholder="Digite o intervalo"type="text" name="intervalo" class="Hora" id="intervalo"onkeyup="mascara_Hora(this.value,'intervalo')" maxlength="8">
           </div>
           
            <div class="botoesdiv">
            <a href="telaDisponibilidade.php?" >
                <input type="submit" value="Adicionar" class="botoes">
            </a>
            </div>
             </div>
        </form>
        
        <form method="post" action="../Controller/RemoverDisponibilidade.php">
            <div class="titulo">
            <h1>Remover Disponiblidade</h1>
            </div>
            <?php
                include_once '/../Controller/RemoverDisponibilidade.php';
            ?>
        </form>
        <?php
        if(isset($_SESSION['msg'])){
              echo '<script> onclick("myModal") </script>';
              unset($_SESSION['msg']);
              unset($_SESSION['msg2']);
            }
             include_once './Include/rodape.php';
        ?>
        </div>
    </body>
</html>
