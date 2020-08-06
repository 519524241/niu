<?php

namespace app\common\model;

use think\Model;

class Cate extends Model
{
    public function index()
    {
    	$data=$this->select();
    	return $data;
    }

    public function add($data)
    {
    	$validate = new \app\common\validate\Admin;
    	if (!$validate->scene('addCate')->check($data)) {
    		return $validate->getError();
    	}
    	$addCate=$this->save($data);
    	if ($addCate) {
    		return 1;
    	} else {
    		return 0;
    	}
    }

    public function edit($id)
    {
        $data=$this->where($id)->find();
        // dump($data);exit;
        return $data;
    }

    public function editData($arr)
    {
        $validate = new \app\common\validate\Admin;
        if (!$validate->scene('addCate')->check($arr)) {
            return $validate->getError();
        }
        $edit=$this->save(['catename'=>$arr['catename']],['id'=>$arr['id']]);
        if ($edit) {
            return 1;
        } else{
            return 0;
        }
    }
}
