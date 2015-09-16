<section class="content">
    <section class="widget" style="min-height:300px">
        <header>
            <span class="icon">&#59160;</span>
            <hgroup>
                <h1>热门标签(按该标签下所有的问题及回答的总赞数排序)</h1>
            </hgroup>
        </header>
        <div style="margin-top: 20px;">
            <p>
                <?php foreach($sorted_ids as $id):?>
                    <a class="tag button" title="进入标签" href="<?php echo($address."tag/all_questions_of_tag/".$id);?>"><?php echo($tags[$id]);?><span class="pip tag-pip"><?php echo($tag_praises[$id]);?></span></a>

                <?php endforeach;?>
            </p>

        </div>
    </section>


