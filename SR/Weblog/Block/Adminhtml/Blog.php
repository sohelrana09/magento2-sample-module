<?php
namespace SR\Weblog\Block\Adminhtml;

class Blog extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml';
        $this->_blockGroup = 'SR_Weblog';
        $this->_headerText = __('Manage Blog Post');
        $this->_addButtonLabel = __('Add New Blog Post');
        parent::_construct();
    }
}