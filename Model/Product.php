<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\GiftCardSampleDataVenia\Model;

use Magento\Framework\Setup\SampleData\Context as SampleDataContext;

/**
 * Setup Gift Card
 */
class Product extends \Magento\CatalogSampleDataVenia\Setup\Product
{
    /**
     * @var string
     */
    protected $productType = \Magento\GiftCard\Model\Catalog\Product\Type\Giftcard::TYPE_GIFTCARD;

    /**
     * Product constructor.
     * @param SampleDataContext $sampleDataContext
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     * @param \Magento\Catalog\Model\ConfigFactory $catalogConfig
     * @param Product\Converter $converter
     * @param \Magento\CatalogSampleDataVenia\Setup\Product\Gallery $gallery
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Eav\Model\Config $eavConfig
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Model\ConfigFactory $catalogConfig,
        \Magento\GiftCardSampleDataVenia\Model\Product\Converter $converter,
        \Magento\CatalogSampleDataVenia\Setup\Product\Gallery $gallery,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Framework\App\State $appState
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
