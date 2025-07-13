<?php

namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes
{
    use TraitUrlParser;

    private array $routes = [
        "" => "LoginAdminController",
        "login" => "LoginAdminController",
        
        "novaSenha" => "NovaSenhaAdminController",
        "painel-Admin" => "PainelAdminController",
        "visualizar-Ocorrencias" => "OcorrenciasAdminController",
        "gerenciar-FichaCentral" => "FichaCentralAdminController",
        "gerenciar-FichaVitima" => "FichaVitimaAdminController",
        "gerenciar-Usuarios" => "UsuariosAdminController",
        "gerenciar-Equipes" => "EquipesAdminController",
        "gerenciar-Veiculos" =>"VeiculosAdminController",
        "gerenciar-OrgaosApoio" =>"OrgaosApoioAdminController",
        "gerenciar-Horarios-Viaturas" =>"HorariosViaturasAdminController",
       
        "relatorio-Usuarios" => "relatoriosUsuarios",
        "relatorio-Final" => "relatorioFinal",
        "relatorio-Veiculos" => "relatorioVeiculos",
       "politícas-Privacidades"=>"PoliticasPrivacidadeAdminController",
        "sobre-Ajuda" => "SobreAjudaAdminController",
        "sair-Sistema" =>"LogoutAdmincontroller",
        
    ];

    public function getRoute(): string
    {
        $url = $this->parseUrl();
        $routeKey = $url[0] ?? '';

        if (array_key_exists($routeKey, $this->routes)) {
            $controllerName = $this->routes[$routeKey];
            $controllerPath = DIRREQ . "app/controllers/{$controllerName}.php";

            if (file_exists($controllerPath)) {
                return $controllerName;
            }
        }

        return "PageNotFoundController";
    }
}