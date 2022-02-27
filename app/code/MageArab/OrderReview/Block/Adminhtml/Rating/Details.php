<?php
/*
 * Copyright (c) Shaymaa Saied  02/06/2021, 16:25.
 */

namespace MageArab\OrderReview\Block\Adminhtml\Rating;
use Magento\Review\Model\ResourceModel\Rating\Collection as RatingCollection;


class Details extends \Magento\Backend\Block\Template
{

    protected $_template = 'MageArab_OrderReview::rating/details.phtml';
    private $_coreRegistry;
    private $_votesFactory;
    protected $_voteCollection = false;
    private $_ratingCollection;
    private $_ratingsCollectionFactory;
    private $_ratingObject;

    public function __construct(
        \Magento\Backend\Block\Template\Context                                         $context,
        \Magento\Review\Model\ResourceModel\Rating\CollectionFactory                    $ratingsFactory,
        \MageArab\OrderReview\Api\Data\RatingVoteInterfaceFactory                        $ratingVoteInterfaceFactory,
        \Magento\Review\Model\ResourceModel\Rating\Option\Vote\CollectionFactory        $votesFactory,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_ratingsCollectionFactory                    =   $ratingsFactory;
        $this->_ratingObject                                =   $ratingVoteInterfaceFactory;
        $this->_votesFactory                                =   $votesFactory;
        $this->_coreRegistry                                =   $registry;
        parent::__construct($context, $data);
    }


    public function getReviewRatings(){
        $ratings=[];
        if((int)$this->getRequest()->getParam('review_id')){
            $reviewRatings = $this->_votesFactory->create()
                ->setReviewFilter(
                //$this->getReviewId()
                    (int)$this->getRequest()->getParam('review_id')
                )->addOptionInfo()
                ->load()
                ->addRatingOptions();
            $storeId=(int)$this->getRequest()->getParam('review_store');
            $ratings=$this->handleRatings($reviewRatings,$storeId,'order');
        }
        return $ratings;
    }
    public function handleRatings($reviewRatings,$storeId,$entityType){

        $ratingList=[];
        foreach ($reviewRatings as $ratingVote) {
            $rating = $this->getRatingCollection($storeId,$entityType)->getItemByColumnValue('rating_id', $ratingVote->getRatingId());

            if ($rating) {
                $ratingObject=$this->_ratingObject->create();
                $ratingObject->setVoteId($ratingVote->getVoteId())
                    ->setPercent($ratingVote->getPercent())
                    ->setValue($ratingVote->getValue())
                    ->setRatingId($rating->getId())
                    ->setRatingName($rating->getRatingCode())
                    ->setRatingCode($rating->getRatingCode());
                $ratingList[] =$ratingObject;
            }
        }
        return $ratingList;
    }

    public function getRatingCollection( $storeId,$entityType)
    {
        if ($this->_ratingCollection === null) {
            /** @var RatingCollection $ratingCollection */
            $ratingCollection = $this->_ratingsCollectionFactory->create()
                ->addEntityFilter($entityType)
                ->setStoreFilter($storeId)
                ->addRatingPerStoreName($storeId)
                ->setPositionOrder()->load();

            $this->_ratingCollection = $ratingCollection;
        }

        return $this->_ratingCollection;
    }

}