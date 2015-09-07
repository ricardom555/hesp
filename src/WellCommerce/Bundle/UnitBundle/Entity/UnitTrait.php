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

namespace WellCommerce\Bundle\UnitBundle\Entity;

/**
 * Class UnitTrait
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
trait UnitTrait
{
    /**
     * @var UnitInterface
     */
    protected $unit;

    /**
     * @param UnitInterface $unit
     */
    public function setUnit(UnitInterface $unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return UnitInterface
     */
    public function getUnit()
    {
        return $this->unit;
    }
}