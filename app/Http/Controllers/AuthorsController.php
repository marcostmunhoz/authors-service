<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponserTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Authors Controller.
 */
class AuthorsController extends Controller
{
    use ApiResponserTrait;

    /**
     * Returns the list of authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Author::all());
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
        return $this->successResponse(Author::findOrFail($author));
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
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|max:255',
        ];

        $data = $this->validate($request, $rules);

        return $this->successResponse(
            Author::create($data),
            Response::HTTP_CREATED
        );
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
        $rules = [
            'name' => 'max:255',
            'gender' => 'in:male,female',
            'country' => 'max:255',
        ];

        $data = $this->validate($request, $rules);

        $model = Author::findOrFail($author);

        $model->fill($data);

        if ($model->isClean()) {
            return $this->errorResponse(
                'At least one value must be changed.',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $model->save();

        return $this->successResponse($model);
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
        Author::findOrFail($author)->delete();

        return $this->successResponse();
    }
}
