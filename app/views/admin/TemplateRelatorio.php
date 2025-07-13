<?php $this->protectorUrl($_SESSION['permition']); ?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <?php echo $this->setHeadAdmin(); ?>
</head>

<body class="">

    <div class="">
        <div class="">
            <!-- Container-fluid starts -->
            <div class="container">

                <!-- Row Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class=""></div>
                        <div class="main-header text-center">
                        <div class="text-center">
                                                <img width="100" height="100" class="img-circle" src="http://localhost/spcb/public/assets/images/logos/logospcb2.jpg" alt="">
                                              
                                            </div>
                            <h4><?php echo $this->getWelcomeTitle(); ?></h4>
                            <p class="mb-0"><?php echo $this->getWelcomeDesc(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->

            <!-- Row Starts -->

         
           <?php echo $this->setMainRelatorioAdmin(); ?>
          
               
          
            <!-- Row end -->

            <!-- Container-fluid ends -->
          
        </div>
    </div>
    <?php echo $this->setScriptAdmin(); ?>
</body>

</html>