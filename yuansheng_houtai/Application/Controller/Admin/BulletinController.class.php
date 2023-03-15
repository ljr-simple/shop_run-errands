<?php
namespace Controller\Admin;
//分类模块
class BulletinController extends BaseController{
    //获取分类列表
    public function listAction() {
        //实例化模型
        $model=new \Core\Model('carousel');
        $list=$model->select();
        //加载视图
        $this->smarty->assign('list',$list);
        $this->smarty->display('bulletin_list.html');
    }
     //分类文章
     public function delcAction() {
        $id=(int)$_GET['ca_id'];	//如果参数明确是整数，要强制转成整形
        $model=new \Core\Model('carousel');
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Bulletin&a=list', '删除成功');
        else 
            $this->error('index.php?p=Admin&c=Bulletin&a=list', '删除失败');
    }
    //修改轮播图
    public function editcAction(){
        $caid=$_GET['ca_id'];  //需要修改的轮播图id
        $model=new \Core\Model('carousel');
        $info=$model->find($caid);
        //执行修改逻辑
        if(!empty($_POST)){
            $path=$GLOBALS['config']['app']['path'];
            $size=$GLOBALS['config']['app']['size'];
            $type=$GLOBALS['config']['app']['type'];
            $upload=new \Lib\Upload($path, $size, $type);
            if($filepath=$upload->uploadOne($_FILES['ca_img'])){
                //生成缩略图
                $image=new \Lib\Image();
                $_POST['ca_img']=$image->thumb($path.$filepath,'s1_');
            }else{
                $_POST['ca_img']=$info['ca_img'];
            }
            $_POST['ca_id']=$caid;
            if($model->update($_POST))
                $this->success ('index.php?p=Admin&c=Bulletin&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=Bulletin&a=edit&proid='.$caid, '修改失败');
        }
        require __VIEW__.'bulletin_editc.html';
    }
    //修改公告内容
    public function editgAction(){
        if(!empty($_POST)){
            $model=new \Core\Model('bulletin');
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Bulletin&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=Bulletin&a=editg', '修改失败');
        }
        require __VIEW__.'bulletin_editg.html';
    }
}