<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    //管理员列表
    public function list1(){
        $adminInfo = model('Admin')->order(['super'=>'desc','status'=>'desc'])->paginate(10);
        $viewData = [
            'adminInfo' => $adminInfo,
        ];
        $this->assign($viewData);
        return view();
    }

    //管理员添加
    public function add(){
        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'compass' => input('post.compass'),
                'password' => input('post.password'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email')
            ];
            $result = model('Admin')->add($data);
            if($result==1){
                $this->success('添加成功','admin/admin/list1');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //管理员状态
    public function status(){
        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'status' => input('post.status')
            ];
            if($data['status']==1){
                $data['status']=0;
            }else{
                $data['status']=1;
            }
            $adminInfo = model('Admin')->find($data['id']);
            $adminInfo->status = $data['status'];
            $result = $adminInfo->save();
            if($result){
                $this->success('操作成功','admin/admin/list1');
            }else{
                $this->error('操作失败');
            }
        }
    }

    //管理员编辑
    public function edit(){
        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'nickname' => input('post.nickname'),
                'compass' => input('post.compass'),
                'password' => input('post.password')
            ];
            $result = model('Admin')->edit($data);
            if($result==1){
                $this->success('编辑成功','admin/admin/list1');
            }else{
                $this->error('控制层编辑失败');
            }
        }
        $admins = model('Admin')->find(input('id'));
        $viewData = [
            'admins' => $admins,
        ];
        $this->assign($viewData);
            return view();
    }

    //管理员删除
    public function del(){
        $data = [
          'id' => input('post.id'),
        ];
        $adminInfo = model('Admin')->find($data['id']);
        $result = $adminInfo->delete();
        if($result){
            $this->success('管理员删除成功','admin/admin/list1');
        }else{
            $this->error('管理员删除失败');
        }
    }
}
