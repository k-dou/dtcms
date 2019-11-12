<?php

namespace think\template\taglib;

use think\template\TagLib;

/**
 * Dtcms标签库解析类
 * @category   Dtcms
 * @package  Dtcms
 * @subpackage  Driver.Taglib
 * @author    janko <kyangmail@foxmail.com>
 */


class Dtcms extends Taglib
{

    // 标签定义
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'php'        => ['attr' => ''],
        'volist'     => ['attr' => 'name,id,offset,length,key,mod', 'alias' => 'iterate'],
        'foreach'    => ['attr' => 'name,id,item,key,offset,length,mod', 'expression' => true],
        'if'         => ['attr' => 'condition', 'expression' => true],
        'article'    => ['attr' =>'list_name,row,alias','close'=>0],//闭合标签
        'nav'        => ['attr' =>'list_name,row,alias','close'=>0],//闭合标签
        'test' =>     ['attr' => 'name','close'=>0]
    ];

    public function __call($method , $args)
    {
/*        $parseStr = '<?php  echo "'.$args[0]['list_name'].'"; ?>';*/
//        return $parseStr;
        $tag = substr($method , 3);
        $attr = $args[0];
        $attr['cache'] = isset($attr['cache']) ? intval($attr['cache']) : 0;
        $attr['list_name'] = isset($attr['list_name']) ? trim($attr['list_name']) : 'list';
        $attr['type'] = isset($attr['type']) ? trim($attr['type']) : 'run';

        if (!$attr['type']) return false;
        $parse_str  = '<?php ';
        if ($attr['cache']) {
            //标签名-属性-属性值 组合标识
            ksort($_tag);
            $tag_id = md5($tag . '&' . implode('&', array_keys($attr)) . '&' . implode('&', array_values($attr)));
            //缓存代码开始
            $parse_str .= '$' . $attr['list_name'] . ' = Cache::set(\'' . $tag_id . '\');';
            $parse_str .=  'if (false === $' . $_tag['list_name'] . ') { ';
        }
        $action = $attr['type'];
        $class = '$tag_' . $tag . '_class';
        $parse_str .= $class . ' = new \\app\\Common\\dtcmstag\\' .$tag . 'Tag(' . self::arr_to_html($attr) . ');';
        $parse_str .= '$' . $attr['list_name'] . ' = ' . $class . '->' . $action . '();';
//        $parse_str .=  'echo '.$class . '->' . 'run();';
        if($method != '_load'){
            //TODO:暂时先不做SEO 优化 和缓存
//            $parse_str .= '$frontend = new \\Common\\Controller\\FrontendController;';
//            $parse_str .= '$page_seo = $frontend->_config_seo('.self::config_seo().',$'.$attr['列表名'].');';
        }
        if ($attr['cache']) {
            //缓存代码结束
            $parse_str .= 'Cache::set(\'' . $tag_id . '\', $' . $_tag['list_name'] . ', ' . $_tag['cache'] . ');';
            $parse_str .= ' }';
        }
        $parse_str .= '?>';
        $parse_str .= $args[1];
        return $parse_str;

       // $z = implode(',',$args[0]);
       // return '名称：'. $args[0]['name'];
//        if (!isset($this->tags[$tag])) return false;
//        return '网站名称：'.$args['name'];

    }

    public function tagPhp($tag, $content)
    {
        $parseStr = '<?php ' . $content . ' ?>';
        return $parseStr;
    }

    private static function config_seo() {
        $page = [
            'pname' => 'DT',
            'title' => 'DT',
            'keywords' => 'DT',
            'description' => 'DT',
            'header_title' => 'DT',
        ];
        $page_seo = D('Page')->get_page();
        if(!empty($page_seo)){
            $page = $page_seo[strtolower(MODULE_NAME).'_'.strtolower(CONTROLLER_NAME).'_'.strtolower(ACTION_NAME)];
        }

        return 'array("pname"=>"'.$page['pname'].'","title"=>"'.$page['title'].'","keywords"=>"'.$page['keywords'].'","description"=>"'.$page['description'].'","header_title"=>"'.$page['header_title'].'")';
    }

//    public function tagTest($tag)
//    {
//        return '网站名称：'.$tag['name'];
//
//    }

    /**
     * 转换数据为HTML代码
     * @param array $data
     */
    private static function arr_to_html($data) {
        if (is_array($data)) {
            $str = 'array(';
            foreach ($data as $key=>$val) {
                if (is_array($val)) {
                    $str .= "'$key'=>".self::arr_to_html($val).",";
                } else {
                    if (strpos($val, '$')===0) {
                        $str .= "'$key'=>_I($val),";
                    } else {
                        $str .= "'$key'=>'".addslashes_deep($val)."',";
                    }
                }
            }
            return $str.')';
        }
        return false;
    }


}
