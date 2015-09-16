
    $('#no_login_name').hide();
    $('#no_login_password').hide();
    $('#too_long_name').hide();
    $('#too_long_password').hide();
    var login_bt=document.getElementById('login_btn');
    var login_name=document.getElementById('login_name');
    var login_passwd=document.getElementById('login_passwd');
    login_bt.click(
        function(event){
            if(login_name.length<1){
                $('#no_login_name').show();

            }else{
                $('#no_login_name').hide();
            }
            if(login_passwd.length<1){
                $('#no_login_password').show();
            }else{
                $('#no_login_password').hide();
            }
            if(login_name.length>128){
                $('#too_long_name').show();
            }else{
                $('#too_long_name').hide();
            }
            if(login_passwd.length>128){
                $('#too_long_password').show();
            }else{
                $('#too_long_password').hide();
            }
            event.preventDefault();
        }
    );
//    login_bt.onclick=function(){
//        if(login_name.validationMessage===""&&login_passwd.validationMessage===""){
//            var data='name='+login_name+'&password='+login_passwd;
//            $.ajax({
//                type:"POST",
//                url:"index.php/pages/login",
//                data:data,
//                success:function(html){
//                    $('#login_error').innerHTML=html;
//                }
//            });
//
//
//        }
//       return false;
//    }
//var xmlobj; //定义XMLHttpRequest对象
//function CreateXMLHttpRequest()
//{
//    if(window.XMLHttpRequest)
//    {//Mozilla浏览器
//        xmlobj=new XMLHttpRequest();
//        if(xmlobj.overrideMimeType)
//        {//设置MIME类别
//            xmlobj.overrideMimeType("text/xml");
//        }
//    }
//    else if(window.ActiveXObject) { //IE浏览器
//        try {
//            xmlobj=new ActiveXObject("Msxml2.XMLHttp");
//        }
//        catch(e) {
//            try {
//                xmlobj=new ActiveXobject("Microsoft.XMLHttp");
//            }
//            catch(e) {
//            }
//        }
//    }
//}
//
function StatHandler() { //用于处理状态的函数
    if(xmlobj.readyState == 4 && xmlobj.status == 200) //如果URL成功访问，则输出网页
    {
        document.getElementById("login_error").innerHTML=xmlobj.responseText ;//替换，即输出结果。
    }
}

var login_bt=document.getElementById('login_btn');
var login_name=document.getElementById('login_name');
var login_passwd=document.getElementById('login_passwd');
login_bt.onclick=function(){
    if(login_name.validationMessage===""&&login_passwd.validationMessage===""){
        CreateXMLHttpRequest(); //创建对象

        var url = "index.php/pages/login"; //构造URL
        xmlobj.open("post", showurl); //调用validate.phpmingm

        xmlobj.onreadystatechange = StatHandler; //判断URL调用的状态值并处理
        xmlobj.send(null); //设置为不发送给服务器任何数据


    }
//    return false;
}
