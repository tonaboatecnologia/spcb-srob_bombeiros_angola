<?php

namespace Src\Traits;
class TraitGetIp
{
    #fetch user IP with security
    public static function getUserIp()
    {
        $ipAddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipAddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_x_FORWARDED_FOR'))
            $ipAddress =  getenv('HTTP_x_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipAddress =  getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipAddress =  getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipAddress =  getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipAddress =  getenv('REMOTE_ADDR');
        else
            $ipAddress = 'UNKNOW';
        return $ipAddress;
    }
}
