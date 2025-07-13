<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;


class PainelAdminController extends ClassRender implements InterfaceView
{

    public function __construct()
    {

       if ($_SESSION['permition'] <> "admin"):

           $this->setTitle("SIGPOL - Painel Operador");
            $this->setDescription("Painel geral de Operações");
            $this->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
            $this->setAuthor("Ricardo Massungui");
            $this->setDir("painelAdmin/");
            $this->setWelcomeTitle("Seja Bem-Vindo ao spcb SYSTEM operador");
            $this->setWelcomeDesc("Painel Geral de Operações & estátisticas do spcb - Sistema de Gestão & Registro de Ocorrências de Bombeiros");
            $this->renderLayoutAdmin();
        else:

            $this->setTitle("spcb SYSTEM - Painel Geral Admin");
            $this->setDescription("Painel geral do Administrativo");
            $this->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
            $this->setAuthor("Ricardo Massungui");
            $this->setDir("painelAdmin/");
            $this->setWelcomeTitle("Seja Bem-Vindo ao spcb SYSTEM Administrativo");
            $this->setWelcomeDesc("Painel Geral Administrativo & estátistico do spcb - Sistema de Gestão & Registro de Ocorrências de Bombeiros");
            $this->renderLayoutAdmin();
       endif;
    }
}
