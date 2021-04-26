<?php

namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    //共享视图
    public function _initialize()
    {
        $cates = model('Cate')->order('sort','asc')->select();
        $topArticle = model('Article')->where('is_top',1)->order('create_time','desc')->limit(10)->select();
        $viewData = [
            'cates' => $cates,
            'topArticle' => $topArticle
        ];
        $this->view->share($viewData);
    }
}
