<?php

class Shopshopnshop_Tntshipping_Adminhtml_TntshippingController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('tntshipping/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_forward('edit');
		/*$this->_initAction()
			->renderLayout();*/
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('tntshipping/tntshipping')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('tntshipping_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('tntshipping/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('tntshipping/adminhtml_tntshipping_edit'))
				->_addLeft($this->getLayout()->createBlock('tntshipping/adminhtml_tntshipping_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('tntshipping')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		//Mage::helper('tntshipping/tntrates')->getShippingRate();
		//exit();		
		
		if ($data = $this->getRequest()->getPost()) {
			
			if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('filename');
					
					// Any extention would work
	           		//$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowedExtensions(array('csv'));
					$uploader->setAllowRenameFiles(false);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(false);
							
					// We set media as the upload dir
					$path = Mage::getBaseDir('media') . DS . 'tntshipping' . DS ;
					$uploader->save($path, $_FILES['filename']['name'] );
					
				} catch (Exception $e) {
		      
		        }
	        	  

		        //this way the name is saved in DB
	  			//$data['filename'] = $_FILES['filename']['name'];
			}
	  		$csv_file = Mage::getBaseDir('media') . DS . 'tntshipping' . DS . $_FILES['filename']['name'];
			$content = Mage::helper('tntshipping/readcsv')->readCSV($csv_file);
			
			
					try {

						/* clearing all data in table */
						$sql = "TRUNCATE `tntshipping`";
						$write = Mage::getSingleton('core/resource')->getConnection('core_write');
						$result = $write->query($sql);
						$count = 0;
						foreach($content as $_content):

							$data['title'] = $_content['title'];
							$data['location'] = $_content['location'];
							$data['tnt_type'] = $_content['location'];
							$data['2kg_with_tnt'] = $_content['2kg_with_tnt'];
							$data['2kg'] = $_content['2kg'];
							$data['5kg'] = $_content['5kg'];
							$data['10kg'] = $_content['10kg'];
							$data['20kg'] = $_content['20kg'];
							$data['30kg'] = $_content['30kg'];
							$data['status'] = 1;
						
								$model = Mage::getModel('tntshipping/tntshipping');
								$model->setData($data)
								->setId($this->getRequest()->getParam('id'));
									if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
										$model->setCreatedTime(now())
											->setUpdateTime(now());
									} else {
										$model->setUpdateTime(now());
									}	
			
								$model->save();
								$count++;
								Mage::getSingleton('adminhtml/session')->setFormData(false);

								if ($this->getRequest()->getParam('back')) {
									$this->_redirect('*/*/edit', array('id' => $model->getId()));
									return;
								}

						endforeach;
							Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('tntshipping')->__('Successfully imported ' . $count . ' records.'));
							$this->_redirect('*/*/');
							return;
					  } catch (Exception $e) {
						 Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
						 Mage::getSingleton('adminhtml/session')->setFormData($data);
						 $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
						 return;
					  }
			
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('tntshipping')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('tntshipping/tntshipping');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction() {
        $tntshippingIds = $this->getRequest()->getParam('tntshipping');
        if(!is_array($tntshippingIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($tntshippingIds as $tntshippingId) {
                    $tntshipping = Mage::getModel('tntshipping/tntshipping')->load($tntshippingId);
                    $tntshipping->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($tntshippingIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
    public function massStatusAction()
    {
        $tntshippingIds = $this->getRequest()->getParam('tntshipping');
        if(!is_array($tntshippingIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($tntshippingIds as $tntshippingId) {
                    $tntshipping = Mage::getSingleton('tntshipping/tntshipping')
                        ->load($tntshippingId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($tntshippingIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'tntshipping.csv';
        $content    = $this->getLayout()->createBlock('tntshipping/adminhtml_tntshipping_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'tntshipping.xml';
        $content    = $this->getLayout()->createBlock('tntshipping/adminhtml_tntshipping_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}
