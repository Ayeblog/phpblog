<?php


namespace app\common\validate;
use think\Validate;

class CateValidate extends Validate
{
        protected $rule = [
            'catename|栏目名称' => 'require|unique:cate',
            'sort|排序' => 'require|number|unique:cate',
            'id|id唯一' => 'require'
        ];
        protected $scene = [
            'add' => ['catename','sort'],
            'sort' => ['sort'],
            'name' => ['catename','id']
        ];

}