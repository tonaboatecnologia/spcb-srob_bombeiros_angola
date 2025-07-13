<?php

namespace App\Controllers;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
 
class SobreAjudaAdminController extends ClassRender implements InterfaceView
{
    public function __construct()
    {
       $this->setTitle("SIGPOL - SOBRE & AJUDA");
       $this->setDescription("Aprenda como Manuseiar de Forma Simples e Eficiente");
       $this->setKeywords("Gestão Populacional, Nacional");
       $this->setAuthor("Candimba Tecnologia");
       $this->setDir("sobreAjuda/");
       $this->setWelcomeTitle("Sobre & Ajuda do SIGPOL");
       $this->setWelcomeDesc("Painel de orientação dos manuais de usuário e termos de Licença e muito mais");
       $this->renderLayoutAdmin();

   }
}
