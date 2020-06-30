<?php

namespace app\admin\controller;
// use app\common\model\admin;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        return view();
    }



    // 后台登录
    public function login()
    {	

        // $data=model('Admin')->login(456);
        // dump($data);exit;
    // dump($livemod->index());exit;
        // dump(request());exit;
        // dump(input('post'));exit;
    	if (request()->isAjax()) {
    		$data = [
    			'username'=>input('post.username'),
    			'password'=>input('post.password')
    		];
    		# code...
            // 调用模型login方法查数据
            $result = model('Admin')->login($data);
            // dump(session('admin'));exit;
            if ($result==1) {
                // dump(session());exit;
                $this->success('登陆成功','admin/index/index');
            } else {
                $this->error($result);
            }
    	}
    	return view('login');
    }

    public function logOut()
    {
    	session('admin',null);
    	return redirect('/admin/login');
    }


    // 注册
    public function register()
    {   
        if (request()->isAjax()) {
            // dump(input('post'));exit;
           $data = [
            'username' =>input('post.username'),
            'password' =>input('post.password'),
            'email' => input('post.email'),
            'nickname'=>input('post.nickname')
           ];
        }
        return view();
    }
}
