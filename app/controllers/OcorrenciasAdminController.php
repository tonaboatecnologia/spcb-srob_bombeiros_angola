<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models;
use App\Models\OcorrenciasAdminModel;

class OcorrenciasAdminController extends OcorrenciasAdminModel
{


    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;
   // var_dump($this->getAllOcorrences()) ;
        $this->editerOcorrencias();
        $this->deleteMultOcorrencias();
      
    }


    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("spcb SYSTEM - Gestão de Ocorrências");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão dos Ocorrências");
        $this->renderAdminLayout->setKeywords("Sistema de gestão, visualização, controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("ocorrencias/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão e visualização de Ocorrências");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão e Visualização de Ocorrências das ocorrências");
        $this->renderAdminLayout->renderLayoutAdmin();
    }

    public function deleteOcorrencias($id)
    {
        $this->validateFields->validateDeleteOcorrencia($id);
    }
    //Deleção multípla de usuários
    public function deleteMultOcorrencias()
    {
        global $idDeleteOcorrences, $deleteOcorrences;
        if (!empty($idDeleteOcorrences) && !empty($deleteOcorrences) && $deleteOcorrences['deleteOcorrences'] == 'multOcorrences') :

            if ($this->validateFields->validateDeleteMultOcorrencias($idDeleteOcorrences)) :


                foreach ($this->validateFields->getMsgSucess() as $success) :
?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";


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

    //pesquisa Dinámica
    public function searchOcorrences($Search, $inicio, $fim, $order, $limit)
    {
        //global/$ocorrenceSearchDatas;
        $userLister = $this->getOcorrenciasOrderLimit($order , $limit ) ;
        $userSearch = $this->getSearchOcorrences($Search , $inicio , $fim , $order , $limit ) ;

        $Search = htmlspecialchars(htmlentities(rawurldecode($Search)));

        if (!empty($Search) && !empty($inicio) && !empty($fim)) :
            if (count($userSearch) > 0) :

                foreach ($userSearch as $Search) :


                ?>
                    <tr class="even" role="row">
                        <td>
                            <button rel="<?php echo $Search['id_solicitante'] ?>" type="button" class="viewOcorrences btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                Detalhar <i class="icofont icofont-eye"></i>
                            </button>
                            <?php if ($_SESSION['permition'] == "admin") : ?>
                              


                                <button rel="<?php echo $Search['id_solicitante']; ?>" type="button" class="deleteOcorrences btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                    Deletar <i class="icofont icofont-trash"></i>

                                </button>

                                <input type="checkbox" name="idDeleteOcorrences[]" id="id" value="<?php echo $Search['id_solicitante']; ?>">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $Search['id_solicitante'] . "pesquisa"; ?></td>
                        <td><?php echo $Search['solicitantes']; ?></td>
                        <td><?php echo $Search['municipio']; ?></td>
                        <td><?php echo $Search['bairro']; ?></td>
                        <td><?php echo $Search['rua']; ?></td>
                        <td><?php echo $Search['referencia']; ?></td>
                        <td><?php echo $Search['tipo_ocorrencias']; ?></td>
                        <td><?php echo $Search['orgaos_apoio']; ?></td>
                        <td><?php echo $Search['data_Ocorrencia']; ?></td>
                        <td><?php echo $Search['equipes']; ?></td>

                    </tr>
                <?php
                endforeach;
            else :
                echo "<tr>
                                       <td>
                                          <div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>
                                       </td>
                                    </tr>";
                $_SESSION['msgOcorrencesDatas'] = "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";

            endif;
        else :
            // Exibe todos os usuários
            if (count($userLister) > 0) :
                foreach ($userLister as $Lister) :
                ?>
                    <tr class="even" role="row">
                        <td>
                            <button rel="<?php echo $Lister['id_solicitante'] ?>" type="button" class="viewOcorrences btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                Detalhar <i class="icofont icofont-eye"></i>
                            </button>
                            <?php if ($_SESSION['permition'] == "admin") : ?>
                                

                                <button rel="<?php echo $Lister['id_solicitante']; ?>" type="button" class="deleteOcorrences btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                    Deletar <i class="icofont icofont-trash"></i>

                                </button>
                                <input type="checkbox" name="idDeleteOcorrences[]" id="id" value="<?php echo $Lister['id_solicitante']; ?>">
                            <?php endif; ?>
                        </td>


                        <td><?php echo $Lister['id_solicitante'] . "listado"; ?></td>
                        <td><?php echo $Lister['solicitantes']; ?></td>
                        <td><?php echo $Lister['municipio']; ?></td>
                        <td><?php echo $Lister['bairro']; ?></td>
                        <td><?php echo $Lister['rua']; ?></td>
                        <td><?php echo $Lister['referencia']; ?></td>
                        <td><?php echo $Lister['tipo_ocorrencias']; ?></td>
                        <td><?php echo $Lister['orgaos_apoio']; ?></td>
                        <td><?php echo $Lister['equipes']; ?></td>
                        <td><?php echo $Lister['data_Ocorrencia']; ?></td>
                    </tr>
            <?php

                endforeach;
            else :
                echo "<tr>
                <td>
                   <div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>
                </td>
             </tr>";
                $_SESSION['msgOcorrencesDatas'] = "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";

            endif;

        endif;

        if (!empty($fim) && !empty($inicio) && !empty($Search)) {
            // Exibe a mensagem de pesquisa
            echo  "<tr>
               <td>
                  <div class='alert alert-info'>Exibindo resultados da pesquisa para: " . htmlspecialchars($inicio) . " | " . htmlspecialchars($fim) . "</div>
               </td>
            </tr>";
          
        }


        // Limpar mensagens de erro da sessão após exibição
        if (isset($_SESSION['msgOcorrencesDatas'])) :
            echo $_SESSION['msgOcorrencesDatas'];
            unset($_SESSION['msgOcorrencesDatas']);
        endif;
    }

    public function selectOcorrencias($id)
    {

        foreach ($this->getDetailsOcorrencias($id) as $listUsers) :
            ?>


            <form name="ocorrencias" id="" action="visualizar-Ocorrencias" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="icofont icofont-bus-alt-3"></i>Gravidade e Status da Ocorrência</legend>
                    <div class="card p-10">
                        <div class="card-body">
                            <input type="hidden" name="idUpdateOcorrencias" id="idUpdateUsers" value="<?php echo $listUsers['id_ocorrencia']; ?>">


                            <div class="form-group row">
                                <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-fire-alt"></i>Gravidade da Ocorrência</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gravidade">
                                        <option value="Baixa">Baixa</option>
                                        <option value="Média">Média</option>
                                        <option value="Alta">Alta</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-ui-alarm"></i>Status da Ocorrência</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status">
                                        <option value="Aberta">Aberta</option>
                                        <option value="Em andamento">Em andamento</option>
                                        <option value="Fechada">Fechada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="ocorrencias" value="ocorrencias" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-ui-Car-group"></i> Horários de Veículos <i class="icofont icofont-fire-extinguisher"></i></button>
                            </div>
                        </div>
                </fieldset>

            </form>
            <?php

        endforeach;
    }
    public function editerOcorrencias()
    {
        global $ocorrences;
        if (!empty(isset($ocorrences['ocorrencias'])) && $ocorrences['ocorrencias'] == 'ocorrencias') :

            $ocorrencias =   $this->validateFields->validateEditerOcorrenciasEnd($ocorrences);
            var_dump($ocorrencias);

            if ($ocorrencias === TRUE) :
            ?>
                <script>
                    alert("olá ")
                </script>


                <?php
                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

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

    //visualizar Detalhes de usuários
    public function viewDetailsOcorrencias($id)
    {

        foreach ($this->getDetailsOcorrencias($id) as $detailsOcorrences) :
            ?>
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"><span id="idUsuario"><?php echo $detailsOcorrences['id_solicitante'] ?></span></dd>
            <dt class="col-sm-3">solicitantes</dt>
            <dd class="col-sm-9"><span id="Nome"><?php echo $detailsOcorrences['solicitantes'] ?></span></dd>

            <dt class="col-sm-3">Município</dt>
            <dd class="col-sm-9"><span id="Município"><?php echo $detailsOcorrences['municipio']; ?></span></dd>

            <dt class="col-sm-3">Bairro</dt>
            <dd class="col-sm-9"><span id="NIP"><?php echo $detailsOcorrences['bairro'] ?></span></dd>

            <dt class="col-sm-3">rua</dt>
            <dd class="col-sm-9"><span id="rua"><?php echo $detailsOcorrences['rua'] ?></span></dd>

            <dt class="col-sm-3">referencia</dt>
            <dd class="col-sm-9"><span id="referencia"><?php echo $detailsOcorrences['referencia'] ?></span></dd>
            <dt class="col-sm-3">tipo_ocorrencias</dt>
            <dd class="col-sm-9"><span id="tipo_ocorrencias"><?php echo $detailsOcorrences['tipo_ocorrencias'] ?></span></dd>

            <dt class="col-sm-3">orgaos_apoio</dt>
            <dd class="col-sm-9"><span id="orgaos_apoio"><?php echo $detailsOcorrences['orgaos_apoio'] ?></span></dd>

            <dt class="col-sm-3">equipes</dt>
            <dd class="col-sm-9"><span id="equipes"><?php echo $detailsOcorrences['equipes'] ?></span></dd>

            <dt class="col-sm-3">DataCreation</dt>
            <dd class="col-sm-9"><span id="DataCreation"><?php echo $detailsOcorrences['data_Ocorrencia'] ?></span></dd>
            <!--
            <dt class="col-sm-3">DataModification</dt>
            <dd class="col-sm-9"><span id="DataModification"><?php echo $detailsOcorrences['data_modified'] ?></span></dd>
        -->
<?php
        endforeach;
    }
}
