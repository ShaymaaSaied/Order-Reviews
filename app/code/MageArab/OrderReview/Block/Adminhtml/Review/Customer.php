<?php
/*
 * Copyright (c) Shaymaa Saied  03/06/2021, 06:44.
 */

namespace MageArab\OrderReview\Block\Adminhtml\Review;


class Customer extends \Magento\Backend\Block\Template
{
    protected $_template = 'MageArab_OrderReview::review/customer.phtml';
    private $_customerRepository;
    private $_registry;
    private $_reviewFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context             $context,
        \Magento\Framework\Registry                         $registry,
        \Magento\Review\Model\ReviewFactory                  $reviewFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface   $customerRepository,

        array $data = []

    ){
        $this->_customerRepository  =   $customerRepository;
        $this->_registry            =   $registry;
        $this->_reviewFactory       =   $reviewFactory;
        parent::__construct($context, $data);

    }

    public function getCustomer(){
        if($reviewId=(int)$this->getRequest()->getParam('review_id')){
            $review = $this->_reviewFactory->create()->load($reviewId);
            if((int)$review->getCustomerId()){
                return $this->_customerRepository->getById($review->getCustomerId());
            }else{
                return false;
            }

        }
        return false;
    }

    public function getCustomerUrl($customerId){
       return $this->getUrl('customer/index/edit', ['id' => $customerId]);
    }

}