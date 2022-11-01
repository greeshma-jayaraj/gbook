<?php

namespace Auraine\Crud\Model;

use Auraine\Crud\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    const CACHE_TAG = 'auraine_crud';

    protected $_cacheTag = 'auraine_crud';

    protected $_eventPrefix = 'auraine_crud';

    protected function _construct()
    {
        $this->_init('Auraine\Crud\Model\ResourceModel\Grid');
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    public function setCustomerEmail($customer_email)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customer_email);
    }

    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    public function getDirections()
    {
        return $this->getData(self::DIRECTIONS);
    }

    public function setDirections($directions)
    {
        return $this->setData(self::DIRECTIONS, $directions);
    }

    public function getProductSku()
    {
        return $this->getData(self::PRODUCT_SKU);
    }

    public function setProductSku($product_sku)
    {
        return $this->setData(self::PRODUCT_SKU, $product_sku);
    }

    public function getApproved()
    {
        return $this->getData(self::APPROVED);
    }

    public function setApproved($approved)
    {
        return $this->setData(self::APPROVED, $approved);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }
}
