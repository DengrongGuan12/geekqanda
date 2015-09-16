</div><!-- /.container -->

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="form-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">请登录</h4>
            </div>
            <div class="modal-body">
                <form class="form-signin" role="form" autocomplete="on" method="post" action="http://www.geekqanda.sinaapp.com/index.php/pages/login">
                    <input name="name" type="text" class="form-control" placeholder="用户名" required autofocus>
                    <input name="password" type="password" class="form-control" placeholder="密码" required autocomplete="off">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> 记住我
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="sign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="form-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">请注册</h4>
            </div>
            <div class="modal-body">

                <form class="form-signin" role="form" autocomplete="on" method="post" action="http://www.geekqanda.sinaapp.com/index.php/pages/sign">
                    <input name="name" type="text" class="form-control" placeholder="用户名" required autofocus>
                    <input name="password" type="password" id="password1" class="form-control" placeholder="密码" autocomplete="off" onchange="checkPasswords()" required>
                    <input type="password" id="password2" class="form-control" placeholder="重复密码" autocomplete="off" onchange="checkPasswords()" required>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> 记住我
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="footer" style="background:#303030">
    <div class="container" align="center">
        <p align='center'><font color='white'>Copyright &copy; 2014 DengrongGuan. All rights reserved.</font> </p>
    </div>


</div>
<div class="toTop" id="roll_top">
    <img height="50" width="50" src="<?php echo "$base/$images/"."top_button.png";?>">
</div>
</body>
</html>