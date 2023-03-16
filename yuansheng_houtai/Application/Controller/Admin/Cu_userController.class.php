<?php
namespace Controller\Admin;
//商品模块
class Cu_userController extends BaseController{
    //获取用户列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('cu_user');
        $list=$model->select();
        //加载视图
        //require __VIEW__.'user_list.html';
        // print_r($_SESSION);
        // echo $_SESSION['user']['user_name'];
        $this->smarty->assign('list',$list);
        $this->smarty->display('cu_user_list.html');
    }
     //删除用户
     public function delAction() {
        $id=(int)$_GET['Uid'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('cu_user');
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=cu_user&a=list', '删除成功');
        else 
            $this->error('index.php?p=Admin&c=cu_user&a=list', '删除失败');
    }
    //添加用户
    // public function addAction(){
    //     if(!empty($_POST)){
    //         $model=new \Core\Model('cu_user');
    //         if($model->insert($_POST))
    //             $this->success ('index.php?p=Admin&c=cu_user&a=list', '插入成功');
    //         else
    //             $this->error ('index.php?p=Admin&c=cu_user&a=add', '插入失败');
    //     }
    //     require __VIEW__.'cu_user_add.html';
    // }
    //修改用户
    public function editAction(){ 
        $Uid=$_GET['Uid'];  //需要修改的用户id
        $model=new \Core\Model('cu_user');
        $info=$model->find($Uid);
        //执行修改逻辑
        if(!empty($_POST)){
            $_POST['Uid']=$Uid;
            if($model->update($_POST))
                $this->success ('index.php?p=Admin&c=cu_user&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=cu_user&a=edit&Uid='.$Uid, '修改失败');
        }
        //显示用户
        // print_r($info);
        $this->smarty->assign('info',$info);
        $this->smarty->display('cu_user_edit.html');
    }
}