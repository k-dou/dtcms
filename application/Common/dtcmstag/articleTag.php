<?php
/**
 * 文章
 * User: Janko
 */

namespace app\Common\dtcmstag;

use think\Db;
use think\template\TagLib;

class articleTag
{
    protected $params = [];

    public function __construct($options)
    {
//        $attr = [
//            '列表名'      =>  'listname',
//            '显示数目'    =>  'row',
//            '调用名称'    =>  'alias',
//        ];
        $this->params = $options;
//        foreach($options as $k => $v){
//            $this->params[$k] = $v;
//        }
//        $this->params['name'] = $options['name'];
//        $x = implode(',',$options);
//        $this->options  = $options;
      //  return '网站名称：'. $options['name'] ;
       // !isset($this->params['type']) && $this->params['type'] = 'Home';
    }

    public function run()
    {
//        if(!in_array($this->params['type'],array('Home','Mobile','Apk'))) return false;
        return $this->params['list_name'];
    }

    /**
     * 闭合标签
     * $tag：存放标签属性的数组
     */
    public function TagSiteName($tag)
    {
        return '网站名称：'.$tag['name'];
    }

    /**
     * 不闭合标签
     * $tag：存放标签属性的数组
     * $content：标签内的数据
     */
    public function Tagkeyword($tag,$content)
    {
        return '网站关键词：'.$tag['key'].$content;
    }



}



