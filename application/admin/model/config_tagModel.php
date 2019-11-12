<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class config_tagModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'config_tag';
    protected $pk = 'id'; //主键

    public function __construct($data = []) {
        parent::__construct($data);
    }

}
