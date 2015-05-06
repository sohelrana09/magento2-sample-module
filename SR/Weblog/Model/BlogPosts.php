<?php
namespace SR\Weblog\Model;

class BlogPosts extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('SR\Weblog\Model\Resource\BlogPosts');
    }
}