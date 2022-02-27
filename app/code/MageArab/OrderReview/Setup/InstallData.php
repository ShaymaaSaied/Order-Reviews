<?php
/*
 * Copyright (c) Shaymaa Saied  25/05/2021, 15:46.
 */

namespace MageArab\OrderReview\Setup;

use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();

        $columns = ['entity_code'];
        $data[] = ['order'];

        $setup->getConnection()
            ->insertArray($setup->getTable('review_entity'), $columns, $data);

        $setup->getConnection()
            ->insertArray($setup->getTable('rating_entity'), $columns, $data);

        /**
         * Prepare database after install
         */
        $setup->endSetup();
    }
}