<?php
namespace SR\Weblog\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;

class MassStatus extends \Magento\Backend\App\Action
{
    /**
     * Update blog post(s) status action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $blogpostIds = $this->getRequest()->getParam('blogpost');
        if (!is_array($blogpostIds) || empty($blogpostIds)) {
            $this->messageManager->addError(__('Please select blog post(s).'));
        } else {
            try {
                $status = (int) $this->getRequest()->getParam('status');
                foreach ($blogpostIds as $postId) {
                    $post = $this->_objectManager->get('SR\Weblog\Model\BlogPosts')->load($postId);
                    $post->setIsActive($status)->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been updated.', count($blogpostIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('weblog/*/index');
    }

}
