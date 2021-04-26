<?php

namespace app\admin\controller;

use think\Controller;

class Cate extends Controller
{
    //项目列表
    public function list1(){
        $cates = model('Cate')->order('sort','ASC')->paginate('10');
        $this->assign('cate',$cates);
        return view();
    }

    //项目添加
    public function add(){
        if(request()->isAjax()){
            $data = [
                'catename' => input('post.catename'),
                'sort' => input('post.sort')
            ];
            $result = model('Cate')->add($data);
            if($result == 1){
                $this->success('添加成功','admin/cate/list1');
            }
            else{
                $this->error($result);
            }
        }
        return view();
    }

    //列表排序
    public function sort(){
        $data = [
            'id' => input('post.id'),
            'sort' => input('post.sort')
        ];
        $result = model('Cate')->sort($data);
        if($result == 1){
            $this->success('排序成功','admin/cate/list1');
        }else{
            $this->error($result);
        }
    }

    //列表编辑
    public function edit()
    {
        if(request()->isAjax()){
            $data = [
                'catename' => input('post.catename'),
                'id' => input('post.id')
             ];
            $result = model('Cate')->edit($data);
         if ($result == 1) {
             $this->success('更新完成', 'admin/cate/list1');
         }else{
              $this->error($result);
         }
        }
            $cateInfo = model('Cate')->find(input('get.id'));
            $this->assign('cate',$cateInfo);
            return view();
    }

    //列表删除
    public function del(){
        if(request()->isAjax()){
            $cateInfo = model('Cate')->with('article')->find(input('post.id'));
            $result = $cateInfo->article()->delete();
            $cateInfo->delete();
            if($result){
                $this->success('删除成功','admin/cate/list1');
            }else{
                $this->error('删除失败');
            }
        }
    }
}
