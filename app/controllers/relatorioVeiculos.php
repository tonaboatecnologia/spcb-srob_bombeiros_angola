<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\ViaturasModel;
use Dompdf\Dompdf;


class  relatorioVeiculos extends ViaturasModel
{

    private $relatorio;
    protected $carFormDatas2;
    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
    }

    public function renderAdminRelatorioLayout()
    {
        $this->renderAdminLayout = new ClassRender();

        $this->renderAdminLayout->setTitle("SROB - Gerenciar Relatórios de Viaturas");
        $this->renderAdminLayout->setDescription("Gestão de Relatórios de Viaturas");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("Viaturas/");
        $this->renderAdminLayout->setWelcomeTitle("Relatório de Viaturas SROB ");
        $this->renderAdminLayout->setWelcomeDesc("Relatórios de Viaturas Cadastrados no SROB ");
    }
    public  function gerarPdf($carSearch)

    {

        $carPdf = new Dompdf(['enable_remote' => true]);

        global $CarsearchFormDatas;
        if (!empty($carSearch)) :
            $carsDatas = $this->getAllCarsDatas($carSearch ?? true, $CarsearchFormDatas['limitCars'] ?? true, $CarsearchFormDatas['orderCars'] ?? true);
        else :
            $carsDatas = $this->getAllCars();
        endif;
        $responsavel = $_SESSION['name'];
        $permissao = $_SESSION['permition'];
        $cargo = $_SESSION['cargo'];
        $patente = $_SESSION['patente'];
        $datacar = "Responsavél: " . $responsavel . " | " . "Cargo: " . $cargo . " | " . "Patente: " . $patente . " | " . "Permissão: " . $permissao;
        $ref =  COUNTRYCODE . " | " . LOCALIZATION . " | " . DATATIME . " | " . uniqid();

        $html = "
        <!DOCTYPE html>
        
</head>

<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <meta name='description' content='Gestão de Viaturas'>
    <meta name='autor' content='Candimba Tecnologia'>
    <meta name='keywords' content='Gestão Populacional, Nacional'>
    <!-- Adicione a seguinte meta tag para melhorar a exibição em dispositivos com alta densidade de pixels (por exemplo, Retina) -->

    <!-- Adicione a seguinte meta tag para garantir que a barra de endereços do navegador não seja ocultada ao rolar -->
    <meta name='apple-mobile-web-app-capable' content='yes'>
    <!-- Adicione a cor do tema para dispositivos iOS -->
    <meta name='apple-mobile-web-app-status-bar-style' content='black-translucent'>
    <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
    <!-- Adicione a meta tag de tema para browsers com suporte -->
    <meta name='theme-color' content='#e73131'>

    <title>SROB -  - Relatórios de Viaturas</title>

    <!-- Adicione os ícones para dispositivos iOS -->
    <link rel='apple-touch-icon' sizes='180x180' href='http://localhost/spcb/public/assets/images/logos/logospcb.jpeg'>

    <!-- Favicon icon -->

    <link rel='icon' type='image/png' sizes='16x16' href='http://localhost/spcb/public/assets/images/logos/logospcb.jpeg'>

    <!-- Google font-->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet'>

    <link rel='stylesheet' type='text/css' href='http://localhost/spcb/public/asset/plugins/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='http://localhost/spcb/public/assets/css/bootstrap.min.css'>


    <!-- Style.css -->
    <link rel='stylesheet' type='text/css' href='http://localhost/spcb/public/assets/css/man.css'>

    <!-- Responsive.css-->
    <link rel='stylesheet' type='text/css' href='http://localhost/spcb/public/assets/css/responsive.css'>
  
    <style>
      fieldset{border: 2px solid #39444E; border-radius: 10px; padding: 15px; margin-bottom: 20px;}
      
      label.col-form-label{font-weight: bold; padding-top: 5px;}
 
      legend{ background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;}
      </style>
<head>
<body style='font-size:12px;'>

            <!-- Row Starts -->
            <div class='row'>
                <div class='col-sm-12 p-0'>
                    <div class=''></div>
                    <div class=' text-center'>
                    <div class='text-center'>
                    <img width='100' height='100' class='img-circle' src='http://localhost/spcb/public/assets/images/logos/logospcb2.jpg' alt=''>
                                              
                                            </div>
                            <h4>Relatórios de Viaturas SROB - SPCB</h4>
                            <p class='mb-0'>Viaturas Registrados no SROB - SPCB</p>
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
<fieldset>
<h5 class='text-center'>
<legend class='text-center'><i class='icofont icofont-cars'></i>Visualizar Viaturas</legend>
</h5>
<div class='text-center'>
<h6 class='card-header-text'>Referências</h5>
<p><code>$ref</code></p>
</div>
                                <table style='border-collapse:collapse; width: 100%;' class='table-responsive p-20 text-center'>
                                    <thead>
                                        <tr class='text-center P-10' style='background-color: #39444E; color:#fff; padding: 10px;'>
                                            
                                            <th style='border:1px solid #ccc;'>Id</th>
                                            <th style='border:1px solid #ccc;'>Marca</th>
                                            <th style='border:1px solid #ccc;'>Modelo</th>
                                            <th style='border:1px solid #ccc;'>Cor</th>
                                            <th style='border:1px solid #ccc;'>Matrícula</th>
                                            <th style='border:1px solid #ccc;'>Ano</th>
                                            <th style='border:1px solid #ccc;'>Data_Criação</th>
                                            <th style='border:1px solid #ccc;'>Data_Modificação</th>
                                            
                                          
                                        </tr>
                                    </thead>
                                    <tbody class='relatorioTb'>";

        foreach ($carsDatas as $car) :
            extract($car);
            $html .= "
                                     <tr class=''>
                                
                                  
                                     <td  style='border:1px solid #ccc; border-top:none'>$id_viatura</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$marca</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$modelo</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$cor</td>
                            
                                   
                                    <td  style='border:1px solid #ccc; border-top:none'>$matricula</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$ano</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$data_criacao</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$data_modificacao</td>
                                  
                                    </tr>";
        endforeach;
        $html .= "                </tbody>
                                    <tfoot>
                                    <tr class='text-center P-10' style='background-color: #39444E; color:#fff; padding: 10px;'>
                                    
                                    <th style='border:1px solid #ccc;'>Id</th>
                                    <th style='border:1px solid #ccc;'>Marca</th>
                                    <th style='border:1px solid #ccc;'>Modelo</th>
                                    <th style='border:1px solid #ccc;'>Cor</th>
                                    <th style='border:1px solid #ccc;'>Matrícula</th>
                                    <th style='border:1px solid #ccc;'>Ano</th>
                                    <th style='border:1px solid #ccc;'>Data_Criação</th>
                                    <th style='border:1px solid #ccc;'>Data_Modificação</th>
                                    
                                    
                                  
                                </tr>
                                    </tfoot>
                                    
                                </table>
                                <p><code>$datacar</code></p>
                                
</fieldset>
<hr>
                
  
 

    <!-- Required Fremwork -->
    <script src='http://localhost/spcb/public/assets/plugins/bootstrap/js/bootstrap.min.js'></script>
 


    <!-- custom js -->
 
    <script type='text/javascript' src='http://localhost/spcb/public/assets/js/main.min.js'></script>
    <script src='http://localhost/spcb/public/assets/js/custom.js'></script>
 
 
</body>

</html>";

        // Carregue o HTML no carPdf
        $carPdf->loadHtml($html);

        // (Opcional) Configure o tamanho e a orientação do papel
        $carPdf->setPaper('A4', 'landscape');

        // Renderize o HTML como PDF
        $carPdf->render();

        // Gere o arquivo PDF e force o download
        return $carPdf->stream("SROB_" . date("d:m:Y") . "-" . uniqid() . "_retorios_Viaturas.pdf", ["Attachment" => 0]);
    }

    public function gerarExcel($carSearch)
    {


        global $CarsearchFormDatas;
        if (!empty($carSearch)) :
            $carsDatas = $this->getAllCarsDatas($carSearch ?? true, $CarsearchFormDatas['limitCars'] ?? true, $CarsearchFormDatas['orderCars'] ?? true);
        else :
            $carsDatas = $this->getAllCars();
        endif;
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=SROB_" . date("d:m:Y") . "-" . uniqid() . "_retorios_Viaturas.csv");

        //gravar no buffer
        $resultado  = fopen("php://output", 'w');

        $cabecalho = ['id', 'marca', 'modelo', 'cor', 'matricula', 'ano',mb_convert_encoding('DataCriação', 'ISO-8859-1', 'UTF-8'), mb_convert_encoding('DataModificação', 'ISO-8859-1', 'UTF-8'),];

        fputcsv($resultado, $cabecalho, ';');


        foreach ($carsDatas as $car) :
            //extract($car);
            fputcsv($resultado, mb_convert_encoding($car, 'ISO-8859-1', 'UTF-8'), ';');
        endforeach;

        fclose($resultado);

        return;
    }
}
