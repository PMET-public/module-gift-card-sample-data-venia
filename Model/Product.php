<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\GiftCardSampleDataVenia\Model;

use Magento\Catalog\Model\ConfigFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\CatalogSampleDataVenia\Model\Bundle\Converter;
use Magento\CatalogSampleDataVenia\Setup\Product\Gallery;
use Magento\Eav\Model\Config;
use Magento\Framework\App\State;
use Magento\Framework\Setup\SampleData\Context as SampleDataContext;
use Magento\GiftCard\Model\Catalog\Product\Type\Giftcard;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Setup Gift Card
 */
class Product extends \Magento\CatalogSampleDataVenia\Setup\Product
{
    /**
     * @var string
     */
    protected $productType = Giftcard::TYPE_GIFTCARD;

    /**
     * Product constructor.
     * @param SampleDataContext $sampleDataContext
     * @param ProductFactory $productFactory
     * @param ConfigFactory $catalogConfig
     * @param Converter $converter
     * @param Gallery $gallery
     * @param StoreManagerInterface $storeManager
     * @param Config $eavConfig
     * @param State $appState
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        ProductFactory $productFactory,
        ConfigFactory $catalogConfig,
        Converter $converter,
        Gallery $gallery,
        StoreManagerInterface $storeManager,
        Config $eavConfig,
        State $appState
    ) {
        parent::__construct(
            $sampleDataContext,
            $productFactory,
            $catalogConfig,
            $converter,
            $gallery,
            $storeManager,
            $eavConfig,
            $appState
        );
    }

    /**
     * @inheritdoc
     */
    protected function prepareProduct($product, $data)
    {
        if ($product->getGiftcardType() == \Magento\GiftCard\Model\Giftcard::TYPE_VIRTUAL) {
            $this->setVirtualStockData($product);
        }
        return $this;
    }
}
