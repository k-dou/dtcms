<?php /*a:2:{s:75:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\public_head.php";i:1571392445;s:79:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\background_edit.php";i:1562260080;}*/ ?>
<link rel="stylesheet" href="/src/admin/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="/src/admin/wangEditor/js/wangEditor.min.js"></script>
<div class="aright">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 20px 30px 20px 20px;">
        <legend><?php echo isset($info['id']) ? '修改' : '添加'; ?>文章</legend>
    </fieldset>
    <form class="layui-form bform" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label class="layui-form-label">头部背景图</label>
            <div class="layui-input-block">
                <div class="file-box">
                    <i class="layui-icon">&#xe61f;</i>
                    <input class="file-btn" type="button" value="选择图片"> 
                    <input class="file-txt" type="text" autocomplete="off"  id="textfield">
                    <?php if(($info['head_back_img'])): ?><img src="<?php echo htmlentities((isset($info['head_back_img']) && ($info['head_back_img'] !== '')?$info['head_back_img']:'')); ?>" width="150"><?php else: ?><?php endif; ?>
                    <input class="file-file" type="file" name="head_back_img" id="pic" size="28" onchange="document.getElementById('textfield').value = this.value" /> 
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">显示头背景</label>
            <div class="layui-input-block">
                <select name="is_head">
                    <?php if(is_array($notes['is_head']) || $notes['is_head'] instanceof \think\Collection || $notes['is_head'] instanceof \think\Paginator): $i = 0; $__LIST__ = $notes['is_head'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option <?php if(($info['is_head']==$key)): ?>selected="selected"<?php endif; ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($vo); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">主背景图</label>
            <div class="layui-input-block">
                <div class="file-box">
                    <i class="layui-icon">&#xe61f;</i>
                    <input class="file-btn" type="button" value="选择图片"> 
                    <input class="file-txt" type="text" autocomplete="off"  id="textfield2">
                    <?php if(($info['main_back_img'])): ?><img src="<?php echo htmlentities((isset($info['main_back_img']) && ($info['main_back_img'] !== '')?$info['main_back_img']:'')); ?>" width="120"><?php else: ?><?php endif; ?>
                    <input class="file-file" type="file" name="main_back_img" id="pic" size="28" onchange="document.getElementById('textfield2').value = this.value" /> 
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">显示主背景</label>
            <div class="layui-input-block">
                <select name="is_main">
                    <?php if(is_array($notes['is_main']) || $notes['is_main'] instanceof \think\Collection || $notes['is_main'] instanceof \think\Paginator): $i = 0; $__LIST__ = $notes['is_main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option <?php if(($info['is_main']==$key)): ?>selected="selected"<?php endif; ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($vo); ?></option>
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