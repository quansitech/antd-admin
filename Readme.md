# Antd-admin for Qscmf

该项目为 [qs-cmf](https://github.com/quansitech/qs_cmf) 后台 ant-design-pro 模式的组件库

## 安装

```shell
composer require quansitech/antd-admin
```

## 使用

该项目采用container模式，组件通过container增加，并已增加默认组件的快捷操作，不需要手动new 组件

* [表格组件Table](./doc/Table.md)
* [表单组件Form](./doc/Form.md)
* [标签页组件Tabs](./doc/Tabs.md)

## 扩展组件

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