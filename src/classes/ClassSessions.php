<?php
namespace Src\Classes;
use App\Models;
use Src\Traits\TraitGetIp;

class ClassSessions
{
    private $signIn;
    private $timeSession = 3600; // Tempo de sessão em segundos
    private $timeCanary = 300; // Tempo do canário em segundos

    public function __construct()
    {
        if (session_id() == '') {
            ini_set("session.save_handler", "files");
            ini_set("session.use_cookies", 1);
            ini_set("session.use_only_cookies", 1);
            ini_set("session.cookie_domain", DOMAIN);
            ini_set("session.cookie_httponly", 1);
            if (DOMAIN != "localhost") {
                ini_set("session.cookie_secure", 1);
            }

            #sessions criptografy
            ini_set("session.entropy_length", 512);
            ini_set("session.entropy_file", '/dev/urandom');
            ini_set("session.hash_function", 'sha256');
            ini_set("session.hash_bits_per_character", 5);
  
        }

        $this->signIn = new Models\LoginAdminModel();
    }

    public function setSessionCanary(): void
    {
        session_regenerate_id();
        $_SESSION['canary'] = [
            "birth" => time(),
            "ip" => TraitGetIp::getUserIp(),
        ];
    }

    public function verifyIdSessions(): void
    {
        if (!isset($_SESSION['canary']) || $_SESSION['canary']['ip'] !== TraitGetIp::getUserIp() || $_SESSION['canary']['birth'] < time() - $this->timeCanary) {
            $this->destroySessions();
            $this->setSessionCanary();
        }
    }

    public function setSessions($email): void
    {
        $this->verifyIdSessions();
        $_SESSION['login'] = true;
        $_SESSION['time'] = time();
        $userData = $this->signIn->getUserDatas($email)['userDatas'];
        $_SESSION['name'] = $userData['nome'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['permition'] = $userData['permissao'];
        $_SESSION['cargo'] = $userData['cargo'];
        $_SESSION['patente'] = $userData['patente'];
    }

    public function verifyInsideSessions($permission): void
    {
        if (!isset($_SESSION['login']) || !isset($_SESSION['permition']) || !isset($_SESSION['canary'])) {
            $this->destroySessions();
            echo "<script>alert('Você não está logado!'); window.location.href='" . DIRPAGE . "login';</script>";
            exit();
        }else{

            if ($_SESSION['time'] >= time() - $this->timeSession) {
                $_SESSION['time'] = time();
                if ($_SESSION['permition'] !== "admin" && $permission !== $_SESSION['permition']) {
                    echo "<script>alert('Você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('sua sessão expirou! Realize o login Novamente.'); window.location.href='" . DIRPAGE . "login';</script>";
                $this->destroySessions();
                exit();
            }
        }
    }
     #destructor sessions
     public function destroySessions(): void
     {
         foreach (array_keys($_SESSION) as $k) {
           // session_destroy(); 
            unset($_SESSION[$k]);
            $_SESSION = [];
            
         }
     }

 
}
