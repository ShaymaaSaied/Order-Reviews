<?php
/*
 * Copyright (c) Shaymaa Saied  25/05/2021, 23:56.
 */

namespace MageArab\OrderReview\Model\ResourceModel\Rating\Entity;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    /**
     * Initialize resources
     *
     * @return void
     */
    protected function _construct(){
        $this->_init(
            'Magento\Review\Model\Rating\Entity',
            'Magento\Review\Model\ResourceModel\Rating\Entity');
    }
}