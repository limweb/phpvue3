<?php

class JwtController extends BaseController 
{
    public function __construct() {
        parent::__construct();
        //--your jwt validate 
        var_dump('--jwtcontroller--'); // ไว้ทดสอบการเรียก
        $jwt = new Jwt();
        $token = $jwt->getTokenString();
        echo '----------token value: ' . $token . chr(10);
        if($jwt->verify($token)) {
            echo 'Success' . chr(10);
        } else {
            echo 'Failed' . chr(10);
        }
    }
    
}
