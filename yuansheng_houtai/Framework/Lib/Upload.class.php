<?php
namespace Lib;
class Upload{
    private $path;  //上传的路径
    private $size;  //上传的大小
    private $type;  //允许上传的类型
    private $error; //保存错误信息
    
    public function __construct($path,$size,$type) {
        $this->path=$path;
        $this->size=$size;
        $this->type=$type;
    }
    //返回错误信息
    public function getError(){
        return $this->error;
    }
    /*
     * 文件上传
     * @param $files array $_FILES[]
     * @return bool|string 成功返回文件路径，失败返回false
     */
    public function uploadOne($files){
        if($this->checkError($files)){  //没有错误就上传
            $foldername=date('Y-m-d');		//文件夹名称
            $folderpath= $this->path.$foldername;	//文件夹路径
            if(!is_dir($folderpath))
                mkdir($folderpath);
            $filename=uniqid('',true).strrchr($files['name'],'.');//文件名
            $filepath="$folderpath/$filename";	//文件路径
            if(move_uploaded_file($files['tmp_name'],$filepath))
                return "{$foldername}/{$filename}";
            else{
                $this->error='上传失败<br>';
                return false;
            }
        }
        return false;
    }
    //验证上传是否有误
    private function checkError($files){
        //1、验证错误号
        if($files['error']!=0){
            switch($files['error']) {
                case 1:
                    $this->error='文件大小超过了php.ini中允许的最大值,最大值是：'.ini_get('upload_max_filesize');
                    return false;
                case 2:
                    $this->error='文件大小超过了表单允许的最大值';
                    return false;
                case 3:
                    $this->error='只有部分文件上传';
                    return false;
                case 4:
                    $this->error='没有文件上传';
                    return false;
                case 6:
                    $this->error='找不到临时文件';
                    return false;
                case 7:
                   $this->error='文件写入失败';
                    return false;
                default:
                   $this->error= '未知错误';
                    return false;
            }
        }
        //2、验证格式
	$info=finfo_open(FILEINFO_MIME_TYPE);
	$mime=finfo_file($info,$files['tmp_name']);
	if(!in_array($mime, $this->type)){
            $this->error='只能上传'.implode(',', $this->type).'格式';
            return false;
	}
	//3、验证大小
	if($files['size']> $this->size){
            $this->error='文件大小不能超过'.number_format($this->size/1024,1).'K';
            return false;
	}
	//4、验证是否是http上传
	if(!is_uploaded_file($files['tmp_name'])){
            $this->error='文件不是HTTP POST上传的<br>';
            return false;
        }
        return true;
    }
}

