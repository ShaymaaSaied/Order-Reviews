<?php
/*
 * Copyright (c) Shaymaa Saied  02/06/2021, 15:00.
 */

namespace MageArab\OrderReview\Model;

use MageArab\OrderReview\Model\ResourceModel\Review\CollectionFactory;
use Magento\Framework\App\RequestInterface;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;
    private $_request;
    private $_registry;
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $reviewCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $reviewCollectionFactory,
        RequestInterface $request,
        \Magento\Framework\Registry $registry,
        array $meta = [],
        array $data = []
    ) {
        $this->collection   =   $reviewCollectionFactory->create();
        $this->_request     =   $request;
        $this->_registry    =   $registry;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        //$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        //$registry=$objectManager->create('Magento\Framework\Registry');

        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $this->collection->getSelect()
        ->join(
            ['detail' => 'review_detail'],
            'main_table.review_id = detail.review_id',
            ['detail_id', 'title', 'detail', 'nickname', 'customer_id']
        )
        /*->join(
            ['customer' => 'customer_entity'],
            'detail.customer_id = customer.entity_id',
            ['firstname', 'lastname','email']
        )*/
        /*->join(
            ['order' => 'sales_order'],
            'main_table.entity_pk_value = order.entity_id',
            ['increment_id']
        )*/;

        $items = $this->collection->getItems();
        foreach ($items as $review) {
            $this->_loadedData[$review->getReviewId()] = $review->getData();
        }
        $reviewId=$this->_request->getParam('review_id');
        $this->_registry->register('review_data', $this->_loadedData[$reviewId]);
        return $this->_loadedData;
    }
}