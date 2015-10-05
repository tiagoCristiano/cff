<?php
namespace cff\V1\Rest\Familiares;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class FamiliaresResource extends AbstractResourceListener
{
    /**
     * Serviço dos familiares
     * @var
     */
    protected $familiaresService;
    /**
     * @var array
     */
    protected $userService;

    protected $fetchAllDefaults = array(
        'familia_id' => 0
    );


    public function __construct( FamiliaresService $familiaresService)
    {
        $this->familiaresService = $familiaresService;
    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $result =  $this->familiaresService->create($data);
        if($result) {
            return $result;
        }
        return array('erro' => "Email já cadastrado");
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {

        $params = array_merge($this->fetchAllDefaults,(array) $params);

        if(0 !=  (int)$params['familia_id']) {
            return $this->familiaresService->getByFamilia((int)$params['familia_id']);
        }
        return new ApiProblem(404, 'Zica');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
