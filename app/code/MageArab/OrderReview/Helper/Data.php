<?php
/*
 * Copyright (c) Shaymaa Saied  25/05/2021, 22:12.
 */

namespace MageArab\OrderReview\Helper;


use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected   $_storeManager;
    protected   $_urlInterface;
    protected   $_scopeConfig;
    private     $_entityFactory;

    const SECTION           =   'order_review';
    const GROUP             =   'general';
    const ENTITY_CODE       =   'order';

    public function __construct(
        \Magento\Framework\App\Helper\Context                                                           $context,
        \Magento\Framework\UrlInterface                                                                 $urlInterface,
        ScopeConfigInterface                                                                            $scopeConfig,
        \MageArab\OrderReview\Model\ResourceModel\Rating\Entity\CollectionFactory                       $entityFactory,
        \Magento\Store\Model\StoreManagerInterface                                                      $storeManager
    ) {
        $this->_storeManager    =   $storeManager;
        $this->_urlInterface    =   $urlInterface;
        $this->_scopeConfig     =   $scopeConfig;
        $this->_entityFactory   =   $entityFactory;

        parent::__construct($context);
    }

    public function checkEnableModule(){
        return $this->_scopeConfig->getValue(self::SECTION.'/'.self::GROUP.'/'.'active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    }

    public function getRatingEntityCodes(){
        $data=[];
        $collection=$this->_entityFactory->create()->load();
        foreach ($collection as $item){
            $data[$item->getEntityId()]=$item->getEntityCode();
        }
        return $data;
    }
}