<section class="content">
    <section class="widget" style="min-height:300px">
        <header>
            <span class="icon">&#59160;</span>
            <hgroup>
                <h1>月最热(按当月该问题和它的回答的赞数的总和排序)</h1>
            </hgroup>
        </header>
        <div class="content no-padding timeline">
            <?php foreach ($sorted_qids as $id): ?>
                <div class="tl-post comments">
                    <span class="icon">&#59168;</span>
                    <p>
                        <a title="进入问题" href="<?php echo ($address."question/single_question/".$id);?>"><?php echo($titles[$id]);?></a>

                        <span class="pip"><?php echo($qid_praises[$id]);?></span>



                        <br />
                        <?php echo($users[$id]);?>创建于 <?php echo($dates[$id]);?>


                        <!--                        <span class="reply"><input type="text" value="Respond to comment..."/></span>-->
                    </p>
                </div>
            <?php endforeach; ?>


        </div>
    </section>