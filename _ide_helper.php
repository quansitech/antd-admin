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
         */
        public function forbid()
        {
        }

        /**
         * @return Button
         */
        public function resume()
        {
        }

        /**
         * @return StartEditable
         */
        public function editSave()
        {
        }

        /**
         * @return Button
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
         */
        public function edit()
        {

        }

        /**
         * @return Link[] [0]为禁用，[1]为启用
         */
        public function forbid()
        {
        }

        /**
         * @return Link
         */
        public function delete()
        {
        }
    }
}