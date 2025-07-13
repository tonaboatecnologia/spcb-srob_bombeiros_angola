<?php

namespace Src\Classes;

use Src\Classes\ClassPassword;

$objPassword = new ClassPassword();
//require_once DIRREQ . "src/classes/ClassPassword.php";


#Variavéis Tabela Usuário

error_reporting(E_ALL);

#variables validate & sanitize inputs functions
function sanitizeInput($input)
{
  return filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
function sanitizeInputDefault($input)
{
  return is_string($input) ? filter_var($input, FILTER_DEFAULT) : "NULL";
}

function sanitizeInputDefaultPhoto($input)
{
  return is_array($input) && gettype($input == "array")  ? filter_var($input, FILTER_DEFAULT) : "NULL";
}

function validateString($input)
{
  return is_string($input) && gettype($input == "string") ? sanitizeInput($input) : "NULL";
}

function validateInteger($input)
{
  return is_numeric($input) && ctype_digit($input) && gettype($input == "integer")  ? filter_var($input, FILTER_SANITIZE_NUMBER_INT) : "NULL";
}
function validateFloatDouble($input)
{

  return (is_double($input) || is_float($input)) && ctype_digit($input) && gettype($input == "double")  ? filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT) : "NULL";
}


function validateSanitizeEmail($input)
{

  return filter_var($input, FILTER_VALIDATE_EMAIL) ? filter_var($input, FILTER_SANITIZE_EMAIL) : "NULL";
}

# Função genérica para validar e sanitizar strings
function sanitizeAndValidateString($input)
{
  return filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

# Funções para validar números inteiros e de ponto flutuante
/*
function validateInteger($input)
{
  return filter_var($input, FILTER_VALIDATE_INT);
}*/

function validateFloat($input)
{
  return filter_var($input, FILTER_VALIDATE_FLOAT);
}

# Função para validar e sanitizar emails
function sanitizeAndValidateEmail($input)
{
  return filter_var($input, FILTER_SANITIZE_EMAIL);
}

# Função para tratar arrays de checkbox
function sanitizeAndValidateCheckboxArray($input)
{
  //  return isset($input) && is_array($input) ? array_map('sanitizeAndValidateString', $input) : null;
}

//relatório variables pesquisa
$ocorrences = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($ocorrences['ocorrencias'])) :
  //if($ocorrences['ocorrencias'] === 'ocorrencias'):
  $idUpdateOcorrencias = (isset($ocorrences['idUpdateOcorrencias'])) ? validateInteger($ocorrences['idUpdateOcorrencias']) : 0;


//endif;

endif;
$ocorrenceSearchDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$submitSearchUser = (isset($ocorrenceSearchDatas['submitSearchOcorrences'])) ? sanitizeInputDefault($ocorrenceSearchDatas['submitSearchOcorrences']) : NULL;
$searchOcorrences = (isset($ocorrenceSearchDatas['searchOcorrences']))  ? sanitizeInputDefault($ocorrenceSearchDatas['searchOcorrences']) : "";
$dateFimOcorrences = (!empty(isset($ocorrenceSearchDatas['dateFimOcorrences'])))  ? sanitizeInputDefault($ocorrenceSearchDatas['dateFimOcorrences']) : null;
$dateIniciOcorrences = (!empty(isset($ocorrenceSearchDatas['dateIniciOcorrences'])))  ? sanitizeInputDefault($ocorrenceSearchDatas['dateIniciOcorrences']) : null;
$limitOcorrences = (isset($ocorrenceSearchDatas['limitOcorrences']) && !empty($ocorrenceSearchDatas['limitOcorrences'])) ? validateInteger($ocorrenceSearchDatas['limitOcorrences']) : 15;
$orderOcorrences = (isset($ocorrenceSearchDatas['orderOcorrences'])) && !empty($ocorrenceSearchDatas['orderOcorrences']) ? validateString($ocorrenceSearchDatas['orderOcorrences']) : "s.data_creation";
$OcorrenceSearchFormDatas = (!empty(isset($OcorrenceSearchFormDatas))) ? sanitizeInputDefault($OcorrenceSearchFormDatas) : "NULL";

$OcorrenceSearchFormDatas =
  [
    'searchOcorrences' => $searchOcorrences,
    'limitOcorrences' => $limitOcorrences,
    'orderOcorrences' => $orderOcorrences,
    'dateFimOcorrences' => $dateFimOcorrences,
    'dateIniciOcorrences' => $dateIniciOcorrences,
    'submitSearchOcorrences' => $submitSearchUser,
  ];


//variables signup delete Ocorrences for id multiples
$deleteOcorrences = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($deleteOcorrences['deleteOcorrences'])) :
  $idDeleteOcorrences =  (isset($deleteOcorrences['idDeleteOcorrences'])) ? $idDeleteOcorrences = $_POST['idDeleteOcorrences'] : $idDeleteOcorrences = [];

endif;
#ficha Central


# Receber os dados do formulário
$SolicitanteDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($SolicitanteDatas['solicitante'])) :

  if ($SolicitanteDatas['solicitante'] == 'solicitante') :

    $lastSolicitanteId = isset($SolicitanteDatas['lastSolicitanteId']) ? validateInteger($SolicitanteDatas['lastSolicitanteId']) : null;
    $nomeSolicitante = isset($SolicitanteDatas['nomeSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['nomeSolicitante']) : null;
    $idadeSolicitante = isset($SolicitanteDatas['idadeSolicitante']) ? sanitizeInputDefault($SolicitanteDatas['idadeSolicitante']) : null;
    $generoSolicitante = isset($SolicitanteDatas['generoSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['generoSolicitante']) : null;
    $telSolicitante = isset($SolicitanteDatas['telSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['telSolicitante']) : null;
    $nifSolicitante = isset($SolicitanteDatas['nifSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['nifSolicitante']) : null;
    $emailSolicitante = isset($SolicitanteDatas['emailSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['emailSolicitante']) : null;

    $provSolicitante = isset($SolicitanteDatas['provSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['provSolicitante']) : null;
    $munSolicitante = isset($SolicitanteDatas['munSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['munSolicitante']) : null;
    $enderecoSolicitante = isset($SolicitanteDatas['enderecoSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['enderecoSolicitante']) : null;
    $bairroSolicitante = isset($SolicitanteDatas['bairroSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['bairroSolicitante']) : null;
    $prSolicitante = isset($SolicitanteDatas['prSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['prSolicitante']) : null;
    $relatoSolicitante = isset($SolicitanteDatas['relatoSolicitante']) ? sanitizeAndValidateString($SolicitanteDatas['relatoSolicitante']) : null;

    $solicitante = [

      'nomeSolicitante' => $nomeSolicitante,
      'idadeSolicitante' => $idadeSolicitante,
      'generoSolicitante' => $generoSolicitante,
      'telSolicitante' => $telSolicitante,
      'nifSolicitante' => $nifSolicitante,
      'emailSolicitante' => $emailSolicitante,
      'provSolicitante' => $provSolicitante,
      'munSolicitante' => $munSolicitante,
      'enderecoSolicitante' => $enderecoSolicitante,
      'bairroSolicitante' => $bairroSolicitante,
      'prSolicitante' => $prSolicitante,
      'relatoSolicitante' => $relatoSolicitante,
    ];

  endif;

endif;
//Acidentes de Trânsito
$acidentesForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($acidentesForm['acidente'])) :
  if ($acidentesForm['acidente'] == 'acidente') :
    $atTipoVeiculo = isset($acidentesForm['atTipoVeiculo']) ? $atTipoVeiculo = $_POST['atTipoVeiculo'] : $atTipoVeiculo = [];
    // $atTipoVeiculo = isset($acidentesForm['atTipoVeiculo']) ? validateString($acidentesForm['atTipoVeiculo']) : null;
    $atQuantVeiculos = isset($acidentesForm['atQuantVeiculos']) ? validateInteger($acidentesForm['atQuantVeiculos']) : null;
    $atiquantvitimas = isset($acidentesForm['atiquantvitimas']) ? validateInteger($acidentesForm['atiquantvitimas']) : null;
    $atPresoFerragem = isset($acidentesForm['atPresoFerragem']) ? sanitizeAndValidateString($acidentesForm['atPresoFerragem']) : null;
    $atProdperigos = isset($acidentesForm['atProdperigos']) ? sanitizeAndValidateString($acidentesForm['atProdperigos']) : null;

    $acidentesDatas = [
      'atTipoVeiculo' => $atTipoVeiculo,
      'atQuantVeiculos' => $atQuantVeiculos,
      'atiquantvitimas' => $atiquantvitimas,
      'atProdPerigos' => $atProdperigos,
      'atPresoFerragem' => $atPresoFerragem,


    ];
  endif;
endif;
$obstetricoForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($obstetricoForm['obstetrico'])) :
  if ($obstetricoForm['obstetrico'] == 'obstetrico') :
    //Obstetríco
    $obIdadeGestante = isset($obstetricoForm['obIdadeGestante']) ? sanitizeAndValidateString($obstetricoForm['obIdadeGestante']) : null;
    $obTempGest = isset($obstetricoForm['obTempGest']) ? sanitizeAndValidateString($obstetricoForm['obTempGest']) : null;
    $obPrimeiraGravidez = isset($obstetricoForm['obPrimeiraGravidez']) ? sanitizeAndValidateString($obstetricoForm['obPrimeiraGravidez']) : null;
    $obContracao = isset($obstetricoForm['obContracao']) ? sanitizeAndValidateString($obstetricoForm['obContracao']) : null;
    $obSangramento = isset($obstetricoForm['obSangramento']) ? sanitizeAndValidateString($obstetricoForm['obSangramento']) : null;

    $obstetrico = [
      'obIdadeGestante' => $obIdadeGestante,
      'obTempGest' => $obIdadeGestante,
      'obPrimeiraGravidez' => $obPrimeiraGravidez,
      'obSangramento' => $obSangramento,
      'obContracao' => $obContracao,
    ];
  endif;
endif;
$incendio = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($incendio['incendio'])) :
  if ($incendio['incendio'] == 'incendio') :
    //Incêndio
    $iobjQueimando = isset($incendio['iobjQueimando']) ? $iobjQueimando = $_POST['iobjQueimando'] : $iobjQueimando = [];
    // $iobjQueimando = isset($incendio['iobjQueimando']) ? validateString($incendio['iobjQueimando']) : null;
    $iquantObj = isset($incendio['iquantObj']) ? validateInteger($incendio['iquantObj']) : null;
    $iquantVitimas = isset($incendio['iquantVitimas']) ? validateInteger($incendio['iquantVitimas']) : null;
    $iEdificios = isset($incendio['iEdificios']) ? sanitizeAndValidateString($incendio['iEdificios']) : null;

    $incendioDatas =
      [
        'iobjQueimando' => $iobjQueimando,
        'iquantObj' => $iquantObj,
        'iquantVitimas' => $iquantVitimas,
        'iEdificios' => $iEdificios,
      ];
  endif;


endif;

$clinicoForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($clinicoForm['clinico'])) :
  if ($clinicoForm['clinico'] == 'clinico') :
    $localOcorrencia = isset($clinicoForm['localOcorrencia']) ? $localOcorrencia = $_POST['localOcorrencia'] : $localOcorrencia = [];
    //$localOcorrencia = isset($clinicoForm['localOcorrencia']) ? validateString($clinicoForm['localOcorrencia']) : null;
    $nomePaciente = isset($clinicoForm['nomePaciente']) ? validateString($clinicoForm['nomePaciente']) : null;
    $idadePaciente = isset($clinicoForm['idadePaciente']) ? validateString($clinicoForm['idadePaciente']) : null;
    $acordado = isset($clinicoForm['acordado']) ? sanitizeAndValidateString($clinicoForm['acordado']) : null;
    $respirando = isset($clinicoForm['respirando']) ? sanitizeAndValidateString($clinicoForm['respirando']) : null;
    $sangrando = isset($clinicoForm['sangrando']) ? sanitizeAndValidateString($clinicoForm['sangrando']) : null;
    $fraturasVisiveis = isset($clinicoForm['fraturasVisiveis']) ? sanitizeAndValidateString($clinicoForm['fraturasVisiveis']) : null;
    $motivoAtivacao = isset($clinicoForm['motivoAtivacao']) ? sanitizeAndValidateString($clinicoForm['motivoAtivacao']) : null;

    $clinico =
      [
        'localOcorrencia' => $localOcorrencia,
        'nomePaciente' => $nomePaciente,
        'idadePaciente' => $idadePaciente,
        'acordado' => $acordado,
        'respirando' => $respirando,
        'sangrando' => $sangrando,
        'fraturasVisiveis' => $fraturasVisiveis,
        'motivoAtivacao' => $motivoAtivacao,
      ];
  endif;


endif;

#tipo Ocorrencia
$tipoOcorrencia = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($tipoOcorrencia['ocorrencias'])) :
  if ($tipoOcorrencia['ocorrencias'] === 'ocorrencias') :
    #ID TipoOcorrencias
    $lastSolicitanteTipo = isset($tipoOcorrencia['lastSolicitanteTipo']) ? validateInteger($tipoOcorrencia['lastSolicitanteTipo']) : null;
    $lastTipOcorrenciaId = isset($tipoOcorrencia['lastTipOcorrenciaId']) ? validateInteger($tipoOcorrencia['lastTipOcorrenciaId']) : null;
    $incendioId = isset($tipoOcorrencia['incendioId']) ? validateInteger($tipoOcorrencia['incendioId']) : null;
    $acidenteId = isset($tipoOcorrencia['acidenteId']) ? validateInteger($tipoOcorrencia['acidenteId']) : null;
    $obstetricoId = isset($tipoOcorrencia['obstetricoId']) ? validateInteger($tipoOcorrencia['obstetricoId']) : null;
    $clinicoId = isset($tipoOcorrencia['clinicoId']) ? validateInteger($tipoOcorrencia['clinicoId']) : null;
    $ocorrencias = isset($tipoOcorrencia['tipOcorrencia']) ? $ocorrencias = $_POST['tipOcorrencia'] : $ocorrencias = [];

    $tipoOcorrenciaDatas = [
      'tipOcorrencia' => $ocorrencias,
      'incendioId' => $incendioId,
      'acidenteId' => $acidenteId,
      'obstetricoId' => $obstetricoId,
      'clinicoId' => $clinicoId,
      'lastSolicitanteTipo' => $lastSolicitanteTipo,
      'lastTipOcorrenciaId' => $lastTipOcorrenciaId,
    ];
  endif;
endif;

#-----------------------------------------ficha Vítima---------------------------------------
#Dados Vítima
$vitima = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($vitima['vitima'])) :
  if ($vitima['vitima'] === 'vitima') :
    $nomePaciente = isset($vitima['nomePaciente']) ? sanitizeAndValidateString($vitima['nomePaciente']) : null;
    $idadePaciente = isset($vitima['idadePaciente']) ? sanitizeAndValidateString($vitima['idadePaciente']) : null;
    $genero = isset($vitima['genero']) ? sanitizeAndValidateString($vitima['genero']) : null;
    $endereco = isset($vitima['endereco']) ? sanitizeAndValidateString($vitima['endereco']) : null;
    $biPaciente = isset($vitima['biPaciente']) ? sanitizeAndValidateString($vitima['biPaciente']) : null;
    $contacto = isset($vitima['contacto']) ? sanitizeAndValidateString($vitima['contacto']) : null;
    $relato = isset($vitima['relato']) ? sanitizeAndValidateString($vitima['relato']) : null;
    $submitVitima = isset($vitima['vitima']) ? sanitizeAndValidateString($vitima['vitima']) : null;
    $vitimaDatas =
      [
        'nomePaciente' => $nomePaciente,
        'idadePaciente' => $idadePaciente,
        'genero' => $genero,
        'endereco' => $endereco,
        'biPaciente' => $biPaciente,
        'contacto' => $contacto,
        'relato' => $relato,
        'Submitvitima' => $submitVitima,

      ];
  endif;
endif;

#situação Vítima
$situacaoVitima = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($situacaoVitima['situacaoVitima'])) :
  if ($situacaoVitima['situacaoVitima'] === 'situacaoVitima') :
    /*$lesao = isset($situacaoVitima['lesao']) ? array_map('sanitizeAndValidateString', $situacaoVitima['lesao']) : null;
$fratura = isset($situacaoVitima['fratura']) ? array_map('sanitizeAndValidateString', $situacaoVitima['fratura']) : null;
$queimadura = isset($situacaoVitima['queimadura']) ? array_map('sanitizeAndValidateString', $situacaoVitima['queimadura']) : null;
*/
    #idVitíma
    $vitimaId = isset($situacaoVitima['vitimaId']) ? validateInteger($situacaoVitima['vitimaId']) : null;

    $lesao = isset($situacaoVitima['lesao']) ? $lesao = $_POST['lesao'] : $lesao = [];
    $fratura = isset($situacaoVitima['fratura']) ? $fratura = $_POST['fratura'] : $fratura = [];
    $queimadura = isset($situacaoVitima['queimadura']) ? $queimadura = $_POST['queimadura'] : $queimadura = [];

    $estadoFebril = isset($situacaoVitima['estadoFebril']) ? sanitizeAndValidateString($situacaoVitima['estadoFebril']) : null;
    $estadoConsciente = isset($situacaoVitima['estadoConsciente']) ? sanitizeAndValidateString($situacaoVitima['estadoConsciente']) : null;
    $estadOrientado = isset($situacaoVitima['estadOrientado']) ? sanitizeAndValidateString($situacaoVitima['estadOrientado']) : null;
    $receptorPaciente = isset($situacaoVitima['receptorPaciente']) ? sanitizeAndValidateString($situacaoVitima['receptorPaciente']) : null;
    $localTransferencia = isset($situacaoVitima['localTransferencia']) ? sanitizeAndValidateString($situacaoVitima['localTransferencia']) : null;
    $medidaPupilarEsq = isset($situacaoVitima['medidaPupilarEsq']) ? sanitizeAndValidateString($situacaoVitima['medidaPupilarEsq']) : null;
    $medidaPupilarDir = isset($situacaoVitima['medidaPupilarDir']) ? sanitizeAndValidateString($situacaoVitima['medidaPupilarDir']) : null;
    $satOxigenio = isset($situacaoVitima['satOxigenio']) ? sanitizeAndValidateString($situacaoVitima['satOxigenio']) : null;
    $temperatura = isset($situacaoVitima['temperatura']) ? sanitizeAndValidateString($situacaoVitima['temperatura']) : null;
    $bpms = isset($situacaoVitima['bpms']) ? sanitizeAndValidateString($situacaoVitima['bpms']) : null;
    $pressArterial = isset($situacaoVitima['pressArterial']) ? sanitizeAndValidateString($situacaoVitima['pressArterial']) : null;
    $quantVitimas = isset($situacaoVitima['quantVitimas']) ? sanitizeAndValidateString($situacaoVitima['quantVitimas']) : null;
    /*
$imobilizacoes = isset($situacaoVitima['imobilizacoes']) ? array_map('sanitizeAndValidateString', $situacaoVitima['imobilizacoes']) : null;
$procedimentos = isset($situacaoVitima['procedimentos']) ? array_map('sanitizeAndValidateString', $situacaoVitima['procedimentos']) : null;
*/
    $imobilizacoes = isset($situacaoVitima['imobilizacoes']) ? $imobilizacoes = $_POST['imobilizacoes'] : $imobilizacoes = [];
    $procedimentos = isset($situacaoVitima['procedimentos']) ? $procedimentos = $_POST['procedimentos'] : $procedimentos = [];

    $cintoSeg = isset($situacaoVitima['cintoSeg']) ? sanitizeAndValidateString($situacaoVitima['cintoSeg']) : null;
    $capacete = isset($situacaoVitima['capacete']) ? sanitizeAndValidateString($situacaoVitima['capacete']) : null;
    $obito = isset($situacaoVitima['obito']) ? sanitizeAndValidateString($situacaoVitima['obito']) : null;
    $mrVerbal = isset($situacaoVitima['mrVerbal']) ? sanitizeAndValidateString($situacaoVitima['mrVerbal']) : null;
    $mrMotora = isset($situacaoVitima['mrMotora']) ? sanitizeAndValidateString($situacaoVitima['mrMotora']) : null;
    $aberturaOcular = isset($situacaoVitima['aberturaOcular']) ? sanitizeAndValidateString($situacaoVitima['aberturaOcular']) : null;
    $escalaCipe = isset($situacaoVitima['escalaCipe']) ? sanitizeAndValidateString($situacaoVitima['escalaCipe']) : null;
    $escalaGlasgow = isset($situacaoVitima['escalaGlasgow']) ? sanitizeAndValidateString($situacaoVitima['escalaGlasgow']) : null;
    $submitSituacao = isset($situacaoVitima['situacaoVitima']) ? sanitizeAndValidateString($situacaoVitima['situacaoVitima']) : null;

    $situacaoVitimaDatas =
      [
        'lesao' => $lesao,
        'fratura' => $fratura,
        'queimadura' => $queimadura,
        'imobilizacoes' => $imobilizacoes,
        'procedimentos' => $procedimentos,
        'estadoFebril' => $estadoFebril,
        'estadoConsciente' => $estadoConsciente,
        'estadOrientado' => $estadOrientado,
        'receptorPaciente' => $receptorPaciente,
        'localTransferencia' => $localTransferencia,
        'medidaPupilarEsq' => $medidaPupilarEsq,
        'medidaPupilarDir' => $medidaPupilarDir,
        'satOxigenio' => $satOxigenio,
        'temperatura' => $temperatura,
        'bpms' => $bpms,
        'pressArterial' => $pressArterial,
        'quantVitimas' => $quantVitimas,
        'cintoSeg' => $cintoSeg,
        'capacete' => $capacete,
        'obito' => $obito,
        'mrVerbal' => $mrVerbal,
        'mrMotora' => $mrMotora,
        'aberturaOcular' => $aberturaOcular,
        'escalaCipe' => $escalaCipe,
        'escalaGlasgow' => $escalaGlasgow,
        'vitimaId' => $vitimaId,
        'submitSituacaoVitima' => $submitSituacao,
      ];
  endif;
endif;

#---------------------------Veiculos, horarios, equipes, Orgao apoio----------------------------------------
#veiculos
//pesquisa

//variables search Cars
$CarsearchDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$submitSearchUser = (isset($CarsearchDatas['submitSearchCars'])) ? sanitizeInputDefault($CarsearchDatas['submitSearchCars']) : NULL;
$searchCars = (isset($CarsearchDatas['searchCars']))  ? sanitizeInputDefault($CarsearchDatas['searchCars']) : "";
$limitCars = (isset($CarsearchDatas['limitCars']) && !empty($CarsearchDatas['limitCars'])) ? validateInteger($CarsearchDatas['limitCars']) : 15;
$orderCars = (isset($CarsearchDatas['orderCars'])) && !empty($CarsearchDatas['orderCars']) ? validateString($CarsearchDatas['orderCars']) : "id_viatura";
$CarsearchFormDatas = (!empty(isset($CarsearchFormDatas))) ? sanitizeInputDefault($CarsearchFormDatas) : "NULL";

$CarsearchFormDatas =
  [
    'searchCars' => $searchCars,
    'limitCars' => $limitCars,
    'orderCars' => $orderCars,
    'submitSearchCars' => $submitSearchUser,
  ];
//variables signup delete Cars for id multiples
$deleteCars = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($deleteCars['deleteCars'])) :
  $idCars =  (isset($deleteCars['idCars'])) ? $idCars = $_POST['idCars'] : $idCars = [];

endif;

$veiculos = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($veiculos['veiculos'])) :
  if ($veiculos['veiculos'] === 'veiculos') :
    $idUpdateCars = (isset($userCreateDatas['idUpdateCars'])) ? validateInteger($userCreateDatas['idUpdateCars']) : 0;
    # Validar e sanitizar cada chave do primeiro array como uma variável separada
    $marca = isset($veiculos['marca']) ? sanitizeAndValidateString($veiculos['marca']) : null;
    $modelo = isset($veiculos['modelo']) ? sanitizeAndValidateString($veiculos['modelo']) : null;
    $cor = isset($veiculos['cor']) ? sanitizeAndValidateString($veiculos['cor']) : null;
    $matricula = isset($veiculos['matricula']) ? sanitizeAndValidateString($veiculos['matricula']) : null;
    $ano = isset($veiculos['ano']) ? sanitizeAndValidateString($veiculos['ano']) : null;
    $submitVeiculos = isset($veiculos['veiculos']) ? sanitizeAndValidateString($veiculos['veiculos']) : null;
    # Receber os dados do formulário
    $veiculosDatas = [
      'marca' => $marca,
      'modelo' => $modelo,
      'cor' => $cor,
      'matricula' => $matricula,
      'ano' => $ano,
      'idUpdateCars' => $idUpdateCars,
      'submitVeiculos' => $submitVeiculos,
    ];


  endif;
endif;

#Equipes

$equipes = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty(isset($equipes['equipes']))) :
  if ($equipes['equipes'] === 'equipes') :


    $lastEquipeId = isset($equipes['lastEquipeId']) ? validateInteger($equipes['lastEquipeId']) : null;
    $lastSolicitante = isset($equipes['lastSolicitante']) ? validateInteger($equipes['lastSolicitante']) : null;
    $nomEquipe = isset($equipes['nomEquipe']) ? sanitizeAndValidateString($equipes['nomEquipe']) : null;
    $veiculos = isset($equipes['veiculos']) ? $veiculos = $_POST['veiculos'] : $veiculos = [];
    //$nomEquipe = isset($equipes['nomEquipe']) ? $nomEquipe = $_POST['nomEquipe'] : $nomEquipe = [];
    $integrantes = isset($equipes['integrantes']) ? $integrantes = $_POST['integrantes'] : $integrantes = [];

    $submitEquipes = isset($equipes['equipes']) ? sanitizeAndValidateString($equipes['equipes']) : null;

    $equipesDatas = [
      'integrantes' => $integrantes,
      'veiculos' => $veiculos,
      'lastEquipeId' => $lastEquipeId,
      'lastSolicitante' => $lastSolicitante,
      'nomEquipe' => $nomEquipe,
      'submitEquipes' => $submitEquipes,
    ];

  endif;
endif;

#controle de horarios

$ocorrenceSearchDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$submitSearchUser = (isset($ocorrenceSearchDatas['submitSearchHorarios'])) ? sanitizeInputDefault($ocorrenceSearchDatas['submitSearchHorarios']) : NULL;
$searchHorarios = (isset($ocorrenceSearchDatas['searchHorarios']))  ? sanitizeInputDefault($ocorrenceSearchDatas['searchHorarios']) : "";
$dateFimHorarios = (!empty(isset($ocorrenceSearchDatas['dateFimHorarios'])))  ? sanitizeInputDefault($ocorrenceSearchDatas['dateFimHorarios']) : null;
$dateIniciHorarios = (!empty(isset($ocorrenceSearchDatas['dateIniciHorarios'])))  ? sanitizeInputDefault($ocorrenceSearchDatas['dateIniciHorarios']) : null;
$limitHorarios = (isset($ocorrenceSearchDatas['limitHorarios']) && !empty($ocorrenceSearchDatas['limitHorarios'])) ? validateInteger($ocorrenceSearchDatas['limitHorarios']) : 15;
$orderHorarios = (isset($ocorrenceSearchDatas['orderHorarios'])) && !empty($ocorrenceSearchDatas['orderHorarios']) ? validateString($ocorrenceSearchDatas['orderHorarios']) : "s.data_creation";
$OcorrenceSearchFormDatas = (!empty(isset($OcorrenceSearchFormDatas))) ? sanitizeInputDefault($OcorrenceSearchFormDatas) : "NULL";
$deleteHorarios = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($deleteHorarios['deleteHorarios'])) :
  $idHorariosDeleter =  (isset($deleteHorarios['idHorariosDeleter'])) ? $idHorariosDeleter = $_POST['idHorariosDeleter'] : $idHorariosDeleter = [];

endif;
$OcorrenceSearchFormDatas =
  [
    'searchHorarios' => $searchHorarios,
    'limitHorarios' => $limitHorarios,
    'orderHorarios' => $orderHorarios,
    'dateFimHorarios' => $dateFimHorarios,
    'dateIniciHorarios' => $dateIniciHorarios,
    'submitSearchHorarios' => $submitSearchUser,
  ];
$controleHorarios = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($controleHorarios['horariosVeiculos'])) :
  if ($controleHorarios['horariosVeiculos'] === 'horariosVeiculos') :
    $PartidaInicio = isset($controleHorarios['PartidaInicio']) ? sanitizeAndValidateString($controleHorarios['PartidaInicio']) : null;
    $chegadaDestino = isset($controleHorarios['chegadaDestino']) ? sanitizeAndValidateString($controleHorarios['chegadaDestino']) : null;
    $saidaDestino = isset($controleHorarios['saidaDestino']) ? sanitizeAndValidateString($controleHorarios['saidaDestino']) : null;
    $FimOcorrência = isset($controleHorarios['FimOcorrencia']) ? sanitizeAndValidateString($controleHorarios['FimOcorrencia']) : null;
    $chvLongitude = isset($controleHorarios['chvLongitude']) ? sanitizeAndValidateString($controleHorarios['chvLongitude']) : null;
    $chvLatitude = isset($controleHorarios['chvLatitude']) ? sanitizeAndValidateString($controleHorarios['chvLatitude']) : null;
    $chvGuarnicao = isset($controleHorarios['chvGuarnicao']) ? validateInteger($controleHorarios['chvGuarnicao']) : null;
    $chvObsVitima = isset($controleHorarios['chvObsVitima']) ? sanitizeAndValidateString($controleHorarios['chvObsVitima']) : null;
    $horariosVeiculos = isset($controleHorarios['horariosVeiculos']) ? sanitizeAndValidateString($controleHorarios['horariosVeiculos']) : null;

    $controleHorariosDatas = [
      'PartidaInicio' => $PartidaInicio,
      'chegadaDestino' => $chegadaDestino,
      'saidaDestino' => $saidaDestino,
      'FimOcorrencia' => $FimOcorrência,
      'chvLongitude' => $chvLongitude,
      'chvLatitude' => $chvLatitude,
      'chvGuarnicao' => $chvGuarnicao,
      'chvObsVitima' => $chvObsVitima,
      'horariosVeiculos' => $horariosVeiculos,
    ];
  endif;
endif;

//orgao de apoio~
$orgaoApoio = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($orgaoApoio['orgaoApoio']) && isset($orgaoApoio['orgaoApoio'])) :
  if ($orgaoApoio['orgaoApoio'] === 'orgaoApoio') :
    #$tipOrgao = isset($orgaoApoio['tipOrgao']) ? sanitizeAndValidateString($acidentesForm['tipOrgao']) : null;
    $lastSolicitanteOrgao = isset($tipoOcorrencia['lastSolicitanteOrgao']) ? validateInteger($tipoOcorrencia['lastSolicitanteOrgao']) : null;
    $lastIdOrgaoApoio = isset($tipoOcorrencia['lastIdOrgaoApoio']) ? validateInteger($tipoOcorrencia['lastIdOrgaoApoio']) : null;
    $tipOrgao = isset($orgaoApoio['tipOrgao']) ? $tipOrgao = $_POST['tipOrgao'] : $tipOrgao = [];
    $contactoAtendente = isset($orgaoApoio['contactoAtendente']) ? sanitizeAndValidateString($acidentesForm['contactoAtendente']) : null;
    $nomeAtendente = isset($orgaoApoio['nomeAtendente']) ? sanitizeAndValidateString($acidentesForm['nomeAtendente']) : null;
    $dataChamada = isset($orgaoApoio['dataChamada']) ? sanitizeAndValidateString($acidentesForm['dataChamada']) : null;
    $submitOrgaoApoio = isset($orgaoApoio['orgaoApoio']) ? sanitizeAndValidateString($orgaoApoio['orgaoApoio']) : null;
    $orgaoApoioDatas = [
      'tipOrgao' => $tipOrgao,
      'contactoAtendente' => $contactoAtendente,
      'nomeAtendente' => $nomeAtendente,
      'dataChamada' => $dataChamada,
      'lastIdOrgaoApoio' => $lastIdOrgaoApoio,
      'lastSolicitanteOrgao' => $lastSolicitanteOrgao,
      'submitOrgaoApoio' => $submitOrgaoApoio,
    ];

  endif;
endif;
$userLoginDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//variables sign in login user
if (!empty($userLoginDatas['submitUserLogin'])) :

  $submitUserLogin = $userLoginDatas['submitUserLogin']; // validateString($userLoginDatas['submitUserLogin']): "NULL";
  #email
  $userEmailNipLogin = (isset($userLoginDatas['userEmailNipLogin'])) ? sanitizeInputDefault($userLoginDatas['userEmailNipLogin']) : "NULL";
  #senha
  $userSenhaLogin = $userLoginDatas['userSenhaLogin'];
  if ((isset($userSenhaLogin))) {
    sanitizeInputDefault($userSenhaLogin);

    $hashSenha = $objPassword->passwordHash($userSenhaLogin);
  } else {
    $userSenhaLogin = "NULL";
    $hashSenha = "NULL";
  }
  $userFormDatasLogin = (!empty(isset($userFormDatasLogin))) ? sanitizeInputDefault($userFormDatasLogin) : "NULL";

  $userFormDatasLogin = [
    "userEmailNipLogin" => $userEmailNipLogin,
    "userSenhaLogin" => $userSenhaLogin,
    "submitUserLogin" => $submitUserLogin,
  ];
endif;

//variables search users
$pesquisarUsuarios = filter_input(INPUT_GET, 'pesquisarUsuarios', FILTER_DEFAULT);

$userSearchDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$submitSearchUser = (isset($userSearchDatas['submitSearchUsers'])) ? sanitizeInputDefault($userSearchDatas['submitSearchUsers']) : NULL;
$searchUsers = (isset($userSearchDatas['searchUsers']))  ? sanitizeInputDefault($userSearchDatas['searchUsers']) : "";
$limitUsers = (isset($userSearchDatas['limitUsers']) && !empty($userSearchDatas['limitUsers'])) ? validateInteger($userSearchDatas['limitUsers']) : 4;
$orderUsers = (isset($userSearchDatas['orderUsers'])) && !empty($userSearchDatas['orderUsers']) ? validateString($userSearchDatas['orderUsers']) : "id_bombeiro";
$userSearchFormDatas = (!empty(isset($userSearchFormDatas))) ? sanitizeInputDefault($userSearchFormDatas) : "NULL";

$userSearchFormDatas =
  [
    'searchUsers' => $searchUsers,
    'limitUsers' => $limitUsers,
    'orderUsers' => $orderUsers,
    'submitSearchUsers' => $submitSearchUser,
  ];

$pagina_atual = filter_input(INPUT_GET, "userPages", FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
//setar a quantidade de registro po página
$Limite_resultado = $userSearchFormDatas['limitUsers'];
//calcular o início da viasualizção

$inicio  = ($Limite_resultado * $pagina)  - $Limite_resultado;

if (isset($_GET['idDel'])) : $idDelete = filter_input(INPUT_GET, 'idDel', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
elseif (isset($_POST['idDel'])) : $idDelete = filter_input(INPUT_POST, 'idDel', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
else : $idDelete = 0;
endif;
$idUpdate = filter_input(INPUT_GET, 'idUp', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
if (isset($_GET['idUp'])) : $idUpdate = filter_input(INPUT_GET, 'idUp', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
elseif (isset($_POST['idUp'])) : $idUpdate = filter_input(INPUT_POST, 'idUp', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
else : $idUpdate = null;
endif;
if (isset($_GET['idView'])) : $idView = filter_input(INPUT_GET, 'idView', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
elseif (isset($_POST['idView'])) : $idView = filter_input(INPUT_POST, 'idView', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
else : $idView = 0;
endif;

//variables signup delete users for id multiples
$deleteUsers = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($deleteUsers['deleteUsers'])) :
  $idUsers =  (isset($deleteUsers['idUsers'])) ? $idUsers = $_POST['idUsers'] : $idUsers = [];

endif;

//variables signup users truncate users
$truncateUsers = filter_input(INPUT_POST, 'truncateUsers', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!empty(isset($truncateUsers['truncateUsers']))) :
  $truncateUsers =  (isset($truncateUsers['truncateUsers'])) ?
    sanitizeInputDefault($truncateUsers['truncateUsers'])  : null;
endif;
//variables sign up user
$userCreateDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// editar imagem do usuário
if (!empty($userCreateDatas['submitUser']) && $userCreateDatas['submitUser'] == "cadastrar") :
  $submitUser = (isset($userCreateDatas['submitUser'])) ? validateString($userCreateDatas['submitUser']) : "NULL";

  $userName = (isset($userCreateDatas['userName'])) ? validateString($userCreateDatas['userName']) : "NULL";
  $userNip = (isset($userCreateDatas['userNip'])) ? validateInteger($userCreateDatas['userNip']) : "NULL";
  $userDataNasc = (isset($userCreateDatas['userDataNasc'])) ? sanitizeInputDefault($userCreateDatas['userDataNasc']) : "NULL";
  $userCargo = (isset($userCreateDatas['userCargo'])) ? validateString($userCreateDatas['userCargo']) : "NULL";
  $userPatente = (isset($userCreateDatas['userPatente'])) ? validateString($userCreateDatas['userPatente']) : "NULL";
  $userPermissao = (isset($userCreateDatas['userPermissao'])) ? validateString($userCreateDatas['userPermissao']) : "NULL";
  $userStatus = (isset($userCreateDatas['userStatus'])) ? validateString($userCreateDatas['userStatus']) : "NULL";

  #email
  $userEmail = (isset($userCreateDatas['userEmail'])) ? validateSanitizeEmail($userCreateDatas['userEmail']) : "NULL";
  #senha

  if (isset($userCreateDatas['userSenha'])) {
    $userSenha = $userCreateDatas['userSenha'];
    sanitizeInputDefault($userSenha);
    $hashSenha = $objPassword->passwordHash($userSenha);
  } else {
    $userSenha = "NULL";
    $hashSenha = "NULL";
  }
  #confSenha

  $userConfSenha = !empty(isset($userCreateDatas['userConfSenha'])) ? sanitizeInputDefault($userCreateDatas['userConfSenha']) : "NULL";

  // DateCreation
  $dataCreation = date('D, d M Y H:i:s');
  $dataCreation = (isset($dataCreation)) ? sanitizeInputDefault($dataCreation) : "NULL";

  // Token
  $token = bin2hex(random_bytes(64));
  $token = (isset($token)) ? sanitizeInputDefault($token) : "NULL";

  if (!empty(isset($_FILES['userPhoto']))) {
    
    $userPhoto = $_FILES['userPhoto'];
    sanitizeInputDefaultPhoto($userPhoto);
    //nome personalizado da foto
    $userPhoto['name'] = (!empty(isset($userPhoto['name']))) ? $userPhoto['name'] : "NULL";
    $extFiles = strtolower(pathinfo($userPhoto['name'], PATHINFO_EXTENSION));
    if (!empty($extFiles)) :
      $userCustomFileName = date("D-d-M-Y-H-i-s") . "_spcb_" . uniqid() . ".$extFiles";
    else :
      $userCustomFileName = "NULL";

    endif;
    //caminho da imagem
    $destinaryDirectory = (isset($destinaryDirectory)) ? $destinaryDirectory : "spcb";
    if ($extFiles == "png" || $extFiles == "jpg" || $extFiles == "jpeg") :
      $destinaryDirectory = "../public/assets/uploads/pics/";
      $pathPreview =  DIRADMINUPLOADS . "pics/" . $userCustomFileName;

    endif;

    $pathUpload =  $destinaryDirectory . $userCustomFileName;
    $pathUpload = (isset($pathUpload)) ? sanitizeInputDefault($pathUpload) : "NULL";

    $pathPreview = (isset($pathPreview)) ? sanitizeInputDefault($pathPreview) : $pathPreview =  DIRADMINUPLOADS . "default.png";
  
  
  } else {
    (settype($userPhoto, "array")) ? sanitizeInputDefaultPhoto($userPhoto) : $userPhoto = [];
  
  
  }

  $userFormDatas = (!empty(isset($userFormDatas))) ? sanitizeInputDefault($userFormDatas) : $userFormDatas = [];
  $userFormDatas2 = (!empty(isset($userFormDatas2))) ? sanitizeInputDefault($userFormDatas2) : $userFormDatas2 = [];
  $userFormDatas3 = (!empty(isset($userFormDatas3))) ? sanitizeInputDefault($userFormDatas3) : $userFormDatas3 = [];
    
  $userFormDatas3 = [
    'userPhoto' => $userPhoto,
    'userCustomFileName' => $userCustomFileName,
    'path' => $pathUpload,
    'pathPreview' => $pathPreview,
    'directory' => $destinaryDirectory,
    'submitUser' => $submitUser,
    
  ];

   $userFormDatas2 = [
      
      'userDataCreation' => $dataCreation,
      'userToken' => $token,
      'hashSenha' => $hashSenha,
    'submitUser' => $submitUser,



    ];
  $userFormDatas = [
    'userName' => $userName,
    'userEmail' => $userEmail,
    'userNip' => $userNip,
    'userDataNasc' => $userDataNasc,
    'userCargo' => $userCargo,
    'userPatente' => $userPatente,
    'userSenha' => $userSenha,
    'userConfSenha' => $userConfSenha,
    'userPermissao' => $userPermissao,
    'userStatus' => $userStatus,

  ];
 

elseif (!empty($userCreateDatas['submitUser']) && $userCreateDatas['submitUser'] == "editar") :

  $oldImgUser = (isset($userCreateDatas['oldImgUser'])) ? validateString($userCreateDatas['oldImgUser']) : null;

  $idUpdateUsers = (isset($userCreateDatas['idUpdateUsers'])) ? validateInteger($userCreateDatas['idUpdateUsers']) : 0;

  $submitUser = (isset($userCreateDatas['submitUser'])) ? validateString($userCreateDatas['submitUser']) : "NULL";

  $userName = (isset($userCreateDatas['userName'])) ? validateString($userCreateDatas['userName']) : "NULL";
  $userNip = (isset($userCreateDatas['userNip'])) ? validateInteger($userCreateDatas['userNip']) : "NULL";
  $userDataNasc = (isset($userCreateDatas['userDataNasc'])) ? sanitizeInputDefault($userCreateDatas['userDataNasc']) : "NULL";
  $userCargo = (isset($userCreateDatas['userCargo'])) ? validateString($userCreateDatas['userCargo']) : "NULL";
  $userPatente = (isset($userCreateDatas['userPatente'])) ? validateString($userCreateDatas['userPatente']) : "NULL";
  $userPermissao = (isset($userCreateDatas['userPermissao'])) ? validateString($userCreateDatas['userPermissao']) : "NULL";
  $userStatus = (isset($userCreateDatas['userStatus'])) ? validateString($userCreateDatas['userStatus']) : "NULL";

  #email
  $userEmail = (isset($userCreateDatas['userEmail'])) ? validateSanitizeEmail($userCreateDatas['userEmail']) : "NULL";
  #senha

  if (isset($userCreateDatas['userSenha'])) {
    $userSenha = $userCreateDatas['userSenha'];
    sanitizeInputDefault($userSenha);
    $hashSenha = $objPassword->passwordHash($userSenha);
  } else {
    $userSenha = "NULL";
    $hashSenha = "NULL";
  }
  #confSenha

  $userConfSenha = !empty(isset($userCreateDatas['userConfSenha'])) ? sanitizeInputDefault($userCreateDatas['userConfSenha']) : "NULL";

  // DateCreation
  $dataCreation = date('D, d M Y H:i:s');
  $dataCreation = (isset($dataCreation)) ? sanitizeInputDefault($dataCreation) : "NULL";

  // Token
  $token = bin2hex(random_bytes(64));
  $token = (isset($token)) ? sanitizeInputDefault($token) : "NULL";


  $userFormDatas = (!empty(isset($userFormDatas))) ? sanitizeInputDefault($userFormDatas) : '';

  $userFormDatas = [
    'userName' => $userName,
    'userEmail' => $userEmail,
    'userNip' => $userNip,
    'userDataNasc' => $userDataNasc,
    'userCargo' => $userCargo,
    'userPatente' => $userPatente,
    'userSenha' => $userSenha,
    'userConfSenha' => $userConfSenha,
    'userPermissao' => $userPermissao,
    'userStatus' => $userStatus,

  ];

  $userFormDatas2 = [

    'userDataCreation' => $dataCreation,
    'userToken' => $token,
    'hashSenha' => $hashSenha,
    'userId' => $idUpdateUsers,
    'oldImg' => $oldImgUser,
    'submitUser' => $submitUser,


  ];

  if (!empty(isset($_FILES['userPhoto']))) {
    $userPhoto = $_FILES['userPhoto'];
    sanitizeInputDefaultPhoto($userPhoto);
    //nome personalizado da foto
    $userPhoto['name'] = (!empty(isset($userPhoto['name']))) ? $userPhoto['name'] : NULL;
    $extFiles = strtolower(pathinfo($userPhoto['name'], PATHINFO_EXTENSION));
    if (!empty($extFiles)) :
      $userCustomFileName = date("D-d-M-Y-H-i-s") . "_spcb_" . uniqid() . ".$extFiles";
    else :
      $userCustomFileName = '';

    endif;
    //caminho da imagem
    $destinaryDirectory = (isset($destinaryDirectory)) ? $destinaryDirectory : NULL;
    if ($extFiles == "png" || $extFiles == "jpg" || $extFiles == "jpeg") :
      $destinaryDirectory = "../public/assets/uploads/pics/";
      $pathPreview =  DIRADMINUPLOADS . "pics/" . $userCustomFileName;

    endif;

    $pathUpload =  $destinaryDirectory . $userCustomFileName;
    $pathUpload = (isset($pathUpload)) ? sanitizeInputDefault($pathUpload) : '';

    $pathPreview = (isset($pathPreview)) ? sanitizeInputDefault($pathPreview) : '';
    $userFormDatas2 = [
      'userPhoto' => $userPhoto,
      'userCustomFileName' => $userCustomFileName,
      'path' => $pathUpload,
      'pathPreview' => $pathPreview,
      'directory' => $destinaryDirectory,

      'userId' => $idUpdateUsers,
      'oldImg' => $oldImgUser,
      'submitUser' => $submitUser,


    ];

    $userDatasImg = [
      'userPhoto' => $userPhoto,
      'userId' => $idUpdateUsers,
      'oldImg' => $oldImgUser,
      'pathPreview' => $pathPreview,
      'userCustomFileName' => $userCustomFileName,
      'submitUser' => $submitUser,

      //'pathPreview' => $pathPreview,

    ];
  } else {
    (settype($userPhoto, "array")) ? sanitizeInputDefaultPhoto($userPhoto) : NULL;
  }

else :
  $submitUser = (isset($userCreateDatas['submitUser'])) ? validateString($userCreateDatas['submitUser']) : "NULL";

  $oldImgUser = (isset($userCreateDatas['oldImgUser'])) ? validateString($userCreateDatas['oldImgUser']) : null;

  $idUpdateUsers = (isset($userCreateDatas['idUpdateUsers'])) ? validateInteger($userCreateDatas['idUpdateUsers']) : 0;

  // Lidar com o upload de arquivos (userPhoto)
  if (!empty(isset($_FILES['userPhoto']))) {
    $userPhoto = $_FILES['userPhoto'];
    sanitizeInputDefaultPhoto($userPhoto);
    //nome personalizado da foto
    $userPhoto['name'] = (!empty(isset($userPhoto['name']))) ? $userPhoto['name'] : NULL;
    $extFiles = strtolower(pathinfo($userPhoto['name'], PATHINFO_EXTENSION));
    if (!empty($extFiles)) :
      $userCustomFileName = date("D-d-M-Y-H-i-s") . "_spcb_" . uniqid() . ".$extFiles";
    else :
      $userCustomFileName = '';

    endif;
    //caminho da imagem
    $destinaryDirectory = (isset($destinaryDirectory)) ? $destinaryDirectory : NULL;
    if ($extFiles == "png" || $extFiles == "jpg" || $extFiles == "jpeg") :
      $destinaryDirectory = "../public/assets/uploads/pics/";
      $pathPreview =  DIRADMINUPLOADS . "pics/" . $userCustomFileName;

    endif;

    $pathUpload =  $destinaryDirectory . $userCustomFileName;
    $pathUpload = (isset($pathUpload)) ? sanitizeInputDefault($pathUpload) : '';

    $pathPreview = (isset($pathPreview)) ? sanitizeInputDefault($pathPreview) : '';
    $userFormDatas2 = [
      'userPhoto' => $userPhoto,
      'userCustomFileName' => $userCustomFileName,
      'path' => $pathUpload,
      'pathPreview' => $pathPreview,
      'directory' => $destinaryDirectory,

      'userId' => $idUpdateUsers,
      'oldImg' => $oldImgUser,
      'submitUser' => $submitUser,


    ];

    $userDatasImg = [
      'userPhoto' => $userPhoto,
      'userId' => $idUpdateUsers,
      'oldImg' => $oldImgUser,
      'pathPreview' => $pathPreview,
      'userCustomFileName' => $userCustomFileName,
      'submitUser' => $submitUser,

      //'pathPreview' => $pathPreview,

    ];
  } else {
    (settype($userPhoto, "array")) ? sanitizeInputDefaultPhoto($userPhoto) : NULL;
  }

endif;
