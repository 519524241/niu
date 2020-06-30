<?php

namespace app\common\model;
// use app\common\validate\Admin
use think\model\concern\SoftDelete;
use think\Model;

class Admin extends Model
{
    //
    use SoftDelete;
    public function login($data)
    {
    	$validate = new \app\common\validate\Admin();
    	if (!$validate->scene('login')->check($data)) {
    		// 验证不成功返回错误信息
    		return ($validate->getError());
    	}
    	// 查找数据
    	$result=$this->where($data)->find();
    	// 有数据就返回1给控制器
    	if ($result) {
    		# code...
    		// 判断用户是否可用
    		if ($result['status']!=1) {
    			return '账户被禁用';
    		}
    		$sessionDate=[
    			'id'=>$result['id'],
    			'nickname'=>$result['nickname'],
    			'is_super'=>$result['is_super']
    		];
    		session('admin',$sessionDate);
    		return 1;
    	} else {
    		return '用户名或者密码错误！';

    	}
    }



    // 注册账号
    public function register($data)
    {
        $validate=new \app\common\validate\Admin();
        if (!$validate->scene('register')->check($data)) {
            return $validate->getError();
        }
        $this->allowField(true)->save($data);
    }

}
