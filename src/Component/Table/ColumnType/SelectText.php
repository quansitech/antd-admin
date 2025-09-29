<?php

namespace AntdAdmin\Component\Table\ColumnType;
use AntdAdmin\Component\ColumnType\BaseColumn;
use AntdAdmin\Component\Traits\HasValueEnum;

class SelectText extends BaseColumn
{
    use HasValueEnum;

	protected function getValueType(): string
	{
		return 'selectText';
	}

    protected function beforeAddTable(){
        $this->hideInTable();
    }

    public function setPlaceholder(string $placeholder){
        $this->render_data['fieldProps']['placeholder'] = $placeholder;
        return $this;
    }

}