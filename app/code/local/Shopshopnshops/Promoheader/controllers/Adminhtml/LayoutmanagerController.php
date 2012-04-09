<?php

class Shopshopnshops_Promoheader_Adminhtml_LayoutmanagerController extends Mage_Adminhtml_Controller_Action
{
	
	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('layoutmanager/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
		
		return $this;
	}
		
	public function renderblockAction(){
		$this->loadLayout()->renderLayout();
	}
	
	public function editblockAction(){
		$this->loadLayout()->renderLayout();
	}
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('promoheader/layoutmanager')->load($id);
		
		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('promoheader_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('layoutmanager/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('promoheader/adminhtml_layoutmanager_edit'))
				->_addLeft($this->getLayout()->createBlock('promoheader/adminhtml_layoutmanager_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('promoheader')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			//This setting up the uploading of image depends on layout type id	
						
			/*if($data['layout_type']=='layout-1'){
				$blocks[] = 1;
				$blocks[] = 2;
				$blocks[] = 3;
			}else{*/
				for($x=1;$x<=sizeof($data['block']);$x++)
					$blocks[] = $x;
			//}
			if(isset($data['all_image'])){
					$_img = explode(';',$data['all_image']);
			}
			
			//uploading each image on media/promoheader directory
			foreach($blocks as $key=>$value){
							if(isset($_FILES['filename_' . $value]['name']) && $_FILES['filename_' . $value]['name'] != '') {
										try {	
											/* Starting upload */	
											$uploader = new Varien_File_Uploader('filename_'. $value);
											
											// Any extention would work
											$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
											$uploader->setAllowRenameFiles(false);
											
											// Set the file upload mode 
											// false -> get the file directly in the specified folder
											// true -> get the file in the product like folders 
											//	(file.jpg will go in something like /media/f/i/file.jpg)
											$uploader->setFilesDispersion(false);
											
											foreach($data['stores'] as $key=>$store_folder ){
											// We set media as the upload dir
													$path = Mage::getBaseDir('media') . DS . 'promoheader/';
													$filename = $_FILES['filename_' . $value]['name'];
													$new_filename = $store_folder . '_' . $filename;
											
													$uploader->save($path, $new_filename);
													
											}
											
										} catch (Exception $e) {
												echo $e;
										}	
									
								//this way the name is saved in DB
									if($this->getRequest()->getParam('id') ==null){
										$larawan[] = $filename;
									}
									else{
										$_img[$value-1] = $filename;
									}
								}
								else{
									$larawan[]="";
								}
								
				}
			
/*###################################################################################
			  #Preparing image_array button_array for database table
*/###################################################################################
			
			foreach($data['block'] as $_block){
				
					$image_text_array[] = $_block['image_text'];
					$button_text_array[] = $_block['button_text'];
					$button_url_array[] = $_block['button_url'];
					$media_url_array[] = $_block['media_url'];
					$block_position[]  = $_block['position'];
			}
			
			
			
	  		$data['image_text_array'] = implode(';',$image_text_array);
			$data['button_text_array'] = implode(';',$button_text_array);
			$data['button_url_array'] = implode(';',$button_url_array);
			$data['media_url_array'] = implode(';',$media_url_array);
			$data['layout_position_css'] = implode(';',$block_position);
		
		/*echo '<pre>';
			print_r($larawan);
		echo '</pre>';
		echo '<pre>';
			print_r($_FILES);
		echo '</pre>';
		echo '<pre>';
			print_r($data);
		echo '</pre>';
		exit();*/
		
			if($this->getRequest()->getParam('id') ==null){
				$data['larawan'] = implode(';',$larawan);
			}
			else{
				foreach($data['delete_image'] as $key=>$value){
					if(isset($value['delete']) && $value['delete']==1){
						$_img[$key] = "";
						echo $key . ' : ' . $value['value'];
					}
				}
				
				$data['larawan'] = implode(';',$_img);
			}
			
			$data['store_id'] = implode(',',$data['stores']);
			
/*###################################################################################
			  End... (hapit na mabuang..waaaahhhhhhhhh)
*/###################################################################################				
			
			$model = Mage::getModel('promoheader/layoutmanager');
			
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				if($data['default']==1) {
/*##########################################################################################################
/*				Updates all records.. set default to 0, ensure that only 1 promoheader is displayed
/*##########################################################################################################	*/			
					$sql = "UPDATE promoheader SET `default` = 0";

					$write = Mage::getSingleton('core/resource')->getConnection('core_write');
					$result = $write->query($sql);
				}
				$model->save();
				
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('promoheader')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('promoheader')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('promoheader/layoutmanager');
				 
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
        $promoheaderIds = $this->getRequest()->getParam('promoheader');
        if(!is_array($promoheaderIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($promoheaderIds as $promoheaderId) {
                    $promoheader = Mage::getModel('promoheader/layoutmanager')->load($promoheaderId);
                    $promoheader->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($promoheaderIds)
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
        $promoheaderIds = $this->getRequest()->getParam('promoheader');
        if(!is_array($promoheaderIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($promoheaderIds as $promoheaderId) {
                    $promoheader = Mage::getSingleton('promoheader/layoutmanager')
                        ->load($promoheaderId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($promoheaderIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'promoheader.csv';
        $content    = $this->getLayout()->createBlock('promoheader/adminhtml_layoutmanager_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'promoheader.xml';
        $content    = $this->getLayout()->createBlock('promoheader/adminhtml_layoutmanager_grid')
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
