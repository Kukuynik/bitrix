<?php

namespace Sprint\Migration;


class Version20250730052709 extends Version
{
    protected $author = "admin";

    protected $description = "Разделы";

    protected $moduleVersion = "5.4.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'news',
            'news'
        );

        $helper->Iblock()->saveSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Новости спорта',
    'CODE' => 'sport_news',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'PICTURE' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
  ),
  1 => 
  array (
    'NAME' => 'Новости игр',
    'CODE' => 'game_news',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'PICTURE' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
    'DETAIL_PICTURE' => NULL,
  ),
)        );
    }
}
