<?php
namespace Src\Interfaces;

interface InterfaceView{
    public function setDir($dir);
    public function setTitle($title);
    public function setDescription($description);
    public function setKeywords($keywords);
    public function setAuthor($author);
    public function setWelcomeTitle($welcomeTitle);
    public function setWelcomeDesc($welcomeDesc);
    public function renderLayoutAdmin();
    public function protectorUrl($permition);

}

?>