
<!DOCTYPE html>
<html lang="PT-br" class="h-100">

<head>
    <?php echo $this->SetHeadAdmin();?>
   
    
</head>

<body class="h-100">

<div class="error-404">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Row start -->
        <div class="row">
            <div class="text-uppercase col-xs-12">
                <h1><i class="icofont icofont-logout"></i>Sessão Terminada!<i class="icofont icofont-sign-out"></i></h1>
                <h5><i class="icofont icofont-ui-unlock"></i> Restringido!<i class="icofont icofont-icofont-ui-clock"></i></h5>
                <p>Aviso! Para Acessar novamente o Sistema precisa efectuar o login com suas Credencias de acesso.</p>
                <a href="sair-Sistema" class="btn btn-error btn-lg waves-effect"><i class="icofont icofont-ui-home"></i>Voltar na Tela de Login</a>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Container-fluid ends -->
</div>
<?php echo $this->setScriptAdmin();?>

</body>

</html>