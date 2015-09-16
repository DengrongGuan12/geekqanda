
<section class="content">
    <section class="widget" style="height: 1100px; min-height:300px">
        <header>
            <span class="icon">&#128196;</span>
            <hgroup>
                <h1>回答问题:<?php echo($title);?></h1>
            </hgroup>
        </header>
        <div class="content">
            <form onsubmit="return checkInputs();" action="<?php echo($address."answer_question/getData/");?>"  method="post" name="form1">
                <div class="green">
                    <p>你可以通过复制粘贴来插入图片(可以改变大小)，像编辑word文档一样来编辑你的回答吧！</p>
                </div>
                <div class="field-wrap wysiwyg-wrap">
                    <textarea value="输入具体内容" id="content" class="post" rows="5" name="content"></textarea>

                </div>
                <div id="content-error" class="red" style="margin-top: 0px;">
                    <p>内容不能为空！</p>
                </div>

                <button class="green">提交</button>
                <div id='submit-success' class='orange' style='margin-top: 3px;'>
                    <p>发布成功(你可以在 管理->我的回答 中找到该回答)!</p>
                </div>



            </form>
            <script type="text/javascript">
                function checkInputs(){
                    var content=document.form1.content;
                    if(content.value.length==0||content.value=="<p>Initial content</p>"||content.value=="<p><br></p>"){
                        $("#content-error").fadeIn();
                        content.focus();
                        return false;
                    }else{
                        $("#content-error").fadeOut();
                        var url="<?php echo($address."answer_question/getData");?>";
//                        var title = document.getElementById("title").value;
//                        var content = editor.document.getBody().getHtml(); //取得html文本
                        var data = {
                            content: content.value,
                            qid:<?php echo($qid);?>
                        };
                        $.ajax({
                            url: url,
                            data: data,
                            type: 'POST',
                            success: function (msg) {
                                showSubmitResult(msg);
                                content.value="";
//                                alert(msg);
                            }
                        });
                        return false;


                    }

                }
                function showSubmitResult(str){

                    $("#"+str).fadeIn();



                }

            </script>
        </div>
    </section>
