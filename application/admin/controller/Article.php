<?php

namespace app\admin\controller;

use think\Controller;

class Article extends Controller
{
    //文章列表
    public function list1(){
        $cates = model('Article')->with('cate')->order(['is_top'=>'desc','create_time'=>'asc'])->paginate(10);
        $viewData = [
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }

    //文章添加
    public function add(){
        $cates = model('Cate')->select();
        $viewData = [
            'cates' => $cates,
        ];
        $this->assign($viewData);
        if(request()->isAjax()){
            $data = [
                'title' => input('post.title'),
                'tags' => input('post.tags'),
                'is_top' => input('post.is_top',0),
                'desc' => input('post.desc'),
                'content' => input('post.content'),
                'cate_id' => input('post.cateid')
            ];
        $result = model('Article')->add($data);
        if($result==1){
            $this->success('添加成功','admin/article/list1');
        }
        else{
            $this->error($result);
        }
        }
        return view();
    }

    //推荐
    public function rec(){
        $data = [
            'is_top' => input('post.is_top')? 0 :1 ,
            'id' => input('post.id')
        ];
       $result = model('Article')->rec($data);
       if($result==1){
           $this->success('操作成功','admin/article/list1');
       }else{
           $this->error($result);
       }
    }

    //编辑
    public function edit(){
        $articleInfo = model('Article')->find(input('id'));
        $cates = model('Cate')->select();
        $viewData = [
            'articleInfo' => $articleInfo,
            'cates' => $cates
        ];
        $this->assign($viewData);
        if(request()->isAjax()){
            $data = [
                'title' => input('post.title'),
                'des' => input('post.des'),
                'tags' => input('post.tags'),
                'content' => input('post.content'),
                'is_top' => input('post.is_top',0),
                'id' => input('post.id'),
                'cate_id' => input('post.cateid')
            ];
           $result =  model('Article')->edit($data);
           if($result==1){
               $this->success('编辑成功','admin/article/list1');
           }else{
               $this->error($result);
           }
        }
        return view();
    }

    //删除
    public function del(){
        $articleInfo = model('Article')->find(input('post.id'));
        $result = $articleInfo->delete($data);
        if($result==1){
            $this->success('删除成功','admin/article/list1');
        }else{
            $this->error($result);
        }
    }
}
