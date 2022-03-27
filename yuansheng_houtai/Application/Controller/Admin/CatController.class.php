<?php
namespace Controller\Admin;
//分类模块
class CatController extends BaseController{
    //获取分类列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('cats');
        $list=$model->select();
        //加载视图
        //require __VIEW__.'cat_list.html';
        $this->smarty->assign('list',$list);
        $this->smarty->display('cat_list.html');
    }
     //分类文章
     public function delAction() {
        $id=(int)$_GET['c_id'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('cats');
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Cat&a=list', '删除成功');
        else 
            $this->error('index.php?p=Admin&c=Cat&a=list', '删除失败');
    }
    //添加分类
    public function addAction(){
        if(!empty($_POST)){
            $model=new \Core\Model('cats');
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Cat&a=list', '插入成功');
            else
                $this->error ('index.php?p=Admin&c=Cat&a=add', '插入失败');
        }
        require __VIEW__.'cat_add.html';
    }
    public function editAction(){
        $c_id=$_GET['c_id'];  //需要修改的用户id
        $model=new \Core\Model('cats');
        //执行修改逻辑
        if(!empty($_POST)){
            $_POST['c_id']=$c_id;
            if($model->update($_POST))
                $this->success ('index.php?p=Admin&c=cat&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=cat&a=edit&c_id='.$c_id, '修改失败');
        }
        //显示用户
        $info=$model->find($c_id);
        $this->smarty->assign('info',$info);
        // print_r($info);
        $this->smarty->display('cat_edit.html');
    }
}