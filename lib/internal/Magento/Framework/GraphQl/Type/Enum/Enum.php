<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types = 1);

namespace Magento\Framework\GraphQl\Type\Enum;

use Magento\Framework\GraphQl\Type\Definition\EnumType;
use Magento\Framework\GraphQl\Config\Data\Enum as EnumStructure;

/**
 * Object representation of a GraphQL enum field
 */
class Enum extends EnumType
{
    /**
     * @param EnumStructure $structure
     */
    public function __construct(EnumStructure $structure)
    {
        $config = [
            'name' => $structure->getName(),
            'description' => $structure->getDescription(),
        ];
        foreach ($structure->getValues() as $value) {
            $config['values'][$value->getValue()] = [
                'value' => $value->getValue(),
                'description' => $value->getDescription()
            ];
        }
        parent::__construct($config);
    }
}
