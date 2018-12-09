Xóa tin:
kiểm tra tin hiện tại đang xóa có file ko
SELECT * FROM STORY WHERE id = $_GET['id']
$tenHinhAnh = arTT['picture'];
if($tenHinhAnh != '') {
    // có hình
   // xóa hình
  $filePath = $_SEVER['DOCUMENT_ROOT'].'/bstory/files/'.$tenHinhAnh;
  unlink($path_upload);
}
xóa row trong table
DELETE
------------------------------------------
.htaccess
(.*) : 1 chuỗi bất kỳ
([0-9]*) : các số từ 0 - n
([0-9]+) : các số từ 1 - n
([a-zA-Z0-9]*) : các ký tự từ a-z, A-Z, 0-n
^ : bắt đầu /tintuc
$ : kết thúc ( ví dụ .html .js )