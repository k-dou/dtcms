<?php /*a:2:{s:75:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\public_head.php";i:1567479865;s:77:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\category_edit.php";i:1562260080;}*/ ?>
<link rel="stylesheet" href="/src/admin/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="/src/admin/wangEditor/js/wangEditor.min.js"></script>
<div class="aright">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 20px 30px 20px 20px;">
        <legend><?php echo isset($info['id']) ? '修改' : '添加'; ?>文章</legend>
    </fieldset>
    <form class="layui-form bform" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label class="layui-form-label">栏目标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" value="<?php echo htmlentities($info['title']); ?>" placeholder="必填内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">栏目排序</label>
            <div class="layui-input-block">
                <input type="text" name="sort" required lay-verify="required" value="<?php echo htmlentities($info['sort']); ?>" placeholder="越小靠前" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">栏目状态</label>
            <div class="layui-input-block">
                <select name="status">
                    <?php if(is_array($notes['status']) || $notes['status'] instanceof \think\Collection || $notes['status'] instanceof \think\Paginator): $i = 0; $__LIST__ = $notes['status'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option <?php if(($info['status']==$key)): ?>selected="selected"<?php endif; ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($vo); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>">
                <button class="layui-btn" lay-filter="formDemo" >立即提交</button> 
            </div>
        </div>
    </form>
</div>
<script>
    layui.use('form', function () {
        var form = layui.form();
    });
</script>