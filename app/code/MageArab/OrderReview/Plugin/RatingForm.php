<?php
/*
 * Copyright (c) Shaymaa Saied  25/05/2021, 20:10.
 */

namespace MageArab\OrderReview\Plugin;


class RatingForm
{
    private $_registry;
    private $_dataHelper;

    public function __construct(
        \Magento\Framework\Registry                     $registry,
        \MageArab\OrderReview\Helper\Data               $data
    ) {
        $this->_registry        =   $registry;
        $this->_dataHelper      =   $data;
    }

    /**
     * Get form HTML
     *
     * @return string
     */
    public function aroundGetFormHtml(
        \Magento\Review\Block\Adminhtml\Rating\Edit\Tab\Form $subject,
        \Closure $proceed
    ) {
        if(!$this->_dataHelper->checkEnableModule()){
            return $proceed();
        }
        $form = $subject->getForm();
        if (is_object($form)) {
            $form->addFieldset('rating_types',
                [
                    'legend' => __('Rating Entity Types'),
                    'sort_order'=>0
                ]
            );
            $baseFieldset = $form->getElement('rating_types');
            /** @var $model \Magento\Review\Model\Rating\ */
            $model = $this->_registry->registry('rating_data');
            $data=[];
            if($model){
                $data = $model->getData();
            }

            $baseFieldset->addField(
                'entity_id',
                'select',
                [
                    'name' => 'entity_id',
                    'label' => __('Entity Type'),
                    'title' => __('Entity Type'),
                    'options' => $this->_dataHelper->getRatingEntityCodes(),
                    'class' => 'select',
                    'value' => isset($data['entity_id']) ? $data['entity_id'] : 0
                ]
            );

            $subject->setForm($form);
        }

        return $proceed();
    }
}