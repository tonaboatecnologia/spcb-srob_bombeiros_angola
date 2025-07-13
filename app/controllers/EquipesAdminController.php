<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\EquipesAdminModel;

class EquipesAdminController extends EquipesAdminModel
{

    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;
        $this->RegistrarEquipes();
        
    }


    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("spcb - Gestão de Guarnições");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão das Equipes ou Guarnições");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("equipes/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão de Guarnições");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão de Guarnições ou Equipes das ocorrências");
        $this->renderAdminLayout->renderLayoutAdmin();
    }

    private function RegistrarEquipes()
    {

        //solicitante
        global $equipesDatas, $equipes;
        if (!empty($equipesDatas['submitEquipes']) && !empty($equipes['equipes'])) :

            $this->validateFields->ValidateFields($equipesDatas);

            $equipes =  $this->validateFields->validateEquipes($equipesDatas);
            
            if ($equipes['returnType']  === 'msgSuccess' && $equipes['returnInfo']  === NULL) :
                var_dump($equipes);
                var_dump($this->LastIdSolicitante($equipesDatas));
                foreach ($this->validateFields->getMsgSucess() as $success) :

?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                endforeach;

                $_SESSION['msgveiculos'] = "<div class='alert alert-success text-center'>Veículos Cadastrado Com Sucesso.</div>";

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgveiculos'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

<?php


                endforeach;
            endif;
        endif;
    }
}