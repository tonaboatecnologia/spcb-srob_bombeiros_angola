<?php

use App\Models;
use App\Controllers;
use App\Controllers\relatoriosUsuarios;
use Dompdf\Dompdf; ?>

<?php if ($_SESSION['permition'] == "admin") :

    $users = new Models\UsuariosAdminModel();
  
   
  
    $html = "
    <!DOCTYPE html>
    
</head>

<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta http-equiv='X-UA-Compatible' content='ie=edge'>
<meta name='description' content='Gestão de Usuários'>
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

<title>SROB -  - Relatórios de Usuários</title>

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
                        <h4>Relatórios de Usuários SROB - SPCB</h4>
                        <p class='mb-0'>Usuários Registrados no SROB - SPCB</p>
                        <br>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
<fieldset>
<h5 class='text-center'>
<legend class='text-center'><i class='icofont icofont-users'></i>Visualizar Usuários</legend>
</h5>
<div class='text-center'>
<h6 class='card-header-text'>Referências</h5>
<p><code>$ref</code></p>
</div>
                            <table style='border-collapse:collapse; width: 100%;' class='table-responsive p-20 text-center'>
                                <thead>
                                    <tr class='text-center P-10' style='background-color: #39444E; color:#fff; padding: 10px;'>
                                        <th style='border:1px solid #ccc;'>Foto</th>
                                        <th style='border:1px solid #ccc;'>Id</th>
                                        <th style='border:1px solid #ccc;'>Nome</th>
                                        <th style='border:1px solid #ccc;'>Nip</th>
                                        <th style='border:1px solid #ccc;'>Email</th>
                                        <th style='border:1px solid #ccc;'>Idade</th>
                                        <th style='border:1px solid #ccc;'>Patente</th>
                                        <th style='border:1px solid #ccc;'>Cargo</th>
                                        <th style='border:1px solid #ccc;'>Permissão</th>
                                        <th style='border:1px solid #ccc;'>Estado</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class='relatorioTb'>";

    foreach ($usersDatas as $user) :
        extract($user);
        $html .= "
                                 <tr class=''>
                                 <td scope=row>

                                 <div class='round-img'>
                                 ";

        if ((!empty($foto)) and (!empty($path))) :


            $html .= "  <a href=''><img width='35' src='$path' alt='$nome'></a>";


        else :

            $html .= "<a href=''><img width='35' src='http://localhost/spcb/public/assets/uploads/default.png' alt='$nome'></a>";


        endif;

        $html .= "

                             </div>
                                 
                                 </td>
                                 <td  style='border:1px solid #ccc; border-top:none'>$id_bombeiro</td>
                                 <td  style='border:1px solid #ccc; border-top:none'>$nome</td>
                                <td  style='border:1px solid #ccc; border-top:none'>$nip</td>
                                <td  style='border:1px solid #ccc; border-top:none'>$email</td>
                                <td scope='row'  style='border:1px solid #ccc; border-top:none'>$idade</td>
                               
                                <td  style='border:1px solid #ccc; border-top:none'>$patente</td>
                                <td scope='row'  style='border:1px solid #ccc; border-top:none'>$cargo</td>
                                <td  style='border:1px solid #ccc; border-top:none'>$permissao</td>
                                <td  style='border:1px solid #ccc; border-top:none'>$status</td>
                              
                                </tr>";
    endforeach;
    $html .= "                </tbody>
                                <tfoot>
                                <tr class='text-center P-10' style='background-color: #39444E; color:#fff; padding: 10px;'>
                                <th style='border:1px solid #ccc;'>Foto</th>
                                <th style='border:1px solid #ccc;'>Id</th>
                                <th style='border:1px solid #ccc;'>Nome</th>
                                <th style='border:1px solid #ccc;'>Nip</th>
                                <th style='border:1px solid #ccc;'>Email</th>
                                <th style='border:1px solid #ccc;'>Idade</th>
                                <th style='border:1px solid #ccc;'>Patente</th>
                                <th style='border:1px solid #ccc;'>Cargo</th>
                                <th style='border:1px solid #ccc;'>Permissão</th>
                                <th style='border:1px solid #ccc;'>Estado</th>
                              
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
$nome = "ricardo";
$gerarPdf = new relatoriosUsuarios($nome, $html);


  
?>

<?php else : ?>

    <?php echo "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
    exit;
    ?>
<?php endif;
?>