<?php
/*
 * Copyright (c) Shaymaa Saied  02/06/2021, 14:37.
 */

namespace MageArab\OrderReview\Ui\Component\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;

class ReviewActions extends Column
{
    /**
     * {@inheritdoc}
     * @since 100.1.0
     */
    public function prepareDataSource(array $dataSource)
    {
        $dataSource = parent::prepareDataSource($dataSource);

        if (empty($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as &$item) {
            $item[$this->getData('name')]['edit'] = [
                'href' => $this->context->getUrl(
                    'orderreview/review/view',
                    ['review_id' => $item['review_id']]
                ),
                'label' => __('Edit'),
                'hidden' => false,
            ];
        }

        return $dataSource;
    }

}