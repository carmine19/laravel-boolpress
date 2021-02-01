<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $all_tags = Tag::all();

        return response()->json([
            'success' => true,
            'response' => $all_tags,
        ]);
    }
}
