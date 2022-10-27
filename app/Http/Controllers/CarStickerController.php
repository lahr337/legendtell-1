<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarSticker;
use App\Http\Requests\Car\DeleteCarStickerRequest;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarStickerController extends Controller
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
                // $type = preg_match('/images?/', $file->getMimeType()) == 1 ? 'image' : null;
                $type = $file->getMimeType();
                if($type){
                    $path1 = Storage::disk('s3')->put('car_sticker', $file);
                    $path1 = Storage::disk('s3')->url($path1);
                   
                    if($request->type == 'carsticker'){
                        $car_sticker = CarSticker::create([
                            'filename'  => $path1,
                            'type'      => $type,
                            'car_id'    => $request->car_id,
                            'user_id'    => $user->id,
                        ]);

                       // echo "<pre>"; print_r($car_sticker); die;
                        $car = Car::where('id',$request->car_id)->first();
                        $html .= view('cars.partials._tab-contents._window-sticker._items',['sticker' => $car_sticker,'i'=>rand(0000000,9999999)])->render();
                    }
                }
            }
            return $this->sendResponse($html);
        }
        return $this->sendError([], "Fail to upload");
    }

    public function delete(DeleteCarStickerRequest $request){
        if($car_medias = CarSticker::whereIn('id', $request->deletable_ids)->get()){
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
