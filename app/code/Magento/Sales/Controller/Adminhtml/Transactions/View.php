<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Controller\Adminhtml\Transactions;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultInterface;

class View extends \Magento\Sales\Controller\Adminhtml\Transactions
{
    /**
     * View Transaction Details action
     *
     * @return Page
     */
    public function execute()
    {
        $txn = $this->_initTransaction();
        if ($txn instanceof ResultInterface) {
            /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('sales/transactions');
        }
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magento_Sales::sales_transactions');
        $resultPage->getConfig()->getTitle()->prepend(__('Transactions'));
        $resultPage->getConfig()->getTitle()->prepend(sprintf("#%s", $txn->getTxnId()));

        return $resultPage;
    }
}
