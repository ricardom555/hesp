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
namespace WellCommerce\AppBundle\Repository;

use WellCommerce\CoreBundle\Repository\AbstractEntityRepository;

/**
 * Class ProductPhotoRepository
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductPhotoRepository extends AbstractEntityRepository implements ProductPhotoRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDataGridQueryBuilder()
    {
        return parent::getQueryBuilder()->groupBy('product.id');
    }
}