<?php

namespace SR\Weblog\Controller\Adminhtml\Blog;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class ExportXml
 */
class ExportXml extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $_fileFactory;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        PageFactory $resultPageFactory
    ) {
        $this->_fileFactory = $fileFactory;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Export cannedresponse grid to XML format
     *
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        $fileName = 'weblog.xml';
        /** @var \Magento\Backend\Block\Widget\Grid\ExportInterface $exportBlock  */
        $exportBlock = $resultPage->getLayout()->getChildBlock('weblog.grid', 'grid.export');
        $content = $exportBlock->getExcelFile($fileName);
        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
