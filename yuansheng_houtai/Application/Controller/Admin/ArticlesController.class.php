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
    //返回帖子阅读量
    public function showAction(){
        $model=new \Core\Model('articles');
        $list=$model->select();
        $cartAmountMap = array();
        foreach ($list as $article) {
            $name = $article['article_name'];    //获取帖子名称                       
            // print_r($date);
            if (!isset($cartAmountMap[$name])) {
                $cartAmountMap[$name] = 0;
            }
            $cartAmountMap[$name] += $article['article_counts']; // 累加帖子浏览量
        }
        // exit;
        header('Content-Type: application/json');
        echo json_encode($cartAmountMap,true);
    }

    //返回帖子分类
    public function cartshowAction(){
        //获取article分类
        $model=new \Core\Model('articles');
        $list=$model->select();
        $cartAmountMap = array();
        foreach ($list as $article) {
            $cid = $article['article_cid'];    //获取帖子分类ID                      
            // print_r($date);
            if (!isset($cartAmountMap[$cid])) {
                $cartAmountMap[$cid] = 0;
            }
            $cartAmountMap[$cid] += 1; // 累加帖子分类数
        }

        //获取cats分类
        $model=new \Core\Model('cats');
        $cats=$model->select();


        // exit;
        header('Content-Type: application/json');
        echo json_encode($cartAmountMap,true);
    }

    public function dataAysAction(){
        $model = new \Core\Model('articles');
        $this->smarty->display('article_show.html');
    }

}