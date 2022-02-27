<?php
/*
 * Copyright (c) Shaymaa Saied  26/05/2021, 00:52.
 */

namespace MageArab\OrderReview\Plugin;


class SaveRating
{
    private $_registry;
    private $_dataHelper;
    private $_objectManager;

    public function __construct(
        \Magento\Framework\Registry                     $registry,
        \Magento\Framework\ObjectManagerInterface       $objectManager,
        \MageArab\OrderReview\Helper\Data               $data
    ) {
        $this->_registry        =   $registry;
        $this->_dataHelper      =   $data;
        $this->_objectManager   =   $objectManager;
    }

    public function aroundExecute(
        \Magento\Review\Controller\Adminhtml\Rating\Save $subject,
        \Closure $proceed
    ) {
        //$subject->initEntityId();
       $entityId=  $subject->getRequest()->getParam('entity_id');
        $ratingModel = $this->_objectManager->create(\Magento\Review\Model\Rating::class);
        $ratingModel->setEntityId($entityId);

        //var_dump($proceed());
      // exit();
        /*$this->_registry->unregister('entityId');
        $this->_registry->register('entityId',$entityId);*/
        return $proceed();
    }
}