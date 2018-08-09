<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// Route::post('api/test','api/Test/test');
Route::group('api',[
    'test'   => ['api/Test/test', ['method' => 'post']],
    'abc' 	 => ['api/Test/abc', ['method'  => 'get']],
]);

Route::miss('api/base/miss');