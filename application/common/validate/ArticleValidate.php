<?php


namespace app\common\validate;

use think\Validate;

class ArticleValidate extends Validate
{
    protected $rule = [
        'title|文章标题' => 'require|unique:Article',
        'tags|文章标签' => 'require',
        'is_top|是否推荐' => 'require',
        'desc|文章描述' => 'require',
        'content|文章内容' => 'require',
        'cate_id|导航' => 'require',
        'des|文章描述' => 'require',
    ];
    protected $scene = [
        'add' => ['title','tags','is_top','desc','content','cate_id'],
        'rec' => ['is_top'],
        'edit' => ['title','tags','is_top','content','cate_id','des']
    ];
}