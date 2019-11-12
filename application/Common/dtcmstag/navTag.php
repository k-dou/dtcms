<?php
/**
 * author: Janko
 * Date: 2019-09-11
 * Time: 下午 12:25
 */
namespace app\Common\dtcmstag;
use app\admin\model\categoryModel;

class navTag
{
    protected $params = [];
    protected $limit;

    public function __construct($options)
    {
        $this->params = $options;
        $this->limit = isset($this->params['row'])?intval($this->params['row']) : 10;
    }

    public function run()
    {
        $category = new categoryModel();
//        $background = new \app\admin\model\backgroundModel();
        $headernav = $category->where(['status' => 1])->order('sort asc')->column('title', 'id');

        return $headernav;
//        $backimg = $background->find(1);

    }

}