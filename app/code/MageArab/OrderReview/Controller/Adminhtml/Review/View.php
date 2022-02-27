<?php
/*
 * Copyright (c) Shaymaa Saied  02/06/2021, 14:32.
 */

namespace MageArab\OrderReview\Controller\Adminhtml\Review;


class View extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute(){

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magento_Review::order_reviews');
        $resultPage->getConfig()->getTitle()->prepend((__('Review'.'#'.$this->getRequest()->getParam('review_id'))));

        return $resultPage;
    }
}