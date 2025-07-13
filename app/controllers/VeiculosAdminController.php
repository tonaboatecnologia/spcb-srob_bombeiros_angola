<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\ViaturasModel;

class VeiculosAdminController extends ViaturasModel
{

    private $validateFields;
    private $renderAdminLayout;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;
        $this->editeCars();

        $this->registrarVeiculos();
        $this->deleteMultCars();
        

    }

    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("SROB - Gestão de Veículos");
        $this->renderAdminLayout->setDescription("Painel responsavéis pela gestão dos Veículos");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor("Ricardo Massungui");
        $this->renderAdminLayout->setDir("veiculos/");
        $this->renderAdminLayout->setWelcomeTitle("Gestão de Veiculos");
        $this->renderAdminLayout->setWelcomeDesc("Painel de Gestão de Veículos das ocorrências");
        $this->renderAdminLayout->renderLayoutAdmin();
    }
    //cadastro de viaturas
    public function registrarVeiculos()
    {

        //veiculos
        global $veiculosDatas, $veiculos;
        if (!empty($veiculos['veiculos']) && isset($veiculos['veiculos']) && $veiculos['veiculos'] === 'veiculos') :

            $this->validateFields->ValidateFields($veiculos);
        

            $viaturas =  $this->validateFields->validateVeiculos($veiculos);

            var_dump($veiculosDatas, $veiculos);
            if ($viaturas['returnType']  === 'msgSuccess' && $viaturas['returnInfo']  === NULL) :
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
    public function deleteCars($idCars)
    {
        $this->validateFields->validateDeleteCars($idCars);

    }
    //Deleção multípla de viaturas
    public function deleteMultCars()
    {
        global $idCars, $deleteCars;
        if (!empty($idCars) && !empty($deleteCars) && $deleteCars['deleteCars'] == 'multCars') :
            if ($this->validateFields->validateDeleteMultCars($idCars)) :


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

    //pesquisa de viaturas
    public function searchCars($searchCars, $order, $limit)
    {

        global $veiculos, $veiculosDatas, $marca, $modelo, $cor, $matricula, $ano, $CarsearchFormDatas;


        $viaturaSearch = $this->getAllCarsDatas($searchCars ?? true, $limit ?? true, $order ?? true) ?? true;
        $viaturasLister = $this->getListCars($order ?? true, $limit ?? true) ?? true;

        if (!empty($searchCars)) :
            if (count($viaturaSearch) > 0) :
                //  var_dump($viaturasSearch($searchCars ?? true, $limit ?? true, $order ?? true));
                // Exibe os resultados da pesquisa
                foreach ($viaturaSearch as $veiculoSearch) :
                ?>
                    <tr class="even" role="row">
                        <td>
                            <button rel="<?php echo $veiculoSearch['id_viatura'] ?>" type="button" class="viewCars btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                Detalhar <i class="icofont icofont-eye"></i>
                            </button>
                            <?php if ($_SESSION['permition'] == "admin") : ?>
                                <button rel="<?php echo $veiculoSearch['id_viatura'] ?>" type="button" class="editCars btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                    Editar <i class="icofont icofont-edit"></i>
                                </button>


                                <button rel="<?php echo $veiculoSearch['id_viatura']; ?>" type="button" class="deleteCars btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                    Deletar <i class="icofont icofont-trash"></i>

                                </button>

                                <input type="checkbox" name="idCars[]" id="id" value="<?php echo $veiculoSearch['id_viatura']; ?>">
                            <?php endif; ?>
                        </td>

                        <td><?php echo $veiculoSearch['id_viatura']; ?></td>
                        <td><?php echo $veiculoSearch['marca']; ?></td>
                        <td><?php echo $veiculoSearch['modelo']; ?></td>
                        <td><?php echo $veiculoSearch['cor']; ?></td>
                        <td><?php echo $veiculoSearch['matricula']; ?></td>
                        <td><?php echo $veiculoSearch['ano']; ?></td>

                        <td><?php echo date("d-m-Y H:i:s", strtotime($veiculoSearch['data_criacao'])); ?></td>
                        <td><?php echo date("d-m-Y H:i:s", strtotime($veiculoSearch['data_modificacao'])); ?></td>

                    </tr>
                <?php
                endforeach;
            else :
                echo "<div class='alert alert-danger text-center'><i class='fa fa-database'></i> Nenhum Dados Encontrado!</div>";
                $_SESSION['msgUserDatas'] = "<div class='alert alert-outline-primary alert-dismissible fade show text-center'><span><i class='mdi mdi-alert'></i></span><button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                                    </button><strong>Alerta!</strong><span class=text-danger> Nenhum Dados Encontrado! </span></div>";
            endif;
        else :
            // Exibe todos os usuários
            if (count($viaturasLister) > 0) :
                foreach ($viaturasLister as $veiculosLister) :
                ?>
                    <tr class="even" role="row">
                        <td>
                            <button rel="<?php echo $veiculosLister['id_viatura'] ?>" type="button" class="viewCars btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                Detalhar <i class="icofont icofont-eye"></i>
                            </button>
                            <?php if ($_SESSION['permition'] == "admin") : ?>
                                <button rel="<?php echo $veiculosLister['id_viatura'] ?>" type="button" class="editCars btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                    Editar <i class="icofont icofont-edit"></i>
                                </button>

                                <button rel="<?php echo $veiculosLister['id_viatura']; ?>" type="button" class="deleteCars btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                    Deletar <i class="icofont icofont-trash"></i>

                                </button>
                                <input type="checkbox" name="idCars[]" id="id" value="<?php echo $veiculosLister['id_viatura']; ?>">
                            <?php endif; ?>
                        </td>

                        <td><?php echo $veiculosLister['id_viatura']; ?></td>
                        <td><?php echo $veiculosLister['marca']; ?></td>
                        <td><?php echo $veiculosLister['modelo']; ?></td>
                        <td><?php echo $veiculosLister['cor']; ?></td>
                        <td><?php echo $veiculosLister['matricula']; ?></td>
                        <td><?php echo date("d-m-Y H:i:s", strtotime($veiculosLister['data_criacao'])); ?></td>
                        <td><?php echo date("d-m-Y H:i:s", strtotime($veiculosLister['data_modificacao'])); ?></td>

                    </tr>
            <?php

                endforeach;
            else :
                echo "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
                $_SESSION['msgCarsDatas'] = "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
            endif;
        endif;

        if (!empty($searchCars)) {
            // Exibe a mensagem de pesquisa
            echo "<div class='alert alert-info'>Exibindo resultados da pesquisa para: " . htmlspecialchars($searchCars) . "</div>";
        }
        // Limpar mensagens de erro da sessão após exibição
        if (isset($_SESSION['msgCarsDatas'])) :
            echo $_SESSION['msgCarsDatas'];
            unset($_SESSION['msgCarsDatas']);
        endif;
    }

    //selecionar dados para edição
    public function selectCars($idCars)
    {

        global $userSearchFormDatas, $idUpdateUsers, $oldImgUser, $userName, $userEmail, $userNip, $userDataNasc, $userano, $userPatente, $usermodelo, $userConfmodelo, $userPermissao, $userStatus, $userCustomFileName;
        foreach($this->getFindCars($idCars) as $finderCars) :
            ?>
      
                            <!-- Formulário de cadastro de usuário aqui -->
                            <form name="veiculosForm" action="gerenciar-Veiculos" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>
                                        <i class="icofont icofont-car-alt-4"></i> Veículos
                                    </legend>
                                    <div class="card p-10">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-sm-9">

                                                    <input type="hidden" name="idUpdateCars" id="idUpdateCars" value="<?php echo $finderCars['id_viatura'];
                                                                                                                        ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="<?php echo $finderCars['marca'];
                                                                                                                        ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-numbered"></i>Marca</label>
                                                <div class="col-sm-9">
                                                    <!--<input type="text" name="marca" class="form-control" id="guarnicao" maxlength="45" placeholder="Marca">-->
                                                    <select class="form-control" name="marca" maxlength="" id="cor">
                                                        <option value="TOYOTA">TOYOTA</option>
                                                        <option value="HUNDAY">HUNDAY</option>
                                                        <option value="SUZUKI">SUZUKI</option>
                                                        <option value="KIA">KIA</option>
                                                        <!-- Adicione mais opções conforme necessário -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="<?php echo $finderCars['modelo'];
                                                                                                                        ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-car-alt-1"></i>Modelo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="modelo" value="<?php if (isset($modelo)) : echo $modelo;
                                                                                            elseif (isset($finderCars['modelo'])) :  echo $finderCars['modelo'];
                                                                                            endif; ?>" class="form-control" id="viaturas" maxlength="45" placeholder="Modelo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="<?php echo $finderCars['cor'];
                                                                                                                        ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-color-picker"></i>Cor</label>
                                                <div class="col-sm-9">
                                                    <!-- <input type="text" name="cor" class="form-control" id="guarnicao" maxlength="20" placeholder="cor">-->
                                                    <select class="form-control" name="cor" maxlength="" id="cor">
                                                        <option value="Vermelho-Preto">Vermelho-Preto-Amarelo</option>
                                                        <option value="Preto">Preto-Vermelho-Amarelo</option>

                                                        <!-- Adicione mais opções conforme necessário -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="<?php echo $finderCars['matricula'];
                                                                                                                        ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-caret-down"></i>Matrícula</label>
                                                <div class="col-sm-9">
                                                    <!-- <input type="text" name="matricula" class="form-control" id="guarnicao" maxlength="14" placeholder="matricula"> -->
                                                    <select class="form-control" name="matricula" maxlength="" id="veiculos">
                                                        <option value="Veiculos-ALFA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ALFA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-BETA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-BETA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-OMEGA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ÓMEGA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-ZEUS/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ZEUS/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-ATHENAS/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ATHENAS/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-NORTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-NORTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-SUL/<?php echo DATE . rand(100, 1000); ?>">Veiculos-SUL/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-ESTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-NORDESTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <option value="Veiculos-OESTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-SUDESTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                        <!-- Adicione mais opções conforme necessário -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="<?php echo $finderCars['ano'];
                                                                                                                        ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Ano</label>
                                                <div class="col-sm-9">
                                                    <!-- <input type="text" name="ano" class="form-control" id="ano" maxlength="4" placeholder="digite o Ano da Viatura ou Selecione"><br>-->
                                                    <select class="form-control" name="ano" maxlength="" id="cor">
                                                        <option value="2024">2024</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>

                                                        <!-- Adicione mais opções conforme necessário -->
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="veiculos" value="veiculosEditar" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-car"></i> Veículos <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Adicione mais campos conforme necessário -->

                                </fieldset>
                            </form>
                      
            <?php

        endforeach;
    }
    //editar dados de usuários
    public function editeCars()
    {
        global $veiculosDatas, $veiculos;
        if (!empty($veiculos['veiculos']) && isset($veiculos['veiculos']) && $veiculos['veiculos'] === 'veiculosEditar') :

            $validateUpdateCars =   $this->validateFields->validateUpdateCars($veiculos);
            var_dump($validateUpdateCars);
            var_dump($veiculos, $veiculosDatas);

            if ($validateUpdateCars === TRUE) :

                foreach ($this->validateFields->getMsgSucess() as $success) :
            ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgCarsDatas'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :
                foreach ($this->validateFields->getMsg() as $error) :

                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

            <?php
                    echo $_SESSION['msgCarsDatas'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";

                endforeach;

            endif;
        endif;
    }
    //visualizar Detalhes de usuários
    public function viewDetailsCars($idCars)
    {

        foreach ($this->getFindCars($idCars) as $finderCars) :
            ?>
            
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"><span id="idUsuario"><?php echo $finderCars['id_viatura'] ?></span></dd>
            <dt class="col-sm-3">marca</dt>
            <dd class="col-sm-9"><span id="marca"><?php echo $finderCars['marca'] ?></span></dd>

            <dt class="col-sm-3">modelo</dt>
            <dd class="col-sm-9"><span id="modelo"><?php echo $finderCars['modelo']; ?></span></dd>

            <dt class="col-sm-3">cor</dt>
            <dd class="col-sm-9"><span id="cor"><?php echo $finderCars['cor'] ?></span></dd>

            <dt class="col-sm-3">matricula</dt>
            <dd class="col-sm-9"><span id="matricula"><?php echo $finderCars['matricula'] ?></span></dd>

            <dt class="col-sm-3">ano</dt>
            <dd class="col-sm-9"><span id="ano"><?php echo $finderCars['ano'] ?></span></dd>
           
            <dt class="col-sm-3">DataCreation</dt>
            <dd class="col-sm-9"><span id="DataCreation"><?php echo $finderCars['data_criacao'] ?></span></dd>

            <dt class="col-sm-3">DataModification</dt>
            <dd class="col-sm-9"><span id="DataModification"><?php echo $finderCars['data_modificacao'] ?></span></dd>
        

     <?php
        endforeach;
    }
}
