<?php
namespace app\common\taglib;
use think\template\TagLib;
class Demo extends TagLib{
    /**
     * 定义标签列表
     */
    protected $tags   =  [
        /**标签定义
         * attr：属性列表
         * close：是否闭合（0表示闭合，1表示不闭合。默认值为1）
         * alias：标签别名
         * level：嵌套层次
         */
        'sitename'     => ['attr' => 'name', 'close' => 0],//闭合标签
        'keyword'      => ['attr' => 'key', 'close' => 1], //不闭合标签

    ];

    /**
     * 闭合标签
     * $tag：存放标签属性的数组
     */
    public function Tagsitename($tag)
    {
        return '网站名称：'.$tag['name'];
    }

    /**
     * 不闭合标签
     * $tag：存放标签属性的数组
     * $content：标签内的数据
     */
    public function keyword($tag,$content)
    {
        return '网站关键词：'.$tag['key'].$content;
    }
}