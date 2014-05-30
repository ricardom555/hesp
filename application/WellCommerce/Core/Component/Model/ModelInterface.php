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

namespace WellCommerce\Core\Component\Model;

use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Interface ModelInterface
 *
 * @package WellCommerce\Core\Component\Model
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ModelInterface
{
    /**
     * Returns path to validation.xml mapping file
     *
     * @return string
     */
    public function getValidationXmlMapping();
} 