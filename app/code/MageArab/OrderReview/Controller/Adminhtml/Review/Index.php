<?php
/*
 * Copyright (c) Shaymaa Saied  27/05/2021, 01:52.
 */

namespace MageArab\OrderReview\Controller\Adminhtml\Review;


class Index extends \Magento\Backend\App\Action
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
        $resultPage->getConfig()->getTitle()->prepend((__('Orders Reviews')));

        return $resultPage;
    }

}