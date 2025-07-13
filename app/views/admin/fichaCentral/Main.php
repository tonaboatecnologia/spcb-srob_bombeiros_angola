<?php


if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") :
    $fichaCentral = new App\Models\FichaCentralAdminModel();
    $lastIdTipOcorrencia = $fichaCentral->lastTipOcorrenciaId();
    $solicitante = $fichaCentral->lastSolicitanteId();

    //var_dump($fichaCentral->lastSolicitanteId());

?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="background-color: #f9f9f9; padding: 20px; ">
                <div class="card-header" style="background-color: #39444E; color: #fff; margin-bottom: 40px;">
                    <h5 class="card-header-text" style="font-family: 'Arial', sans-serif; font-weight: bold;"><i class="icofont icofont-fire-truck"></i> Registro de Ocorrência de Bombeiros <i class="icofont icofont-fire-extinguisher-alt"></i></h5>
                </div>
                <div class="card-body">
                    <?php global  $lastSolicitanteTipo, $lastTipOcorrenciaId, $lastSolicitanteTipo, $SolicitanteDatas, $acidentesDatas, $incendioDatas, $incendio, $obstetrico, $clinico, $clinicoForm, $ocorrencias, $tipoOcorrenciaDatas, $obstetrico, $obstetricoForm;

                    global $nomeSolicitante, $idadeSolicitante, $generoSolicitante, $telSolicitante, $nifSolicitante, $emailSolicitante, $provSolicitante, $bairroSolicitante, $munSolicitante, $enderecoSolicitante, $prSolicitante, $relatoSolicitante,

                        $nomePaciente, $localOcorrencia;
                    ?>
                   


                    <!-- Dados do Solicitante e Endereço da Ocorrência -->
                    <form name="solicitante" id="solicitante" action="gerenciar-FichaCentral#" method="post" enctype="multipart/form-data">

                        <fieldset>
                            <legend>
                                <i class="icofont icofont-user"></i> Dados do Solicitante e Endereço da Ocorrência
                            </legend>
                            <!-- Solicitante -->
                            <div class="card p-10">
                                <div class="card-body">

                                    <h5 class="card-text">
                                        <legend>Dados Solicitante</legend>
                                    </h5>
                                    <div class="form-group row">
                                        <label for="nome" class="col-sm-4 col-form-label"><i class="icofont icofont-user"></i>Nome</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nomeSolicitante" value="<?php echo $nomeSolicitante; ?>" id="nomeSolicitante" class="form-control" maxlength="45" placeholder="Nome do Solicitante">
                                            <input type="hidden" name="lastSolicitanteId" value="<?php if (!empty($solicitante['id_solicitante'])) :   echo $solicitante['id_solicitante'];
                                                                                                    endif; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nifSolicitante" class="col-sm-4 col-form-label"><i class="icofont icofont-id-card"></i>Bilhete Solicitante</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nifSolicitante" value="<?php echo $nifSolicitante; ?>" id="nifSolicitante" class="form-control" maxlength="14" placeholder="BI Solicitante">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="idade" class="col-sm-4 col-form-label"><i class="icofont icofont-user-alt-3"></i>Idade</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="idadeSolicitante" id="idade" placeholder="Idade do Solicitante">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><i class="icofont icofont-users"></i>Genêro</label>
                                        <div class="col-sm-8">
                                            <label class="custom-control custom-radio">
                                                <input id="Masculino" name="generoSolicitante" type="radio" value="Masculino" class="custom-control-input" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Masculino</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="Feminino" name="generoSolicitante" type="radio" value="Feminino" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Feminino</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telefone" class="col-sm-4 col-form-label"><i class="icofont icofont-phone"></i>Telefone</label>
                                        <div class="col-sm-8">
                                            <input type="tel" class="form-control" name="telSolicitante" value="<?php echo $telSolicitante; ?>" maxlength="9" id="telefone" placeholder="Telefone de Contato">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label"><i class="icofont icofont-email"></i>E-mail</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="emailSolicitante" value="<?php echo $emailSolicitante; ?>" maxlength="80" id="email" placeholder="E-mail do Solicitante">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Endereço da Ocorrência -->
                                    <h5 class="card-text">
                                        <legend>Endereços da Ocorrência</legend>
                                    </h5>
                                    <div class="form-group row">
                                        <label for="genero" class="col-sm-4 col-form-label"><i class="icofont icofont-location-pin"></i>Província</label>
                                        <div class="col-sm-8">
                                            <select name="provSolicitante" id="provSolicitante" class="form-control">
                                                <option value="">Selecione uma Província</option>
                                                <option value="bengo">Bengo</option>
                                                <option value="benguela">Benguela</option>
                                                <option value="bié">Bié</option>
                                                <option value="cabinda">Cabinda</option>
                                                <option value="cuando_cubango">Cuando Cubango</option>
                                                <option value="cuanza_norte">Cuanza Norte</option>
                                                <option value="cuanza_sul">Cuanza Sul</option>
                                                <option value="cunene">Cunene</option>
                                                <option value="huambo">Huambo</option>
                                                <option value="huíla">Huíla</option>
                                                <option value="luanda">Luanda</option>
                                                <option value="lunda_norte">Lunda Norte</option>
                                                <option value="lunda_sul">Lunda Sul</option>
                                                <option value="malanje">Malanje</option>
                                                <option value="muié">Muié</option>
                                                <option value="namibe">Namibe</option>
                                                <option value="uíge">Uíge</option>
                                                <option value="zaire">Zaire</option>
                                                <!-- Adicione todas as outras províncias aqui -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="genero" class="col-sm-4 col-form-label"><i class="icofont icofont-location-pin"></i>Munícipio</label>
                                        <div class="col-sm-8">

                                            <select name="munSolicitante" id="munSolicitante" class="form-control">
                                                <option value="">Selecione um Município da Capital</option>
                                                <option value="Cazenga">Cazenga</option>
                                                <option value="Belas">Belas</option>
                                                <option value="Talatona">Talatona</option>
                                                <option value="Cacuaco">Cacuaco</option>
                                                <option value="Viana">Viana</option>
                                                <option value="Imgombotas">Imgombotas</option>
                                                <option value="Kilamba Kiaxi">Kilamba Kiaxi</option>
                                                <option value="Icolo & Bengo">Icolo & Bengo</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="endereco" class="col-sm-4 col-form-label"><i class="icofont icofont-location-pin"></i>Endereço</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="enderecoSolicitante" id="enderecoSolicitante" value="<?php echo $enderecoSolicitante; ?>" maxlength="80" placeholder="Endereço da Ocorrência">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bairro" class="col-sm-4 col-form-label"><i class="icofont icofont-location-pin"></i>Bairro</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="bairroSolicitante" value="<?php echo $bairroSolicitante; ?>" maxlength="45" id="bairro" placeholder="Bairro">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="referencia" class="col-sm-4 col-form-label"><i class="icofont icofont-location-pin"></i>Ponto de Referência</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="prSolicitante" value="<?php echo $prSolicitante; ?>" maxlength="45" id="referencia" placeholder="Ponto de Referência (opcional)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="referencia" class="col-sm-4 col-form-label"><i class="icofont icofont-file-text"></i>Relato Resumido</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="relatoSolicitante" value="<?php echo $relatoSolicitante; ?>" maxlength="350" id="relatoSolicitante" rows="3" placeholder="Descreva o Relato do Solicitante"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Adicione mais campos conforme necessário, como endereço, etc. -->
                            <!-- Botão de submit -->
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="solicitante" value="solicitante" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i> Solicitante<i class="icofont icofont-fire-extinguisher"></i></button>
                                </div>
                            </div>
                        </fieldset>

                    </form>

                    <!--Detalhes Extras Sobre as Ocorrências-->

                    <fieldset id="detailhes-Ocorrências">
                        <legend><i class="icofont icofont-police"></i>Detalhes Extras das Ocorrências</legend>
                        <!-- Tipo de Ocorrência e Detalhes Extras -->
                        <div class="card-group">
                            <!--ocorrencia cliníco traumas-->
                            <div class="card p-10">
                                <form name="clinico" id="clinico" action="gerenciar-FichaCentral#detailhes-Ocorrências" method="post" enctype="multipart/form-data">

                                    <fieldset>
                                        <legend>Ocorrências Clínico-Traumas Diversos</legend>

                                        <div class="card p-10">
                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    <legend>Informações do Paciente</legend>
                                                </h5>
                                                <div class="form-group row">
                                                    <label for="nome" class="col-sm-4 col-form-label"><i class="icofont icofont-user"></i>Nome</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nomePaciente" id="nome" value="<?php echo $nomePaciente; ?>" maxlength="45" placeholder="Nome do Paciente ou Vítima">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="idade" class="col-sm-4 col-form-label"><i class="icofont icofont-user-alt-3"></i>Idade</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" name="idadePaciente" id="idadeVitima" placeholder="Idade do Paciente">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="local-localOcorrencia" class="col-sm-4 col-form-label" style="font-weight: bold; padding-top: 5px;"><i class="icofont icofont-car"></i> Local Ocorrência</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="localOcorrencia[]" id="nome" maxlength="80" placeholder="Digite os locais da Ocorrência (casa,escola,rua)">

                                                        <label for="local-localOcorrencia" class="f-bold"><i class="icofont icofont-location-pin"></i>Selecione o Local:</label><br>
                                                        <label class="checkbox-inline"><input type="checkbox" id="localOcorrencia" name="localOcorrencia[]" value="Residência"> Residência</label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="localOcorrencia" name="localOcorrencia[]" value="Instituição Comercial"> Instituição Comercial</label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="localOcorrencia" name="localOcorrencia[]" value="Instituição Empresarial"> Instituição Empresarial </label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="localOcorrencia" name="localOcorrencia[]" value="Instituição Acadêmica"> Instituição Acadêmica</label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="localOcorrencia" name="localOcorrencia[]" value="Instituição Social"> Instituição Social</label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <legend>Condição do Paciente</legend>
                                                </h5>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-eye-alt"></i>Acordado(a)</label>
                                                    <div class="col-sm-12">

                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="acordado" type="radio" value="Sim" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="acordado" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-rainy-sunny"></i>Respirado?</label>
                                                    <div class="col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="respirando" type="radio" value="Sim" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="respirando" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-blood"></i>Sangrando?</label>
                                                    <div class="col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="sangrando" type="radio" value="Sim" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="sangrando" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-farmer"></i>Fraturas Vísivéis?</label>
                                                    <div class="col-sm-12">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="fraturasVisiveis" type="radio" value="Sim" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="fraturasVisiveis" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="motivo-ativacao" class="col-sm-4 col-form-label">Motivo de Ativação</label>
                                                    <textarea class="form-control" id="motivo-ativacao" name="motivoAtivacao" value="<?php ?>" maxlength="350" rows="3" placeholder="Motivo de Ativação"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 text-center">
                                                    <button type="submit" name="clinico" value="clinico" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i> Clínico <i class="icofont icofont-fire-extinguisher"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!--ocorrência do tipo Acidentes-->
                            <div class="card p-10">
                                <form name="acidente" id="acidente" action="gerenciar-FichaCentral#" method="post" enctype="multipart/form-data">

                                    <fieldset>
                                        <legend><i class="icofont icofont-danger-zone"></i>Ocorrências Acidentes</legend>
                                        <div class="card p-10">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <legend><i class="icofont icofont-danger-zone"></i>Detalhes do Acidente</legend>
                                                </h5>
                                                <div class="form-group row">
                                                    <label for="local-oaTipOrgao" class="col-sm-4 col-form-label" style="font-weight: bold; padding-top: 5px;"><i class="icofont icofont-fire"></i> Transportes Envolvidos?</label>
                                                    <div class="col-sm-12">
                                                        <label for="local-oaTipOrgao" class="f-bold"><i class="icofont icofont-location-pin"></i>Descreve os tipos de Transporte:</label><br>
                                                        <input type="text" class="form-control" name="atTipoVeiculo[]" id="atTipoVeiculo" value="<?php ?>" maxlength="80" placeholder="Digite os Tipos de Transportes(carro, moto)">

                                                        <label class="checkbox-inline"><input type="checkbox" name="atTipoVeiculo[]" value="Carro, Caminhão, AutoCarro" id="atTipoVeiculo"> Carro, Caminhão, AutoCarro</label>
                                                        <label class="checkbox-inline"><input type="checkbox" name="atTipoVeiculo[]" value=" Moto, bicleta" id="atTipoVeiculo"> Moto, bicleta</label>
                                                        <label class="checkbox-inline"><input type="checkbox" name="atTipoVeiculo[]" value="Comboio, Trem" id="atTipoVeiculo"> Comboio, Trem</label>
                                                        <label class="checkbox-inline"><input type="checkbox" name="atTipoVeiculo[]" value="outros" id="atTipoVeiculo"> Outros</label>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telefone" class="col-sm-4 col-form-label"><i class="icofont icofont-car-alt-2"></i>Quantos Veículos Envolvidos?</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="atQuantVeiculos" id="atQuantVeiculos" value="<?php ?>" placeholder="Quantos Veículos Envolvidos?">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telefone" class="col-sm-4 col-form-label"><i class="icofont icofont-people"></i>Quantas Vítimas?</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="atiquantvitimas" id="atiquantvitimas" value="<?php ?>" placeholder="Quantos Vítimas Envolvidos?">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><i class="icofont icofont-lobster"></i>Preso em Ferragem?</label>
                                            <div class="col-sm-12">
                                                <label class="custom-control custom-radio">
                                                    <input id="Masculino" name="atPresoFerragem" type="radio" value="Sim" class="custom-control-input" checked>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Sim</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="Feminino" name="atPresoFerragem" type="radio" value="Não" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Não</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><i class="icofont icofont-danger"></i>Produto Perigoso?</label>
                                            <div class="col-sm-12">
                                                <label class="custom-control custom-radio">
                                                    <input id="Masculino" name="atProdperigos" type="radio" value="Sim" class="custom-control-input" checked>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Sim</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="Feminino" name="atProdperigos" type="radio" value="Não" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Não</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="acidente" value="acidente" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i> Acidente <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                            <!--ocorrência do tipo Incêndio-->
                            <div class="card p-10">
                                <form name="incendio" id="incendio" action="gerenciar-FichaCentral#" method="post" enctype="multipart/form-data">

                                    <fieldset>
                                        <legend><i class="icofont icofont-fire"></i> Ocorrências Incêndios</legend>
                                        <div class="card p-10">
                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    <legend><i class="icofont icofont-fire"></i> Detalhes do Incêndio</legend>
                                                </h5>

                                                <div class="form-group row">
                                                    <label for="local-oaTipOrgao" class="col-sm-4 col-form-label" style="font-weight: bold; padding-top: 5px;"><i class="icofont icofont-fire"></i> Objeto Queimando?</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="iobjQueimando[]" id="iobjQueimando" value="<?php ?>" maxlength="80" placeholder="Digite os objecto que está queimando (transporte, residência)">

                                                        <label for="local-oaTipOrgao" class="f-bold"><i class="icofont icofont-location-pin"></i>especifique o tipo de Objecto queimando!:</label><br>
                                                        <label class="checkbox-inline"><input type="checkbox" id="iobjQueimando" name="iobjQueimando[]" value="Residência"> Residência, Instituições(casa, empresa, escola)</label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="iobjQueimando" name="iobjQueimando[]" value="Meios De Transportes"> Meios De Transportes(carro, moto)</label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="iobjQueimando" name="iobjQueimando[]" value="Natureza"> Natureza(arvorés)</label>
                                                        <label class="checkbox-inline"><input type="checkbox" id="iobjQueimando" name="iobjQueimando[]" value="outros"> outros</label>

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telefone" class="col-sm-4 col-form-label"><i class="icofont icofont-fire"></i>Quantas Objectos Queimando?</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" name="iquantObj" value="" maxlength="" id="iquantObj" placeholder="Quantidade de objectos Queimando(estimativa)?">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telefone" class="col-sm-4 col-form-label"><i class="icofont icofont-people"></i>Quantas Vítimas?</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" name="iquantVitimas" value="" maxlength="" id="iquantVitimas" placeholder="Quantos Vítimas Envolvidos?">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><i class="icofont icofont-ui-home"></i>Edificações Próximas?</label>
                                                <div class="col-sm-12">

                                                    <label class="custom-control custom-radio">
                                                        <input id="Masculino" name="iEdificios" type="radio" value="Sim" class="custom-control-input" checked>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Sim</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="Feminino" name="iEdificios" type="radio" value="Não" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Não</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="incendio" value="incendio" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i>Incêndio<i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!--Ocorrência do tipo Obstétrico-->
                            <div class="card p-10">
                                <form name="obstetrico" id="obstetrico" action="gerenciar-FichaCentral#" method="post" enctype="multipart/form-data">

                                    <fieldset>
                                        <legend><i class="icofont icofont-woman-in-glasses"></i>Ocorrências Obstétrico</legend>
                                        <div class="card p-10">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <legend><i class="icofont icofont-woman-in-glasses"></i>Detalhes Obstétricos</legend>
                                                </h5>
                                                <div class="form-group row">
                                                    <label for="idade" class="col-sm-4 col-form-label"><i class="icofont icofont-woman-in-glasses"></i>Idade Gestante</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" name="obIdadeGestante" maxlength="" id="oIdadeGestante" placeholder="Idade da Gestante">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="genero" class="col-sm-4 col-form-label"><i class="icofont icofont-location-time"></i>Tempo de gestação?</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" name="obTempGest" maxlength="" id="genero">
                                                            <option value="1 mês">1 mês</option>
                                                            <option value="2 mês">2 mês</option>
                                                            <option value="3 mês">3 mês</option>
                                                            <option value="4 mês">4 mês</option>
                                                            <option value="5 mês">5 mês</option>
                                                            <option value="6 mês">6 mês</option>
                                                            <option value="7 mês">7 mês</option>
                                                            <option value="8 mês">8 mês</option>
                                                            <option value="9 mês">9 mês</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-boy"></i>Primeira Gravidez?</label>
                                                    <div class="col-sm-12">

                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="obPrimeiraGravidez" type="radio" value="Sim" class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="obPrimeiraGravidez" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-blood-test"></i>Há Constrações?</label>
                                                    <div class="col-sm-12">

                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="obContracao" type="radio" value="Sim" class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="obContracao" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><i class="icofont icofont-blood-drop"></i>Há Sangramento?</label>
                                                    <div class="col-sm-12">

                                                        <label class="custom-control custom-radio">
                                                            <input id="Masculino" name="obSangramento" type="radio" value="Sim" class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Sim</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="Feminino" name="obSangramento" type="radio" value="Não" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Não</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="obstetrico" value="obstetrico" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i> Obstétrico <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!--endcardGroup-->
                        </div>
                    </fieldset>


                    <form name="tipOcorrencia" id="tipOcorrencia" action="gerenciar-FichaCentral#" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>
                                <i class="icofont icofont-warning-alt"></i> Tipo de Ocorrência e Detalhes Extras
                            </legend>

                            <?php

                            foreach ($fichaCentral->incendioId() as $incendio) : endforeach;
                            // foreach($fichaCentral->lastTipOcorrenciaId() as $lastTipOcorrenciaId): endforeach;
                            foreach ($fichaCentral->acidentesId() as $acidente) : endforeach;
                            foreach ($fichaCentral->obstetricoId() as $obstetrico) : endforeach;
                            foreach ($fichaCentral->clinicoId() as $clinico) : endforeach;

                            ?>
                            <div class="card p-10">
                                <div class="card-body">
                                    <div class="form-group row">

                                        <label for="tipo-ocorrencia" class="col-sm-4 col-form-label">Tipo de Ocorrência</label>
                                        <div class="col-sm-12">
                                            <input type="hidden" name="lastTipOcorrenciaId" value="<?php if (!empty($lastIdTipOcorrencia['id_tipo_ocorrencias'])) : echo $lastIdTipOcorrencia['id_tipo_ocorrencias'];
                                                                                                    endif; ?>">
                                            <input type="hidden" name="lastSolicitanteTipo" value="<?php if (!empty($solicitante['id_solicitante'])) : echo $solicitante['id_solicitante'];
                                                                                                    endif; ?>">;
                                            <input type="hidden" name="incendioId" value="<?php if (!empty($incendio['id_incendio'])) : echo $incendio['id_incendio'];
                                                                                            endif; ?>">
                                            <input type="hidden" name="acidenteId" value="<?php if (!empty($acidente['id_acidente'])) : echo $acidente['id_acidente'];
                                                                                            endif; ?>">
                                            <input type="hidden" name="obstetricoId" value="<?php if (!empty($obstetrico['id_obstetrico'])) : echo $obstetrico['id_obstetrico'];
                                                                                            endif; ?>">
                                            <input type="hidden" name="clinicoId" value="<?php if (!empty($clinico['id_clinico'])) : echo $clinico['id_clinico'];
                                                                                            endif; ?>">
                                            <label class="checkbox-inline"><input type="checkbox" id="tipOcorrencia" name="tipOcorrencia[]" value="Acidentes de Trânsitos"> Acidentes de Trânsitos</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="tipOcorrencia" name="tipOcorrencia[]" value="Incêndios"> Incêndios</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="tipOcorrencia" name="tipOcorrencia[]" value="Obstetríco"> Obstetríco</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="tipOcorrencia" name="tipOcorrencia[]" value="Cliníco"> Cliníco</label>

                                        </div>
                                        <!--<div class="col-sm-12">
                                 <select class="form-control" multiple name="tipOcorrencia[]" maxlength="" id="tipo-ocorrencia">
                                    <option value="Acidentes de Trânsitos">Acidentes de Trânsitos</option>
                                    <option value="Incêndios">Incêndios</option>
                                    <option value="Obstetríco">Obstetríco</option>
                                    <option value="Clínico">Cliníco</option>
                                    <option value="acidente">Acidentes</option>
                                     Adicione mais opções conforme necessário 
                                 </select>
                              </div>-->
                                    </div>
                                    <!--<div class="form-group row">
                           <label for="descricao" class="col-sm-4 col-form-label">Descrição</label>
                           <div class="col-sm-12">
                              <textarea class="form-control" name="descSolicitante" maxlength="350" id="descricao" value="" rows="3" placeholder="Descrição da Ocorrência"></textarea>
                           </div>
                        </div>-->
                                </div>
                            </div>
                            <!-- Adicione mais campos conforme necessário, como detalhes adicionais da ocorrência -->
                        </fieldset>

                        <!-- Botão de submit -->
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="ocorrencias" value="ocorrencias" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-file-text"></i> Tipo Ocorrência<i class="icofont icofont-fire-extinguisher"></i></button>
                            </div>
                        </div>
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