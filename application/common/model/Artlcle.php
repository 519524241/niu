<?php

namespace app\common\model;
use app\common\validate\Admin;
use think\Model;

class Artlcle extends Model
{
	public function index()
	{
		$data=$this->hasOne('Cate','id','cate_id');
		// dump($this->withJoin('cate')->select());
		// $arr=['tags','title'];
	    // $data=$this->column('id,title,tags');
	    // exit;
	    // $dataa=$data->withJoin()->selsect();
	    // dump($data->select());exit;
	    return $data;
		
	}

	public function del($id)
	{
		$del=$this->where($id)->delete();

		if ($del==0) {
			return '删除失败';
		} else {

			return 1;
		}
	}

	public function add($data)
	{
		$validate=new \app\common\validate\Admin;
		if (!$validate->scene('article')->check($data)) {
			return $validate->getError();
		}
		$add=$this->save($data);
		if ($add) {
			return 1;
		} else {
			return '删除失败';
		}

	}

	public function sect($id)
	{
		$data=$this->get($id);
		// dump($data);exit;
		if ($data) {
			return $data;
		}
	}

	public function editArtlcle($data)
    {
        $validate=new \app\common\validate\Admin;
        if (!$validate->scene('article')->check($data)) {
            return $validate->getError();
        }
        $edit=$this->where($data['id'])->save($data);
//            dump($edit);exit;
        if ($edit) {
            return 1;
        } else {
            return 0;
        }
    }
}
