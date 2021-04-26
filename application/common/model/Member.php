<?php

namespace app\common\model;
use app\common\validate\MemberValidate;
use think\Model;

class Member extends Model
{
    //只读字段
    protected $readonly = ['email','username'];

    public function comment(){
        return $this->hasMany('Comment','member_id','id');
    }

    //会员添加
    public function add($data){
        $validate = new MemberValidate();
        if(!$validate->scene('add')->check($data)){
           return $validate->getError();
        }
        $result = model('Member')->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return "添加会员失败";
        }
    }

    //会员编辑
    public function edit($data){
        $validate = new MemberValidate();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $memberInfo = model('Member')->find($data['id']);
        if($memberInfo->password != $data['oldpass']){
            return "原密码输入错误";
        }
        $memberInfo->password = $data['newpass'];
        $memberInfo->nickname = $data['nickname'];
        $result = $memberInfo->save();
        if($result){
            return 1;
        }else{
            return "编辑失败";
        }
    }
}
