<?php
namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes
{
    private $Method;
    private array $Param = [];
    private $namespace;
    private $ObjAdmin;

    protected function getMethod()
    {
        return $this->Method;
    }

    public function setMethod($Method)
    {
        $this->Method = $Method;
    }

    protected function getParam()
    {
        return $this->Param;
    }

    public function setParam($Param)
    {
        $this->Param = $Param;
    }

    public function __construct()
    {
        self::addController();
    }

    private function addController(): void
    {
        $RotaController = $this->getRoute();
        $namespace = "App\\Controllers\\{$RotaController}";

        $this->namespace = new $namespace;

        if (isset($this->parseUrl()[1])) {
            if (class_exists($namespace)) {
                self::addMethod();
            } else {
                call_user_func_array(["App\\Controllers\\PageNotFoundController", $this->getMethod()], $this->getParam());
            }
        }
    }

    private function addMethod(): void
    {
        if (method_exists($this->namespace, $this->parseUrl()[1])) {
            $this->setMethod("{$this->parseUrl()[1]}");
            self::addParam();
            call_user_func_array([$this->namespace, $this->getMethod()], $this->getParam());
        }
    }

    private function addParam(): void
    {
        $ContArray = count($this->parseUrl());
        if ($ContArray > 2) {
            foreach ($this->parseUrl() as $Key => $Value) {
                if ($Key > 1) {
                    $this->setParam($this->Param += [$Key => $Value]);
                }
            }
        }
    }

   /* public function destroySessions(): void
    {
        session_destroy();
        $_SESSION = [];
    }*/
}
