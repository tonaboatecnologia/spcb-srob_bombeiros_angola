<?php

namespace Src\Classes;

class ClassRender
{
    public $dir;
    public $title;
    public $description;
    public $keywords;
    public $author;
    public $welcomeTitle;
    public $welcomeDesc;
    public $sessionUrl;


    public function protectorUrl($permition)
    {
       
        $this->sessionUrl = new ClassSessions();
        $this->sessionUrl->verifyInsideSessions($permition);
        
    }

    public function getDir()
    {
        return $this->dir;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getWelcomeTitle()
    {
        return $this->welcomeTitle;
    }

    public function setWelcomeTitle($welcomeTitle)
    {
        $this->welcomeTitle = $welcomeTitle;
    }

    public function getWelcomeDesc()
    {
        return $this->welcomeDesc;
    }

    public function setWelcomeDesc($welcomeDesc)
    {
        $this->welcomeDesc = $welcomeDesc;
    }

    public function includeIfExists($file)
    {
        if (file_exists($file)) {
            include($file);
        }
    }

    

    public function renderLayoutAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/TemplateAdmin.php");
    }
    public function renderLayoutRelatorioAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/TemplateRelatorio.php");
    }
    public function renderLayoutAdminLogout()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/TemplateLogout.php");   
    }
    public function setHeadAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/Head.php");
    }

    public function setHeaderAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/Header.php");
    }

    public function setSideBarAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/SideBar.php");
    }

    public function setMainAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/{$this->getDir()}/Main.php");
    }

    public function setMainRelatorioAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/relatorios/{$this->getDir()}/Main.php");
    }
    public function setFooterAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/Footer.php");
    }

    public function setScriptAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/Script.php");
    }

    public function renderLayoutPageNotFound()
    {
        $this->includeIfExists(DIRREQ . "app/views/PageNotFound.php");
    }

    public function renderLayoutLoginNovaSenhaAdmin()
    {
        $this->includeIfExists(DIRREQ . "app/views/admin/TemplateLoginNovaSenha.php");
    }
}




