<?php
namespace SR\Weblog\Model\Resource;

class BlogPosts extends \Magento\Framework\Model\Resource\Db\AbstractDb
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