<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 类功能描述:公共控制器 ,实现公共和通用操作
 */
class PublicController extends Controller {

	/**
	 * 图片上传
	 *
	 * @param string $thumb
	 *        	是否自动生成缩略图
	 * @param string $thumbWidth
	 *        	宽 默认200
	 * @param string $thumbHeight
	 *        	高 默认200
	 * @return $info 上传后的文件信息,如上传返回null,可以通过 public 的 geterror获取错误
	 *
	 *         例子:
	 *         $uploadInfo=null;
	 *         if (!empty($_FILES)) {
	 *         $uploadFile =A('Admin/Public');
	 *         $uploadInfo =$uploadFile->UploadImages(true);
	 *
	 *         }
	 */
	public function UploadImages($thumb = false, $thumbWidth = '200', $thumbHeight = '200') {
		try {
			$upload = new \Think\Upload (); // 实例化上传类
			$upload->maxSize = 3145728; // 设置附件上传大小 3M
			                            // 设置附件上传类型
			// $this->writeLog("ttK");
			$upload->exts = array (
					'jpg',
					'gif',
					'png',
					'jpeg'
			);
			// 设置附件上传目录 photo/帐户/控制器名/日期/图片, 缩图 加 _thumb.jpg
			$path = '/photo/a' . $_SESSION['userdata']['uid'] . '/';
			$upload->savePath = $path;
			if(!file_exists('./Uploads/'.$path) || !is_dir('./Uploads/'.$path)){
	            mkdir('./Uploads/'.$path,0777,true); 
	        }
			$info = $upload->upload();
			if (!$info) { // 上传错误提示错误信息
				$g_error = $upload->geterror ();                                // $this->error ("文件上传失败,Err:"+ $upload->geterror () );
			} else { // 上传成功
				if ($thumb) { // 生成缩略图
					$image = new \Think\Image ();
					foreach ( $info as $file ) {
						$thumb_file = './Uploads/' . $file ['savepath'] . $file ['savename'];
						$save_path = './Uploads/' . $file ['savepath'] . 'thumb_' . $file ['savename'];
						$imgInfo=$image->open ( $thumb_file );
						if(intval($imgInfo->width())>1920||intval($imgInfo->height())>1920){
							$imgInfo->thumb ( 1920, 1920 )->save ( $thumb_file );
						}
						$imgInfo->thumb ( $thumbWidth, $thumbHeight )->save ( $save_path );

					}
				}
			}

			return $info;
		} catch ( Exception $e ) {
			$g_error = $e->getMessage ();
			return null;
		}
	}
	/**
	 * 文件上传
	 *
	 * @param array $arr
	 *        	上传文件的后缀名
	 * @return $info 上传后的文件信息,如上传返回null,可以通过 public 的 geterror获取错误
	 *
	 *         例子:
	 *         $uploadInfo=null;
	 *         if (!empty($_FILES)) {
	 *         $uploadFile =A('Admin/Public');
	 *         $uploadInfo =$uploadFile->UploadFile($arr);
	 *
	 *         }
	 */
	Public function UpVideo() {
		try {
			$upload = new \Think\Upload (); // 实例化上传类
			// $upload->maxSize = 10145728; // 设置附件上传大小 3M
			$upload->exts = array (
					'mp4',
					'flv',
					'avi'
			);                          // 设置附件上传类型

			// $upload->exts = $arr;
			// 设置附件上传目录 photo/帐户/控制器名/日期/图片, 缩图 加 _thumb.jpg
			$path = '/vedio/a' . $_SESSION['userdata']['uid'] . '/';
			$upload->savePath = $path;
			if(!file_exists('./Uploads/'.$path) || !is_dir('./Uploads/'.$path)){
	            mkdir('./Uploads/'.$path,0777,true); 
	        }

			$info = $upload->upload ();
			if (! $info) { // 上传错误提示错误信息
				$g_error = $upload->geterror (); // $this->error ("文件上传失败,Err:"+ $upload->geterror () );
				return 'type';
			}
			return $info;
		} catch ( Exception $e ) {
			return null;
		}
	}

	/**
	 * 删除图片
	 *
	 * @param unknown $imagename
	 */
	function DeleteImages($imagename) {
		$dir = '../Public/upload/';
		unlink ( $dir . $imagename );
	}

	/**
	 * 上传图片
	 */
	public function uploadpicture() {
		$uploadfile = $_FILES ['Picture'] ['tmp_name'];
		if ($uploadfile != "") {

			$uploadList = $this->UploadModel ( $_FILES );

			$result = array ();
			$result ['status'] = 1;
			$result ['data'] = $uploadList;
			// 返回JSON数据格式到客户端 包含状态信息
			// header("Content-Type:text/html; charset=utf-8");
			// echo json_encode($result);
			$this->ajaxReturn ( $result );
		}
	}

	/**
	 * 上传视频
	 */
	public function uploadvedio() {
		if (isset ( $_REQUEST ['PHPSESSID'] ))
			session_id ( $_REQUEST ['PHPSESSID'] );
		session_start ();
		if (isset ( $_REQUEST ['user_id'] ))
			$_SESSION [C ( 'USER_AUTH_KEY' )] = $_REQUEST ['user_id'];
		$uploadfile = $_FILES ['Filedata'] ['tmp_name'];
		if ($uploadfile != "") {

			$uploadList = $this->UploadModel ();
			$filepath = $uploadList [0] ['savename'];
			$filesize = $uploadList [0] ['size'];
			$data = array ();
			$data ['filepath'] = $filepath;
			$data ['filesize'] = $filesize;
			$result = array ();
			$result ['status'] = 1;
			$result ['statusCode'] = 1; // zhanghuihua@msn.com
			$result ['navTabId'] = $_REQUEST ['navTabId']; // zhanghuihua@msn.com
			$result ['message'] = "";
			$result ['data'] = $data;
			// 返回JSON数据格式到客户端 包含状态信息
			header ( "Content-Type:text/html; charset=utf-8" );
			exit ( json_encode ( $result ) );
		}
	}
}

?>
