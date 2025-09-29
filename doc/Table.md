# Table

## 示例

```php
use AntdAdmin\Component\Table;

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
* setPagination(Pagination|false $pagination) 设置分页
* setRowKey($key) 设置行键，默认为 id
* setDefaultSearchValue($value) 设置默认搜索值
* setDateFormatter(string $formatter) 设置日期格式
* setSearchUrl(string url) 设置搜索地址
* setSearch(boolean search) 设置是否展示搜索栏
* setExpandable(array expandable)
  设置树形展开属性。参考 [Antd.expandable](https://ant.design/components/table-cn#expandable)
* render() 渲染表格

### 表格操作栏

```php
use AntdAdmin\Component\Table;

/** @var Table $table */
$table->actions(function (Table\ActionsContainer $container) {
    $container->button('添加')->link(U('add'));
    $container->startEditable('编辑')->saveRequest('put', U('save'));
    
    // v1.1 增加以下快捷操作
    $container->addNew(); //添加
    $container->forbid(); //禁用
    $container->resume(); //恢复
    $container->delete(); //删除
    $container->editSave(); //编辑保存
});
```

#### Button

* __construct(string title) 构造函数, title 为按钮文字
* setProps(array props) 设置按钮属性，参考 [ant-design#button](https://ant.design/components/button-cn#api)
* link(string url) 设置按钮链接，url 为链接地址
* request(string method, string url, array data=null, array headers=null, string confirm='') 设置请求，method 为请求方法,
  url 为请求地址，data 为请求数据，headers 为请求头，confirm 为确认提示，当关联选择时，data支持 `__字段名__` 形式占位符
* modal(Modal modal) [弹窗](./Modal.md)
* relateSelection() 关联选择目标
* setBadge(string $badge) 设置角标
* setAuthNode(string $authNode) 设置权限节点

#### StartEditable

* __construct(string title) 构造函数, title 为按钮文字
* setProps(array props) 设置按钮属性，参考 [ant-design#button](https://ant.design/components/button-cn#api)
* saveRequest(string method, string url) 设置保存请求，method 为请求方法，url 为请求地址
* setAuthNode(string $authNode) 设置权限节点

### 表格列

```php
use AntdAdmin\Component\Table;
/** @var Table $table */
$table->columns(function (Table\ColumnsContainer $container) {
    $container->text('id', 'ID')->setSearch(false);
    $container->text('name', '名称');
    $container->dateTime('created_at', '创建时间');
    $container->action('', '操作')->actions(function (Table\ColumnType\ActionsContainer $container){
        $container->link('编辑')->setHref(U('edit', ['id'=>'__id__']));
        
        // v1.1 增加以下快捷操作
        $container->edit();
        $container->forbid();
        $container->delete();
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
* setAuthNode(string $authNode) 设置权限节点


#### SelectText (下拉+文本搜索列)
* __construct(string dataIndex, string title) 构造函数，dataIndex 为字段名【以“:”分隔字段，如 `key:value`】，title 为标题
* setValueEnum(Map valueEnum) 设置选项Map

#### Action (操作列)

* __construct(string dataIndex, string title) 构造函数，dataIndex 为字段名【空字符串就好】，title 为标题
* actions(Closure $closure) 设置操作项，参考 [Table.Column.Action](#行操作组件)

其它列类型请查看 [Columns](./Columns.md)

##### 行操作组件

###### Link

* __construct(string title) 构造函数，title 为按钮文字
* setHref(string url) 设置链接地址，支持 `__字段名__` 形式占位符
* modal(Modal modal) [弹窗](./Modal.md)，当使用setUrl时，支持 `__字段名__` 形式占位符
* request(string method, string url, array data=null, array headers=null, string confirm='') 设置请求，method 为请求方法，url
  为请求地址，data 为请求数据，headers 为请求头，confirm 为确认提示，`url`及`data`支持 `__字段名__` 形式占位符
* setBadge(string $badge) 设置角标，支持 `__字段名__` 形式占位符
* setShowCondition($field, $operator, $value) 设置显示条件
* setAuthNode(string $authNode) 设置权限节点
