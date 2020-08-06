<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Cate extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data=model('Cate')->index();
        // dump($data);exit;
        $this->assign('data',$data);
        return view();
    }

    public function addCate()
    {
        if (request()->isAjax()) {
            $arr=[
                'catename'=>input('post.catename')
            ];
            $data=model('Cate')->add($arr);
            if ($data==1) {
                $this->success('新增成功');
            } else {
                return $data;
            }

        }
        return view();
    }

    public function editCate()
    {	
    	if (request()->isAjax()) {
    		$arr=[
    			'id'=>input('post.id'),
    			'catename'=>input('post.catename')
    		];
    		$edit=model('Cate')->editData($arr);
    		if ($edit==1) {
    			$this->success('修改成功');
    		} else {
    			return $edit;
    		}
    	}
    	$arr=['id'=>input('get.id')];
    	$data=model('Cate')->edit($arr);
    	// dump($data);exit;
    	$this->assign('data',$data);
    	return view();
    }




}
