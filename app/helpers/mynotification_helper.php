<?php 

// tạo thông báo
if(!function_exists('show_flashdata')){
	function show_flashdata($body = TRUE){;
		$result = '';
		$CI =& get_instance();
		$message = $CI->session->flashdata('message-success');
		if(isset($message)){
			$result['message'] =  $message ;
		}
		if(isset($message)){
			$result['flag'] = 0;
			return $result;
		}
		$message = $CI->session->flashdata('message-danger');
		if(isset($message)){
			$result['message'] =  $message ;
		}
		if(isset($message)){
			$result['flag'] = 1;
		}
		
		
		return $result;
	}
}