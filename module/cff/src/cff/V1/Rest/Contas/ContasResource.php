<?php
namespace cff\V1\Rest\Contas;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ContasResource extends AbstractResourceListener
{

    protected $contaService;

    protected $bancoService;

    protected $fetchAllDefaults = array(
        'familia_id' => 0
    );

    public function __construct(ContaService $contaService)
    {
        $this->contaService = $contaService;

    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return $this->contaService->save($data);
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return $this->contaService->delete($id);
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
     * @param array $params
     * @return ApiProblem
     */
    public function fetch($params = array())
    {
        $params = array_merge($this->fetchAllDefaults,(array) $params);

        if(0 !=  (int)$params['familia_id']) {
            return $this->contaService->getByFamilia((int)$params['familia_id']);
        } else {
            return  $this->contaService->getById((int)$params[0]);
        }

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
            return $this->contaService->getByFamilia((int)$params['familia_id']);
        } else {
            return  $this->contaService->getById((int)$params[0]);
        }
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
