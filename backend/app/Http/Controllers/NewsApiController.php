<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Services\NewsApiService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsApiController extends Controller 
{
    use ApiResponser;

    /**
     * The service to consume the Nesw Api
     * @var AuthorService
     */
    public $newApiService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsApiService $newsApiService)
    {
        $this->newApiService = $newsApiService;
    }

    /**
     * Return the list of teacher
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->newApiService->obtainNews());
    }

    /**
     * Create one new teacher
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->newApiService->createTeacher($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one teacher
     * @return Illuminate\Http\Response
     */
    public function show($teacher)
    {
        return $this->successResponse($this->newApiService->obtainTeacher($teacher));
    }

    /**
     * Update an existing teacher
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $teacher)
    {
        return $this->successResponse($this->newApiService->editTeacher($request->all(), $teacher));
    }

    /**
     * Remove an existing teacher
     * @return Illuminate\Http\Response
     */
    public function destroy($teacher)
    {
        return $this->successResponse($this->newApiService->deleteTeacher($teacher));
    }
}
