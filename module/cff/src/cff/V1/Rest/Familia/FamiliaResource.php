<?php
namespace cff\V1\Rest\Familia;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;


class FamiliaResource extends AbstractResourceListener
{

    protected $familiaService;

    protected $fetchAllDefaults = array(
        'familia_id' => 0
    );

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
    public function fetch($params = array() )
    {


        if(0 !=  (int)$params['familia_id']) {
            return $this->bancoService->getByFamilia((int)$params['familia_id']);
        } else {
            return  $this->bancoService->getById((int)$params[0]);
        }

        return new ApiProblem(405, 'The GET method has not been defined for individual resources');

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
        $params = array_merge($this->fetchAllDefaults,(array) $params);

        $return =  $this->familiaService->getById((int)$params['familia_id']);
        if($return) {
            return $return;
        }
        return new ApiProblem(404, "Recurso com o id : ".$params['familia_id']." não localizado na base de dados!");

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
        return $this->familiaService->update($id, $data);
    }
}
