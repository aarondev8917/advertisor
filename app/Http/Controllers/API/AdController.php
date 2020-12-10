<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Rules\Imagevalidate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'provider' => [
                'required', 
                Rule::exists('providers','name')->where(function ($query) use ($request) {
                     $query->where('name', $request->input('provider'));
                })
            ],
            'image_file' => ['required', new Imagevalidate($request->all())] 
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $uploadFolder = 'images';

        $image = $request->file('image_file');
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        $image_url = Storage::disk('public/images')->url($image_uploaded_path);
        $path_parts = pathinfo($image_url);
        $imgInfo = getimagesize($newUrl);

        $file = new UploadedFile(
            $image_url,
            $path_parts['basename'],
            $imgInfo['mime'],
            filesize($url),
            true,
            TRUE
        );
  
        return $file;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
