<?php

namespace app\index\controller;

use app\Common\Controller\TemplateBaseController;

class Info extends TemplateBaseController {

	protected $mod;

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$id = input('id/d', 0);
		if (!$id) {
			return $this->jump404();
		}
		$mod = new \app\admin\model\articleModel();
		$info = $mod->find($id);
		if (!$info) {
			return $this->jump404();
		}
		$this->assign('info', $info);
		$this->assign('type', $info['type']);
		$this->assign('title', $info['title']);
		return $this->blogTpl();
	}

}
