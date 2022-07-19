<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function viewNews(Request $request)
    {
        $news = News::all();

        return response()->json($news);
    }

    // public function createNews(Request $request)
    // {

    // }

    public function createNewsSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => "required|min:3",
            'description' => "required",
            'type' => 'required',
            'date' => 'required|date'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

        $news = new News();

        $news->title = $request->title;
        $news->description = $request->description;
        $news->type = $request->type;
        $news->date = $request->date;

        $news->save();

        return response()->json([
            'success' => "Successfully created news"
        ]);
    }

    public function editNews(Request $request, $id)
    {
        $news = News::where('id', $id)->first();

        return response()->json($news);
    }

    public function editNewsSubmit(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'title' => "required|min:3",
            'description' => "required",
            'type' => 'required',
            'date' => 'required|date'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

        $news = News::where('id', $id)->first();

        $news->title = $request->title;
        $news->description = $request->description;
        $news->type = $request->type;
        $news->date = $request->date;

        $news->update();

        return response()->json([
            'success' => "Successfully updated news"
        ]);
    }

    public function deleteNews(Request $request, $id)
    {
        $news = News::where('id', $id)->first();

        if(!$news) {
            return response()->json([
                'error' => "News not found"
            ]);
        }

        $news->delete();

        return response()->json([
            'success' => "Successfully deleted news"
        ]);
    }

    public function getNewsByType(Request $request, $type)
    {
        $validate = Validator::make(['type' => $type], [
            'type' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

        $news = News::where('type', 'LIKE', "%$type%")->get();

        return response()->json($news);
    }

    public function getNewsByDate(Request $request, $date)
    {
        $validate = Validator::make(['date' => $date], [
            'date' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

        $news = News::where('date', $date)->get();

        if(count($news) == 0) {
            return response()->json([
                'error' => "News not found"
            ]);
        }

        return response()->json($news);
    }

    public function getNewsByTypeDate(Request $request, $type, $date)
    {
        $validate = Validator::make(['type' => $type, 'date' => $date], [
            'type' => 'required',
            'date' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ]);
        }

        $news = News::where('date', "$date")->where('type', 'LIKE', "%$type%")->get();

        if(count($news) == 0) {
            return response()->json([
                'error' => "News not found"
            ]);
        }

        return response()->json($news);
    }
}
