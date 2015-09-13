<?php
namespace cff\V1\Rest\Banco;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class BancoResource extends AbstractResourceListener
{
    protected $bancoService;

    protected $fetchAllDefaults = array(
        'familia_id' => 0
    );
    private $result;

    public function __construct(BancoService $bancoService)
    {
        $this->bancoService = $bancoService;
        $this->result = null;
    }
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return $this->bancoService->save($data);
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
        return $this->bancoService->delete($id);

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
     * @return array|bool|ApiProblem
     */
    public function fetch($params = array())
    {
        $params = array_merge($this->fetchAllDefaults,(array) $params);

        if(0 !=  (int)$params['familia_id']) {
            return $this->bancoService->getByFamilia((int)$params['familia_id']);
        } else {
            return  $this->bancoService->getById((int)$params[0]);
        }

        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * @param array $params
     * @return array|bool|string
     */
    public function fetchAll($params =  array())
    {

        $params = array_merge($this->fetchAllDefaults,(array) $params);

        if(0 !=  (int)$params['familia_id']) {
             $this->result = $this->bancoService->getByFamilia((int)$params['familia_id']);
             return $this->validaRetorno($this->result);
        }
            return  $this->bancoService->getById((int)$params[0]);

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
        return $this->bancoService->update($id,$data);
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }

    public function validaRetorno($result = array()){
        if($result) {
            return $result;
        }

        return new ApiProblem(404, 'Recurso não localizado');
    }
}
