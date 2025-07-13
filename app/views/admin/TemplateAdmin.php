<?php $this->protectorUrl($_SESSION['permition']); ?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <?php echo $this->setHeadAdmin(); ?>
</head>

<body class="sidebar-mini fixed">

    <div class="wrapper">
        <div class="content-wrapper">

            <!--load-->
            <div class="loader-bg">
                <div class="loader-bar">
                </div>
            </div>
            <!-- nav: header - sidebar -  navBar -->
            <?php

            echo $this->setHeaderAdmin();
            echo $this->setSideBarAdmin();

            ?>
            <!-- Container-fluid starts -->
            <div class="container-fluid">

                <!-- Row Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header">
                            <h4><?php echo $this->getWelcomeTitle(); ?></h4>
                            <p class="mb-0"><?php echo $this->getWelcomeDesc(); ?></p>

                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">
                                        <?php $BreadCrumb = new Src\Classes\ClassBreadcrumbs();
                                        $BreadCrumb->addBreadcrumb(); ?>
                                    </a>
                                </li>
                                <!--<li class="breadcrumb-item"><a href="sample-page.html">Sample page</a>
                                </li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->

            <!-- Row Starts -->

           
                <?php echo $this->setMainAdmin(); ?>

          
            <!-- Row end -->

          <!-- Container-fluid ends -->
          <?php if($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador"):?>
            <div class="fixed-button">
            <a href="<?php echo DIRPAGE.'gerenciar-FichaCentral';?>" class="btn btn-md btn-primary">
            <i class="icofont icofont-fire-extinguisher-alt"></i> Registrar Nova Ocorrência <i class="icofont icofont-fire"></i>
            </a>
         </div>
         <?php endif;?>
        </div>
    </div>
    <?php echo $this->setScriptAdmin(); ?>
</body>

</html>