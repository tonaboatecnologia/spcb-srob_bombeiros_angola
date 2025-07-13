<?php

namespace App\Controllers;

use Src\Classes\ClassRender;

use App\Models\OrgaoApoioModel;

class OrgaosApoioAdminController extends OrgaoApoioModel
{

    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;
        $this->registrarOrgaoApoio();

    }


    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("spcb - Gestão de Orgão de Apoio");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão da Ficha Vítimas de Registro de Ocorrências");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("orgaosApoio/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão dos Orgãos de Apoio Registro de ocorrências");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão e Registro de ocorrências da Ficha Vítimas");
        $this->renderAdminLayout->renderLayoutAdmin();
    }

   public function registrarOrgaoApoio(){

      //solicitante
      global $orgaoApoioDatas, $orgaoApoio;
      if (!empty($orgaoApoio) && !empty($orgaoApoioDatas['submitOrgaoApoio'])) :

          $this->validateFields->ValidateFields($orgaoApoioDatas);
        //  $this->validateFields->validatePhoneNumber($orgaoApoio['telSolicitante']);

         /* $this->validateFields->validateEmailFc($orgaoApoio['emailSolicitante'], $orgaoApoio['emailSolicitante']);
          $this->validateFields->validateEmail($orgaoApoio['emailSolicitante']);
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


          $orgaos =  $this->validateFields->validateOrgaoApoio($orgaoApoioDatas);

          var_dump($orgaoApoioDatas);
          if ($orgaos['returnType']  === 'msgSuccess' && $orgaos['returnInfo']  === NULL) :
              foreach ($this->validateFields->getMsgSucess() as $success) :
              ?>
                  <script>
                      alert("<?php echo $success['messageSuccess']; ?>");
                  </script>
              <?php
              endforeach;
          
              $_SESSION['msgOrgaoApoio'] = "<div class='alert alert-success text-center'>Orgão de Apoio Cadastrado Com Sucesso.</div>";

          else :

              foreach ($this->validateFields->getMsg() as $error) :

                  echo $_SESSION['msgOrgaoApoio'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
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