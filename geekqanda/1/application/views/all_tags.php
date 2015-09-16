<section class="content">
    <section class="widget" style="min-height:300px">
        <header>
            <span class="icon">&#59160;</span>
            <hgroup>
                <h1>所有标签(按该标签下的问题数排序)</h1>
            </hgroup>
        </header>
        <div style="margin-top: 20px;">
            <p>
                <?php foreach($sorted_ids as $id):?>
                    <a class="tag button" title="进入标签" href="<?php echo($address."tag/all_questions_of_tag/".$id);?>"><?php echo($tags[$id]);?><span class="pip tag-pip"><?php echo($count[$id]);?></span></a>
                <?php endforeach;?>
            </p>

        </div>
    </section>


