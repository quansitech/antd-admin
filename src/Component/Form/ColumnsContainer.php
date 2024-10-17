<?php

namespace AntdAdmin\Component\Form;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\ColumnType\Area;
use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\ColumnType\Cascader;
use AntdAdmin\Component\ColumnType\Checkbox;
use AntdAdmin\Component\ColumnType\Date;
use AntdAdmin\Component\ColumnType\DateMonth;
use AntdAdmin\Component\ColumnType\DateRange;
use AntdAdmin\Component\ColumnType\DateTime;
use AntdAdmin\Component\ColumnType\DateTimeRange;
use AntdAdmin\Component\ColumnType\DateYear;
use AntdAdmin\Component\ColumnType\Digit;
use AntdAdmin\Component\ColumnType\File;
use AntdAdmin\Component\ColumnType\Image;
use AntdAdmin\Component\ColumnType\Money;
use AntdAdmin\Component\ColumnType\Password;
use AntdAdmin\Component\ColumnType\Progress;
use AntdAdmin\Component\ColumnType\Radio;
use AntdAdmin\Component\ColumnType\RadioButton;
use AntdAdmin\Component\ColumnType\Select;
use AntdAdmin\Component\ColumnType\SwitchType;
use AntdAdmin\Component\ColumnType\Text;
use AntdAdmin\Component\ColumnType\Textarea;
use AntdAdmin\Component\ColumnType\Time;
use AntdAdmin\Component\ColumnType\TimeRange;
use AntdAdmin\Component\Form;
use AntdAdmin\Lib\AutoCallAddComponent;

/**
 * @method Cascader cascader(string $dataIndex, string $title)
 * @method Password password(string $dataIndex, string $title)
 * @method Money money(string $dataIndex, string $title)
 * @method Textarea textarea(string $dataIndex, string $title)
 * @method Checkbox checkbox(string $dataIndex, string $title)
 * @method Date date(string $dataIndex, string $title)
 * @method DateMonth dateMonth(string $dataIndex, string $title)
 * @method DateRange dateRange(string $dataIndex, string $title)
 * @method DateTime dateTime(string $dataIndex, string $title)
 * @method DateTimeRange dateTimeRange(string $dataIndex, string $title)
 * @method DateYear dateYear(string $dataIndex, string $title)
 * @method Digit digit(string $dataIndex, string $title)
 * @method Progress progress(string $dataIndex, string $title)
 * @method Radio radio(string $dataIndex, string $title)
 * @method RadioButton radioButton(string $dataIndex, string $title)
 * @method Select select(string $dataIndex, string $title)
 * @method Text text(string $dataIndex, string $title)
 * @method Time time(string $dataIndex, string $title)
 * @method TimeRange timeRange(string $dataIndex, string $title)
 * @method Image image(string $dataIndex, string $title)
 * @method SwitchType switchType(string $dataIndex, string $title)
 * @method File file(string $dataIndex, string $title)
 * @method Area area(string $dataIndex, string $title)
 * @method Form\ColumnType\Ueditor ueditor(string $dataIndex, string $title)
 */
class ColumnsContainer extends BaseComponent
{
    use AutoCallAddComponent;

    protected Form $form;

    public function addColumn(BaseColumn $column)
    {
        if (method_exists($column, 'afterFormAdd')) {
            $column->afterFormAdd();
        }
        $this->render_data[] = $column;
        return $column;
    }

    protected function getCallMethod(): string
    {
        return 'addColumn';
    }

    protected function getNamespace(): array
    {
        return [
            'AntdAdmin\\Component\\ColumnType\\',
            'AntdAdmin\\Component\\Form\\ColumnType\\'
        ];
    }
}