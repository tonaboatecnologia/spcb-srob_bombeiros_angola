<?php

namespace Src\Classes;

use App\Models\classConnectionDB;

use App\Models\UsuariosAdminModel;
use App\Models\LoginAdminModel;
use App\Models\FichaCentralAdminModel;
use App\Models\FichaVitimaAdminModel;
use App\Models\OrgaoApoioModel;
use App\Models\EquipesAdminModel;
use App\Models\HorariosViaturasModel;
use App\Models\OcorrenciasAdminModel;
use App\Models\ViaturasModel;
use Src\Classes\ClassPassword;
use Src\Classes\ClassSessions;
use Src\Classes\ClassUpload;


class ClassValidate extends classConnectionDB
{

    private $msgError = [];
    private $msgSucess = [];
    private $attempt;
    private $signUp;
    private $signIn;
    private $fichaCentral;
    private $fichaVitima;
    private $orgaoApoio;
    private $veiculos;
    private $equipes;
    private $horarios;
    private $password;
    private $sessions;
    private $ocorrencias;
    private $upload;



    public function __construct()
    {
        $this->ocorrencias = new OcorrenciasAdminModel;
        $this->signUp = new UsuariosAdminModel();
        $this->password = new ClassPassword();
        $this->fichaCentral = new FichaCentralAdminModel();
        $this->fichaVitima = new FichaVitimaAdminModel();
        $this->orgaoApoio = new OrgaoApoioModel();
        $this->veiculos = new ViaturasModel();
        $this->horarios = new HorariosViaturasModel();
        $this->equipes = new EquipesAdminModel;
        $this->signIn = new LoginAdminModel();
        $this->sessions = new ClassSessions();
        $this->upload = new ClassUpload();
    }

    /**
     * Get the value of msg
     */
    public function getMsg()
    {
        return $this->msgError;
    }

    /**
     * Set the value of msg
     *
     * @return  self
     */
    public function setMsg($msgError)
    {
        $this->msgError[] = [
            'message' => $msgError

        ];
        return $this;
    }
    public function getMsgSucess()
    {
        return $this->msgSucess;
    }

    /**
     * Set the value of msg
     *
     * @return  self
     */
    public function setMsgSucess($msgSucess)
    {
        $this->msgSucess[] = [
            'messageSuccess' => $msgSucess

        ];
        return $this;
    }

    # Método para validar se todos os campos foram preenchidos
    public function validateFields($fields)
    {  /*
        $fields = array_map('strip_tags', $fields);
        $fields = array_map('trim', $fields);
        if (in_array('', $fields)) {
            $this->setMsg(" preencha todos os campos", 'danger');
            return false;
        } else {
            return true;
        }*/

        $i = 0;
        foreach ($fields as $k => $v) {
            if (empty($v)) {
                $i++;
            }
        }
        if ($i == 0) {
            return true;
        } else {
            $this->setMsg(" Necessário Preencher todos os Campos!", 'danger');
            return false;
        }
    }
    #validateNIP
    public function validateNiP($nip)
    {
        // Verifica se o NiP foi fornecido
        if (!empty($nip)) {
            // Verifica o comprimento do NiP
            if (strlen($nip) == 9) {
                return true; // NiP válido
            } else {
                $this->setMsg("NiP inválido.", 'danger');
                return false; // NiP inválido
            }
        } else {
            $this->setMsg("NiP não fornecido.", 'danger');
            return false; // NiP não fornecido
        }
    }
    //validate nif
    public function validateNIF($nif)
    {
        // Verifica se o NIF foi fornecido
        if (!empty($nif)) {
            // Verifica o comprimento do NIF e o primeiro dígito
            if (strlen($nif) == 9 && in_array(substr($nif, 0, 1), ['1', '2'])) {
                return true; // NIF válido
            } else {
                $this->setMsg("NIF inválido.", 'danger');
                return false; // NIF inválido
            }
        } else {
            $this->setMsg("NIF não fornecido.", 'danger');
            return false; // NIF não fornecido
        }
    }

    #validar se o dado é um email
    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($email, FILTER_SANITIZE_EMAIL)) {
            return true;
        } else {
            $this->setMsg(" Email inválido");
            return false;
        }
    }

    #validar email no bd
    public function validateIssetEmail($emailNip, $action = NULL)
    {
        $resultEmail = $this->signUp->getIssetEmail($emailNip);
        if ($action == NULL) {
            if ($resultEmail > 0) {
                $this->setMsg(" EMAIL ou NIP já Cadastrado!");
                return false;
            } else {
                return true;
            }
        } else {
            if ($resultEmail > 0) {
                return true;
            } else {
                $this->setMsg(" Email ou NIP não Cadastrado!");
                return false;
            }
        }
    }
    #validar nip emeil no bd
    public function validateEmailNip($email, $nip, $action = NULL)
    {
        $resultEmail = $this->signUp->getValidateNifEmail($email, $nip);
        if ($action == NULL) {
            if ($resultEmail > 0) {
                $this->setMsg(" EMAIL ou NIP já Cadastrado!");
                return false;
            } else {
                return true;
            }
        } else {
            if ($resultEmail > 0) {
                return true;
            } else {
                $this->setMsg(" Email ou NIP não Cadastrado!");
                return false;
            }
        }
    }
    //validate email
    public function validateEmailFc($email, $nip, $action = NULL)
    {
        $validateEmailFc = $this->fichaCentral->getValidateNifEmail($email, $nip);
        if ($action == NULL) {
            if ($validateEmailFc > 0) {
                $this->setMsg(" EMAIL ou NIP já Cadastrado!");
                return false;
            } else {
                return true;
            }
        } else {
            if ($validateEmailFc > 0) {
                return true;
            } else {
                $this->setMsg(" Email ou NIP não Cadastrado!");
                return false;
            }
        }
    }
    //validate date
    public function validateDate($dataNasc)
    {
        // Verifica se a data de nascimento foi fornecida
        if (!empty($dataNasc) && strlen($dataNasc) === 10) {
            $hoje = new \DateTime();
            $nascimento = \DateTime::createFromFormat('Y-m-d', $dataNasc);
            $idade = $hoje->diff($nascimento)->y; // Calcula a diferença em anos

            // Verifica se a idade é maior ou igual a 18 anos
            if ($idade >= 18 && $idade <= 75) {
                return true;
            } elseif ($idade < 18) {

                $this->setMsg("Você deve ser maior de 18 anos para se cadastrar no Sistema! => $idade Menos de idade ", 'danger');
                return false; // Menor de idade
            } else {

                $this->setMsg("Você deve ter Entre 18 até 75 anos para se Cadastrar no Sistema => $idade idade de Aposentadoria", 'danger');

                return false; // Menor de idade
            }
        } else {
            $this->setMsg($dataNasc . " <=  Data de nascimento não fornecida ou Formato Inválido, Verifique os Campos e tente Novamente!", 'danger');
            return false; // Data de nascimento não fornecida
        }
    }
    #validateNumberPhone
    public function validatePhoneNumber($PhoneNumber)
    {
        if ((trim(strlen($PhoneNumber)) == "9") && (substr(
            $PhoneNumber,
            0,
            1
        ) == "9")) {
            return true;
        } else {
            $this->setMsg(" Número Inválido");
            return false;
        }
    }

    #validate if password correspond with conf password
    public function validateConfSenha($senha, $confSenha)
    {
        if ($senha === $confSenha) {
            return true;
        } else {
            $this->setMsg(" Senhas não Correspondentes!", 'danger');
            return false;
        }
    }

    #validate strong Password
    public function validateStrongPassword($senha, $p = NULL)
    {
        if ($p == NULL) {
            if (strlen($senha) <= 8) {
                $this->setMsg(" Senha Fraca, Deve possuir no minímo 9 caracteres!", 'info');
                return false;
            } elseif (ctype_alpha($senha)) {
                $this->setMsg(" Senha deve possuir caracteres Alfabéticos!", 'info');
                return false;
            } elseif (ctype_digit($senha)) {
                $this->setMsg(" Senha deve possuir caracteres Númericos!", 'info');
                return false;
            } elseif (ctype_alnum($senha)) {
                $this->setMsg(" Senha deve possuir caracteres Alfanuméricos ou Simbolos!", 'info');
                return false;
            } elseif (ctype_upper($senha)) {
                $this->setMsg(" Senha deve possuir caracteres ou letras Maiscúlas!", 'info');
                return false;
            } elseif (ctype_lower($senha)) {
                $this->setMsg(" Senha deve possuir caracteres ou letras Minúsculas!", 'info');
                return false;
            } else {

                return true;
            }
        } else {

            return false;
        }
    }
    #validate hash password at bd
    public function validatePasswordHashDB($email, $senha)
    {
        if ($this->password->verifyHash($email, $senha)) {
            return true;
        } else {
            $this->setMsg("Usuário ou Senha Inválidos!", 'danger');

            return false;
        }
    }
    #validate and email confirmation
    public function validateAtiveUser($email)
    {
        $user = $this->signIn->getUserDatas($email) ?? false;
        if (!empty(isset($user['userDatas']['status'])) == "active") {
            if (strtotime(!empty(isset($user['userDatas']['data_creation']))) <= strtotime(date("Y-m-d H:i:s")) - 432000) {
                $this->setMsg(" Ative o seu cadastro pelo link do seu email!");
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
    //upload de arquivos e usuários
    public function validateUserFileDatas($fileName, $tmpName, $fileSize, $fileError, $path)
    {
        if ((!empty(isset($fileName))) && (!empty(isset($tmpName))) && (!empty(isset($fileSize))) && (!empty(isset($fileError)))  && (!empty(isset($path)))) {

            $existsInvalideFile = false;

            // Tamanho máximo do arquivo permitido (5MB)
            $maxLengthSize = 2 * 1024 * 1024;

            global $extFiles;
            // Validações do arquivo
            if ($fileName == "") {
                $this->setMsg("Necessário selecionar um arquivo para prosseguir com a operação de Upload.");
                $existsInvalideFile = true;
                return false;
            }
            if ($extFiles != 'jpg' && $extFiles != 'jpeg' && $extFiles != 'png') {
                $this->setMsg("Extensão do arquivo " . $fileName . " não permitida! somente permitido: JPG, JPEG, PNG, PDF, ZIP, MP4, MP3");
                $existsInvalideFile = true;

                return false;
                exit();
            } elseif ($fileSize > $maxLengthSize) {
                $this->setMsg("Tamanho do arquivo " . $fileName . " não permitido, no máximo 5MB!");
                $existsInvalideFile = true;
                return false;
                exit();
            } elseif ($fileError) {
                $this->setMsg("Falha ao Enviar o " . $fileName . " arquivo!");
                $existsInvalideFile = true;
                return false;
                exit();
            } else {

                if (!$existsInvalideFile) {
                    if (is_uploaded_file($tmpName)) :
                        if (move_uploaded_file($tmpName, $path)) {

                            return true;
                        } else {
                            $this->setMsg('upload Não Cadastrados');
                            return false;
                        }
                    else :
                        $this->setMsg('Erro ao Carregar Imagem!');
                    endif;
                } else {
                    $this->setMsg('Falha ao Enviar arquivo!');
                    return false;
                }
            }
        } else {
            $this->setMsg('Usuário ou Upload não Realizado com sucesso!');
            return false;
        }
    }


    //------------------Zona Fihca Central --------------------

    //solicitante
    public function validateSolicitante($fichaCentralDatas)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaCentral->SolicitanteFc($fichaCentralDatas)) {
                $this->setMsgSucess('Solicitante Cadastro com Sucesso!');
                // return true;
            } else {
                $this->setMsg('Solicitante Não Cadastrados');
                //  return false;
            }

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //ocorrência Acidente
    public function validateAcidente($fichaCentralDatas)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaCentral->acidentesFc($fichaCentralDatas)) :
                $this->setMsgSucess('Ocorrência do Tipo Acidentes Cadastrado com Sucesso!');
            else :
                $this->setMsg('Ocorrência do Tipo Acidentes Não Cadastrados!');

            endif;

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    public function validateIncendio($fichaCentralDatas)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaCentral->incendioFc($fichaCentralDatas)) :
                $this->setMsgSucess('Ocorrência do Tipo Incêndio Cadastrado com Sucesso!');
            else :
                $this->setMsg('Ocorrência do Tipo Incêndio Não Cadastrados!');

            endif;

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //ocorrência Obstetríco
    public function validateObstetrico($fichaCentralDatas)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaCentral->obstetricoFc($fichaCentralDatas)) :
                $this->setMsgSucess('Ocorrência do Tipo Obstetríco Cadastrado com Sucesso!');
            else :
                $this->setMsg('Ocorrência do Tipo Obstétrico Não Cadastrados!');

            endif;



            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //ocorrência Clínico
    public function validateClinico($fichaCentralDatas)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaCentral->clinicoFc($fichaCentralDatas)) :
                $this->setMsgSucess('Ocorrência do Tipo Clínico Cadastrado com Sucesso!');
            else :
                $this->setMsg('Ocorrência do Tipo Clínico Não Cadastrados!');

            endif;



            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //tipo Ocorrência
    public function validateTipoOcorrencias($tipoOcorrencia)
    {
        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaCentral->tipOcorrencia($tipoOcorrencia)) :
                $this->fichaCentral->LastIdSolicitante($tipoOcorrencia);
                $this->setMsgSucess('Ocorrências Cadastrados com Sucesso!');

            else :
                $this->setMsg('Ocorrências Não Cadastrados!');

            endif;

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }

    //--------------Zona Configurações : orgao de apoio, veiculos, horarios, equipes ---------
    #orgão de apoio
    public function validateOrgaoApoio($orgaoApoio)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->orgaoApoio->orgaoApoio($orgaoApoio)) :
                $this->orgaoApoio->LastIdSolicitante($orgaoApoio);
                $this->setMsgSucess('Orgão de Apoio Cadastrado com Sucesso!');
            else :
                $this->setMsg('Orgão de Apoio Não Cadastrados!');
                $this->orgaoApoio->LastIdSolicitante($orgaoApoio);

            endif;



            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }

    #+++++++++++++++++zona - veiculos++++++++++++++++++++++++++++
    public function validateVeiculos($veiculos)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->veiculos->viaturas($veiculos)) :
                $this->setMsgSucess('Veículo Cadastrado com Sucesso!');
            else :
                $this->setMsg('Veículo Não Cadastrados!');

            endif;

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //-------------zona deleção veiculos----------
    //Deleção singular de usuários
    public function validateDeleteCars($id)
    {
        if (!empty($id)) :
            if ($this->veiculos->getDeleteCars($id) > 0) :
                $this->setMsgSucess("Usuário Deletado com Sucesso!");
                return true;
            else :
                $this->setMsg("Usuário Não Deletado!");
                return false;
            endif;
        endif;
    }
    //deleção Multípla de Usuários
    public function validateDeleteMultCars($idMult)
    {
        if (!empty($idMult)) :
            if ($idMult >= 1) :
                //if($this->veiculos->getDeleteCars($idMult)>0):
                foreach ($idMult as $mul) :
                    $this->veiculos->getDeleteCars($mul);
                endforeach;
                $this->setMsgSucess("Usuários Deletados com Sucesso!");
                return true;
            else :
                $this->setMsg("Usuários Não Deletados!");
                return false;
            endif;

        endif;
    }
    //---------------zona edição de veiculos-----------
    //editar Dados veiculos
    public function validateUpdateCars($CarsFormDatas)
    {
        if ($this->veiculos->getUpdateCars($CarsFormDatas) > 0) :
            $this->setMsgSucess("Dados de veículos ou Viaturas Editado com Sucesso!");
            return true;
        else :
            $this->setMsg("Falha ao Editar os dados das veículos ou Viaturas!");
            return false;
        endif;
    }
    //+++++++++++++++++++++++++++++++++++++++++
    #equipes
    public function validateEquipes($equipes)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->equipes->equipes($equipes)) :
                $this->equipes->LastIdSolicitante($equipes);
                $this->setMsgSucess('Equipe ou Guarnição Cadastrado com Sucesso!');

            else :
                $this->setMsg('Equipe ou Guarnição  Não Cadastrados!');

            endif;

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    #horários Viaturas
    public function validateHorarios($horarios)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->horarios->horarios($horarios)) :
                $this->setMsgSucess('Horários Cadastrado com Sucesso!');
            else :
                $this->setMsg('Horários  Não Cadastrados!');

            endif;



            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //---------------Zona Ficha vítima--------------------------
    #vitima ou paciente
    public function validateVitima($vitima)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaVitima->vitima($vitima)) :
                $this->setMsgSucess('Vitíma ou Paciente Cadastrado com Sucesso!');
            else :
                $this->setMsg('Vitíma ou Paciente  Não Cadastrados!');

            endif;

            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }
    //situação da vítima ou paciente
    public function validateSituacaoVitima($situacaoVitima)
    {

        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->fichaVitima->situacaoVitima($situacaoVitima)) :
                $this->setMsgSucess('Situação da vitíma Cadastrado com Sucesso!');
            else :
                $this->setMsg('Situação da vitíma Não Cadastrados!');

            endif;



            $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
        }
        return $returnResponse;
    }



    #---------------Zona Usuários-----------------------

    // --------------Zona Autenticação-cadastro: validação final, logs...------------------

    #validations end user
    public function validateSignupEnd($fileName, $tmpName, $fileSize, $fileError, $path, $userFormDatas, $userFormData2, $userFormDatas3)
    {
        if (count($this->getMsg()) > 0) {
            $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
        } else {

            if ($this->validateUserFileDatas($fileName, $tmpName, $fileSize, $fileError, $path)) :


                if ($this->signUp->createUsers($userFormDatas, $userFormData2, $userFormDatas3)) {

                    $this->setMsgSucess('Usuário e foto de perfil Cadastrado Com Sucesso!');
                } else {
                    $this->setMsg('usuário e foto Não Cadastrados');
                }
                $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];


            else :
                if ($this->signUp->createUsers($userFormDatas, $userFormData2, $userFormDatas3)) {

                    $this->setMsgSucess('Usuário Cadastrado sem foto de Perfil Com Sucesso!');
                } else {
                    $this->setMsg('usuário e foto Não Cadastrados');
                }
                $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];



            endif;
        }
        return $returnResponse;
    }
    #attempts validations
    public function validateAttemptSignIn()
    {
        if ($this->signIn->attemptCounter() >= 5) {
            $this->attempt = true;
            $this->setMsg(" Você já realizou mais de 5 tentativas!");
        } else {

            $this->attempt = false;
            return true;
        }
    }
    #validation SignInEnd
    public function validateSignInEnd($email)
    {

        if (count($this->getMsg()) > 0) {
            foreach ($this->getMsg() as $v) :
                $this->signIn->insertAttemp($v['message']);
            endforeach;
            $returnResponse = ['returnType' => 'error', 'returnInfo' => $this->getMsg(), 'attempts' => $this->attempt];
        } else {
            $this->signIn->truncateAttempt();
            $this->sessions->setSessions($email);
            $this->setMsgSucess('usuário Logado Com Sucesso!');
            $returnResponse = ['returnType' => 'success', 'page' => 'painel-Admin', 'attempts' => $this->attempt];
        }
        return $returnResponse;
    }
    // -------------validação de Deleção de dados------------------

    //Deleção singular de usuários
    public function validateDeleteUser($id)
    {
        if ((isset($id)) && (!empty($id))) :
            if ($this->signUp->getDeleteUsers($id) > 0) :
                $this->setMsgSucess("Usuário Deletado com Sucesso!");
                return true;
            else :
                $this->setMsg("Usuário Não Deletado!");
                return false;
            endif;
        endif;
    }
    //deleção Multípla de Usuários
    public function validateDeleteMultUser($idMult)
    {
        if (!empty($idMult)) :
            if ($idMult >= 1) :
                //if($this->signUp->getDeleteUsers($idMult)>0):
                foreach ($idMult as $mul) :
                    $this->signUp->getDeleteUsers($mul);
                endforeach;
                $this->setMsgSucess("Usuários Deletados com Sucesso!");
                return true;
            else :
                $this->setMsg("Usuários Não Deletados!");
                return false;
            endif;

        endif;
    }
    //esvaziar tabela de usuários
    public function validateTruncateUsers($tableName)
    {
        if (!empty($tableName)) :
            if ($this->signUp->getTruncateUsers($tableName)) :
                $this->setMsgSucess("Todos Usuários Excluidos com Sucesso do Sistema");
                return true;
            endif;
        else :
            $this->setMsg("Nenhum Usúario excluido do Sistema!");
            return false;
        endif;
    }
    // -------------validação de edição de dados------------------

    //editar Dados Usuários
    public function validateUpdateUsers($userFormDatas, $userFormDatas2)
    {

        if ($this->signUp->getUpdateUsers($userFormDatas, $userFormDatas2) > 0) :
            $this->setMsgSucess("Dados de Usuário Editado com Sucesso!");
            return true;
        else :
            $this->setMsg("Falha ao Editar os do Usuário!");
            return false;
        endif;
    }


    //editar imagem Usuários
    public function validateUpdateImg($fileName, $tmpName, $fileSize, $fileError, $path, $userFormDatas)
    {
        if ($this->validateUserFileDatas($fileName, $tmpName, $fileSize, $fileError, $path)) :

            if ($this->signUp->getUpdateImg($userFormDatas) > 0) :

                foreach ($this->signUp->getAllUsers() as $getAllUsers) :

                    if ((!empty($getAllUsers['foto'])) || ($getAllUsers['foto'] != null) && ($getAllUsers['foto'] != $fileName) && (!empty(($fileName)))) {
                        global $destinaryDirectory, $oldImgUser;
                        $oldImg = $destinaryDirectory . $oldImgUser;
                        if (file_exists($oldImg) && (!empty($fileName))) {
                            unlink($oldImg);
                        }
                    }
                endforeach;

                $this->setMsgSucess("Foto usuário Editado com Sucesso!");

                return true;
            else :
                $this->setMsg("Usuário Não Editado!");
                return false;
            endif;
        else :
            $this->setMsg("Foto usuário não Editado!");

            return false;
        endif;
    }
    //-------++++++++++++++++++++Zona relátorios+++++++++++++++++++++++++
    //relatório final
    //editar Dados Usuários
    public function validateEditerOcorrenciasEnd($userFormDatas)
    {
        if ($this->ocorrencias->getOcorrencesEditer($userFormDatas) > 0) :
            $this->setMsgSucess("Dados de Ocorrência Editado com Sucesso!");
            return true;
        else :
            $this->setMsg("Falha ao Editar os dados da Ocorrência");
            return false;
        endif;
    }

    //Deleção singular de usuários
    public function validateDeleteOcorrencia($id)
    {
        if (!empty($id)) :
            if ($this->ocorrencias->getOcorrencesDeleter($id) > 0) :
                $this->setMsgSucess("ocorrência Deletado com Sucesso!");
                return true;
            else :
                $this->setMsg("ocorrência Não Deletado!");
                return false;
            endif;
        endif;
    }
    //deleção Multípla de Usuários
    public function validateDeleteMultOcorrencias($idMult)
    {
        if (!empty($idMult)) :
            if ($idMult >= 1) :
                //if($this->signUp->getDeleteUsers($idMult)>0):
                foreach ($idMult as $mul) :
                    $this->ocorrencias->getOcorrencesDeleter($mul);
                endforeach;
                $this->setMsgSucess("ocorrência Deletados com Sucesso!");
                return true;
            else :
                $this->setMsg("ocorrência Não Deletados!");
                return false;
            endif;

        endif;
    }

    public function validateDeleteHorarios($id)
    {
        if (!empty($id)) :
            if ($this->horarios->horarios($id) > 0) :
                $this->setMsgSucess("Horários Deletado com Sucesso!");
                return true;
            else :
                $this->setMsg("Usuário Não Deletado!");
                return false;
            endif;
        endif;
    }
    //deleção Multípla de Usuários
    public function validateDeleteMultHorarios($idMult)
    {
        if (!empty($idMult)) :
            if ($idMult >= 1) :
                //if($this->veiculos->getDeleteCars($idMult)>0):
                foreach ($idMult as $mul) :
                    $this->horarios->getHorariosDeleter($mul);
                endforeach;
                $this->setMsgSucess("Horários Deletados com Sucesso!");
                return true;
            else :
                $this->setMsg("Usuários Não Deletados!");
                return false;
            endif;

        endif;
    }
}


    /*  modelo
        public function validate($)
        {
    
            if (count($this->getMsg()) > 0) {
                $returnResponse = ['returnType' => 'msgError', 'returnInfo' => $this->getMsg()];
            } else {
              
                if( $this->$)):
                    $this->setMsgSucess('Cadastrado com Sucesso!');
                else:
                    $this->setMsg(' Não Cadastrados!');

                endif;
       
    
    
                $returnResponse = ['returnType' => 'msgSuccess', 'returnInfo' => NULL];
            }
            return $returnResponse;
        } */
