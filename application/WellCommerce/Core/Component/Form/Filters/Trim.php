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

namespace WellCommerce\Core\Component\Form\Filters;

use WellCommerce\Core\Component\Form\Filter;

/**
 * Class Trim
 *
 * @package WellCommerce\Core\Component\Form\Filters
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Trim extends Filter implements FilterInterface
{
    /**
     * Removes spaces and line endings from value
     *
     * @param $value
     *
     * @return mixed|string
     */
    public function filterValue($value)
    {
        return trim($value);
    }

}
