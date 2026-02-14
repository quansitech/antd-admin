# Modal

弹窗使用示例

```php
use AntdAdmin\Component\Form;
use AntdAdmin\Component\Modal\Modal;
use \AntdAdmin\Component\Table\ActionType\Button;
use \AntdAdmin\Component\Form\ActionType\Button as FormButton;
use \AntdAdmin\Component\Table\ColumnType\ActionType\Link;


$modal = new Modal();
$modal->setTitle('新增')
    ->setWidth('800px')
    // 设置内容
    ->setContent(new Form())
    // 或设置url
    ->setUrl(U('add'))
    // 或设置请求
    ->setRequest('post',U('modal'),['id'=>1]);

/** @var Button|Link|FormButton $button **/
$button->modal($modal);
```

- setContent 可接收参数为 [Table](./Table.md)、[Form](./Form.md)及[Tabs](./Tabs.md)

- setRequest 支持Table关联选择数据替换，支持“__字段__”占位符

```php
$modal = new Modal();
$modal->setTitle('弹窗');
$modal->setRequest('post', U('modal', ['id'=>'__id__']), [
    'id' => '__id__'
]);
/** @var AntdAdmin\Component\Table\ActionsContainer $container */
$container->button('关联弹窗')->relateSelection()->modal($modal);
```