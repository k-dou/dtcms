<?php
/**
 * Created by PhpStorm.
 * User: Janko
 * Date: 2019-08-27
 * Time: 下午 15:23
 */
namespace app\admin\controller;
use app\Common\Controller\AdminBaseController;
use app\Common\Model;
use think\model\relation\MorphOne;
use app\admin\model\config_tagModel;
use think\db;

class SetConfig extends AdminBaseController{

    protected $mod;

    public function __construct()
    {
        parent::__construct();
        $this->mod  = new \app\admin\model\configModel();
    }

    /**
     * 网站基本配置
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $config_data = $this->mod->find();

        if(IS_POST){
            $data = input('post.');
            $data['update_time'] = date('Y-m-d H:i:s');

            if(empty($data)) $this->error('请填写数据！');
            if(empty($config_data)){
                $res = $this->mod->insert($data);
            }else{
                $where['update_time'] = $config_data['update_time'];
                $res = $this->mod->where($where)->update($data);
            }

            $res and $this->success('操作成功','', NULL, 1) or $this->error('操作失败');

        }else{
            $this->assign('config_data', $config_data);
        }

        return $this->adminTpl();
    }

    /**
     * 模板配置
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function template()
    {
        $config_data = $this->mod->find();

        if(IS_POST){
            $data = input('post.');
            $data['update_time'] = date('Y-m-d H:i:s');
            unset($data['file']);
            if(empty($data)) $this->error('请填写数据！');
            if(empty($config_data)){
                $res = $this->mod->insert($data);
            }else{
                $where['update_time'] = $config_data['update_time'];
                $res = $this->mod->where($where)->update($data);
            }

            $res and $this->success('操作成功','', NULL, 1) or $this->error('操作失败');

        }else{
            $this->assign('config_data', $config_data);
        }

        return $this->adminTpl();

    }

    /**
     * 网站客服信息
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function cs()
    {
        $config_data = $this->mod->find();

        if(IS_POST){
            $data = input('post.');
            $data['update_time'] = date('Y-m-d H:i:s');
            unset($data['file']);
            if(empty($data)) $this->error('请填写数据！');
            if(empty($config_data)){
                $res = $this->mod->insert($data);
            }else{
                $where['update_time'] = $config_data['update_time'];
                $res = $this->mod->where($where)->update($data);
            }

            $res and $this->success('操作成功','', NULL, 1) or $this->error('操作失败');

        }else{
            $this->assign('config_data', $config_data);
        }

        return $this->adminTpl();
    }

    /**
     * 标签配置
     * @return string
     */
    public function tag()
    {
        $config_tag_model = new config_tagModel();
        $config_tag_data = $config_tag_model->select()->toArray();
        $config_tag_data = array_column($config_tag_data,'name');
        $config_tag_str = implode(',' , $config_tag_data);
        if(IS_POST){
            $tag_data = [];
            $new_tag_data = [];
            $tag_str = input('post.tag/s','','trim');
            $tag_str || dtMsg('1','缺少参数');
            $tag_data = explode(',',$tag_str);
            $time = time();
            Db::startTrans();
            if(count($tag_data) > count($config_tag_data)){
                $tag_data = array_diff($tag_data,$config_tag_data);
                foreach ($tag_data as $k => $v){
                    $new_tag_data[$k]['name'] = $v;
                    $new_tag_data[$k]['set_time'] = $time;
                }
                if(!empty($new_tag_data)){
                    $config_tag_model = new config_tagModel();
                    $config_tag_model->saveAll($new_tag_data);
                }

            }elseif(count($tag_data) < count($config_tag_data)){
                $tag_data = array_diff($config_tag_data,$tag_data);
                $tag_data || dtMsg('1','数据错误');
                sort($tag_data);
                $del_res = Db::name('config_tag')->where('name','in',$tag_data)->delete();
                $del_res || self::dtMsgDie('1','执行删除失败');
            }
            Db::commit();
            dtMsg('0','提交成功');
        }else{
            $this->assign('config_tag_str', $config_tag_str);
        }

        return $this->adminTpl();

    }

    /**
     * 根据Tag 字符串 模糊查询所有的tags
     * @throws \think\exception\DbException
     * @throws db\exception\DataNotFoundException
     * @throws db\exception\ModelNotFoundException
     */
    public function getTags()
    {
        $res = [];
        $tag_str = input('post.tag_str/s','','trim');
        $tag_str || dtMsg('1','缺少参数');
        $where[] = ['name','like',$tag_str.'%'];
        $res = Db::name('config_tag')->where($where)->select();

        dtMsg('0','','0',$res);
    }

    /**
     * 事务回滚返回信息
     * @param $code
     * @param $msg
     * @param array $d
     */
    private static function dtMsgDie($code,$msg,$d = [])
    {
        Db::rollback();
        if($d) Db::name('error_log')->insert($d);
        dtMsg($code,$msg);
    }

    /**
     * 上传模板Logo 图片
     */
    public function uploadLogo()
    {
        $res_data = [
            'status' => '0',
            'msg' => '',
            'data' => []
        ];
        $upload_path = \think\facade\Env::get('ROOT_PATH') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'template_logo';
        $img_path = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'template_logo' . DIRECTORY_SEPARATOR;
        $upload_res = upload('file',$upload_path);

        if($upload_res['status'] == 0){
            $res_data['status'] = '0';
            $res_data['msg'] = '上传失败';
        }else{
            $res_data['status'] = '1';
            $res_data['data']['tp_logo'] = $img_path . $upload_res['data']['save_name'];
            $res_data['msg'] = '上传成功';
        }

        return json($res_data);die;

    }

}