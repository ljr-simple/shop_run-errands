<?php
namespace Lib;
class Image{
    /*
     * 制作缩略图
     * @param $src_path 源图的路径   比如：./Public/Uploads/2019-07-01/aa.jpg
     */
    public function thumb($src_path,$prefix='small_',$w=200,$h=200){
        $dst_img=imagecreatetruecolor($w,$h);   //目标图
        $src_img=imagecreatefromjpeg($src_path);    //源图
        $src_w=imagesx($src_img);
        $src_h=imagesy($src_img);
        imagecopyresampled($dst_img,$src_img,0,0,0,0,$w,$h,$src_w,$src_h);
        $filename=basename($src_path);  //文件名    aa.jpg
        $foldername=substr(dirname($src_path),-10); //目录名  2019-07-01
        $save_path= dirname($src_path).'/'.$prefix.$filename;   //  ./Public/Uploads/2019-07-01/small_aa.jpg
        imagejpeg($dst_img,$save_path);
        return "{$foldername}/{$prefix}{$filename}";    //2019-07-01/small_aa.jpg
    }
}
