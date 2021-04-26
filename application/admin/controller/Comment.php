<?php

namespace app\admin\controller;

use think\Controller;

class comment extends Controller
{
    //评论列表
    public function list1()
    {
        $comments = model('Comment')->with('article,member')->order('id', 'asc')->paginate(10);
        $viewData = [
            'comments' => $comments,
        ];
        $this->assign($viewData);
        return view();
    }


    //评论删除
    public function del()
    {
        if (request()->isAjax()) {
            $data = [
                'id' => input('post.id')
            ];
            $commentInfo = model('Comment')->find($data['id']);
            $result = $commentInfo->delete();
            if ($result) {
                $this->success('删除成功', 'admin/comment/list1');
            } else {
                $this->error('删除失败');
            }
        }
    }
}
