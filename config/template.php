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
// +----------------------------------------------------------------------
// | 模板设置
// +----------------------------------------------------------------------

return [
    // 模板引擎类型 支持 php think 支持扩展
    'type' => 'Think',
    // 模板路径
    'view_path' => '' ,
    // 模板后缀
    'view_suffix' => 'php',
    // 模板文件名分隔符 你可以自行修改
    'view_depr' => '_',
    // 模板引擎普通标签开始标记
    'tpl_begin' => '{',
    // 模板引擎普通标签结束标记
    'tpl_end' => '}',
    /*
     * 此处沿用Thinkphp3.2的习惯 比如 <volist></volist>
     */
    // 标签库标签开始标记
    'taglib_begin' => '<',
    // 标签库标签结束标记
    'taglib_end' => '>',
    'tpl_replace_string' => [
        '__PUBLIC__' => "/public/" ,//$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['SCRIPT_NAME']).'public'),
    ],
    'taglib_pre_load' => 'cx,dtcms',

//    'taglib_pre_load' => 'app\common\dtcmstag\articleTag',
];
