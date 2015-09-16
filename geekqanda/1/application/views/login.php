<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Geek Q and A</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="<?php echo "$base/$css/"."style.css";?>" media="all" />
    <!--[if IE]><link rel="stylesheet" href="<?php echo "$base/$css/"."ie.css";?>" media="all" /><![endif]-->
</head>
<body class="login">
<section>
    <h1><strong>Geek</strong> Q and A</h1>
    <form method="post" action=<?php echo($address."pages/login");?>>
        <input type="text" placeholder="用户名" name="name" required/>
        <input placeholder="密码" type="password" name="password" required/>
        <?php if($success==0):?>
            <font color="#dc143c">用户名或密码错误！</font>
        <?php endif;?>
        <button class="blue" type="submit">登录</button>
    </form>
    <p><a href="#">Forgot your password?</a></p>
</section>
<script src="<?php echo "$base/$js/"."jquery.min.js";?>"></script>
<script type="text/javascript">
    // Page load delay by Curtis Henson - http://curtishenson.com/articles/quick-tip-delay-page-loading-with-jquery/
    $(function(){
//	$('.login button').click(function(e){
//		// Get the url of the link
//		var toLoad = $(this).attr('href');
//
//		// Do some stuff
//		$(this).addClass("loading");
//
//			// Stop doing stuff
//			// Wait 700ms before loading the url
//			setTimeout(function(){window.location = toLoad}, 10000);
//
//		// Don't let the link do its natural thing
//		e.preventDefault
//	});

        $('input').each(function() {

//       var default_value = this.value;

            $(this).focus(function(){
//               if(this.value == default_value) {
//                       this.value = '';
//               }
            });

            $(this).blur(function(){
//               if(this.value == '') {
//                       this.value = default_value;
//               }
            });

        });
    });
</script>
</body>
</html>