# 欢迎使用 slimphp1.0

------

这是一个轻量的接口框架，以slimV4为基础，引入medoo模块来操作数据库，并独立封装出控制器和模型，以及配置文件：
### 快速上手
```
1. 克隆代码
git clone https://github.com/zuoshoupai/simphp.git
2. 安装依赖
composer install
3. ok!

```
 
### 路由

> 路由功能完全保留slim原型，请参考[slim文档](https://www.slimframework.com/docs/v4/)

------

### 入口
> 入口放在`/public`下的`index.php`，

### 控制器与模型
>控制器与模型的命名空间分别是Controller和Model，指向根目录`/app`，默认引用示例：`\Controller\controller\homeController`、`use Model\model\dbModel as Db`

### 配置文件与公共函数
>配置文件和公共函数都存放在根目录`/lib`下，公共函数可以直接使用，配置文件使用示例如下：
```php
<?php
use \Model\model\loadConfig as Config;  
class ###Class
{
    public function demo(){ 
        $APPID=Config::get('zfb.appid');  
        .......
    } 
}
```
### 数据库操作
>数据库操作使用medoo模块，操作方法可参考[medoo文档](https://medoo.lvtao.net/1.2/doc.php),引用示例如下：
```php
<?php 
use Model\model\dbModel as Db;
class ###Class
{ 
	public function list($req,$res,$args){ 
        $Db=new Db();
        $data=$Db->select("table",'*');
        var_dump($data); 
    } 
}
```
### 其它
>本框架基于slim框架，可完全参考slim文档进行开发。感谢使用，如有疑问，请发邮件到245754047@qq.com
