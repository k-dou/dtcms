<?php
/**
 * 前台控制器基类
 * @author Janko
 */
namespace app\Common\Controller;
use app\admin\model\configModel;
use think\facade\Env;

class TemplateBaseController extends BaseController {

	public function __construct()
    {
		parent::__construct();
        $tpl = $this->getTemplateData();
        $tpl_url = Env::get('app_path').Config('default_module').'/view'.'/'.$tpl.'/'.($this->request->isMobile()?'moblie/':'web/');
        $this->view->config('view_path',$tpl_url);
		$this->blogHeadNav();
	}

    //获取博客头部分类
	protected function blogHeadNav()
    {
//		$category = new \app\admin\model\categoryModel();
		$background = new \app\admin\model\backgroundModel();
//		$headernav = $category->where(['status' => 1])->order('sort asc')->column('title', 'id');
		$backimg = $background->find(1);
//		$this->assign('headernav', $headernav);
		$this->assign('backimg', $backimg);
	}

	public function jump404()
    {
		//只有在app_debug=False时才会正常显示404页面，否则会有相应的错误警告提示
		abort(404, '页面异常');
	}

	public function blogTpl()
    {
		//直接引入头部和底部文件，在新建页面模版的时候省去重复引入的环节
		$contrroller = strtolower(CONTROLLER_NAME);
		$action = strtolower(ACTION_NAME);

		return $this->fetch($contrroller . '_' . $action);
		//return $this->fetch('public:head') . $this->fetch($contrroller . '_' . $action) . $this->fetch('public:foot');
	}

    /**
     * 获取模板数据
     * @return mixed|string
     */
    private function getTemplateData()
    {
        $tpl = 'default';
        $config_model = new configModel();
        $config_data =  $config_model ->value('tp_name');

        if(!empty($config_data)) $tpl = $config_data;

        return $tpl;
    }

    //TODO::_config_seo   //

    /**
     * SEO设置
     */
//    public function _config_seo($seo_info = array(), $data = array()) {
//        $page_seo = array(
//            'title'       => '',
//            'keywords'    => '',
//            'description' => '',
//        );
//        $page_seo = array_merge($page_seo, $seo_info);
//        //开始替换
//        $searchs = array('{site_name}', '{site_domain}', '{site_title}', '{site_keywords}', '{site_description}');
//        $replaces = array(C('qscms_site_name'), C('qscms_site_domain'), '', '', '');
//        preg_match_all("/\{([a-z0-9_-]+?)\}/", implode(' ', array_values($page_seo)), $pageparams);
//        if ($pageparams) {
//            $data['key'] && $data['key'] = urldecode(urldecode($data['key']));
//            foreach ($pageparams[1] as $var) {
//                $searchs[] = '{' . $var . '}';
//                $replaces[] = $data[$var] ? strip_tags($data[$var]) : '';
//            }
//            //符号
//            $searchspace = array('((\s*\-\s*)+)', '((\s*\,\s*)+)', '((\s*\|\s*)+)', '((\s*\t\s*)+)', '((\s*_\s*)+)');
//            $replacespace = array('-', ',', '|', ' ', '_');
//            foreach ($page_seo as $key => $val) {
//                $page_seo[$key] = trim(preg_replace($searchspace, $replacespace, str_replace($searchs, $replaces, $val)), ' ,-|_');
//            }
//        }
//        $this->assign('page_seo', $page_seo);//创建模板变量page_seo并赋值
//        return $page_seo;
//    }


    //空方法
	public function _empty()
    {
		return $this->jump404();
	}

}
