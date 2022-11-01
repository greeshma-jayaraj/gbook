<?php
namespace Auraine\Crud\Helper;

use Magento\Framework\App\Area;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class SendEmail extends AbstractHelper
{
    /**
     * @var StateInterface
     */
    protected $_inlineTranslation;
    /**
     * @var TransportBuilder
     */
    protected $_transportBuilder;
        /**
* @var StoreManagerInterface
	*/
	protected $_storeManager;

    public function __construct(
        Context $context,
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation,
        StoreManagerInterface $storeManager
    )
    {
        $this->_inlineTranslation = $inlineTranslation;
        $this->_transportBuilder = $transportBuilder;
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }
    public function sendMail()
    {
         $variables = array(
                'store'=>$this->storeManager->getStore(),
                'customer_name'=>'greeshma',
                'message'=>'Welcome to M2 Training');

        $sender = [
            'name' => $this->scopeConfig->getValue('trans_email/ident_general/name', ScopeInterface::SCOPE_STORE),
            'email' => $this->scopeConfig->getValue('trans_email/ident_general/email', ScopeInterface::SCOPE_STORE)
        ];

        $this->_inlineTranslation->suspend();
 
        $this->_transportBuilder->setTemplateIdentifier(
            'welcome_template' // template identifier here
        )->setTemplateOptions(
            [
                'area' => Area::AREA_FRONTEND,
                'store' => $this->_storeManager->getStore()->getId()
            ]
        )->setTemplateVars(
            $variables
        )->setFromByScope(
            $sender
        )->addTo(
            'greeshma.jayaraj@maisondauraine.com'
        );
        
        $transport = $this->_transportBuilder->getTransport();
        try {
            $transport->sendMessage();		
        } catch (\Exception $exception) {
            // Exception loguybuyhyuhyuh
        }
        $this->_inlineTranslation->resume();

       return $this;
      
    }
     
}