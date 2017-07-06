<?php

namespace App\Http\Controllers;

use App\Common;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{

    /**
     * Store a newly created image in storage/app/image.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        header('Content-Type: application/json');
        $data = $request->all();

        if (isset($data['image']) && $request->file('image')) {
            if (!in_array($request->file('image')->getClientOriginalExtension(), ['jpeg', 'jpg', 'bmp', 'gif', 'png'])) {
                echo json_encode(['error' => 'Invalid Image']);
            }
            $filename = Common::makeObjectId() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storePubliclyAs('image', $filename);
            echo json_encode(['filename' => $filename]);
        } else {
            echo json_encode(["error" => 'No data']);
        }
    }

    /**
     * Display the specified image.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function show($filename)
    {
        return Image::make(storage_path('app/image/' . $filename))->response();
    }

    /**
     * Remove the specified image from storage.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function destroy($filename)
    {
        //
    }
}
