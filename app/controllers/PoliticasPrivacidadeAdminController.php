<?php

namespace App\Controllers;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
 
class PoliticasPrivacidadeAdminController extends ClassRender implements InterfaceView
{
    public function __construct()
    {
       $this->setTitle("SIGPOL - POLÍTICAS & PRIVACIDADES");
       $this->setDescription("Entenda como funcionam as Politícas de privacidades de Uso dos dados");
       $this->setKeywords("Gestão Populacional, Nacional");
       $this->setAuthor("Candimba Tecnologia");
       $this->setDir("politicasPrivacidades/");
       $this->setWelcomeTitle("Politícas de uso e Privacidades de dados");
       $this->setWelcomeDesc("Painel Descritivo das Politícas e Privacidades de uso de Dados");
       $this->renderLayoutAdmin();

   }
}
