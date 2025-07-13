<?php
namespace App\Controllers;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;


class PageNotFoundController extends ClassRender implements InterfaceView{
    public function __construct()
    {
      $this->setTitle("ERRO: 404");
       $this->setDescription("Página não encontrada no sistema");
       $this->setKeywords("Gestão Populacional, portal de denúncias, cadastro e procura de pessoas desparecidas, comentário público para toda população");
       $this->setAuthor("Candimba Tecnologia");
       $this->RenderLayoutPageNotFound();
    }
}
?>   