<?php
namespace Auraine\RestApi\Api;
interface ProductRepositoryInterface
{
    /**
     * Return a filtered product.
     *
     * @param int $id
     * @return \Auraine\RestApi\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);
    /**
     * Return a list of the filtered products.
     *
     * @return \Auraine\RestApi\Api\ResponseItemInterface[]
     */
    public function getList();

    /**
     * Set descriptions for the products.
     *
     * @param \Auraine\RestApi\Api\RequestItemInterface[] $products
     * @return void
     */
    public function setDescription(array $products);
}