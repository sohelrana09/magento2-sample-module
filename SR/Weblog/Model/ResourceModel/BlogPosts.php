<?php
namespace SR\Weblog\Model\ResourceModel;

class BlogPosts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('blog_posts', 'blogpost_id');
    }
}