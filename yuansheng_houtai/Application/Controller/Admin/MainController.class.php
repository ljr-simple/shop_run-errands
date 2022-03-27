<?php
namespace Controller\Admin;
class MainController extends BaseController{
    public function MainAction() {
        //加载视图
        $this->smarty->assign('name',$_SESSION);
        $this->smarty->display('main.html');
    } 
}