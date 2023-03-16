<?php
namespace Controller\Admin;
//文章模块
class ArticlesController extends BaseController{
    //获取文章列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('articles');
        $list=$model->select();
        //加载视图
        //require __VIEW__.'article_list.html';
        $this->smarty->assign('list',$list);
        $this->smarty->display('article_list.html');
    }
     //删除文章
     public function delAction() {
        $id=(int)$_GET['article_id'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('articles');
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Articles&a=list', '删除成功');
        else 
            $this->error('index.php?p=Admin&c=Articles&a=list', '删除失败');
    }
    //添加文章
    public function addAction(){
        $model_cats=new \Core\Model('cats');
        $list_cats=$model_cats->select();
        $_SESSION['list_cats'] = $list_cats;
        // var_dump($list_cats);
        // exit;
        // $this->smarty->assign('list_cats',$list_cats);
        if(!empty($_POST)){
            $model=new \Core\Model('articles');
            $_POST['article_btime']=date('Y-m-d H:i:s', time());
            $_POST['article_etime']=date('Y-m-d H:i:s', time());
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Articles&a=list', '插入成功');
            else
                $this->error ('index.php?p=Admin&c=Articles&a=add', '插入失败');
        }
        require __VIEW__.'article_add.html';
    }
    //修改文章
    public function editAction(){
        $id=(int)$_GET['article_id'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('articles');
        if(!empty($_POST)){
            $_POST['article_id']=$id;
            $_POST['article_etime']=date('Y-m-d H:i:s', time());
            if($model->update($_POST))
                $this->success ('index.php?p=Admin&c=Articles&a=list', '修改成功');
            else
             $this->error ('index.php?p=Admin&c=Articles&a=edit&article_id='.$id, '修改失败');
        }
        $info=$model->find($id);
        require __VIEW__.'articles_edit.html';
    }

}