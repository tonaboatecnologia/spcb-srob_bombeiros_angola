<?php

namespace App\Controllers;

use App\Models\FichaCentralAdminModel;
use Src\Classes\ClassRender;



class FichaCentralAdminController extends FichaCentralAdminModel
{


    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();

        endif;


        $this->registrarFichaCentral();
    }


    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("SROB SYSTEM - Gestão da Ficha Central");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão da Ficha Central de Registro de Ocorrências");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("fichaCentral/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão da Ficha Central de Registro de ocorrências");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão e Registro de ocorrências da Ficha Central");
        $this->renderAdminLayout->renderLayoutAdmin();
    }
    public function registrarFichaCentral()
    {


        //solicitante
        global $SolicitanteDatas, $solicitante;
        if (!empty($SolicitanteDatas['solicitante']) && !empty($solicitante)) :

            $this->validateFields->ValidateFields($solicitante);
            $this->validateFields->validateEmail($solicitante['emailSolicitante']);
            $this->validateFields->validatePhoneNumber($solicitante['telSolicitante']);
            //$this->validateFields->validateNIF($solicitante['nifSolicitante']);
            $this->validateFields->validateDate($solicitante['idadeSolicitante']);


            /* $this->validateFields->validateEmailFc($solicitante['emailSolicitante'], $solicitante['emailSolicitante']);
            $this->validateFields->validateEmail($solicitante['emailSolicitante']);
            $this->validateFields->validatePhoneNumber($solicitante['telSolicitante']);
            $validateFields->validateDate($userFormDatas2['userDataNasc']);
                /*$validateFields->validateDate($userFormDatas2['userDataNasc']);
            $this->validateFields->validatePhoneNumber($userFormDatas2['userTelefone']);
            $this->validateFields->validateNIF($userFormDatas2['userNif']);
            $this->validateFields->validateNIP($userFormDatas2['userNip']);
            $this->validateFields->validateEmail($userFormDatas2['userEmail']);
            $this->validateFields->validateDate($userFormDatas2['userDataNasc']);
            $this->validateFields->validateIssetEmail($userFormDatas2['userEmail']);
            $this->validateFields->validateConfSenha($userFormDatas2['userSenha'], $userFormDatas2['userConfSenha']);
            $this->validateFields->validateStrongPassword($userFormDatas2['userSenha']);*/


            $solicitantes =  $this->validateFields->validateSolicitante($SolicitanteDatas);

            //var_dump($solicitante);
            if ($solicitantes['returnType']  === 'msgSuccess' && $solicitantes['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgFichaCentral'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;


            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaCentral'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php


                endforeach;
            endif;
        endif;



        //acidentes
        global $acidentesForm, $acidentesDatas;
        if (!empty($acidentesForm['acidente']) && !empty($acidentesDatas)) :
            $this->validateFields = new \Src\Classes\ClassValidate();
            $this->validateFields->ValidateFields($_POST);


            $acidentes =  $this->validateFields->validateAcidente($acidentesDatas);

            //var_dump($acidentesDatas);
            if ($acidentes['returnType']  === 'msgSuccess' && $acidentes['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgFichaCentral'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaCentral'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php


                endforeach;
            endif;
        endif;


        //incendio
        global $incendioDatas, $incendio;
        if (!empty($incendio) && !empty($incendioDatas)) :


            $this->validateFields->ValidateFields($_POST);


            $incendios =  $this->validateFields->validateIncendio($incendioDatas);

            // var_dump($incendio);
            if ($incendios['returnType']  === 'msgSuccess' && $incendios['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgFichaCentral'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaCentral'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php


                endforeach;
            endif;
        endif;

        //obstetrico
        global $obstetricoForm, $obstetrico;
        if (!empty($obstetricoForm['obstetrico']) && !empty($obstetrico)) :

            $this->validateFields->ValidateFields($_POST);


            $obstetricos =  $this->validateFields->validateObstetrico($obstetricoForm);

            // var_dump($obstetrico, $obstetrico);
            if ($obstetricos['returnType']  === 'msgSuccess' && $obstetricos['returnInfo']  === NULL) :

                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgFichaCentral'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaCentral'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php


                endforeach;
            endif;

        endif;

        //clinico
        global $clinicoForm, $clinico;
        if (!empty($clinicoForm['clinico']) && !empty($clinico)) :

            $this->validateFields->ValidateFields($_POST);


            $clinicos =  $this->validateFields->validateClinico($clinicoForm);

            //var_dump($obstetrico);
            if ($clinicos['returnType']  === 'msgSuccess' && $clinicos['returnInfo']  === NULL) :
                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgFichaCentral'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaCentral'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php

                endforeach;
            endif;
        endif;

        #tipoOcorrencia

        global $tipoOcorrenciaDatas, $tipoOcorrencia;
        if (!empty($tipoOcorrencia['ocorrencias']) && !empty($tipoOcorrenciaDatas)) :

            $this->validateFields->ValidateFields($_POST);
            $validateTipoOcorrencias =  $this->validateFields->validateTipoOcorrencias($tipoOcorrenciaDatas);


            if ($validateTipoOcorrencias['returnType']  === 'msgSuccess' && $validateTipoOcorrencias['returnInfo']  === NULL) :
                // var_dump($this->LastIdSolicitante($tipoOcorrenciaDatas));
                // var_dump($validateTipoOcorrencias);
                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgFichaCentral'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgFichaCentral'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
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
