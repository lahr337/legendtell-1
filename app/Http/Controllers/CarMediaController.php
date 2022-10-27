<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMedia;
use App\Http\Requests\Car\DeleteCarMediaRequest;
use Illuminate\Support\Facades\Storage;

class CarMediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uplaodFiles(Request $request){
       
        
        if( $files = $request->file('files') ){
            $user = auth()->user();
            $html = '';
            foreach($files as $file_index => $file) {
                $type = preg_match('/images?/', $file->getMimeType()) == 1 ? 'image' : (preg_match('/videos?/', $file->getMimeType()) == 1 ? 'video' : null);
                if($type){
                    $path1 = Storage::disk('s3')->put('service_video', $file);
                    $path1 = Storage::disk('s3')->url($path1);
                   
                    if($request->type == 'carmedia'){
                        
                        $car_media = CarMedia::create([
                            'filename'  => $path1,
                            'type'      => $type,
                            'car_id'    => $request->car_id,
                            'user_id'    => $user->id, 
                        ]);
                      
                        $html .= view('cars.partials._tab-contents._media._items',['media' => $car_media])->render();
                    }
                }
            }
            return $this->sendResponse($html);
        }
        return $this->sendError([], "Fail to upload");
    }

    public function delete(DeleteCarMediaRequest $request){
        if($car_medias = CarMedia::whereIn('id', $request->deletable_ids)->get()){
            foreach($car_medias as $car_media){
                // unlink
                $filepath = getStoragePath($request->type, $request->car_id, $car_media->filename);
                if(file_exists($filepath)) {
                    unlink($filepath);
                }
                $car_media->delete();
            }
        }
    }
}
