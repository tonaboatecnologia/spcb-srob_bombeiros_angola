<?php

namespace Src\Classes;

class ClassBreadcrumbs
{

    use \Src\Traits\TraitUrlParser;
    
    public function addBreadcrumb()
    {
        $urlSegments = $this->parseUrl();
        $breadcrumb = '';

        
        echo '<a href="' . DIRPAGE . 'painel">Visão Geral </a> >';

        foreach ($urlSegments as $segment) {
            $breadcrumb .= $segment . '/';

            echo '<a href="' . DIRPAGE . $breadcrumb . '" > ' . $segment . '</a>';

            if ($segment !== end($urlSegments)) {
                echo ' > ';
            }
        }
    }
}
