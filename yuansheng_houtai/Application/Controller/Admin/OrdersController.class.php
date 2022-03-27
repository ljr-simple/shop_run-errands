<?php
namespace Controller\Admin;
//商品模块
class OrdersController extends BaseController{
    //获取商品列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('orders');
        $list=$model->select();
        //加载视图
        //require __VIEW__.'products_list.html';
        $this->smarty->assign('list',$list);
        $this->smarty->display('orders_list.html');
    }
    //删除订单
    public function delAction() {
        $id=(int)$_GET['oid'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('orders');
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Orders&a=list', '删除成功');
        else 
            $this->error('index.php?p=admin&c=Orders&a=list', '删除失败');
    }
}




