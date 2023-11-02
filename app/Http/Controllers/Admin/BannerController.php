<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\StoreBannerRequest;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function create()
    {
        return view('panel.admin.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {

        try {
            $banner = Banner::create(['title'=>$request->title, 'alt'=>$request->alt]);
            $fullName = pathinfo($request->file('image')->getClientOriginalName())['filename'];
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = time().rand(100000, 1000000000).$fullName.rand(100000, 1000000000).'.'.$extension;
            $url = $request->file('image')->storeAs('public/images/banners', $newName);
            $banner->image()->create(['url' => 'storage/images/banners/'.$newName]);
            return redirect('panel/admin/banners')->with('success', 'بنر مورد نظر با موفقیت ایجاد شد.');
        }catch (Exception $e){
            return redirect('panel/admin/banners', 500)->with('success', 'ایجاد بنر با خطا مواجه شد.');
        }
    }
}
