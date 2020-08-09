<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Authors Controller.
 */
class AuthorsController extends Controller
{
    /**
     * Returns the list of authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Shows a given author.
     *
     * @param int $author
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $author)
    {
    }

    /**
     * Creates a new author.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Updates a given author.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $author
     *
     * @return void
     */
    public function update(Request $request, int $author)
    {
    }

    /**
     * Deletes a given author.
     *
     * @param int $author
     *
     * @return void
     */
    public function destroy(int $author)
    {
    }
}
