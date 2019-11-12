<link rel="stylesheet" href="/src/admin/css/inputTags.css">
<link rel="stylesheet" href="/src/admin/editor/css/editormd.css">
<script type="text/javascript" src="/src/admin/editor/editormd.js"></script>
<script type="text/javascript" src="/src/admin/editor/editormd.min.js"></script>
<link rel="stylesheet" href="/src/admin/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="/src/admin/wangEditor/js/wangEditor.min.js"></script>
<script type="text/javascript" src="/src/admin/js/inputTags.js"></script>
<div class="aright">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 20px 30px 20px 20px;">
        <legend><?php echo isset($info['id']) ? '修改' : '添加'; ?>文章</legend>
    </fieldset>
    <form class="layui-form bform" method="post" enctype="multipart/form-data">
        <div class="dt-form-item">
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required lay-verify="required" value="<notempty name='info'>{$info.title}</notempty>" placeholder="必填内容" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="width: 300px;">
                <label class="layui-form-label">文章类型</label>
                <div class="layui-input-block" style="z-index:999;">
                    <select name="type" required lay-verify="required">
                        <option value="0">请选择</option>
                        <volist name="type" id="vo">
                            <empty name="info">
                                <option value="{$key}">{$vo}</option>
                                <else />
                                <option <if ($info['type']==$key)>selected="selected"</if> value="{$key}">{$vo}</option>
                            </empty>

                        </volist>
                    </select>
                </div>
            </div>
            <div class="layui-form-item" style="width: 300px;">
                <label class="layui-form-label">文章状态</label>
                <div class="layui-input-block" >
                    <select name="status">
                        <option value="0">请选择</option>
                        <volist name="notes.status" id="vo">
                            <empty name="info">
                                <option  value="{$key}">{$vo}</option>
                                <else />
                                <option <if ($info['status']==$key)>selected="selected"</if> value="{$key}">{$vo}</option>
                            </empty>

                        </volist>
                    </select>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">缩略图</label>
            <div class="layui-input-block">
                <div class="file-box">
                    <i class="layui-icon">&#xe61f;</i>
                    <input class="file-btn" type="button" value="选择图片">
                    <input class="file-txt" type="text" autocomplete="off"  id="textfield">
                    <img src="<notempty name='info'>{$info.img|default=''}</notempty>" width="120">
                    <input class="file-file" type="file" name="img" id="pic" size="28" onchange="document.getElementById('textfield').value = this.value" />
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="desc" autocomplete="off" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标签</label>
            <div style="float:left;" >
                <div class="file-box">
<!--                    <div id="showAddTag">-->
<!--                        <i class="layui-icon">&#xe61f;</i>-->
<!--                        <a  style="margin:0 auto;position:absolute;left:35px;top:10px;" id="addTag">添加标签</a>-->
<!--                    </div>-->

                    <div id="tags" style="margin:0 auto;padding:6px;border:1px solid #d5d5d5;float:left;">
                        <input type="text" name="" id="inputTags" placeholder="回车生成标签" autocomplete="off">
                    </div>
                    <div id="tagSelect" >
                        <span style="margin: 8px 0 0px 16px;float: left;" id="dt-tag-pre"> </span>
                    </div>
                    <input type="hidden" name="tags"  id="tags-h"  value="" />

                </div>

<!--                <input type="text" name="name" size="12" class="dt-tag-input-1"  />-->


<!--                <div id ="setTag" style="display:none;">-->
<!--                    <input type="hidden" name="tag" id="dt-h-tag"  value=""  />-->
<!--                    <span style="margin: 0 0 5px 110px;float: left;" id="dt-tag-m"> </span>-->
<!---->
<!--                    <div class="layui-form-item">-->
<!--                        <label class="layui-form-label">标签</label>-->
<!--                        <div class="layui-input-block">-->
<!--                            <input id="dt-input" type="text" value="" autocomplete="off" class="layui-input" style="width: 400px;float: left;margin-right: 20px;">-->
<!--                            <button class="layui-btn" id="dt-btn" type="button" style="background: #FF5722;">添加标签</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>

<!--            TODO::添加标签-->

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">编辑器</label>
            <div class="layui-input-block">
                <empty name="info">
                    <input type="radio" lay-filter="is_md" lay-verify="required" name="is_md" value="1" title="markdown"  checked >
                    <input type="radio" lay-filter="is_md" lay-verify="required" name="is_md" value="2" title="富文本"  >
                    <else />
                    <input type="radio" name="is_md" value="1" title="markdown" class="is_md" <if $info.is_md eq 1>checked<else/>disabled</if>>
                    <input type="radio" name="is_md" value="2" title="富文本" class="is_md"   <if $info.is_md eq 2>checked<else/>disabled</if>>
                </empty>

            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">文章内容</label>
            <empty name="info">
                <div class="layui-input-block" id="content">
                    <div id="content-editormd" class="form-group" style='width:70%;height:550px;z-index:999;margin:0'>
                        <textarea style="display:none;" required lay-verify="required" class="form-control" id="content-editormd-markdown-doc" name="content-editormd-markdown-doc"></textarea>
                    </div>
                </div>
                <else />
                <if $info.is_md eq 2>
                    <div class="layui-input-block">
                        <div id="textarea" style='width:70%;height:550px;'>
                            <p>{$info.content|raw}</p>
                        </div>
                        <textarea id="text1" style="display: none;" required lay-verify="required" name="content"></textarea>
                    </div>
                    <else/>
                    <div class="layui-input-block">
                        <div id="content-editormd" class="form-group" style='width:70%;height:550px;z-index:1010;margin:0'>
                            <textarea style="display:none;" class="form-control" id="content-editormd-markdown-doc" name="content-editormd-markdown-doc">{$info.content|raw}</textarea>
                        </div>
                    </div>

                </if>
            </empty>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <notempty name="info"><input type="hidden" name="id" value="{$info.id}"></notempty>
                <button class="layui-btn" lay-filter="formDemo" >保存</button>
                <button class="layui-btn" lay-filter="formDemo" >保存为草稿</button>
            </div>
        </div>
    </form>

</div>

<script>
    layui.use(['layer', 'jquery','form'], function () {
        var form = layui.form,
            lay = layui.layer,
            $ = layui.jquery;


        $('#addTag').click(function(){
            $("#tags").show();
            $("#showAddTag").hide();

        });



        var new_tag_str = '';
        $('#dt-btn').click(function(){
            tag_arr = new Array();
            var tag_str = $('#dt-h-tag').val();
            var tag_arr = tag_str.split(',');
            var e = $.trim($("#dt-input").val());
            if(e.length == 0){
                layer.msg('输入正确标签！');
            }else{
                if($.inArray(e,tag_arr) == -1){
                    tag_arr.push(e);
                }else{
                    layer.msg('已有此标签！');
                }
            }
            new_tag_str = tag_arr.join(',');
            $("#dt-h-tag").val(new_tag_str)

            html = delData(tag_arr);
            $('#dt-tag-m').html(html);

        });

        function delData(tag_arr)
        {
            var html = '';
            $.each(tag_arr,function(index,value){
                html += '<a href="javascript:;">';
                html += value;
                html += '<em></em>';
                html += '</a>';
            });

            return html;
        }



        form.on('radio(is_md)',function(data){
            var html = '';
            if(data.value == '1'){
                   html += '<div id="content-editormd" class="form-group" style="width:70%;height:550px;z-index:1010;margin:0">';
                   html += '<textarea style="display:none;" class="form-control" id="content-editormd-markdown-doc" name="content-editormd-markdown-doc"></textarea>';
                   html += '</div>';
                  $('#content').html(html);

                var dtEditor;
                dtEditor = editormd("content-editormd",{
                    placeholder : '编辑你的内容...',
                    width   : "80%",
                    height  : 600,
                    syncScrolling : "single",
                    path    : "/src/admin/editor/lib/",
                    watch   : true,
                    previewTheme : "white",//预览
                    theme : 'white',//工具栏
                    emoji : true,
                    taskList : true,
                    tocm  : true,         // Using [TOCM]
                    tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                    flowChart : true,             // 开启流程图支持，默认关闭
                    sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
                    saveHTMLToTextarea : true, // 保存HTML到Textarea
                    // 图片上传
                    imageUpload : true,
                    imageFormats: ["jpg","jpeg","gif","png","bmp","webp"],
                    imageUploadURL: "Article/UploadPic",
                    toolbarIcons : function() { //自定义工具栏，后面有详细介绍
                        return editormd.toolbarModes['full']; // full, simple, mini
                    }
                });

            }else{
                html += ' <div id="textarea" style="width:70%;height:550px;">';
                html += '<p></p></div>';
                html += '<textarea id="text1" style="display: none;" name="content"></textarea>';
                $('#content').html(html);

                var E = window.wangEditor;
                var editor = new E('#textarea');
                var $text1 = $('#text1');
                editor.customConfig.uploadImgServer = "{:url('Article/UploadPic')}";
                editor.customConfig.uploadFileName = 'info_upload_img';
                editor.customConfig.onchange = function (html) {
                    $text1.val(html);
                };
                editor.create();
                $text1.val(editor.txt.html());
                $('#textarea .w-e-text,.w-e-text-container').attr('style', 'border: 1px solid #ccc;width:100%;height:500px;');
            }

        });


        var dtEditor;
        dtEditor = editormd("content-editormd",{
            placeholder : '编辑你的内容...',
            width   : "80%",
            height  : 600,
            syncScrolling : "single",
            path    : "/src/admin/editor/lib/",
            watch   : true,
            previewTheme : "white",//预览
            theme : 'white',//工具栏
            emoji : true,
            taskList : true,
            tocm  : true,         // Using [TOCM]
            tex : true,                   // 开启科学公式TeX语言支持，默认关闭
            flowChart : true,             // 开启流程图支持，默认关闭
            sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
            saveHTMLToTextarea : true, // 保存HTML到Textarea
            // 图片上传
            imageUpload : true,
            imageFormats: ["jpg","jpeg","gif","png","bmp","webp"],
            imageUploadURL: "Article/UploadPic",
            toolbarIcons : function() { //自定义工具栏，后面有详细介绍
                return editormd.toolbarModes['full']; // full, simple, mini
            }
        });


        var E = window.wangEditor;
        var editor = new E('#textarea');
        var $text1 = $('#text1');
        editor.customConfig.uploadImgServer = "{:url('Article/UploadPic')}";
        editor.customConfig.uploadFileName = 'info_upload_img';
        editor.customConfig.onchange = function (html) {
            $text1.val(html);
        };
        editor.create();
        $text1.val(editor.txt.html());
        $('#textarea .w-e-text,.w-e-text-container').attr('style', 'border: 1px solid #ccc;width:100%;height:500px;');


    });

    layui.config({
        base: '/src/admin/js/',
    }).use(['inputTags'], function() {
        var inputTags = layui.inputTags;
        inputTags.render({
            elem: '#inputTags', //定义输入框input对象
            content: [], //默认标签
            aldaBtn: false, //是否开启获取所有数据的按钮
            done: function(value) { //回车后的回调
                console.log("刚刚输入标签===="+value)
            }
        })
    })



</script>