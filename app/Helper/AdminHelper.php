<?php 
namespace App\Helper;

use Illuminate\Support\Facades\Storage;

class AdminHelper{
    static public function fileRename($oldName,$newName)
    {
        if (Storage::move($oldName, $newName)):
            return $newName;
        else:
            return false;
        endif;
    }    

    static public function fileSize($bytes)
    {
        if ($bytes >= 1073741824){
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }elseif ($bytes >= 1048576){
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }elseif ($bytes >= 1024){
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }elseif ($bytes > 1){
            $bytes = $bytes . ' B';
        }elseif ($bytes == 1){
            $bytes = $bytes . ' B';
        }else{
            $bytes = '0 B';
        }
        return $bytes;
    }
}