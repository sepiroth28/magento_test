<?php

class Shopshopnshop_Tntshipping_Block_Adminhtml_Tntshippingdescription_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('tntshippingdescriptionGrid');
      $this->setDefaultSort('tntshipping_description_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('tntshipping/tntshippingdescription')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('tntshipping_description_id', array(
          'header'    => Mage::helper('tntshipping')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'tntshipping_description_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('tntshipping')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));
	  /* $this->addColumn('description', array(
          'header'    => Mage::helper('tntshipping')->__('description'),
          'align'     =>'left',
          'index'     => 'description',
      ));*/
	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('tntshipping')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('tntshipping')->__('Status'),
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
                'header'    =>  Mage::helper('tntshipping')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('tntshipping')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('tntshipping_description_id');
        $this->getMassactionBlock()->setFormFieldName('tntshippingdescription');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('tntshipping')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('tntshipping')->__('Are you sure?')
        ));

       $statuses = Mage::getSingleton('tntshipping/status2')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('tntshipping')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('tntshipping')->__('Status'),
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
