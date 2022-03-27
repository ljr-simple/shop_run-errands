<?php
//基础控制器
namespace Core;
class Controller{
    protected $smarty;
    use \Traits\Jump;
    
    public function __construct() {
        $this->initSession();
        $this->initSmarty();
    }
    //初始化session
    private function initSession(){
        new \Lib\Session();
    }
    //初始化Smarty
    private function initSmarty(){
        $this->smarty=new \Smarty();
        $this->smarty->setTemplateDir(__VIEW__);
        $this->smarty->setCompileDir(__VIEWC__);
    }
}

