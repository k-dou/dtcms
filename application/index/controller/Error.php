<?php

namespace app\index\controller;

use app\Common\Controller\TemplateBaseController;

class Error extends TemplateBaseController {

    public function index() {
        return $this->jump404();
    }

    public function _empty() {
        return $this->jump404();
    }

}
