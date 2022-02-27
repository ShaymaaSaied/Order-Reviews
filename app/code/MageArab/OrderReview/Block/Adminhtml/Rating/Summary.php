<?php
/*
 * Copyright (c) Shaymaa Saied  03/06/2021, 06:15.
 */

namespace MageArab\OrderReview\Block\Adminhtml\Rating;


class Summary extends \Magento\Backend\Block\Template
{
    protected $_template = 'MageArab_OrderReview::rating/summary.phtml';
    private $_votesFactory;
    private $_ratingFactory;


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Review\Model\ResourceModel\Rating\Option\Vote\CollectionFactory $votesFactory,
        \Magento\Review\Model\RatingFactory $ratingFactory,
        array $data = []
    ) {
        $this->_votesFactory = $votesFactory;
        $this->_ratingFactory = $ratingFactory;
        parent::__construct($context, $data);
    }

    public function getRatingSummary(){

        if((int)$this->getRequest()->getParam('review_id')){
            return $this->_ratingFactory->create()->getReviewSummary((int)$this->getRequest()->getParam('review_id'));

        }
        return false;
    }
}