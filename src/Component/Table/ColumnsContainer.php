<?php

namespace AntdAdmin\Component\Table;

use AntdAdmin\Component\BaseComponent;
use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\ColumnType\Checkbox;
use AntdAdmin\Component\ColumnType\Date;
use AntdAdmin\Component\ColumnType\DateMonth;
use AntdAdmin\Component\ColumnType\DateRange;
use AntdAdmin\Component\ColumnType\DateTime;
use AntdAdmin\Component\ColumnType\DateTimeRange;
use AntdAdmin\Component\ColumnType\DateYear;
use AntdAdmin\Component\ColumnType\Digit;
use AntdAdmin\Component\ColumnType\Image;
use AntdAdmin\Component\ColumnType\Progress;
use AntdAdmin\Component\ColumnType\Radio;
use AntdAdmin\Component\ColumnType\RadioButton;
use AntdAdmin\Component\ColumnType\Select;
use AntdAdmin\Component\ColumnType\Text;
use AntdAdmin\Component\ColumnType\Time;
use AntdAdmin\Component\ColumnType\TimeRange;
use AntdAdmin\Component\Table\ColumnType\Option;
use AntdAdmin\Lib\AutoCallAddComponent;


/**
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
 *
 * @method Option option(string $dataIndex, string $title)
 */
class ColumnsContainer extends BaseComponent
{
    use AutoCallAddComponent;

    public function addColumn(BaseColumn $column)
    {
        $column->editable(false);
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
            'AntdAdmin\\Component\\Table\\ColumnType\\',
        ];
    }
}