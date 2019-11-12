<?php /*a:2:{s:75:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\public_head.php";i:1571392445;s:76:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\setconfig_cs.php";i:1567421025;}*/ ?>
<div class="aright">

    <form class="layui-form" method="post" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">联系人</label>
            <div class="layui-input-block">
                <input type="text" name="cs_name"    placeholder="请输入联系人" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_name']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">电话</label>
            <div class="layui-input-inline">
                <input type="text" name="cs_tel"  placeholder="请输入电话号" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_tel']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" name="cs_email"   placeholder="请输入邮箱" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_email']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮编</label>
            <div class="layui-input-block">
                <input type="text" name="cs_zip_code"    placeholder="请输入邮编" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_zip_code']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机</label>
            <div class="layui-input-block">
                <input type="text" name="cs_moblie"   placeholder="请输入手机号" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_moblie']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">QQ</label>
            <div class="layui-input-block">
                <input type="text" name="cs_qq"    placeholder="请输入QQ号" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_qq']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">地址</label>
            <div class="layui-input-block">
                <input type="text" name="cs_address"  placeholder="请输入地址" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config_data['cs_address']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        //Demo
        // layui.use('form', function(){
        //     var form = layui.form;
        //
        //     //监听提交
        //     form.on('submit(formDemo)', function(data){
        //         layer.msg(JSON.stringify(data.field));
        //         return false;
        //     });
        // });
    </script>

</div>
