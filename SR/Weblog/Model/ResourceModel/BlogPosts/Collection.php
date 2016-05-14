<?php
namespace SR\Weblog\Model\ResourceModel\BlogPosts;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'blogpost_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('SR\Weblog\Model\BlogPosts', 'SR\Weblog\Model\ResourceModel\BlogPosts');
        $this->_map['fields']['blogpost_id'] = 'main_table.blogpost_id';
    }

    /**
     * Prepare page's statuses.
     * Available event cms_page_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}