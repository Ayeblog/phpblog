<?php

namespace app\common\model;
use app\common\validate\ArticleValidate;
use think\Model;

class Article extends Model
{
    public function comment(){
        return $this->hasMany('Comment','article_id','id');
    }
    //关联模型
    public function cate(){
        return $this->belongsTo('Cate','cate_id','id');
    }
    //列表
    public function list1(){
    }
    //添加
    public function add($data){
        $validate = new ArticleValidate();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        } else {
            return $result;
        }

    }

    //推荐操作
    public function rec($data){
        $validate = new ArticleValidate();
        if(!$validate->scene('rec')->check($data)){
            return $validate->getError();
        }
        $ArticleInfo = model('Article')->find($data['id']);
        $ArticleInfo->is_top = $data['is_top'];
        $result = $ArticleInfo->save();
        if($result){
            return 1;
        }else{
            return "操作失败";
        }
    }

    public function edit($data){
        $validate = new ArticleValidate();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $articleInfo = $this->find($data['id']);
        $articleInfo->title = $data['title'];
        $articleInfo->tags = $data['tags'];
        $articleInfo->des = $data['des'];
        $articleInfo->content = $data['content'];
        $articleInfo->is_top = $data['is_top'];
        $articleInfo->cate_id = $data['cate_id'];
        $result = $articleInfo->save();
        if($result){
            return 1;
        }else{
            return "编辑失败";
        }
     }
}
