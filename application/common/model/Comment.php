<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Comment extends Model
{
    //评论列表
    use SoftDelete;

    public function article(){
        return $this->belongsTo('Article','article_id','id');
    }

    public function member(){
        return $this->belongsTo('Member','member_id','id');
    }
}
