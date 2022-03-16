<?php

namespace PhungSpse\ExtraBetterPopup\Block;

use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Newsletter\Model\ResourceModel\Subscriber\CollectionFactory;
use Mageplaza\BetterPopup\Helper\Data as HelperData;
use Mageplaza\BetterPopup\Block\Popup as MageplazaPopup;

class Popup extends MageplazaPopup
{

    /**
     * Popup constructor.
     *
     * @param Context $context
     * @param HelperData $helperData
     * @param TimezoneInterface $localeDate
     * @param CollectionFactory $subscriberCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperData $helperData,
        TimezoneInterface $localeDate,
        CollectionFactory $subscriberCollectionFactory,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $helperData,
            $localeDate,
            $subscriberCollectionFactory,
            $data
        );
    }

    /**
     * Get Html Content popup
     *
     * @return string
     * @throws LocalizedException
     */
    public function getPopupContent()
    {
        $showCmsBlock = $this->_helperData->getWhatToShowConfig('show_cms_block');
        if ($showCmsBlock) {
            $blockIdentifier = $this->_helperData->getWhatToShowConfig('cms_block');
            return $this->getLayout()
                ->createBlock('Magento\Cms\Block\Block')
                ->setBlockId($blockIdentifier)
                ->toHtml();
        }

        return parent::getPopupContent();
    }
}
