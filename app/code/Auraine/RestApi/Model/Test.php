<?php
/*namespace Auraine\RestApi\Model;
use Auraine\RestApi\Api\TestInterface;
use Auraine\RestApi\Model\PostFactory;
use Auraine\RestApi\Model\ResourceModel\Post\CollectionFactory;
class Test implements TestInterface
{
private $PostFactory;
private $CollectionFactory;

public function __construct(PostFactory $PostFactory,CollectionFactory $CollectionFactory)
{
$this->PostFactory = $PostFactory;
$this->CollectionFactory = $CollectionFactory;
}
/**
* {@inheritdoc}
*/
/*public function setData($data)
{
    return 'Hello world';
    print_r(33333);die;
$name =$data['name'];
$number =$data['number'];
$city =$data['city'];
$insertData = $this->PostFactory->create();
$insertData->setName($name)->save();
$insertData->setNumber($number)->save();
$insertData->setCity($city)->save();
return 'successfully saved';
}
}*/

namespace Auraine\RestApi\Model;
 
 
class Test {

	/**
	 * {@inheritdoc}
	 */
	public function getPost()
	{
		return 'Hello world by greeshma';
	}
}