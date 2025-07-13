
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
                <h1><i class="icofont icofont-file-code"></i> 404</h1>
                <h5><i class="icofont icofont-error"></i> Página Não Encontrada!</h5>
                <p>Aviso! Infelizmente a Página que pretendes acessar não Existe no Sistema</p>
                <a href="http://localhost/spcb/sair-Sistema" class="btn btn-error btn-lg waves-effect"><i class="icofont icofont-home"></i> Voltar na Tela de Login</a>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Container-fluid ends -->
</div>
<?php echo $this->setScriptAdmin();?>

</body>

</html>