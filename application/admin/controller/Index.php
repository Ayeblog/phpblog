<?php

namespace app\admin\controller;
use app\common\model\Admin;
use think\Controller;
use app\admin\controller\Base;
class Index extends Base
{
    //后台登录
    public function login(){
        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password')
            ];
            $result = model('Admin')->login($data);
            if($result==1){
                $this->success('登录成功','admin/home/index');
            }else{
                $this->error($result);
            }
        }
        return view();
    }
    //注册验证
    public function register(){
        if(request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'email' => input('post.email'),
                'nickname' => input('post.nickname'),
                'compass' => input('post.compass')
            ];
           $result = model('Admin')->register($data);
            if($result==1){
                $this->success('注册成功','admin/index/login');
            }else{
                $this->error($result);
            }
        };
        return view();
    }
}
