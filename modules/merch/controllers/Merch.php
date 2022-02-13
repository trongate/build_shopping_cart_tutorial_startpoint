<?php
class Merch extends Trongate {

	function display() {
		$update_id = segment(3);
		
		//attempt to fetch item
		$item_obj = $this->model->get_where($update_id, 'store_items');

		if ($item_obj == false) {
			redirect('merch');
		}

		//convert obj into an array
		$data = (array) $item_obj;

		$pic_path = BASE_URL.'store_items_module/store_items_pics/';
		$pic_path.= $update_id.'/'.$data['picture'];
		$data['pic_path'] = $pic_path;

		$data['view_file'] = 'display_item';
		$this->template('public', $data);
	}

	function index() {
		//fetch the items
		$items = $this->model->get('id', 'store_items');

		//delete this when live!!!
		for ($i=0; $i < 11; $i++) { 
			$items[] = $items[0];
		}

		$data['items'] = $items;
		$data['view_file'] = 'display_items';
		$this->template('public', $data);
	}

}