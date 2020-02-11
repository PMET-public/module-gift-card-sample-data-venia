<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\GiftCardSampleDataVenia\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\CatalogSampleDataVenia\Setup\Category;
use Magento\CatalogSampleDataVenia\Setup\Attribute;
use Magento\GiftCardSampleDataVenia\Model\Product;
use Magento\ProductLinksSampleDataVenia\Setup\ProductLink;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\Store;

class InstallGiftCards implements DataPatchInterface
{

    /** @var Product  */
    protected $product;

    /** @var Attribute  */
    protected $attributeSetup;

    /** @var Category  */
    protected $categorySetup;

    /** @var ProductLink  */
    protected $productLinkSetup;

    /** @var mixed  */
    private $storeManager;

    /**
     * InstallGiftCards constructor.
     * @param Category $categorySetup
     * @param Attribute $attributeSetup
     * @param Product $product
     * @param ProductLink $productLinkSetup
     * @param StoreManagerInterface|null $storeManager
     */
    public function __construct(Category $categorySetup,Attribute $attributeSetup,Product $product,
                                ProductLink $productLinkSetup,
                                StoreManagerInterface $storeManager = null)
    {
        $this->product = $product;
        $this->attributeSetup = $attributeSetup;
        $this->categorySetup = $categorySetup;
        $this->productLinkSetup = $productLinkSetup;
        $this->storeManager = $storeManager ?: ObjectManager::getInstance()
            ->get(StoreManagerInterface::class);
    }

    public function apply()
    {
        $this->attributeSetup->install(['Magento_GiftCardSampleDataVenia::fixtures/attributes.csv']);
        $this->product->install(
            ['Magento_GiftCardSampleDataVenia::fixtures/products_giftcard.csv'],
            ['Magento_GiftCardSampleDataVenia::fixtures/images_giftcard.csv']
        );
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
