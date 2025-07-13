<?php

namespace App\Controllers;

use App\Models\OcorrenciasAdminModel;
use Src\Classes\ClassRender;
use App\Models\UsuariosAdminModel;
use Dompdf\Dompdf;


class  relatorioFinal extends OcorrenciasAdminModel
{

    private $relatorio;
    protected $userFormDatas2;
    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
    }

    public function renderAdminRelatorioLayout()

    {
        
        $this->renderAdminLayout = new ClassRender();

        $this->renderAdminLayout->setTitle("SROB - Gerenciar Relatórios de Ocorrências");
        $this->renderAdminLayout->setDescription("Gestão de Relatórios de Ocorrências");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("usuarios/");
        $this->renderAdminLayout->setWelcomeTitle("Relatório de Ocorrências Gerais do SROB ");
        $this->renderAdminLayout->setWelcomeDesc("Relatórios de Ocorrências Cadastrados no SROB ");
    }
    public function relatorioFinalPdf()
    {

        if (!empty($ocorrencesDatas = $this->getAllOcorrences()) > 0) :
            $userPdf = new Dompdf(['enable_remote' => true]);

            $ocorrencesDatas = $this->getAllOcorrences();


            $responsavel = $_SESSION['name'];
            $permissao = $_SESSION['permition'];
            $cargo = $_SESSION['cargo'];
            $patente = $_SESSION['patente'];
            $dataUser = "Responsavél: " . $responsavel . " | " . "Cargo: " . $cargo . " | " . "Patente: " . $patente . " | " . "Permissão: " . $permissao;
            $ref =  COUNTRYCODE . " | " . LOCALIZATION . " | " . DATATIME . " | " . uniqid();

            $html = "
         <!DOCTYPE html>
         
 </head>
 
 <meta name='viewport' content='width=device-width, initial-scale=1.0'>
     <meta http-equiv='X-UA-Compatible' content='ie=edge'>
     <meta name='description' content='Gestão de Ocorrências'>
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
 
     <title>SROB -  - Relatórios de Ocorrências</title>
 
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
                             <h4>Relatórios de Ocorrências SROB - SPCB</h4>
                             <p class='mb-0'>Ocorrências Registrados no SROB - SPCB</p>
                             <br>
                             <hr>
                         </div>
                     </div>
                 </div>
             </div>
 <fieldset>
 <h5 class='text-center'>
 <legend class='text-center'><i class='icofont icofont-users'></i>Visualizar Ocorrências</legend>
 </h5>
 <div class='text-center'>
 <h6 class='card-header-text'>Referências</h5>
 <p><code>$ref</code></p>
 </div>
                                 <table style='border-collapse:collapse; width: 100%;' class='table-responsive p-20 text-center'>
                                     <thead>
                                         <tr class='text-center P-10' style='background-color: #39444E; color:#fff; padding: 10px;'>
                                            
                                             <th style='border:1px solid #ccc;'>id_solicitante</th>
                                             <th style='border:1px solid #ccc;'>solicitantes</th>
                                             <th style='border:1px solid #ccc;'>municipio</th>
                                             <th style='border:1px solid #ccc;'>bairro</th>
                                             <th style='border:1px solid #ccc;'>rua</th>
                                             <th style='border:1px solid #ccc;'>referencia</th>
                                             <th style='border:1px solid #ccc;'>tipo_ocorrencias</th>
                                             <th style='border:1px solid #ccc;'>orgaos_apoio</th>
                                             <th style='border:1px solid #ccc;'>equipes</th>
                                             <th style='border:1px solid #ccc;'>data_Ocorrencia</th>
                                           
                                         </tr>
                                     </thead>
                                     <tbody class='relatorioTb'>";

            foreach ($ocorrencesDatas as $user) :
                extract($user);
                $html .= "
                                      <tr class=''>
                                    
                                      ";


                $html .= "
     
                                  
                                      <td  style='border:1px solid #ccc; border-top:none'>$id_solicitante</td>
                                      <td  style='border:1px solid #ccc; border-top:none'>$solicitantes</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$municipio</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$bairro</td>
                                     <td scope='row'  style='border:1px solid #ccc; border-top:none'>$rua</td>
                                    
                                     <td  style='border:1px solid #ccc; border-top:none'>$referencia</td>
                                     <td scope='row'  style='border:1px solid #ccc; border-top:none'>$tipo_ocorrencias</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$orgaos_apoio</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$equipes</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$data_Ocorrencia</td>
                                   
                                     </tr>";
            endforeach;
            $html .= "                </tbody>
                                     <tfoot>
                                     <th style='border:1px solid #ccc;'>id_solicitante</th>
                                     <th style='border:1px solid #ccc;'>solicitantes</th>
                                     <th style='border:1px solid #ccc;'>municipio</th>
                                     <th style='border:1px solid #ccc;'>bairro</th>
                                     <th style='border:1px solid #ccc;'>rua</th>
                                     <th style='border:1px solid #ccc;'>referencia</th>
                                     <th style='border:1px solid #ccc;'>tipo_ocorrencias</th>
                                     <th style='border:1px solid #ccc;'>orgaos_apoio</th>
                                     <th style='border:1px solid #ccc;'>equipes</th>
                                     <th style='border:1px solid #ccc;'>data_Ocorrencia</th>
                                   
                                 </tr>
                                     </tfoot>
                                     
                                 </table>
                                 <p><code>$dataUser</code></p>
                                 
 </fieldset>
 <hr>
                 
   
  
 
     <!-- Required Fremwork -->
     <script src='http://localhost/spcb/public/assets/plugins/bootstrap/js/bootstrap.min.js'></script>
  
 
 
     <!-- custom js -->
  
     <script type='text/javascript' src='http://localhost/spcb/public/assets/js/main.min.js'></script>
     <script src='http://localhost/spcb/public/assets/js/custom.js'></script>
  
  
 </body>
 
 </html>";

            // Carregue o HTML no userPdf
            $userPdf->loadHtml($html);

            // (Opcional) Configure o tamanho e a orientação do papel
            $userPdf->setPaper('A4', 'landscape');

            // Renderize o HTML como PDF
            $userPdf->render();

            // Gere o arquivo PDF e force o download
            return $userPdf->stream("SROB_" . date("d:m:Y") . "-" . uniqid() . "_retorios_Usuarios.pdf", ["Attachment" => 0]);
        else :
            echo "<div class='alert alert-danger text-center'><i class='fa fa-database'></i> Nenhum Dados Encontrado!</div>";
?>
            <script>
                alert("Nenhum dado Encontrado no Banco de Dados!");
            </script>
        <?php
        endif;
        
    }
    public function relatorioFinalExcel()
    {
        if (count($ocorrencesDatas = $this->getAllOcorrences()) > 0) :

            $ocorrencesDatas = $this->getAllOcorrences();

            header("Content-Type: text/csv; charset=utf-8");
            header("Content-Disposition: attachment; filename=SROB_" . date("d:m:Y") . "-" . uniqid() . "_retorios_Usuarios.csv");

            //gravar no buffer
            $resultado  = fopen("php://output", 'w');

            $cabecalho = ['id_solicitante', 'solicitantes',  mb_convert_encoding('Município', 'ISO-8859-1', 'UTF-8'), 'Bairro', 'rua', 'referencia', 'tipo_ocorrencias', 'orgaos_apoio', 'equipes', mb_convert_encoding('DataCriação', 'ISO-8859-1', 'UTF-8'), mb_convert_encoding('DataModificação', 'ISO-8859-1', 'UTF-8'),];

            fputcsv($resultado, $cabecalho, ';');


            foreach ($ocorrencesDatas as $user) :
                //extract($user);
                fputcsv($resultado, mb_convert_encoding($user, 'ISO-8859-1', 'UTF-8'), ';');
            endforeach;

            fclose($resultado);


        else :
            echo "<div class='alert alert-danger text-center'><i class='fa fa-database'></i> Nenhum Dados Encontrado!</div>";
        ?>
            <script>
                alert("Nenhum dado Encontrado no Banco de Dados!");
            </script>
<?php
        endif;
        return;
    }
    public  function gerarPdf($Search, $inicio, $fim, $order, $limit)

    {

        $userPdf = new Dompdf(['enable_remote' => true]);
        // $Search = $this->getSearchOcorrences($Search, $inicio, $fim, $order, $limit);

        //global $userSearchFormDatas;
        if (!empty($Search) && !empty($inicio) && !empty($fim)) :
            $ocorrencesDatas = $this->getSearchOcorrences($Search, $inicio, $fim, $order, $limit);
        else :
            $ocorrencesDatas = $this->getAllOcorrences();
        endif;
        $responsavel = $_SESSION['name'];
        $permissao = $_SESSION['permition'];
        $cargo = $_SESSION['cargo'];
        $patente = $_SESSION['patente'];
        $dataUser = "Responsavél: " . $responsavel . " | " . "Cargo: " . $cargo . " | " . "Patente: " . $patente . " | " . "Permissão: " . $permissao;
        $ref =  COUNTRYCODE . " | " . LOCALIZATION . " | " . DATATIME . " | " . uniqid();

        $html = "
        <!DOCTYPE html>
        
</head>

<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <meta name='description' content='Gestão de Ocorrências'>
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

    <title>SROB -  - Relatórios de Ocorrências</title>

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
                            <h4>Relatórios de Ocorrências SROB - SPCB</h4>
                            <p class='mb-0'>Ocorrências Registrados no SROB - SPCB</p>
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
<fieldset>
<h5 class='text-center'>
<legend class='text-center'><i class='icofont icofont-users'></i>Visualizar Ocorrências</legend>
</h5>
<div class='text-center'>
<h6 class='card-header-text'>Referências</h5>
<p><code>$ref</code></p>
</div>
                                <table style='border-collapse:collapse; width: 100%;' class='table-responsive p-20 text-center'>
                                    <thead>
                                        <tr class='text-center P-10' style='background-color: #39444E; color:#fff; padding: 10px;'>
                                           
                                            <th style='border:1px solid #ccc;'>id_solicitante</th>
                                            <th style='border:1px solid #ccc;'>solicitantes</th>
                                            <th style='border:1px solid #ccc;'>municipio</th>
                                            <th style='border:1px solid #ccc;'>bairro</th>
                                            <th style='border:1px solid #ccc;'>rua</th>
                                            <th style='border:1px solid #ccc;'>referencia</th>
                                            <th style='border:1px solid #ccc;'>tipo_ocorrencias</th>
                                            <th style='border:1px solid #ccc;'>orgaos_apoio</th>
                                            <th style='border:1px solid #ccc;'>equipes</th>
                                            <th style='border:1px solid #ccc;'>data_Ocorrencia</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody class='relatorioTb'>";

        foreach ($ocorrencesDatas as $user) :
            extract($user);
            $html .= "
                                     <tr class=''>
                                   
                                     ";


            $html .= "
    
                                 
                                     <td  style='border:1px solid #ccc; border-top:none'>$id_solicitante</td>
                                     <td  style='border:1px solid #ccc; border-top:none'>$solicitantes</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$municipio</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$bairro</td>
                                    <td scope='row'  style='border:1px solid #ccc; border-top:none'>$rua</td>
                                   
                                    <td  style='border:1px solid #ccc; border-top:none'>$referencia</td>
                                    <td scope='row'  style='border:1px solid #ccc; border-top:none'>$tipo_ocorrencias</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$orgaos_apoio</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$equipes</td>
                                    <td  style='border:1px solid #ccc; border-top:none'>$data_Ocorrencia</td>
                                  
                                    </tr>";
        endforeach;
        $html .= "                </tbody>
                                    <tfoot>
                                    <th style='border:1px solid #ccc;'>id_solicitante</th>
                                    <th style='border:1px solid #ccc;'>solicitantes</th>
                                    <th style='border:1px solid #ccc;'>municipio</th>
                                    <th style='border:1px solid #ccc;'>bairro</th>
                                    <th style='border:1px solid #ccc;'>rua</th>
                                    <th style='border:1px solid #ccc;'>referencia</th>
                                    <th style='border:1px solid #ccc;'>tipo_ocorrencias</th>
                                    <th style='border:1px solid #ccc;'>orgaos_apoio</th>
                                    <th style='border:1px solid #ccc;'>equipes</th>
                                    <th style='border:1px solid #ccc;'>data_Ocorrencia</th>
                                  
                                </tr>
                                    </tfoot>
                                    
                                </table>
                                <p><code>$dataUser</code></p>
                                
</fieldset>
<hr>
                
  
 

    <!-- Required Fremwork -->
    <script src='http://localhost/spcb/public/assets/plugins/bootstrap/js/bootstrap.min.js'></script>
 


    <!-- custom js -->
 
    <script type='text/javascript' src='http://localhost/spcb/public/assets/js/main.min.js'></script>
    <script src='http://localhost/spcb/public/assets/js/custom.js'></script>
 
 
</body>

</html>";

        // Carregue o HTML no userPdf
        $userPdf->loadHtml($html);

        // (Opcional) Configure o tamanho e a orientação do papel
        $userPdf->setPaper('A4', 'landscape');

        // Renderize o HTML como PDF
        $userPdf->render();

        // Gere o arquivo PDF e force o download
        return $userPdf->stream("SROB_" . date("d:m:Y") . "-" . uniqid() . "_retorios_Usuarios.pdf", ["Attachment" => 0]);
    }

    public function gerarExcel($Search, $inicio, $fim, $order, $limit)
    {


        // global $userSearchFormDatas;
        if (!empty($Search) && !empty($inicio) && !empty($fim) && !empty($order) && !empty($limit)) :
            $ocorrencesDatas = $this->getSearchOcorrences($Search, $inicio, $fim, $order, $limit);
        else :
            $ocorrencesDatas = $this->getAllOcorrences();
        endif;
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=SROB_" . date("d:m:Y") . "-" . uniqid() . "_relatorios_Final
.csv");

        //gravar no buffer
        $resultado  = fopen("php://output", 'w');

        $cabecalho = ['id_solicitante', 'solicitantes',  mb_convert_encoding('Município', 'ISO-8859-1', 'UTF-8'), 'Bairro', 'rua', 'referencia', 'tipo_ocorrencias', 'orgaos_apoio', 'equipes', mb_convert_encoding('DataCriação', 'ISO-8859-1', 'UTF-8'), mb_convert_encoding('DataModificação', 'ISO-8859-1', 'UTF-8'),];

        fputcsv($resultado, $cabecalho, ';');


        foreach ($ocorrencesDatas as $user) :
            //extract($user);
            fputcsv($resultado, mb_convert_encoding($user, 'ISO-8859-1', 'UTF-8'), ';');
        endforeach;

        fclose($resultado);

        return;
    }
}
