<?php

namespace common\components;

use common\models\Media;
use yii\base\Component;
use yii\web\UploadedFile;
use yii\helpers\Url;

class MediaUploader extends Component
{
    public static function uploadFiles(UploadedFile $upFile)
    {
        $mediaModel = new Media();

        $itemName = md5(uniqid()) . '.' . $upFile->getExtension();  // unique_name+extension
        $mediaModel->file_name = $itemName;
        $mediaModel->file_size = $upFile->size;
        $mediaModel->file_type = $upFile->type;
        $mediaModel->alt = $upFile->name;
        $mediaModel->media_type = $type;
		
        if ($upFile->saveAs(\common\components\MediaHelper::getImagePath($itemName))) {
            if($mediaModel->save()){
				return [
					'media_id' => $mediaModel->id,
					'file_name' => $mediaModel->file_name,
					'errors' => $mediaModel->getErrors()
				];
			}
        }
		return false;
    }
	
	public static function deleteFile($fileName){
		
		$result = unlink(\common\components\MediaHelper::getImagePath($fileName));

		if($result){
			return true;
		}
		return false;
	}
	
	public static function duplicateFile($fileName, $media = null){
		$file = \common\components\MediaHelper::getImagePath($fileName);
		
		$temp = explode('.',$fileName);
		$extension = end($temp);
		$copiedFile = md5(uniqid()) . '.' . $extension;  // unique_name+extension
		
		$newfile = \common\components\MediaHelper::getImagePath($copiedFile);
		if (!copy($file, $newfile)) {
			return false;
		}
		if($media){
			$mediaModel = new Media();
			$mediaModel->file_name = $copiedFile;
			$mediaModel->file_size = $media->file_size;
			$mediaModel->file_type = $media->file_type;
			$mediaModel->alt = $media->alt;
			// $mediaModel->media_type = $type;
			if($mediaModel->save()){
				return [
					'media_id' => $mediaModel->id,
					'file_name' => $mediaModel->file_name,
					'errors' => $mediaModel->getErrors()
				];
			}
		}
		return true;
	}
}