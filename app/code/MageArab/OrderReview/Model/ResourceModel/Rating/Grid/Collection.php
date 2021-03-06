<?php
/*
 * Copyright (c) Shaymaa Saied  26/05/2021, 16:00.
 */

namespace MageArab\OrderReview\Model\ResourceModel\Rating\Grid;


class Collection extends \Magento\Review\Model\ResourceModel\Rating\Collection
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Framework\Data\Collection\EntityFactory $entityFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
     * @param \Magento\Framework\Event\ManagerInterface $eventManager
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Review\Model\ResourceModel\Rating\Option\CollectionFactory $ratingCollectionF
     * @param \Magento\Framework\Registry $coreRegistry
     * @param mixed $connection
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource
     */
    public function __construct(
        \Magento\Framework\Data\Collection\EntityFactory $entityFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Review\Model\ResourceModel\Rating\Option\CollectionFactory $ratingCollectionF,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\DB\Adapter\AdapterInterface $connection = null,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $storeManager,
            $ratingCollectionF,
            $connection,
            $resource
        );
    }

    public function _initSelect()
    {

        parent::_initSelect(); // TODO: Change the autogenerated stub
        $this->getSelect()->join(
            $this->getTable('rating_entity'),
            'main_table.entity_id=' . $this->getTable('rating_entity') . '.entity_id',
            ['entity_code']
        );
        return $this;
    }
}