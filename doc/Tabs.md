# Tabs

## 示例

```php
use AntdAdmin\Component\Form;
use AntdAdmin\Component\Tabs;

$tab2 = new Form();
$tab2->columns(function (Form\ColumnsContainer $container){
        $container->text('name', '名称');
    })
    ->setSubmitRequest('post', U(''))
    ->actions(function (Form\ActionsContainer $container){
        $container->button('提交')->submit();
    });

$tabs = new Tabs();
$tabs
    ->addTab('tab0', '标签1', null, U('tab1')) // 请求地址渲染pane
    ->addTab('tab1', '标签2', $tab2) // 直接渲染pane
    ->render();

```

## API

* __construct() 构造函数
* addTab($key, $title, $pane, $url) 添加标签页
* render() 渲染标签页
