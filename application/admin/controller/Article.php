<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;
use think\Db;

class Article extends AdminBaseController {

	protected $mod;

	public function __construct() {
		parent::__construct();
		$this->mod = new \app\admin\model\articleModel();
		$this->assign('notes', $this->mod->notes);
		$category = new \app\admin\model\categoryModel();
		$type = $category->where(['status' => 1])->order('sort asc')->column('title', 'id');
		$this->assign('type', $type);
	}

	public function index() {
		$page = input('page', 1);
		$pageSize = 5; //每页显示的数量
		$where = [];
		if (input('id')) {
			$where[] = ['id', '=', input('id')];
		}
		$list = $this->mod->where($where)->order('id desc')->paginate($pageSize, false);
		$show = $list->render();
		$this->assign('list', $list);
		$this->assign('pages', $show);
		return $this->adminTpl();
	}

	public function edit() {
		$id = input('id');
        $info = array();
        $id && $info = $this->mod->find($id);
		$this->assign('info', $info);
		if (IS_POST) { //数据操作
			$data = input('post.');
			if($data['is_md'] == 1){
                $data['content'] = $data['content-editormd-markdown-doc'];
                unset($data['content-editormd-markdown-doc']);
                unset($data['content-editormd-html-code']);
            }
			unset($data['id']);
            $tags_str = $data['tags'];
            unset($data['tags']);
            $data['type'] || $this->error('请选择文章类型');
            $data['status'] || $this->error('请选择文章状态');
			if ($_FILES['img']['error'] == 0) {
				$file = request()->file(); //图片上传
				if ($file) {
					$file_path = \think\facade\Env::get('ROOT_PATH') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads';
					$img_path = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
					$img_info = $file->move($file_path);
					if ($img_info) {
						$data['img'] = $img_path . $img_info->getSaveName();
					} else {
						$this->error($file->getError());
					}
				}
			}
			if ($id) { //更新数据
				$where['id'] = $id;
                $res_data = $this->mod->where($where)->update($data);
			} else { //添加数据
				$data['c_time'] = date('Y-m-d H:i:s');
                $res_data = $this->mod->insertGetId($data);
                $id = $res_data;
			}

            if(!empty($tags_str)){
                $tags_arr = explode(',',$tags_str);
                $tags_arr || dtMsg('1','数据错误');
                foreach ($tags_arr as $v){
                    $res = Db::name('config_tag')->field('id')->where('name',$v)->find();
                    $tag_id = 0;
                    if(empty($res)){
                        $tags_set = [];
                        $tags_set['name'] = $v;
                        $tags_set['set_time'] = time();
                        $tag_id = Db::name('config_tag')->insertGetId($tags_set);
                    }
                    $res && $tag_id = $res['id'];
                    $id || dtMsg('1','缺少必要参数');
                    $aritcle_tag_arr = [];
                    $aritcle_tag_arr['article_id'] = $id;
                    $aritcle_tag_arr['tag_id'] = $tag_id;
                    Db::name('article_tag')->insertGetId($aritcle_tag_arr);

                }

            }
            $res_data and $this->success('操作成功', CONTROLLER_NAME . '/index', NULL, 1) or $this->error('操作失败');
		} else {
			return $this->adminTpl();
		}
	}

	//public function

	//编辑器图片上传 【单张上传操作，多图上传自行研究- -】
	public function UploadPic() {
		$file = request()->file('info_upload_img');
		if ($file) {
			$file_path = \think\facade\Env::get('ROOT_PATH') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads';
			$img_path = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
			$img_info = $file->move($file_path);
			if ($img_info) {
				$img = $img_path . $img_info->getSaveName();
				$ret = ["errno" => 0, 'data' => [$img]];
				return json($ret);
			} else {
				$this->error($file->getError());
			}
		}
	}

}
