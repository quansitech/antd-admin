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
    ->setUrl(U('add'));

/** @var Button|Link|FormButton $button **/
$button->modal($modal);
```

setContent 可接收参数为 [Table](./Table.md)、[Form](./Form.md)及[Tabs](./Tabs.md)