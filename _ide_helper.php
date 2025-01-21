<?php
/* @noinspection ALL */

// phpcs:ignoreFile

namespace AntdAdmin\Component\Table {

    use AntdAdmin\Component\Table\ActionType\Button;
    use AntdAdmin\Component\Table\ActionType\StartEditable;

    class ActionsContainer
    {

        /**
         * @param 'modal'|'link' $type
         * @return \AntdAdmin\Component\Table\ActionType\Button
         * @see \AntdAdmin\Lib\Helper\AutoMethod\AddNewTableAction
         */
        public function addNew(string $type = 'modal')
        {
        }

        /**
         * @return Button
         * @see \AntdAdmin\Lib\Helper\AutoMethod\ForbidTableAction
         */
        public function forbid()
        {
        }

        /**
         * @return Button
         * @see \AntdAdmin\Lib\Helper\AutoMethod\ForbidTableAction
         */
        public function resume()
        {
        }

        /**
         * @return StartEditable
         * @see \AntdAdmin\Lib\Helper\AutoMethod\SaveTableAction
         */
        public function editSave()
        {
        }

        /**
         * @return Button
         * @see \AntdAdmin\Lib\Helper\AutoMethod\DeleteTableAction
         */
        public function delete()
        {
        }
    }
}

namespace AntdAdmin\Component\Table\ColumnType {

    use AntdAdmin\Component\Table\ColumnType\ActionType\Link;

    class ActionsContainer
    {
        /**
         * @return Link
         * @see \AntdAdmin\Lib\Helper\AutoMethod\EditTableColumnAction
         */
        public function edit()
        {

        }

        /**
         * @return Link[] [0]为禁用，[1]为启用
         * @see \AntdAdmin\Lib\Helper\AutoMethod\ForbidTableColumnAction
         */
        public function forbid()
        {
        }

        /**
         * @return Link
         * @see \AntdAdmin\Lib\Helper\AutoMethod\DeleteTableColumnAction
         */
        public function delete()
        {
        }
    }
}