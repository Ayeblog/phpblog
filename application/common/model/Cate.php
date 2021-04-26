<?php

namespace app\common\model;
use app\common\validate\CateValidate;
use think\Model;
use traits\model\SoftDelete;

class Cate extends Model
{

    //关联Article
    public function article(){
        return $this->hasMany('Article','cate_id','id');
    }
    //列表添加
    public function add($data){
        $validate = new CateValidate();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }else{
            $result = model('Cate')->allowField(true)->save($data);
            if($result){
                return 1;
            }else{
                return "添加失败";
            }
        }
    }

    //列表排序
    public function sort($data){
        $validate = new CateValidate();
        if(!$validate->scene('sort')->check($data)){
            return $validate->getError();
        }else{
            $cateInfo = $this->find($data['id']);
            $cateInfo->sort = $data['sort'];
            $result = $cateInfo->save();
            if($result){
                return 1;
            }
            else{
                return "模型层失败";
            }
        }
    }

    //列表编辑
    public function edit($data){
        $validate = new CateValidate();
        if(!$validate->scene('name')->check($data)){
            return $validate->getError();
        }
            $cateInfo = model('Cate')->find($data['id']);
            $cateInfo->catename = $data['catename'];
            $result = $cateInfo->save();
            if($result){
                return 1;
            }else{
                return "更新失败";
            }
    }
}