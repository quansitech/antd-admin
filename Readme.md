# Antd-admin for Qscmf

该项目为 [qs-cmf](https://github.com/quansitech/qs_cmf) 后台 ant-design-pro 模式的组件库

## 安装

```shell
composer require quansitech/antd-admin
npm install
npm run build:backend
```

## 使用

### 通用组件

该项目采用container模式，组件通过container增加，并已增加默认组件的快捷操作，不需要手动new 组件

* [表格组件Table](./doc/Table.md)
* [表单组件Form](./doc/Form.md)
* [标签页组件Tabs](./doc/Tabs.md)

### 自定义页面

1. 新增页面组件

    ```tsx
    // resources/js/backend/Pages/Index.tsx
    import {usePage, Head} from "@inertiajs/react";
    
    export default function (){
        const props = usePage<{
            fooUrl: string,
            barUrl: string
        }>().props
    
        return <>
            <Head title="Index"></Head>
            <h1>TP inertia</h1>
        </>
    }
    ```

2. 编译静态资源

    ```shell 
    # 编译
    npm run build:backend
    # 或 开发模式
    npm run dev:backend
    ```

3. controller中返回inertia响应

    ```php
    use Qscmf\Lib\Inertia\Inertia;
    
    $this->inertia('Index', [
        // 页面的props
        'foo' => 'bar'
    ])
    
    // 或使用全局 Inertia 类
    Inertia::render('Index', [
        // 页面的props
        'foo' => 'bar'
    ]);
    ```

## 注册扩展组件

在包的composer.json中添加如下配置

```json5
{
  // 省略其它配置
  "extra": {
    "qscmf": {
      "antd-admin": {
        "component": {
          "【container注册位置】": "【目标组件路径】",
          "Column.Extra": "resourses/js/Component/Extra.tsx"
        }
      }
    }
  }
}
```

其中container注册位置可参考 [前端库文档=自定义组件](https://github.com/quansitech/antd-admin-front?tab=readme-ov-file#%E8%87%AA%E5%AE%9A%E4%B9%89%E7%BB%84%E4%BB%B6)