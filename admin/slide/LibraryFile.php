<?php
class LibraryFile {
	function upload($rename = true, $dir = '/files/')
	{
		$newfilename = '';
		$filename = $_FILES['hinhAnh']['name'];
		if($filename!=''){
			if($rename==true){
			//đổi tên file
			$tmp = explode('.',$filename);
			$ext = end($tmp);
			$newfilename = 'vne-'.time().'.'.$ext;
			//file: vne-33242343.jpg
		}else{
			$newfilename = $filename;
		}
			$tmpname = $_FILES['hinhAnh']['tmp_name'];
			$path = $_SERVER['DOCUMENT_ROOT'].'/'.$dir.'/'.$newfilename;
			move_uploaded_file($tmpname, $path);
		}
		return $newfilename;
	}
	function delete($filename, $dir)
	{
		$path = $_SERVER['DOCUMENT_ROOT'].'/'.$dir.'/'.$filename;
		if(file_exists($path)){
			return unlink($path);
		}
	}
}
?>