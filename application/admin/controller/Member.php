<?php

namespace app\admin\controller;

use think\Controller;

class Member extends Controller
{

    //会员列表
    public function list1(){
        $memberInfo = model('Member')->order('create_time','desc')->paginate(10);
        $viewData = [
            'memberInfo' => $memberInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //会员添加
    public function add(){
        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email')
                ];
            $result = model('Member')->add($data);
            if($result==1){
                $this->success('会员添加成功','admin/member/list1');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //会员编辑
    public function edit(){
        if(request()->isAjax()){
            $data = [
                'id' => input('post.id'),
                'oldpass' => input('post.oldpass'),
                'newpass' => input('newpass'),
                'nickname' => input('nickname')
            ];
            $result = model('Member')->edit($data);
            if($result==1){
                $this->success('编辑成功','admin/member/list1');
            }else{
                $this->error($result);
            }
        }
        $memberInfo = model('Member')->find(input('id'));
        $viewData = [
            'memberInfo' => $memberInfo,
        ];
        $this->assign($viewData);
        return view();
    }

    //会员删除
    public function del(){

            $data = [
                'id' => input('post.id'),
            ];
            $memberInfo = model('Member')->with('comment')->find($data['id']);
            $result = $memberInfo->together('comment')->delete();
            $memberInfo->delete();
            if($result){
                $this->success('会员删除成功','admin/member/list1');
            }else{
                $this->error('会员删除失败');
            }

    }
}
