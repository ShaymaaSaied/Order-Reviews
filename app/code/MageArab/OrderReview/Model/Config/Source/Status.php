<?php
/*
 * Copyright (c) Shaymaa Saied  02/06/2021, 15:36.
 */

namespace MageArab\OrderReview\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    public function toOptionArray()
    {
        $result = [];
        foreach ($this->getOptions() as $value => $label) {
            $result[] = [
                'value' => $value,
                'label' => $label,
            ];
        }

        return $result;
    }

    public function getOptions()
    {
        return [
            \Magento\Review\Model\Review::STATUS_APPROVED => __('Approved'),
            \Magento\Review\Model\Review::STATUS_PENDING => __('Pending'),
            \Magento\Review\Model\Review::STATUS_NOT_APPROVED => __('Not Approved')
        ];
    }
}