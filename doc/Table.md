# Table

## 示例

```php
use AntdAdmin\Table;

$table = new Table();
$table->setMetaTitle('页面标题')
      ->actions(function (Table\ActionsContainer $container) {
          $container->button('添加')->link(U('add'));
      })
      ->columns(function (Table\ColumnsContainer $container) {
          $container->text('id', 'ID');
          $container->text('name', '名称');
          $container->dateTime('created_at', '创建时间');
          $container->option('', '操作')->options(function (Table\ColumnType\OptionsContainer $container) {
              $container->link('编辑')->link(U('edit', ['id' => '__id__']));          
          })
      })
      ->setDataSource($data_list)
      ->render();
```

## API

* __construct() 构造函数
* setMetaTitle(string title) 设置页面标题
* actions(Closure $closure) 设置表格操作栏，参考 [Table.Actions](#表格操作栏)
* columns(Closure $closure) 设置表格列，参考 [Table.Columns](#表格列)
* setDataSource(array data) 设置数据源
* setPagination(Pagination $pagination) 设置分页
* setRowKey($key) 设置行键，默认为 id
* setDefaultSearchValue($value) 设置默认搜索值
* setDateFormatter(string $formatter) 设置日期格式
* setSearchUrl(string url) 设置搜索地址
* render() 渲染表格

### 表格操作栏

```php
use AntdAdmin\Component\Table;

/** @var Table $table */
$table->actions(function (Table\ActionsContainer $container) {
    $container->button('添加')->link(U('add'));
    $container->startEditable('编辑')->saveRequest('put', U('save'));
});
```

#### Button

* __construct(string title) 构造函数, title 为按钮文字
* setProps(array props) 设置按钮属性，参考 [ant-design#button](https://ant.design/components/button-cn#api)
* link(string url) 设置按钮链接，url 为链接地址
* modal(Modal modal) 弹窗
* relateSelection() 关联选择目标

#### StartEditable

* __construct(string title) 构造函数, title 为按钮文字
* setProps(array props) 设置按钮属性，参考 [ant-design#button](https://ant.design/components/button-cn#api)
* saveRequest(string method, string url) 设置保存请求，method 为请求方法，url 为请求地址

### 表格列

```php
use AntdAdmin\Component\Table;
/** @var Table $table */
$table->columns(function (Table\ColumnsContainer $container) {
    $container->text('id', 'ID')->setSearch(false);
    $container->text('name', '名称');
    $container->dateTime('created_at', '创建时间');
    $container->option('', '操作')->options(function (Table\ColumnType\OptionsContainer $container){
        $container->link('编辑')->setHref(U('edit', ['id'=>'__id__']));
    });
});
```

#### BaseColumn (基础列)

* __construct(string dataIndex, string title) 构造函数，dataIndex 为字段名，title 为标题
* setSearch(bool search) 设置是否显示搜索框，默认显示
* editable(bool edit) 设置是否可编辑
* setWidth(string width) 设置列宽
* setFormItemProps(array props) \[编辑模式]
  设置表单项属性，参考 [ant-design#form-item](https://ant.design/components/form-cn/#formitem)
* setFieldProps(array props) \[编辑模式]
  设置表单项组件属性，如text类型，参考 [ant-design#input](https://ant.design/components/input-cn/#api)

#### Option (操作列)

* __construct(string dataIndex, string title) 构造函数，dataIndex 为字段名【空字符串就好】，title 为标题
* options(Closure $closure) 设置操作项，参考 [Table.Column.Option](#行操作组件)

其它列类型请查看 [Columns](./Columns.md)

##### 行操作组件

###### Link

* __construct(string title) 构造函数，title 为按钮文字
* setHref(string url) 设置链接地址
* modal(Modal modal) 弹窗
* request(string method, string url, array data=null, array headers=null, string confirm='') 设置请求，method 为请求方法，url
  为请求地址，data 为请求数据，headers 为请求头，confirm 为确认提示