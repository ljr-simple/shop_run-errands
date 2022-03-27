<?php
namespace Controller\Admin;
//商品模块
class UsersController extends BaseController{
    //获取用户列表
    public function listAction() {
        //实例化模型
        $model=new \Model\UserModel();
        $list=$model->select();
        //加载视图
        //require __VIEW__.'user_list.html';
        // print_r($_SESSION);
        // echo $_SESSION['user']['user_name'];
        $this->smarty->assign('list',$list);
        $this->smarty->display('user_list.html');
    }
     //删除用户
     public function delAction() {
        $id=(int)$_GET['user_id'];	//如果参数明确是整数，要强制转成整形
        $model=new \Model\UserModel();
        if($model->delete($id))
            $this->success('index.php?p=Admin&c=Users&a=list', '删除成功');
        else 
            $this->error('index.php?p=Admin&c=Users&a=list', '删除失败');
    }
    //添加用户
    public function addAction(){
        if(!empty($_POST)){
            $model=new \Core\Model('User');
            if($model->insert($_POST))
                $this->success ('index.php?p=Admin&c=Users&a=list', '插入成功');
            else
                $this->error ('index.php?p=Admin&c=Users&a=add', '插入失败');
        }
        require __VIEW__.'user_add.html';
    }
    //修改用户
    public function editAction(){ 
        $user_id=$_GET['user_id'];  //需要修改的用户id
        $model=new \Core\Model('user');
        $info=$model->find($user_id);
        //执行修改逻辑
        if(!empty($_POST)){
            $path=$GLOBALS['config']['app']['path'];
            $size=$GLOBALS['config']['app']['size'];
            $type=$GLOBALS['config']['app']['type'];
            $upload=new \Lib\Upload($path, $size, $type);
            if($filepath=$upload->uploadOne($_FILES['face'])){
                //生成缩略图
                $image=new \Lib\Image();
                $_POST['user_face']=$image->thumb($path.$filepath,'s1_');
            }else{ 
                $_POST['user_face']=$info['user_face'];
                // $this->error('index.php?p=Admin&c=Users&a=edit', $upload->getError());
            }
            $_POST['user_id']=$user_id;
            $_POST['user_pwd']=md5(md5($_POST['user_pwd']).$GLOBALS['config']['app']['key']);
            if($model->update($_POST))
                $this->success ('index.php?p=Admin&c=Users&a=list', '修改成功');
            else
                $this->error ('index.php?p=Admin&c=Users&a=edit&user_id='.$user_id, '修改失败');
        }
        //显示用户
        // print_r($info);
        $this->smarty->assign('info',$info);
        $this->smarty->display('user_edit.html');
    }
}