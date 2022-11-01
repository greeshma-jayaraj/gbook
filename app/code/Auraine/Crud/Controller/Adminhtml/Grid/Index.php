<?php

namespace Auraine\Crud\Controller\Adminhtml\Grid;

use Auraine\Crud\Helper\SendEmail;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        SendEmail $SendEmail

    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Mapped eBay Order List page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
       $xx= $this->SendEmail->sendMail();
       //return $xx;
       //exit;
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Auraine_Crud::manager');
        $resultPage->getConfig()->getTitle()->prepend(__('Product List'));
        return $resultPage;
    }

    /**
     * Check Order Import Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Auraine_Crud::grid_list');
    }


}
