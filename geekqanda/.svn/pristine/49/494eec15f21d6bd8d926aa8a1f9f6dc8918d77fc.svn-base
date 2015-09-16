<section class="content">
    <section class="widget" style="min-height:300px">
        <header>
            <span class="icon">&#59160;</span>
            <hgroup>
                <h1>标题：<?php echo("$title");?></h1>

                <h1>悬赏分：<?php echo($credit);?></h1>
            </hgroup>

            <aside>
                <a href="<?php echo($address."answer_question/answer/".$id);?>"><button>我来回答</button></a>

                <?php if($ifPraise):?>
                    <a href=<?php echo($address."question/cancel_praiseQ/".$id);?>><button>取消赞 <?=$praise_count?></button></a>
                <?php else:?>
                    <a href=<?php echo($address."question/praiseQ/".$id);?>><button>点赞 <?=$praise_count?></button></a>
                <?php endif;?>
                <?php if($answer_count==0):?>
                    <?php if($name==$publisher):?>
                        <a href=<?php echo($address."question/delete_my_question/".$id);?>><button>删除</button></a>
                    <?php endif;?>

                <?php endif;?>
            </aside>
        </header>
        <div class="content timeline">
            <div class="question-answer">
                <div>
                    <p>
                        <?php foreach(array_keys($tags) as $tag_id):?>
                            <!--                进入标签下的所有问题-->
                            <a class="button tag" title="进入标签" href="<?php echo($address."tag/all_questions_of_tag/".$tag_id);?>"><?php echo($tags[$tag_id]);?><span class="pip tag-pip"><?php echo($q_count_of_tag[$tag_id]);?></span></a>
                        <?php endforeach;?>
                    </p>
                </div>


                <br />
                <br />
                <div style="margin-top: 50px;">
                    <p>
                        <?php echo("发布者:".$publisher);?>
                    </p>
                </div>
                <div style="margin-top: 10px;">
                    <p>
                        <?php echo("内容：<br />");?>
                    </p>
                    <p>
                        <?php echo($content);?>
                    </p>


                </div>

            </div>

            <?php if($end!=0):?>
<!--                <div class="tl-post comments">-->
               <div class="question-answer">
<!--                    <span class="icon">&#59168;</span>-->

                    <p>

                        <?php echo($agree_answer[2]."的回答(已被认同):".$agree_answer[1]);?>
                        <div style="float: right;">
                       <?php if($agree_answer[0]):?>
                           <a href=<?php echo($address."question/cancel_praiseA/".$end."/".$id);?>><button>取消赞 <?=$agree_answer[3]?></button></a>
                       <?php else:?>
                           <a href=<?php echo($address."question/praiseA/".$end."/".$id);?>><button>点赞 <?=$agree_answer[3]?></button></a>
                       <?php endif;?>
                        </div>


                    </p>
                </div>
            <?php endif;?>

            <?php foreach(array_keys($no_agree_answers) as $aid):?>
<!--                <div class="tl-post comments">-->
                <div class="question-answer">
<!--                    <span class="icon">&#59168;</span>-->
                    <p>

                        <?php echo($no_agree_answers[$aid][2]."的回答:".$no_agree_answers[$aid][1]);?>
                        <div style="float: right;">
                        <?php if($no_agree_answers[$aid][0]):?>
                            <a href=<?php echo($address."question/cancel_praiseA/".$aid."/".$id);?>><button>取消赞 <?=$no_agree_answers[$aid][3]?></button></a>
                        <?php else:?>
                            <a href=<?php echo($address."question/praiseA/".$aid."/".$id);?>><button>点赞 <?=$no_agree_answers[$aid][3]?></button></a>
                        <?php endif;?>
                        <?php if($end==0):?>
                            <?php if($name==$publisher):?>
                                <a href=<?php echo($address."question/agree/".$id."/".$aid);?>><button>认同此答案</button></a>
                                <button>追问</button>
                            <?php endif;?>

                        <?php endif;?>

                        </div>


                    </p>
                </div>
            <?php endforeach;?>


        </div>
    </section>