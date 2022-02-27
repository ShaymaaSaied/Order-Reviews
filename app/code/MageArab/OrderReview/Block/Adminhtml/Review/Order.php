<?php
/*
 * Copyright (c) Shaymaa Saied  03/06/2021, 06:43.
 */

namespace MageArab\OrderReview\Block\Adminhtml\Review;


class Order extends \Magento\Backend\Block\Template
{
    protected $_template = 'MageArab_OrderReview::review/order.phtml';
    private $_orderRepository;
    private $_reviewFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context                 $context,
        \Magento\Review\Model\ReviewFactory                     $reviewFactory,
        \Magento\Sales\Api\OrderRepositoryInterface             $orderRepository,
        array $data = []

    ){
        $this->_reviewFactory       =   $reviewFactory;
        $this->_orderRepository     =   $orderRepository;
        parent::__construct($context, $data);
    }

    public function getOrder(){
        if($reviewId=(int)$this->getRequest()->getParam('review_id')){
            $review = $this->_reviewFactory->create()->load($reviewId);
            if($orderId=(int)$review->getEntityPkValue()){
                return $this->_orderRepository->get($orderId);
            }else{
                return false;
            }

        }
        return false;
    }
    public function getOrderUrl($orderId){
        return $this->getUrl('sales/order/view', ['order_id' => $orderId]);
    }
}