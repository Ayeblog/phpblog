<?php


namespace app\common\validate;

use think\Validate;

class MemberValidate extends Validate
{
    protected $rule = [
        'username|会员用户名' => 'require|unique:Member',
        'password|会员密码' => 'require',
        'email|会员邮箱' => 'require|unique:Member',
        'nickname|会员昵称' => 'require|unique:Member',
        'oldpass|旧密码' => 'require',
        'newpass|新密码' => 'require',

    ];

    protected $scene = [
        'add' => ['username','password','email','nickname'],
        'edit' => ['nickname','oldpass','newpass']
    ];
}