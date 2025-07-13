<?php

namespace App\Controllers;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
 
class NovaSenhaAdminController extends ClassRender implements InterfaceView
{
    public function __construct()
    {
       $this->setTitle(" SIGPOL - Redefinir Nova Senha");
       $this->setDescription("Tela de Redefinição de uma Nova Senha");
       $this->setKeywords("Gestão Populacional, Nacional, portal de denúncias, cadastro de desaparecidos e comentários públicos");
       $this->setAuthor("Candimba Tecnologia");
       $this->setDir("novaSenha/");
       $this->RenderLayoutLoginNovaSenhaAdmin();

   }
}
