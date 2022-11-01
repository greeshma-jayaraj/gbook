<?php
// app/code/Auraine/RestApi/Model/Api/RequestItem.php

namespace Auraine\RestApi\Model;

use Auraine\RestApi\Api\RequestItemInterface;
use Magento\Framework\DataObject;

/**
 * Class RequestItem
 */
class RequestItem extends DataObject implements RequestItemInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::DATA_ID);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_getData(self::DATA_DESCRIPTION);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        return $this->setData(self::DATA_ID, $id);
    }

    /**
     * @param string $description
     * @return string
     */
    public function setDescription(string $description)
    {
        return $this->setData(self::DATA_DESCRIPTION, $description);
    }
}