<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Base;
class Home extends Controller
{

    public function index(){
        return view();
    }

    public function loginout(){
        session(admin,'null');
        if(session('admin.id')) {
            $this->error('退出失败');
        }
        else{
            $this->success('退出成功','admin/index/login');
        }
    }
}
