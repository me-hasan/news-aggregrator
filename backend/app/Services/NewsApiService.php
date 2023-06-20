<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class NewsApiService implements NewsInterface
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the authors service
     * @var string
     */
    public $baseUri;

    


    public function __construct()
    {
        $this->baseUri = config('services.newsApi.base_uri');
    }

    /**
     * Obtain the full list of teacher from the teacher service
     * @return string
     */
    public function obtainNews()
    {
        return $this->performRequest('GET');
    }

    /**
     * Create one teacher using the teacher service
     * @return string
     */
    public function createTeacher($data)
    {
        return $this->performRequest('POST', '/teachers', $data);
    }

    /**
     * Obtain one single teacher from the teacher service
     * @return string
     */
    public function obtainTeacher($teacher)
    {
        return $this->performRequest('GET', "/teachers/{$teacher}");
    }

    /**
     * Update an instance of teacher using the teacher service
     * @return string
     */
    public function editTeacher($data, $teacher)
    {
        return $this->performRequest('PUT', "/teachers/{$teacher}", $data);
    }

    /**
     * Remove a single teacher using the teacher service
     * @return string
     */
    public function deleteTeacher($teacher)
    {
        return $this->performRequest('DELETE', "/teachers/{$teacher}");
    }


}