<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();


        if ($request->has('query')) {
            $query = $request->input('query');

            $news = $user->news()->where('title', 'like', "%$query%")->get();
        } else {
            $news = $user->news;
        }

        return view('news.index', compact('news'));
    }

    public function search(Request $request)
    {
        $user = auth()->user();

        if ($request->has('query')) {
            $query = $request->input('query');

            $news = $user->news()->where('title', 'like', "%$query%")->get();
        } else {
            $news = $user->news;
        }

        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.view', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->route('news.index')->withStatus('News created successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news = News::findOrFail($id);
        $news->update($request->all());

        return redirect()->route('news.index')->withStatus('News updated successfully');
    }

    public function destroy($id)
    {
        $news = News::find($id);

        if ($news) {
            $news->delete();
            return redirect()->back()->withStatus('News deleted successfully');
        }

        return redirect()->back()->withStatus('News not found');
    }
}
