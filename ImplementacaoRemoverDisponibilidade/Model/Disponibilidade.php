<?php

require_once dirname(__FILE__) . '/../Dao/DisponibilidadeDao.php';
require_once dirname(__FILE__) . '/Agendamento.php';
require_once dirname(__FILE__) . '/Auxiliar.php';

class Disponibilidade {

    private $diaInicial;
    private $diaFinal;
    private $hInicial;
    private $hFinal;
    private $segunda;
    private $terca;
    private $quarta;
    private $quinta;
    private $sexta;
    private $sabado;
    private $domingo;
    private $tempoAgendamento;
    private $idUsuario;
    private $idServico;
    private $idDisponibilidade;
    private $cont;

    function getIdDisponibilidade() {
        return $this->idDisponibilidade;
    }

    function setIdDisponibilidade($idDisponibilidade) {
        $this->idDisponibilidade = $idDisponibilidade;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function getDiaInicial() {
        return $this->diaInicial;
    }

    function getDiaFinal() {
        return $this->diaFinal;
    }

    function getHInicial() {
        return $this->hInicial;
    }

    function getHFinal() {
        return $this->hFinal;
    }

    function getSegunda() {
        return $this->segunda;
    }

    function getTerca() {
        return $this->terca;
    }

    function getQuarta() {
        return $this->quarta;
    }

    function getQuinta() {
        return $this->quinta;
    }

    function getSexta() {
        return $this->sexta;
    }

    function getSabado() {
        return $this->sabado;
    }

    function getDomingo() {
        return $this->domingo;
    }

    function getTempo_Agendamento() {
        return $this->tempoAgendamento;
    }

    function getIdServico() {
        return $this->idServico;
    }

    function getCont() {
        return $this->cont;
    }

    function setDiaInicial($diaInicial) {
        $this->diaInicial = $diaInicial;
    }

    function setDiaFinal($diaFinal) {
        $this->diaFinal = $diaFinal;
    }

    function setHInicial($hInicial) {
        $this->hInicial = $hInicial;
    }

    function setHFinal($hFinal) {
        $this->hFinal = $hFinal;
    }

    function setSegunda($segunda) {
        $this->segunda = $segunda;
    }

    function setTerca($terca) {
        $this->terca = $terca;
    }

    function setQuarta($quarta) {
        $this->quarta = $quarta;
    }

    function setQuinta($quinta) {
        $this->quinta = $quinta;
    }

    function setSexta($sexta) {
        $this->sexta = $sexta;
    }

    function setSabado($sabado) {
        $this->sabado = $sabado;
    }

    function setDomingo($domingo) {
        $this->domingo = $domingo;
    }

    function setTempoAgendamento($tempoAgendamento) {
        $this->tempoAgendamento = $tempoAgendamento;
    }

    function setIdServico($idServico) {
        $this->idServico = $idServico;
    }

    function setCont($cont) {
        $this->cont = $cont;
    }

    public function salvar() {
        return disponibilidadeDao::salvar($this->domingo, $this->segunda, $this->terca, $this->quarta, $this->quinta, $this->sexta, $this->sabado, $this->hInicial, $this->hFinal, Auxiliar::getDataParaBd($this->diaFinal), Auxiliar::getDataParaBd
                                ($this->diaInicial), $this->tempoAgendamento, $this->idUsuario, $this->idServico);
    }

    public static function buscar($idNegocio, $diaInicial, $diaFinal) {
        $tabela = DisponibilidadeDao::buscar($idNegocio, Auxiliar::getDataParaBd($diaInicial), Auxiliar::getDataParaBd($diaFinal));
//        print_r($tabela);
        $lista = array();
        if (is_object($tabela)) {
            while ($linha = $tabela->fetch_assoc()) {
                $dAtual = $linha["diaInicial"];
                $cont=1;
                while ($dAtual <= $linha["diaFinal"]) {
                    $dia=array();
                    $dia["dia"]=$dAtual;
                    
                    $hInicial = $linha["hInicial"];
                    $hFinal = $linha["hFinal"];
                    $tempoAgendamento = $linha["tempo_Agendamento"];
                    $agendados= Agendamento::listarAgendamentosPorDisponibilidade($linha["idDisponibilidade"]);
                    
                    $_final=gmdate("H:i:s",strtotime('1970-01-01 '.$hInicial.'UTC')+strtotime('1970-01-01 '.$tempoAgendamento.'UTC'));
                    while ($_final <= $hFinal) {
                        if(!in_array($cont, $agendados)){
                            $disponibilidade = new Disponibilidade();
                            $disponibilidade->diaInicial = $dAtual;
                            $disponibilidade->diaFinal = $linha["diaFinal"];
                            $disponibilidade->hInicial = $hInicial; 
                            $disponibilidade->hFinal = $_final;
                            $disponibilidade->segunda = $linha["segunda"];
                            $disponibilidade->terca = $linha["terca"];
                            $disponibilidade->quarta = $linha["quarta"];
                            $disponibilidade->quinta = $linha["quinta"];
                            $disponibilidade->sexta = $linha["sexta"];
                            $disponibilidade->sabado = $linha["sabado"];
                            $disponibilidade->domingo = $linha["domingo"];
                            $disponibilidade->tempoAgendamento = $tempoAgendamento;
                            $disponibilidade->idServico = $linha["idServico"];
                            $disponibilidade->idUsuario = $linha["idUsuario"];
                            $disponibilidade->idDisponibilidade = $linha["idDisponibilidade"];
                            $disponibilidade->cont = $cont;
                            $dia["disponibilidades"][] = $disponibilidade;
                        }
                        
                            $cont++;
//                            $hInicial += $tempoAgendamento;
                            $hInicial = $_final;
                            $_final=gmdate("H:i:s",strtotime('1970-01-01 '.$hInicial.'UTC')+strtotime('1970-01-01 '.$tempoAgendamento.'UTC'));
                    }
                   
                    
                    $lista[]=$dia;
                    $dAtual=date('Y-m-d', strtotime("+1 days",strtotime($dAtual))); 
//                    $dAtual=date('d/m/Y', strtotime("+1 days",strtotime($dAtual))); 
//                    echo $dAtual."<br>";
                }
            }
        }
        return $lista;
    }

//    public static function buscar($idNegocio, $diaInicial, $diaFinal) {
//        $tabela = DisponibilidadeDao::buscar($idNegocio, 
//        Auxiliar::getDataParaBd($diaInicial), Auxiliar::getDataParaBd($diaFinal));
////        print_r($tabela);
////        echo 'a';
//        
//        $dias=array();
//        $listaDisponibilidade = array();
//        
//        if (is_object($tabela)) {
//            while ($linha = $tabela->fetch_assoc()) {
//                
//                $cont = 1;
//                $dAtual=$linha["diaInicial"];  
//                
//                while ($dAtual<=$linha["diaFinal"]){
//                                        
//                    $hInicial = $linha["hInicial"];
//                    $hFinal = $linha["hFinal"];
//                    $tempoAgendamento = $linha["tempo_Agendamento"];
//                    $agendados= Agendamento::listarAgendamentosPorDisponibilidade($linha["idDisponibilidade"]);
//                    
//                    while ($hInicial + $tempoAgendamento <= $hFinal) {
//                        if(!in_array($cont, $agendados)){
//                            $disponibilidade = new Disponibilidade();
//                            $disponibilidade->diaInicial = $dAtual;
//                            $disponibilidade->diaFinal = $linha["diaFinal"];
//                            $disponibilidade->hInicial = $hInicial;
//                            $disponibilidade->hFinal = $hInicial + $tempoAgendamento;
//                            $disponibilidade->segunda = $linha["segunda"];
//                            $disponibilidade->terca = $linha["terca"];
//                            $disponibilidade->quarta = $linha["quarta"];
//                            $disponibilidade->quinta = $linha["quinta"];
//                            $disponibilidade->sexta = $linha["sexta"];
//                            $disponibilidade->sabado = $linha["sabado"];
//                            $disponibilidade->domingo = $linha["domingo"];
//                            $disponibilidade->tempoAgendamento = $tempoAgendamento;
//                            $disponibilidade->idServico = $linha["idServico"];
//                            $disponibilidade->idUsuario = $linha["idUsuario"];
//                            $disponibilidade->idDisponibilidade = $linha["idDisponibilidade"];
//                            $disponibilidade->cont = $cont;
//                            $listaDisponibilidade[] = $disponibilidade;
//                        }
//                            $cont++;
//                            $hInicial += $tempoAgendamento;
//                    }
////                array_push($dias, $listaDisponibilidade);
////                    $dias["disponibilidades"]=$listaDisponibilidade;
//                    $dias[]=array("dia"=>$dAtual,"idDisponibilidade"=>$linha["idDisponibilidade"],"disponibilidades"=>$listaDisponibilidade);
//                $dAtual++;
////                 $dAtual=strtotime("+1 day",strtotime($dAtual));
//                }
//            }
//        }
//        return $dias;
//    }

    public static function buscarPorId($id) {
        $tabela = DisponibilidadeDao::buscarPorId($id);

        $disponibilidade = new Disponibilidade();
        if (is_object($tabela)) {

            while ($linha = $tabela->fetch_assoc()) {
                $disponibilidade = new Disponibilidade();
                $disponibilidade->diaInicial = $linha["diaInicial"];
                $disponibilidade->diaFinal = $linha["diaFinal"];
                $disponibilidade->hInicial = $linha["hInicial"];
                $disponibilidade->hFinal = $linha["hFinal"];
                $disponibilidade->segunda = $linha["segunda"];
                $disponibilidade->terca = $linha["terca"];
                $disponibilidade->quarta = $linha["quarta"];
                $disponibilidade->quinta = $linha["quinta"];
                $disponibilidade->sexta = $linha["sexta"];
                $disponibilidade->sabado = $linha["sabado"];
                $disponibilidade->domingo = $linha["domingo"];
                $disponibilidade->tempoAgendamento = $linha["tempo_Agendamento"];
                $disponibilidade->idServico = $linha["idServico"];
                $disponibilidade->idUsuario = $linha["idUsuario"];
                $disponibilidade->idDisponibilidade = $linha["idDisponibilidade"];
            }
        }
        return $disponibilidade;
    }

    public static function listarDisponibilidadesCadastradas($id) {
        $disponibilidadesCadastradas = DisponibilidadeDao::listarDisponibilidadesCadastradas($id);
        $disponibilidades = array();
        if (is_object($disponibilidadesCadastradas)) {

            while ($linha = $disponibilidadesCadastradas->fetch_assoc()) {
                $disponibilidade = new Disponibilidade();
                $disponibilidade->diaInicial = $linha["diaInicial"];
                $disponibilidade->diaFinal = $linha["diaFinal"];
                $disponibilidade->hInicial = $linha["hInicial"];
                $disponibilidade->hFinal = $linha["hFinal"];
                $disponibilidade->tempoAgendamento = $linha["tempo_Agendamento"];
                $disponibilidade->idServico = $linha["idServico"];
                $disponibilidade->idUsuario = $linha["idUsuario"];
                $disponibilidade->idDisponibilidade = $linha["idDisponibilidade"];
                $disponibilidades[] = $disponibilidade;
            }
        }
        return $disponibilidades;
    }

    public static function remover($idDisponibilidade) {
        return DisponibilidadeDao::remover($idDisponibilidade);
    }

}

