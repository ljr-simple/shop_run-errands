<?php
namespace Controller\Admin;
//商品模块
class ProductsController extends BaseController{
    //获取商品列表
    public function listAction() {
        //实例化模型
        $model=new \Model\ProductsModel();
        $list=$model->select();
        //加载视图
        //require __VIEW__.'products_list.html';
        $this->smarty->assign('list',$list);
        $this->smarty->display('products_list.html');
    }
    //删除商品
    public function delAction() {
        $id=(int)$_GET['proid'];	//如果参数明确是整数，要强制转成整形
        $model=new \Model\ProductsModel();
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Products&a=list', '删除成功');
        else 
            $this->error('index.php?p=admin&c=Products&a=list', '删除失败');
    }
    //添加商品
    public function addAction(){
        if(!empty($_POST)){
            $model=new \Core\Model('products');
            $path=$GLOBALS['config']['app']['path'];
            $size=$GLOBALS['config']['app']['size'];
            $type=$GLOBALS['config']['app']['type'];
            $upload=new \Lib\Upload($path, $size, $type);
            if($filepath=$upload->uploadOne($_FILES['PIMG'])){
                //生成缩略图
                $image=new \Lib\Image();
                $_POST['PIMG']=$image->thumb($path.$filepath,'s1_');
            }else{
                $this->error('index.php?p=Admin&c=Products&a=add', $upload->getError());
            }
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Products&a=list', '插入成功');
            else
                $this->error ('index.php?p=Admin&c=Products&a=add', '插入失败');
        }
        require __VIEW__.'products_add.html';
    }
    //修改商品
    public function editAction(){
        $proid=$_GET['proid'];  //需要修改的商品id
        $model=new \Core\Model('products');
        $info=$model->find($proid);
        //执行修改逻辑
        if(!empty($_POST)){
            $path=$GLOBALS['config']['app']['path'];
            $size=$GLOBALS['config']['app']['size'];
            $type=$GLOBALS['config']['app']['type'];
            $upload=new \Lib\Upload($path, $size, $type);
            if($filepath=$upload->uploadOne($_FILES['PIMG'])){
                //生成缩略图
                $image=new \Lib\Image();
                $_POST['PIMG']=$image->thumb($path.$filepath,'s1_');
            }else{
                $_POST['PIMG']=$info['PIMG'];
                // $this->error('index.php?p=Admin&c=Products&a=edit', $upload->getError());
            }
            $_POST['Pid']=$proid;
            if($model->update($_POST))
                $this->success ('index.php?p=Admin&c=Products&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=Products&a=edit&proid='.$proid, '修改失败');
        }
        //显示商品
        require __VIEW__.'products_edit.html';
    }
    //回收站
    public function recycleAction() {
        //实例化模型
        $model=new \Model\ProductsModel();
        $choose = [
            'Pstatus' => ['eq','0']
        ];
        $list=$model->select($choose);
        //加载视图
        //require __VIEW__.'products_list.html';
        $this->smarty->assign('list',$list);
        $this->smarty->display('recycle_list.html');
    }
}




