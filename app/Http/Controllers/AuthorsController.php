<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('backend.authors.AuthorIndex', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Author::class);
        return view('backend.authors.AuthorCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $this->authorize('create', Author::class);
        Author::create($request->all());
        return redirect()->route('authors.index')->with(['message' => 'Author added successfully.']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Author::class);
        $author = Author::findOrFail($id);
        return view('backend.authors.AuthorEdit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAuthorRequest $request, $id)
    {
        $this->authorize('update', Author::class);
        $author = Author::findOrFail($id);
        $author->update($request->all());
        $author->save();
        
        return redirect()->route('author.index')->with(['message' => 'Author updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Author::class);
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('authors.index')->with(['message' => 'Author Deleted Successfuly']);
    }

    /**
     * Remove the selected resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Author::class);
        $authors = explode(',', $request->input('ids'));
        foreach ($authors as $author_id) {
            $author = Author::findOrFail($author_id);
            $author->delete();
        }

        return redirect()->route('authors.index')->with(['message' => 'Authors deleted successfully']);
    }
}
