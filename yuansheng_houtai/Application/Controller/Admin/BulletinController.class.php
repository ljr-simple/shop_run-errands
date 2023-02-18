<?php
namespace Controller\Admin;
//分类模块
class BulletinController extends BaseController{
    //获取分类列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('bulletin');
        $list=$model->select();
        //加载视图
        $this->smarty->assign('list',$list);
        $this->smarty->display('bulletin_list.html');
    }
     //分类文章
     public function delAction() {
        $id=(int)$_GET['bu_id'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('bulletin');
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Bulletin&a=list', '删除成功');
        else 
            $this->error('index.php?p=Admin&c=Bulletin&a=list', '删除失败');
    }
    //修改轮播图
    public function editcAction(){
        if(!empty($_POST)){
            $model=new \Core\Model('Carousel');
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Bulletinat&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=Bulletin&a=edit', '修改失败');
        }
        require __VIEW__.'bulletin_editc.html';
    }
    //修改公告内容
    public function editgAction(){
        if(!empty($_POST)){
            $model=new \Core\Model('Carousel');
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Bulletinat&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=Bulletin&a=edit', '修改失败');
        }
        require __VIEW__.'bulletin_editg.html';
    }
}