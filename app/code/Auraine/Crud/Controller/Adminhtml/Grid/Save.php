<?php

namespace Auraine\Crud\Controller\Adminhtml\Grid;

class Save extends \Magento\Backend\App\Action
{
    var $gridFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Auraine\Crud\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // $rowId = (int) $this->getRequest()->getParam('id');
        // echo '<pre>'; print_r($rowId); die();
        $data = $this->getRequest()->getPostValue();
        //print_r($_FILES);
        //echo '<pre>'; print_r($_REQUEST); die();


        if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name'])) {
            /*
            * Save image upload
            */
            try {
            $base_media_path = 'var/upload_images/';
            $uploader = new Varien_File_Uploader('file_path');
            $uploader = $this->uploader->create(
            ['fileId' => 'image']
            );
            $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
            $imageAdapter = $this->adapterFactory->create();
            $uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
            $uploader->setAllowRenameFiles(true);
            $uploader->setFilesDispersion(true);
            $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
            $result = $uploader->save(
            $mediaDirectory->getAbsolutePath(base_media_path)
            );
            $data['image'] = base_media_path.$result['file'];
            } catch (\Exception $e) {
            if ($e->getCode() == 0) {
            $this->messageManager->addError($e->getMessage());
            }
            }
            } else {
            if (isset($data['image']) && isset($data['image']['value'])) {
            if (isset($data['image']['delete'])) {
            $data['image'] = null;
            $data['delete_image'] = true;
            } elseif (isset($data['image']['value'])) {
            $data['image'] = $data['image']['value'];
            } else {
            $data['image'] = null;
            }
            }
            }
            

        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Product data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Auraine_Crud::save');
    }
}
