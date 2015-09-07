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

namespace WellCommerce\Bundle\TaxBundle\Factory;

use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\TaxBundle\Entity\Tax;

/**
 * Class TaxFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class TaxFactory extends AbstractFactory
{
    /**
     * @return \WellCommerce\Bundle\TaxBundle\Entity\TaxInterface
     */
    public function create()
    {
        $tax = new Tax();
        $tax->setValue(0);

        return $tax;
    }
}