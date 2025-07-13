<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\HorariosViaturasModel;

class HorariosViaturasAdminController extends HorariosViaturasModel
{

    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;
        $this->registrarHorarios();
        $this->deleteMultHorarios();
    
      // var_dump($this->getSearchHorarios("2024-05-08 10:15:00", "2024-05-24 01:46:00", "2024-05-12 10:15:00", "2024-05-12 10:15:00", "cardoso", "h.data_criacao", 1));
    }


    private function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("spcb SYSTEM - Gestão Horários de Viaturas");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão e controle do Horário das Viaturas");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("horariosViaturas/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão da Ficha Central de Registro de ocorrências");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão e Registro de ocorrências da Ficha Central");
        $this->renderAdminLayout->renderLayoutAdmin();
    }

    private function registrarHorarios()
    {

        //solicitante
        global $controleHorariosDatas, $controleHorarios;
        if (!empty($controleHorariosDatas['horariosVeiculos']) && !empty($controleHorarios['horariosVeiculos'])) :

            $this->validateFields->ValidateFields($controleHorariosDatas);

            $horarios =  $this->validateFields->validateHorarios($controleHorariosDatas);

            var_dump($controleHorariosDatas);
            if ($horarios['returnType']  === 'msgSuccess' && $horarios['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgveiculos'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;


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


    //Deleção singular
    public function deleteHorarios($idHorarios)
    {
        $this->validateFields->validateDeleteHorarios($idHorarios);

    }
    //Deleção multípla de viaturas
    public function deleteMultHorarios()
    {
        global $deleteHorarios, $idHorariosDeleter;
        if (!empty($deleteHorarios) && !empty($idHorariosDeleter) && $idHorariosDeleter['deleteHorarios'] == 'multHorarios') :
            if ($this->validateFields->validateDeleteMultHorarios($idHorariosDeleter)) :


                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>".$success['messageSuccess']."</div>";

                endforeach;

            else :
                foreach ($this->validateFields->getMsg() as $error) :

                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php
                    echo $_SESSION['msgUserDatas'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";

                endforeach;

            endif;

        endif;
    }

    
}
