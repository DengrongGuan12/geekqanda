<section class="content">
    <section class="widget" style="min-height:300px">
        <header>
            <span class="icon">&#59160;</span>
            <hgroup>
                <h1>按积分排序</h1>
            </hgroup>
        </header>
        <div class="content no-padding timeline">
            <?php foreach($ids as $id):?>
                <div class="tl-post">
                    <span class="icon">&#128100;</span>
                    <p>
                        <img src="<?php
                        $s2 = new SaeStorage();
                        if($s2->fileExists("public","head/"."$names[$id]".".gif")){
                            $url=$s2->getUrl ("public","head/"."$names[$id]".".gif" );
                            echo "$url";
                        }else{
                            echo "$base/$heads/"."default.gif";
                        }

                        ?>" alt="" height="40" width="40" /> <?php echo $names[$id];?>
                        积分：<?php echo($credits[$id]);?>
                        注册时间:<?php echo($dates[$id]);?>
                        <!--                        <span class="reply"><input type="text" value="Respond to comment..."/></span>-->
                    </p>
                </div>
            <?php endforeach;?>


        </div>
    </section>