<?php
namespace app\common\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username|管理员账户'  =>  'require|max:25',
        'password|密码' =>  'require',
        'conpass|确认密码' => 'require|confirm:password',
        'nickname|昵称' => 'require',
        'email|邮箱'=>'require',
        'title|标题'=>'require',
        'cate_id|栏目'=>'require',
        'content|内容'=>'require',
        'catename|栏目名称'=>'require'
    ];


    // 验证登录场景
    public function sceneLogin()
    {
    	return $this->only(['username','password']);
    }

    public function sceneRegister()
    {
    	return $this->only(['username','password','conpass','nickname','email']);
    }

    public function sceneArticle()
    {
        return $this->only(['title','cate_id','content']);
    }

    public function sceneAddCate()
    {
        return $this->only(['catename']);
    }
}