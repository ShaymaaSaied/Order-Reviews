<?php
/*
 * Copyright (c) Shaymaa Saied  06/04/2021, 12:45.
 */

namespace MageArab\OrderReview\Block\Adminhtml\Review\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Save extends Generic implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'area_form.area_form',
                                'actionName' => 'save',
                                'params' => [false],
                            ],
                        ],
                    ],
                ],
            ],
            //  'class_name' => Container::SPLIT_BUTTON,
            // 'options' => $this->getOptions(),
        ];
    }
}