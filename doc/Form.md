# Form

## 示例

```php
use AntdAdmin\Component\Form;

$form = new Form();

$form->setMetaTitle('新增')
    ->setInitialValues(['name' => 'test'])
    ->setSubmitRequest('post', U('add'))
    ->columns(function (Form\ColumnsContainer $container){
        $container->text('name', '名称');
        $container->textarea('content', '内容');
    })
    ->actions(function (Form\ActionsContainer $container){
        $container->button('提交')->submit();
        $container->button('重置')->reset();
    })
    ->render();
```

## API

* __construct() 构造函数
* setMetaTitle($title) 设置页面标题
* setInitialValues($values) 设置初始值
* setSubmitRequest(\$method, \$url) 设置提交请求
* columns(\Closure $callback) 设置表单项，参考 [Column](#表单项)
* actions(\Closure $callback) 设置表单操作，参考 [Actions](#操作)
* render() 渲染表单

### 表单项

#### BaseColumn (基础项)

* __construct(string dataIndex, string title) 构造函数，dataIndex 为字段名，title 为标题
* setFormItemWidth(int md, int lg) 设置表单项栅格宽度，md 为小屏幕，lg 为大屏幕
* setTips(string $tips) 设置提示信息
* setFormItemProps(array props)
  设置表单项属性，参考 [ant-design#form-item](https://ant.design/components/form-cn/#formitem)
* setFieldProps(array props)
  设置表单项组件属性，如text类型，参考 [ant-design#input](https://ant.design/components/input-cn/#api)

其它列类型请查看 [Columns](./Columns.md)

### 操作

#### Button

* __construct(string $title) 构造函数
* setProps(array $props) 设置按钮属性，参考 [ant-design#button](https://ant.design/components/button-cn/#API)
* reset() 设置为重置操作
* request(\$method, \$url, array \$data = null, array \$headers = null, \$confirm = '') 设置请求操作
* submit() 设置为提交操作
* modal(Modal $modal) 设置为弹窗操作
* back() 设置为返回操作
