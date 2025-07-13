<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\FichaVitimaAdminModel;

class FichaVitimaAdminController extends FichavitimaAdminModel
{

    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;
        $this->registrarFichaVitima();
    }


    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("spcb - Gestão da Ficha Vítimas");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão da Ficha Vítimas de Registro de Ocorrências");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("fichaVitima/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão da Ficha Vítimas de Registro de ocorrências");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão e Registro de ocorrências da Ficha Vítimas");
        $this->renderAdminLayout->renderLayoutAdmin();
    }

    public function registrarFichaVitima()
    {
        //paciente ou vítima
        global $vitima, $vitimaDatas;

        if (!empty($vitima['vitima']) && !empty($vitimaDatas['Submitvitima'])) :
            //validação campos
            $this->validateFields->ValidateFields($vitimaDatas);
            // $this->validateFields->validatePhoneNumber($vitima['contacto']);
            // $this->validateFields->validateNIF($vitima['biPaciente']);

            /* $this->validateFields->validateEmailFc($solicitante['emailSolicitante'], $solicitante['emailSolicitante']);
             $this->validateFields->validateEmail($solicitante['emailSolicitante']);
             $this->validateFields->validatePhoneNumber($solicitante['telSolicitante']);
             $validateFields->validateDate($vitima['userDataNasc']);
                 /*$validateFields->validateDate($vitima['userDataNasc']);
             $this->validateFields->validatePhoneNumber($vitima['userTelefone']);
             $this->validateFields->validateNIF($vitima['userNif']);
             $this->validateFields->validateNIP($vitima['userNip']);
             $this->validateFields->validateEmail($vitima['userEmail']);
             $this->validateFields->validateDate($vitima['userDataNasc']);
             $this->validateFields->validateIssetEmail($vitima['userEmail']);
             $this->validateFields->validateConfSenha($vitima['userSenha'], $vitima['userConfSenha']);
             $this->validateFields->validateStrongPassword($vitima['userSenha']);*/

            $pacientes =  $this->validateFields->validateVitima($vitimaDatas);

            var_dump($vitima);
            if ($pacientes['returnType']  === 'msgSuccess' && $pacientes['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                endforeach;

                $_SESSION['msgFichaVitima'] = "<div class='alert alert-success text-center'>Usuário Cadastrado Com Sucesso.</div>";

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaVitima'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

            <?php


                endforeach;
            endif;

        endif;

        //Situação do paciente ou vítima
        global $situacaoVitima, $situacaoVitimaDatas;

        if (!empty($situacaoVitima['situacaoVitima']) && !empty($situacaoVitimaDatas['submitSituacaoVitima'])) :
            //validação campos

            $this->validateFields->ValidateFields($situacaoVitimaDatas);
            // $this->validateFields->validatePhoneNumber($vitima['contacto']);
            // $this->validateFields->validateNIF($vitima['biPaciente']);

            /* $this->validateFields->validateEmailFc($solicitante['emailSolicitante'], $solicitante['emailSolicitante']);
             $this->validateFields->validateEmail($solicitante['emailSolicitante']);
             $this->validateFields->validatePhoneNumber($solicitante['telSolicitante']);
             $validateFields->validateDate($vitima['userDataNasc']);
                 /*$validateFields->validateDate($vitima['userDataNasc']);
             $this->validateFields->validatePhoneNumber($vitima['userTelefone']);
             $this->validateFields->validateNIF($vitima['userNif']);
             $this->validateFields->validateNIP($vitima['userNip']);
             $this->validateFields->validateEmail($vitima['userEmail']);
             $this->validateFields->validateDate($vitima['userDataNasc']);
             $this->validateFields->validateIssetEmail($vitima['userEmail']);
             $this->validateFields->validateConfSenha($vitima['userSenha'], $vitima['userConfSenha']);
             $this->validateFields->validateStrongPassword($vitima['userSenha']);*/

            $situacao =  $this->validateFields->validateSituacaoVitima($situacaoVitimaDatas);

          //  var_dump($vitima);
            if ($situacao['returnType']  === 'msgSuccess' && $situacao['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
            ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                endforeach;

                $_SESSION['msgFichaVitima'] = "<div class='alert alert-success text-center'>Situação da Vítima Cadastrado Com Sucesso.</div>";

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaVitima'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
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
