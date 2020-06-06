<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicCategory;
use Illuminate\Http\Request;

class TopicCategoryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(TopicCategory::class, 'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = TopicCategory::orderBy('created_at', 'desc')->paginate();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $category = TopicCategory::create($request->only([
            'name',
        ]));

        return redirect()
            ->route('category.show', ['category' => $category])
            ->withSuccess(['Category successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TopicCategory  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(TopicCategory $category)
    {

        $topics = Topic::whereCategoryId($category->id)->paginate();

        return view('category.show', [
            'category' => $category,
            'topics' => $topics,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TopicCategory  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(TopicCategory $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TopicCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopicCategory $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->only([
            'name',
        ]));

        return redirect()
            ->route('category.show', ['category' => $category])
            ->withSuccess(['Category successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TopicCategory $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(TopicCategory $category)
    {
        Topic::whereCategoryId($category->id)->delete();
        $category->delete();

        return redirect()
            ->route('category.index')
            ->withSuccess(['Category successfully deleted!']);
    }
}
