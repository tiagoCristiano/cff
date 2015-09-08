<?php
namespace cff\V1\Rest\Familia;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;


class FamiliaResource extends AbstractResourceListener
{

    protected $familiaService;

    public function __construct( FamiliaService $familiaService)
    {
        $this->familiaService = $familiaService;
    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return $this->familiaService->save($data);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        if(  $this->familiaService->delete($id) ) {
            return new ApiProblem(200, 'Recurso com id: '.$id.' removido base de dados!');
        }
        return new ApiProblem(404, 'Recurso com id: '.$id.' não localizado na base de dados!');
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
        if( $this->familiaService->getById($id) ) {
            return $this->familiaService->getById($id);
        }
        return new ApiProblem(404, 'Recurso com id: '.$id.' não localizado na base de dados!');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
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
        if( $this->familiaService->update($id,$data) ) {
            return new ApiProblem(200, 'Recurso com id: '.$id.' atualizado na base de dados!');
        };
        return new ApiProblem(404, 'Recurso com id: '.$id.' não localizado na base de dados!');
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
