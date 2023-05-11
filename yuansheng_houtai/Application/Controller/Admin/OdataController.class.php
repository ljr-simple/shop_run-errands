<?php
namespace Controller\Admin;
//商品模块
class OdataController extends BaseController{
    //获取商品列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('orders');
        $list=$model->select();
        //加载视图
        //require __VIEW__.'products_list.html';
        $this->smarty->assign('list',$list);
        $this->smarty->display('odata.html');
    }
    
}




