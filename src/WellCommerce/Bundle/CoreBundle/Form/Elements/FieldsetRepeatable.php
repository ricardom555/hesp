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

namespace WellCommerce\Bundle\CoreBundle\Form\Elements;

/**
 * Class FieldsetRepeatable
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class FieldsetRepeatable extends Fieldset implements ElementInterface
{
    public function prepareAttributesJs()
    {
        $attributes = [
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatRepeatableJs(),
            $this->formatDependencyJs(),
            'aoFields: [' . $this->renderChildren() . ']'
        ];

        return $attributes;
    }

}
