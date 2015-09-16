<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>入门级模板</title>
    <meta name="description" content="Creating Modal Window with Bootstrap">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo "$base/$css/"."signin.css";?>" rel="stylesheet">
    <link href="<?php echo "$base/$css/"."starter-template.css";?>" rel="stylesheet">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo "$base/$js/"."jqScroll.js";?>"></script>

    <style type="text/css">
        .navbar .nav > li .dropdown-menu {
            margin: 0;
        }
        .navbar .nav > li:hover .dropdown-menu {
            display: block;
        }
        .nav > li > a{
            padding: 0px 0px !important;
        }
        .nav > li > a:hover{
            background:none !important;
        }
        /*解决IE6闪动问题 start*/
        *html{background-image:url(about:blank);background-attachment:fixed;}
        /* toTop */
        .toTop{width:50px;height:50px;background:#CCC;border:0px solid #999;padding:0px;cursor:pointer;position:fixed;right:40px;bottom:140px;}
        *html .toTop{position:absolute;bottom:auto;top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));margin-bottom:80px;}

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            /*返回顶部*/
            $('#roll_top').hide();
            $(window).scroll(function () {
                if ($(window).scrollTop() > 20) {
                    $('#roll_top').fadeIn(400);//当滑动栏向下滑动时，按钮渐现的时间
                } else {
                    $('#roll_top').fadeOut(0);//当页面回到顶部第一屏时，按钮渐隐的时间
                }
            });
            $('#roll_top').click(function () {
                $('html,body').animate({
                    scrollTop : '0px'
                }, 300);//返回顶部所用的时间 返回顶部也可调用goto()函数
            });
        });
        function goto(selector){
            $.scrollTo ( selector , 1000);
        }
        function checkPasswords() {
            var pass1 = document.getElementById("password1");
            var pass2 = document.getElementById("password2");

            if (pass1.value != pass2.value)
                pass1.setCustomValidity("两次输入的密码不匹配");
            else
                pass1.setCustomValidity("");
        }
    </script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Geek Q and A</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索问题">
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <?php if($status!='OK'):?>
                <div class="navbar-form navbar-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#login">
                        登录
                    </button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#sign">
                        注册
                    </button>
                </div>
            <?php else:?>
                <div class="navbar-right dropdown" style="margin-top: 5px">
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="http://127.0.0.1/CodeIgniter-project/index.php/pages/self_info" style="text-decoration: none;"><img src="<?php echo "$base/$heads/"."default.gif";?>" style="width: 40px;height: 40px" class="img-rounded">
                                <font color="#f0ffff"><?php echo $name;?></font>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">留言板</a></li>
                                <li><a href="http://127.0.0.1/CodeIgniter-project/index.php/pages/self_info">管理</a></li>
                                <li><a href="http://127.0.0.1/CodeIgniter-project/index.php/pages/logout">退出</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>

            <?php endif;?>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <br />
<!--    <img src="--><?php //echo "$base/$images/"."logo.png";?><!--" class="img-responsive img-rounded" alt="Responsive image">-->