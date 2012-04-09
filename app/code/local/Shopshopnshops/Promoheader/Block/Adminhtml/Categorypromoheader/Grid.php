<?php

class Shopshopnshops_Promoheader_Block_Adminhtml_Categorypromoheader_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('promoheaderGridcategory');
      $this->setDefaultSort('category_promoheader_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('promoheader/categorypromoheader')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('category_promoheader_id', array(
          'header'    => Mage::helper('promoheader')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'category_promoheader_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('promoheader')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('promoheader')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */
	  $this->addColumn('use_in_dames', array(
          'header'    => Mage::helper('promoheader')->__('DAMES'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'use_for_dames',
          'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => '',
          ),
      ));
	   $this->addColumn('use_in_heren', array(
          'header'    => Mage::helper('promoheader')->__('HEREN'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'use_for_heren',
          'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => '',
          ),
      ));
	   $this->addColumn('use_in_junior', array(
          'header'    => Mage::helper('promoheader')->__('JUNIOR'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'use_for_junior',
          'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => '',
          ),
      ));
	   $this->addColumn('use_in_homeland', array(
          'header'    => Mage::helper('promoheader')->__('HOMELAND'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'use_for_homeland',
          'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              0 => '',
          ),
      ));
      $this->addColumn('status', array(
          'header'    => Mage::helper('promoheader')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('promoheader')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('promoheader')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('promoheader')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('promoheader')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('category_promoheader_id');
        $this->getMassactionBlock()->setFormFieldName('promoheader');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('promoheader')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('promoheader')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('promoheader/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('promoheader')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('promoheader')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}