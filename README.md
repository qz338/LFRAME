# LFRAME 百部不射
这是个自己写的php框架，简单实用,仿tp仿yaf，有咩建议请留言
# php框架
采用命名空间
没有多余的类，目录结构和yaf一模一样，详情参考yaf
# 入口文件
public/index.php
# 配置数据库
1.在app/conf/app.ini 写入数据库具体参数
2.在bootstrap根据自己的table类配置 或者 直接在app/models/model.php（自己写逻辑哈）里配置
3.自己寻找适合自己的table类，然后让model.php继承
4.框架沿用TP的C方法和D方法
# 配置项目各个路径
可以根据需要修改LFrame/LFrame.php或者index.php
