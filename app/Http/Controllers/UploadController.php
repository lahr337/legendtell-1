<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function multipleFiles(Request $request){
        if( $file = $request->file('files') ){
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(storage_path('app/public/uploads/' . $request->type . '/'), $fileName);
            return $this->sendResponse(['file' => $fileName]);
        }
        return $this->sendError([], "Fail to upload");
    }
}
