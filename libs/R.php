<?php

class R{
    protected $r = [];
    protected $s = null;
    protected $i = 'PATH_INFO';
    public $_404 = BASEPATH ."/dev.html";

    public function __construct() {
        $this->s=$_SERVER;
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        if($this->s['REQUEST_METHOD'] == 'OPTIONS'){
            return true;
        }
        if(PRODUCTION){
            $this->_404 = BASEPATH.'/dist/index.html';
        }

    }

    public function route($r,callable $c){
        $this->r[$r]=$c;
    }

    public function addClass(){

    }

    public function exec(){ 
        $p=isset($this->s[$this->i])?$this->s[$this->i]:'/';
        if(isset($this->r[$p])){
            $c = new $this->r[$p][0]();
            $c->{$this->r[$p][1]}();
        } else {
            include $this->_404;
        }
    }
    public function set404($path){
        $this->_404 = $path;
    }
}