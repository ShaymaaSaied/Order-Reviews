<?php

namespace MageArab\OrderReview\Model\ResourceModel\Review;


use Magento\Framework\DB\Select;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Review table
     *
     * @var string
     */
    protected $_reviewTable = null;

    /**
     * Review detail table
     *
     * @var string
     */
    protected $_reviewDetailTable = null;

    /**
     * Review status table
     *
     * @var string
     */
    protected $_reviewStatusTable = null;

    /**
     * Review entity table
     *
     * @var string
     */
    protected $_reviewEntityTable = null;

    /**
     * Review store table
     *
     * @var string
     */

    protected $_reviewStoreTable = null;

    /**
     * Add store data flag
     * @var bool
     */
    protected $_addStoreDataFlag = true;

    protected $_idFieldName = 'review_id';
    /**
     * Initialize resources
     *
     * @return void
     */
    protected function _construct(){
        $this->_init(
            '\Magento\Review\Model\Review',
            '\Magento\Review\Model\ResourceModel\Review');
    }

    /**
     * Get review detail table
     *
     * @return string
     */
    protected function getReviewDetailTable()
    {
        if ($this->_reviewDetailTable === null) {
            $this->_reviewDetailTable = $this->getTable('review_detail');
        }
        return $this->_reviewDetailTable;
    }

    /**
     * Get review status table
     *
     * @return string
     */
    protected function getReviewStatusTable()
    {
        if ($this->_reviewStatusTable === null) {
            $this->_reviewStatusTable = $this->getTable('review_status');
        }
        return $this->_reviewStatusTable;
    }

    /**
     * Get review entity table
     *
     * @return string
     */
    protected function getReviewEntityTable()
    {
        if ($this->_reviewEntityTable === null) {
            $this->_reviewEntityTable = $this->getTable('review_entity');
        }
        return $this->_reviewEntityTable;
    }

    /**
     * Get review store table
     *
     * @return string
     */
    protected function getReviewStoreTable()
    {
        if ($this->_reviewStoreTable === null) {
            $this->_reviewStoreTable = $this->getTable('review_store');
        }
        return $this->_reviewStoreTable;
    }

    /**
     * Add stores data
     *
     * @return $this
     */
    public function addStoreData()
    {
        $this->_addStoreDataFlag = true;
        return $this;
    }

}
