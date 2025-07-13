<?php
 if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") :
   $orgaosApoio = new App\Models\OrgaoApoioModel;
   $fichaCentral = new App\Models\FichaCentralAdminModel();
   $lastOrgaoApoioId = $orgaosApoio->lastOrgaoApoioId();
   $solicitante=$fichaCentral->lastSolicitanteId();
 
   global $lastSolicitanteOrgao, $lastIdOrgaoApoio, $orgaoApoioDatas, $orgaoApoio, $contactoAtendente, $nomeAtendente, $dataChamada;
   //foreach($orgaosApoio->lastOrgaoApoioId() as $lastOrgaoApoioId): endforeach;
   //var_dump($lastOrgaoApoioId, $solicitante, $lastIdOrgaoApoio, $lastSolicitanteOrgao);

   ?>
   <div class="row">
      <div class="col-lg-12">
         <div class="card" style="background-color: #f9f9f9; padding: 20px; ">
            <div class="card-header" style="background-color: #39444E; color: #fff; margin-bottom: 40px;">
               <h5 class="card-header-text" style="font-family: 'Arial', sans-serif; font-weight: bold;"><i class="icofont icofont-fire-truck"></i> Registro de Ocorrência de Bombeiros <i class="icofont icofont-fire-extinguisher-alt"></i></h5>
            </div>
            <div class="card-body">
             <div class="card-text">
              
               </div>
               <?php
               ?>
               <form name="orgaoApoio" id="orgaoApoio" action="gerenciar-OrgaosApoio" method="post" enctype="multipart/form-data">
                  <!-- Órgãos de Apoio Requisitados -->
                  <fieldset>
                     <legend><i class="icofont icofont-support"></i>Órgãos de Apoio</legend>
                     <div class="card-group">
                        <!-- layout - 01 -->
                        <div class="card p-10">
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="local-oaTipOrgao" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;"><i class="icofont icofont-support"></i>Orgão de Apoio</label>
                                 <div class="col-sm-9">
                                 <input type="hidden" name="lastSolicitanteOrgao" value="<?php if(!empty($solicitante['id_solicitante'])): echo $solicitante['id_solicitante']; endif;?>">;                   
                                 <input type="hidden" name="lastIdOrgaoApoio" value="<?php if(!empty($lastOrgaoApoioId['id_orgao'])): echo $lastOrgaoApoioId['id_orgao']; endif;?>">
                                    <label for="local-oaTipOrgao" class="f-bold"><i class="icofont icofont-live-support"></i>Selecione os Orgãos:</label><br>
                                    <label class="checkbox-inline"><input type="checkbox" id="tipOrgao" name="tipOrgao[]" value="Segurança(Polícia)">Segurança(Polícia)</label>
                                    <label class="checkbox-inline"><input type="checkbox" id="tipOrgao" name="tipOrgao[]" value="Ambulância(INEMA)">Ambulância(INEMA)</label>
                                    <label class="checkbox-inline"><input type="checkbox" id="tipOrgao" name="tipOrgao[]" value="Defesa(PM)">Defesa(PM)</label>
                                    <div class="col-sm-9">
                                     <!--<select class="form-control" name="tipOrgao" maxlength="" id="tipOrgao">
                                          <option value="Segurança(PNA)">Segurança(Polícia)</option>
                                          <option value="Ambulância(INEMA)">Ambulância(INEMA)</option>
                                          <option value="Defesa(PM)">Defesa(PM)</option>
                                          option value="">Polícia</option>
                                          <option value="">Polícia</option>
                                          <option value="">Polícia</option>
                                       </select>-->
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="contacto1" class="col-sm-3 col-form-label"><i class="icofont icofont-phone"></i>Contactos: 113 | 112  | 123</label>
                                 <div class="col-sm-9"><input type="tel" class="form-control" name="contactoAtendente" value="<?php if(isset($contactoAtendente)): echo $contactoAtendente; endif; ?>" maxlength="9" id="contactoAtendente" placeholder="Contacto do Orgão"></div>
                              </div>
                              <div class="form-group row">
                                 <label for="atendente1" class="col-sm-3 col-form-label"><i class="icofont icofont-support"></i>Atendente</label>
                                 <div class="col-sm-9"><input type="text" class="form-control" name="nomeAtendente" value="<?php if(isset($nomeAtendente)): echo $nomeAtendente; endif; ?>" maxlength="45" id="nomeAtendente" placeholder="Nome do Atendente"></div>
                              </div>
                              <div class="form-group">
                                 <label for="dataHoraChamada1" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Data e Hora da Chamada</label>
                                 <div class="col-sm-9"><input type="datetime-local" class="form-control" name="dataChamada" value="<?php if(isset($dataChamada)): echo $dataChamada; endif; ?> " maxlength="" id="dataChamada"></div>
                              </div>

                           </div>
                        </div>


                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12 text-center">
                           <button type="submit" name="orgaoApoio" value="orgaoApoio" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i> Ocorrências <i class="icofont icofont-fire-extinguisher"></i></button>
                        </div>
                     </div>
                  </fieldset>

                  <!-- Botão de submit -->

               </form>
            </div>

         </div>
      </div>
   </div>
<?php else : ?>

   <?php echo "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
   exit;
   ?>
<?php endif;
?>