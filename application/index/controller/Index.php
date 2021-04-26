<?php
namespace app\index\controller;

use think\Controller;

class Index extends Base
{
    //首页
    public function index(){
        $where = [];
        $catename = [];
        if(input('?id')){
            $where = [
                'cate_id' => input('id')
            ];
            $catename = model('Cate')->where('id',input('id'))->value('catename');
        }
        $articles = model('Article')->where($where)->order('create_time','desc')->paginate(2);
        $viewData = [
            'articles' => $articles,
            'catename' => $catename
        ];
        $this->assign($viewData);
        return view();
    }

    //注册
    public function register(){

        return view();
    }
}
