<?php

#Informações Corporativas 
define('DEVNAME', 'Ricardo Massungui');
define('DEVSKILL', 'Software Engineer');
define('DEVPROJECTNAME', 'spcb - Sistema de Gestão e controle de Registro de Ocorrências');
define('DEVCOMPANY', 'https://candimbatecnologia.ao');
define('DEVFOLIO', 'https://ricardomassungui.com');
define('DEVFUNDATION', 'https://bantuangoafricasoft.com');
define('DEVGITHUB', 'https://ricardomassungui.github.ao');

# Arquivos Directórios Raízes
$PastaInterna = "spcb/";

# Lógica pra pegar a URL do Sistema.
# Caminho da URL do Sistema.
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

# Lógica pra fazer requisições dos arquivos no Servidor.
# Caminho Absoluto Fisíco do sistema no servidor.
if(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/'){
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
}else{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
}

# Directórios Espécificos 

#administrativo
define('DIRADMINCSS', DIRPAGE."public/assets/css/");
define('DIRADMINJS', DIRPAGE."public/assets/js/");
define('DIRADMINIMG', DIRPAGE."public/assets/images/");
define('DIRADMINFONTS', DIRPAGE."public/assets/fonts/");
define('DIRADMINPLUGINS', DIRPAGE."public/assets/plugins/");
define('DIRADMINSCSS', DIRPAGE."public/assets/scss/");
define('DIRADMINICON', DIRPAGE."public/assets/icon/");
define('DIRADMINPAGES', DIRPAGE."public/assets/pages/");
define('DIRADMINVENDOR', DIRPAGE."public/assets/vendor/");
define('DIRADMINUPLOADS', DIRPAGE."public/assets/uploads/");


# Database Settings
define('HOST', "localhost");
define('DBNAME', "spcb");
define('USER', "root");
define('PASSWORD', "");


# Location Settings
$TimeZone = new DateTimeZone("Africa/Luanda");
$LocationInfo = $TimeZone->getLocation();
define('COUNTRYCODE',$LocationInfo['country_code']);
define('LATITUDE',$LocationInfo['latitude']);
define('LONGITUDE',$LocationInfo['longitude']);
define('LOCALIZATION',$TimeZone->getName());
define('DATATIME', date('l, j \d\e F \d\e Y h:i:s'));
define('DATE', date('d-m-Y-h:i:s'));

#Email Settings
/*
define();
define();
define();
define();*/

# Other settings

define("DOMAIN", $_SERVER["HTTP_HOST"]);






