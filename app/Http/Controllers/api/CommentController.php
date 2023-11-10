<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Cart;
use App\Models\Pay;
use App\Services\resources\Comment;
use App\Models\Comment as model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        try
        {
            Model::create(Comment::prepareData($request));
            return response()->json([
                'status'=>true,
                'message'=>'کامنت شما با موفقیت ارسال شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در  ارسال کامنت',
            ], 500);
        }
    }

    public function index()
    {
        return new CommentCollection(Comment::filter());
    }
}
