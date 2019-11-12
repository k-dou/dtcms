<?php /*a:2:{s:75:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\public_head.php";i:1571392445;s:78:"D:\phpStudy\PHPTutorial\WWW\wolfbolg\application\admin\view\category_index.php";i:1562260080;}*/ ?>
<div class="aright">
    <div class="arz" style="float: left;margin: 0px 20px 20px 30px;"><a href="<?php echo url('category/edit'); ?>"><i class="layui-icon">&#xe608;</i>添加栏目</a></div>

    <div style="float: left;">
        <form class="layui-form" action="" method="get">
            <input placeholder="输入id" name="id" value="<?php echo input('id'); ?>" type="text" class="layui-input" style="float: left;margin-right: 10px;width: 70px;">
            <button class="layui-btn" style="float: left;" value="查询" type="submit">查询</button>
        </form>
    </div>

    <form method="post" class="aform cl " >
        <table width="100%">
            <tr>
                <th width="2%" align="center">id</th>
                <th width="15%" align="center">文章标题</th>
                <th width="5%" align="center">排序</th>
                <th width="5%" align="center">状态</th>
                <th width="10%" align="center">添加时间</th>
                <th width="5%" align="center">基本操作</th>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td align="center"><?php echo htmlentities($vo['id']); ?></td>
                    <td align="center"><?php echo htmlentities($vo['title']); ?></td>
                    <td align="center"><?php echo htmlentities($vo['sort']); ?></td>
                    <td align="center"><?php echo htmlentities($notes['status'][$vo['status']]); ?></td>
                    <td align="center"><?php echo htmlentities($vo['c_time']); ?></td>
                    <td align="center">
                        <a href="<?php echo url('category/edit',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-small">修改</a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </form>
    <div class="pages">
        <?php echo $pages; ?>
    </div>
</div>
<script>
</script>