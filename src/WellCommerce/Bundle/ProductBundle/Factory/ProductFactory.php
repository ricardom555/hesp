<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AppBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use WellCommerce\Bundle\AppBundle\Entity\Product;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;

/**
 * Class ProductFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductFactory extends AbstractFactory
{
    /**
     * @return \WellCommerce\Bundle\AppBundle\Entity\ProductInterface
     */
    public function create()
    {
        $product = new Product();
        $product->setCategories(new ArrayCollection());
        $product->setProductPhotos(new ArrayCollection());
        $product->setStatuses(new ArrayCollection());
        $product->setAttributes(new ArrayCollection());
        $product->setShops(new ArrayCollection());
        $product->setEnabled(true);

        return $product;
    }
}