<?php
namespace cff\V1\Rest\Receitas;

class ReceitasResourceFactory
{
    public function __invoke($services)
    {
        return new ReceitasResource($services->get('ReceitasService'));
    }
}
