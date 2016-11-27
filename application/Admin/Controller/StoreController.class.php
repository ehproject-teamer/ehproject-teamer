<?php

namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class StoreController extends AdminbaseController {

    protected $store_model;
    
	public function _initialize() {
		parent::_initialize();
		
		$this->store_model = D("Common/Store");
		
	}

	public function index() {
	    $store_list = $this->store_model->select();
	    $count=$this->store_model->count();
	    $page = $this->page($count, 20);
	    $this->assign("page", $page->show());
	    $this->assign("store_list",$store_list);
	    
		$this->display();
	}
	
	
	
	public function add_post(){
	    if (IS_POST) {
	        $data=I("post.store");	        
	        if ($this->store_model->create($data)!==false) {
	            $result=$this->store_model->add();
	            $this->success("添加成功！", U("Store/index"));
	        } else {
    			$this->error($this->store_model->getError());
    		}
	        
	        
	    }
	}
	
	
	
}


?>