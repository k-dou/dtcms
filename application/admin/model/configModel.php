<?php
/**
 * 网站配置模型
 * User: Janko
 * Date: 2019-08-28
 * Time: 下午 18:48
 */
namespace app\admin\model;
use app\Common\Model\CommonModel;

class configModel extends CommonModel{

    protected $table = 'config';

    public function __construct($data = []) {
        parent::__construct($data);
    }

}