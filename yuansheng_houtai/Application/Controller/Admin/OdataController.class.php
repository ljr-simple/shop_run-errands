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
    
    public function showAction(){
        $model=new \Core\Model('orders');
        $list=$model->select();
        $dailyAmountMap = array();
        foreach ($list as $order) {
        $date = date('Y-m-d', strtotime($order['Otime'])); // 获取订单日期
        // print_r($date);
        if (!isset($dailyAmountMap[$date])) {
            $dailyAmountMap[$date] = 0;
        }
        $dailyAmountMap[$date] += $order['Ototal_Amount']; // 累加订单金额
    }
    // exit;
    header('Content-Type: application/json');
    echo json_encode($dailyAmountMap,true);
    }
}




