<?php

namespace app\admin\controller;
// use app\common\model\admin;
use think\Controller;
use think\Db;
use app\common\model\Artlcle;
use think\facade\Cache;
use think\Request;

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

    // 文章列表
    public function articlelist()
    {
        if (cache::get('data')) {
            $cache=cache::get('data');
            // dump($cache);exit;
        } else {
            $dbdata = Artlcle::withJoin('index')->select();
            cache::set('data',$dbdata,3600);
            $cache=cache::get('data');
            
        }
        // $cache=cache::rm('data');
        
        // $data=json_decode($cache,true);
        // dump($cache);exit;
        $this->assign('data',$cache);
        return view();
    }


    // 删除文章
    public function delArticlelist()
    {
        $delId=['id'=>input('get.id')];
        $del=model('Artlcle')->del($delId);
        if ($del==1) {
            $this->success('删除成功');
        } else {
            $this->error($del);
        }
    }


    // 添加文章列表
    public function addArticle ()
    {
       
        $modeData=model('Cate')->index();
        // dump($data);exit;
        $this->assign('data',$modeData);
        // return view();
        return $this->fetch();

    }


    public function addArticlelist()
    {
         $data=[
                'title'=>input('post.title'),
                'cate_id'=>input('post.cate_id'),
                'content'=>input('post.content')
            ];
            $addData=model('Artlcle')->add($data);
            if ($addData==1) {
                $this->success('添加成功');
            } else {
                $this->error($addData);
            }
    }

    public function editArticlelist()
    {   
        // dump($this->request->isAjax());
        // request()->isAjax();
        if ($this->request->isPost()) {
            $data=[
                'id'=>input('post.id'),
                'title'=>input('post.title'),
                'cate_id'=>input('post.cate_id'),
                'content'=>input('post.content')
            ];
            $edit=model('Artlcle')->editArtlcle($data);
            if ($edit==1) {
                $this->success('修改成功');
            } else {}
                return $edit;
        }
        $data=['id'=>input('get.id')];
        $cate=model('Cate')->index();

        $data_id=model('Artlcle')->sect(['id'=>input('get.id')]);
        // dump($data_id,$cate);exit;
        $this->assign('data',$cate);
        $this->assign('articlelist',$data_id);
        return $this->fetch();
    }
}
