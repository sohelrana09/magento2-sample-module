<?php
namespace SR\Weblog\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $blogpostIds = $this->getRequest()->getParam('blogpost');
        if (!is_array($blogpostIds) || empty($blogpostIds)) {
            $this->messageManager->addError(__('Please select blog post(s).'));
        } else {
            try {
                foreach ($blogpostIds as $postId) {
                    $post = $this->_objectManager->get('SR\Weblog\Model\BlogPosts')->load($postId);
                    $post->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been deleted.', count($blogpostIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('weblog/*/index');
    }
}
