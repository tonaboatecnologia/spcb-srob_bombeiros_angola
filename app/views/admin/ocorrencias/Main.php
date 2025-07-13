<?php

use App\Models;

if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") :
   global $searchOcorrences, $ocorrenceSearchDatas, $ocorrenceSearchFormDatas, $dateIniciOcorrences, $dateFimOcorrences, $orderOcorrences, $limitOcorrences;
  /// var_dump($ocorrenceSearchDatas, $ocorrenceSearchFormDatas, $dateFimOcorrences, $dateIniciOcorrences, $orderOcorrences, $limitOcorrences);

   $ocorrences = new Models\OcorrenciasAdminModel();

   $ocorrenceSearch = $ocorrences->getSearchOcorrences($ocorrenceSearchDatas['searchOcorrences'] ?? true, $ocorrenceSearchDatas['dateIniciOcorrences'] ?? true, $ocorrenceSearchDatas['dateFimOcorrences'] ?? true, $ocorrenceSearchDatas['orderOcorrences'] ?? true, $ocorrenceSearchDatas['limitOcorrences'] ?? true);

   $ocorrencesLister = $ocorrences->getOcorrenciasOrderLimit($ocorrenceSearchDatas['orderOcorrences'] ?? true, $ocorrenceSearchDatas['limitOcorrences'] ?? true);

 //  var_dump($ocorrenceSearchDatas);
?>
   <div class="row">

      <!-- Formulário Unificado -->
      <div class="col-lg-12">
         <div class="card" style="background-color: #f9f9f9; padding: 20px; ">
            <div class="card-header" style="background-color: #39444E; color: #fff; margin-bottom: 40px;">
               <h5 class="card-header-text" style="font-family: 'Arial', sans-serif; font-weight: bold;"><i class="icofont icofont-fire-truck"></i> Registro de Ocorrência de Bombeiros <i class="icofont icofont-fire-extinguisher-alt"></i></h5>
            </div>
            <div class="card-body">
               <fieldset>
                  <div class="card-text">
                     <legend><i class="icofont icofont-fire-extinguisher"></i>Visualizar Ocorrências</legend>

                  </div>

                  <div class="table-responsive p-30 overflow-x-visible">


                     <form action="visualizar-Ocorrencias" name="OcorrencesFormSearch" id="OcorrencesFormSearch" method="post">
                        <div class="form-group row">
                           <div class="col-sm-6">
                              <!--<button type="button" class="btn btn-success" onclick="openocorrenciasModal()">Adicionar <i class="icofont icofont-car"></i></button>-->
                              <button rel="<?php  ?>" target="_blank" type="button" class="pdfOcorrences btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">
                                 Gerar PDF<i class="icofont icofont-file-pdf"></i>
                              </button>

                              <button rel="<?php  ?>" type="button" id="excelOcorrences" class="excelOcorrences btn btn-outline-success btn-sm waves-effect waves-light text-uppercase ">
                                 Gerar EXCEL<i class="icofont icofont-file-excel"></i>
                              </button>
                           </div><br><br>
                           <label for="" class="col-sm-1 col-form-label"><i class="icofont icofont-Ocorrences"></i>Pesquisar</label>
                           <div class="col-sm-2">
                              <input type="search" class="form-control" value="<?php ?>" name="searchOcorrences" id="searchOcorrences" placeholder="Pesquisar Veículos">
                           </div>
                           <label for="" class="col-sm-1 col-form-label"><i class="icofont icofont-Ocorrences"></i>data Inicio</label>
                           <div class="col-sm-2">
                              <input type="date" class="form-control" value="<?php ?>" name="dateFimOcorrences" id="dateFimOcorrences">
                           </div>
                           <label for="" class="col-sm-2 col-form-label"><i class="icofont icofont-Ocorrences"></i>data Fim </label>
                           <div class="col-sm-2">
                              <input type="date" class="form-control" value="<?php ?>" name="dateIniciOcorrences" id="dateIniciOcorrences">
                           </div>

                           <div class="form-group row">
                              <div class="col-sm-2 text-center">
                                 <button type="submit" name="submitsearchOcorrences" value="submitsearchOcorrences" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Pesquisar<i class="icofont icofont-ui-Ocorrences-group"></i> <i class="icofont icofont-fire-extinguisher"></i></button>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="ordenar" class="col-sm-2 col-form-label"><i class="icofont icofont-listing-box"></i>Ordenar Por</label>
                              <div class="col-sm-4">
                                 <select class="form-control" name="orderOcorrences" id="orderOcorrences">
                                    <option value="s.data_creation">Data</option>
                                    <option value="s.id_solicitante">ID</option>
                                    <!--<option value="marca">Marca</option>
                                       <option value="dtoc.data_creation">Ano</option>
                                       <option value="cor">Cor</option>-->
                                 </select>
                              </div>
                              <label for="listar" class="col-sm-2 col-form-label"><i class="icofont icofont-icofont-listing-number"></i>Listar Por</label>
                              <div class="col-sm-4">
                                 <select class="form-control" name="limitOcorrences" id="limitOcorrences">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                 </select>
                              </div>
                           </div>


                     </form>
                     <form action="visualizar-Ocorrencias" name="OcorrencesForm" method="post">

                        <table class="table-table-responsive-md m-30 overflow-scroll">
                           <thead>
                              <tr>
                                 <th>Acões</th>
                                 <th>id_solicitante</th>
                                 <th>solicitantes</th>
                                 <th>Município</th>
                                 <th>Bairro</th>
                                 <th>rua</th>
                                 <th>referencia</th>
                                 <th>tipo_ocorrencias</th>
                                 <th>orgaos_apoio</th>
                                 <th>equipes</th>
                                 <th>data_Ocorrência</th>

                                 <th>Data_Modificação</th>
                              </tr>
                           </thead>
                           <tbody class="returnTbOcorrences">



                              <?php
                              if ((!empty($searchOcorrences)) || (!empty($dateFimOcorrences) && !empty($dateIniciOcorrences))) :
                                 if (count($ocorrenceSearch) > 0) :
                                    //  var_dump($ocorrencesSearch($ocorrenceSearchFormDatas['searchOcorrences'] ?? true, $ocorrenceSearchFormDatas['limitOcorrences'] ?? true, $ocorrenceSearchFormDatas['orderOcorrences'] ?? true));
                                    // Exibe os resultados da pesquisa
                                    foreach ($ocorrenceSearch as $Search) :
                              ?>
                                       <tr class="even" role="row">
                                          <td>
                                             <button rel="<?php echo $Search['id_solicitante'] ?>" type="button" class="viewOcorrences btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                                Detalhar <i class="icofont icofont-eye"></i>
                                             </button>
                                             <?php if ($_SESSION['permition'] == "admin") : ?>
                                                <!--<button rel="<?php echo $Search['id_solicitante'] ?>" type="button" class="editOcorrences btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                                   Editar <i class="icofont icofont-edit"></i>
                                                </button>-->


                                                <button rel="<?php echo $Search['id_solicitante']; ?>" type="button" class="deleteOcorrences btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                                   Deletar <i class="icofont icofont-trash"></i>

                                                </button>

                                                <input type="checkbox" name="idDeleteOcorrences[]" id="id" value="<?php echo $Search['id_solicitante']; ?>">
                                             <?php endif; ?>
                                          </td>
                                          <td><?php echo $Search['id_solicitante'] . "Pesquisa"; ?></td>
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
                                    echo "<div class='alert alert-danger text-center'><i class='fa fa-database'></i> Nenhum Dados Encontrado!</div>";
                                    $_SESSION['msgOcorrencesDatas'] = "<div class='alert alert-outline-primary alert-dismissible fade show text-center'><span><i class='mdi mdi-alert'></i></span><button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                                    </button><strong>Alerta!</strong><span class=text-danger> Nenhum Dados Encontrado! </span></div>";
                                 endif;
                              else :

                                 // Exibe todos os usuários
                                 if (count($ocorrencesLister) > 0) :
                                    foreach ($ocorrencesLister as $Lister) :
                                    ?>
                                       <tr class="even" role="row">
                                          <td>
                                             <button rel="<?php echo $Lister['id_solicitante'] ?>" type="button" class="viewOcorrences btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                                Detalhar <i class="icofont icofont-eye"></i>
                                             </button>
                                             <?php if ($_SESSION['permition'] == "admin") : ?>
                                                <!--  <button rel="<?php echo $Lister['id_solicitante'] ?>" type="button" class="editOcorrences btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                                   Editar <i class="icofont icofont-edit"></i>
                                                </button>-->

                                                <button rel="<?php echo $Lister['id_solicitante']; ?>" type="button" class="deleteOcorrences btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                                   Deletar <i class="icofont icofont-trash"></i>

                                                </button>
                                                <input type="checkbox" name="idDeleteOcorrences[]" id="id" value="<?php echo $Lister['id_solicitante']; ?>">
                                             <?php endif; ?>
                                          </td>


                                          <td><?php echo $Lister['id_solicitante'] . "lista"; ?></td>
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

                              if (!empty($ocorrenceSearchFormDatas['dateFimOcorrences']) && !empty($ocorrenceSearchFormDatas['dateIniciOcorrences'])) {
                                 // Exibe a mensagem de pesquisa
                                 echo "<tr>
                                    <td>
                                       <div class='alert alert-info'>Exibindo resultados da pesquisa para: " . htmlspecialchars($ocorrenceSearchFormDatas['dateIniciOcorrences']) . " | " . htmlspecialchars($ocorrenceSearchFormDatas['dateFimOcorrences']) . "</div>
                                    </td>
                                 </tr>";
                              }
                              // Limpar mensagens de erro da sessão após exibição
                              if (isset($_SESSION['msgOcorrencesDatas'])) :
                                 echo $_SESSION['msgOcorrencesDatas'];
                                 unset($_SESSION['msgOcorrencesDatas']);
                              endif;
                              ?>
                           </tbody>


                           <tfoot>

                              <th>Acões</th>
                              <th>id_solicitante</th>
                              <th>solicitantes</th>
                              <th>Município</th>
                              <th>Bairro</th>
                              <th>rua</th>
                              <th>referencia</th>
                              <th>tipo_ocorrencias</th>
                              <th>orgaos_apoio</th>
                              <th>equipes</th>
                              <th>data_Ocorrência</th>
                              <th>Data_Modificação</th>

                           </tfoot>
                        </table>

                        <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                           <button id="deleteMultOcorrences" type="submit" class="deleteMultOcorrences btn btn-danger" name="deleteOcorrences" value="multOcorrences"><i class="icofont icofont-car"></i>Deletar Selecionados <i class="icofont icofont-trash"></i></button>
                           <!--<button rel="ocorrences" id="truncateOcorrences" type="submit" class="truncateOcorrences btn btn-danger" name="truncateOcorrences" value="usuarios">Deletar Todos <i class="icofont icofont-trash"></i></button>-->
                        <?php endif; ?>

                     </form>
                  </div>
               </fieldset>
            </div>


         </div>

      </div>

   </div>

   <!-- Modal de edtar de veiculos -->
   <div id="viewOcorrences" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="userModalLabel">Detalhes de Ocorrências<i class="icofont icofont-eye"></i></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div id="detailsOcorrencias" class="basic-form">

               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal de detalhes de veiculos -->
   <div id="editOcorrences" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="userModalLabel">Edição de Ocorrências <i class="icofont icofont-eye"></i></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div id="updateOcorrencias" class="basic-form">

               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
            </div>
         </div>
      </div>
   </div>
<?php else : ?>

   <?php echo DATE . "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
   exit;
   ?>
<?php endif;
?>