<?php
namespace app\api\controller;
use think\Controller;
use think\Request;

class Base extends Controller
{
    protected $param;

    public function _initialize()
    {
        parent::_initialize();
        $this->param =  $this->request->post();
    }

    public function miss()
    {
    	echo 'error for domain';
    }

}
