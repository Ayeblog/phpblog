<?php

namespace app\common\model;
use think\Model;
use app\common\validate\Admin1;
class Admin extends Model
{
    //数据验证
    public function login($data){
        $validate = new Admin1();
        if(!$validate->scene('login')->check($data)){
            return $validate->getError();
        }
        $result = $this->where($data)->find();
        if($result){
            if($result['status']!=1){
                return "此账户被禁用";
            }
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname'],
                'super' => $result['super'],
                'email' => $result['email']
            ];
            session('admin',$sessionData);
            return 1;
        }else{
            return "用户名或者密码错误";
        }

    }

    //注册数据验证
    public function register($data){
        $validate = new Admin1();
        if(!$validate->scene('register')->check($data)){
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return "注册失败";
        }
    }

    //添加管理员
    public function add($data){
        $validate = new Admin1();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
        $result = model('Admin')->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return "管理员添加失败";
        }
    }

    //编辑管理员
    public function edit($data){
        $validate = new Admin1();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $adminInfo = model('Admin')->find($data['id']);
        if($data['compass']!=$adminInfo['password']){
            return "原密码输入错误";
        }
        $adminInfo->password = $data['password'];
        $adminInfo->nickname = $data['nickname'];
        $result = $adminInfo->save();
        if($result){
            return 1;
        }else{
            return "编辑失败";
        }
    }
}
