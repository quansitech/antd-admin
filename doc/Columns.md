# Columns

## 列表

* [Area](#Area) 地区
* [Cascader](#Cascader) 联动
* [Checkbox](#Checkbox) 多选
* [Date](#Date) 日期
* [DateMonth](#DateMonth) 月份
* [DateRange](#DateRange) 日期范围
* [DateTime](#DateTime) 日期时间
* [DateTimeRange](#DateTimeRange) 日期时间范围
* [DateYear](#DateYear) 年份
* [Digit](#Digit) 数字
* [File](#File) 上传
* [Image](#Image) 图片上传
* [Money](#Money) 货币
* [Password](#Password) 密码
* [Progress](#Progress) 进度
* [Radio](#Radio) 单选
* [RadioButton](#RadioButton) 单选按钮
* [Select](#Select) 下拉选择
* [SwitchType](#SwitchType) 开关
* [Text](#Text) 文本
* [Textarea](#Textarea) 多行文本
* [Time](#Time) 时间
* [TimeRange](#TimeRange) 时间范围

### Api

#### Area

* setMaxLevel(int level) 设置最大级数，默认3级

#### Cascader

* setOptions(List<CascaderOption> options) 设置选项
* setLoadDataUrl(String url) 设置加载数据的url

#### Checkbox

* setValueEnum(Map valueEnum) 设置选项Map

#### Date

#### DateMonth

#### DateRange

#### DateTime

#### DateTimeRange

#### DateYear

#### Digit

#### File

* setUploadRequest(string $policyGetUrl) 设置上传文件请求地址
* setMaxCount(int $maxCount) 设置最大上传文件数量

object-storage上传请参考[os](https://github.com/qq958691165/qscmf-formitem-object-storage?tab=readme-ov-file#%E4%BD%BF%E7%94%A8)

#### Image

继承File
* setUploadRequest(string $policyGetUrl) 设置上传文件请求地址
* setMaxCount(int $maxCount) 设置最大上传文件数量
* setCrop(string $ratio) 设置裁剪比例， width/height

#### Money

#### Password

#### Progress

#### Radio

* setValueEnum(Map valueEnum) 设置选项Map

#### RadioButton

* setValueEnum(Map valueEnum) 设置选项Map

#### Select

* setValueEnum(Map valueEnum) 设置选项Map

#### SwitchType

#### Text

#### Textarea

#### Time

#### TimeRange
