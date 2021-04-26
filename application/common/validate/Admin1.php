<?php

namespace app\common\validate;

use think\Validate;

class Admin1 extends Validate
{
    protected $rule = [
        'username|管理员账户名' => 'require',
        'password|管理员密码' => 'require',
        'email|管理员邮箱' =>'require|email',
        'nickname|管理员昵称' => 'require',
        'compass|验证密码' => 'require|confirm:password',
    ];
    //验证登录场景
    protected $scene = [
        'login' => ['username','password'],
        'register' => ['username','password','email','nickname','compass'],
        'add' => ['username','password','email','compass','nickname'],
        'edit' => ['password','nickname']
    ];
}