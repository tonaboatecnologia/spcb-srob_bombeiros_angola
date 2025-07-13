<?php

namespace App\Controllers;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use Src\Classes\ClassSessions;

class LogoutAdminController extends ClassRender implements InterfaceView
{
    private $destroySessions;
    public function __construct()
    {
        if(!empty(isset($_SESSION['permition']))):
            $this->setTitle("spcb SYSTEM - Sessão Terminada no Sistema");
            $this->setDescription("Terminar Sessão, Logar Novamente!");
            $this->setKeywords("spcb - Sistema de gestão de Registro de ocorrências de Bombeiros");
            $this->setAuthor("Software Engineer: Ricardo Massungui");
            $this->renderLayoutAdminLogout();
            $this->destroySessions = new ClassSessions();
            $this->destroySessions->destroySessions();
            echo"<script> alert('você está Deslogado do Sistema, inicia uma nova Sessão de Login'); 
           
            window.location.href='".DIRPAGE."login'</script>";
             
            exit;
       endif;
   }
}
