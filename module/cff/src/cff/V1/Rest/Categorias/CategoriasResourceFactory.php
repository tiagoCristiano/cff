<?php
namespace cff\V1\Rest\Categorias;

class CategoriasResourceFactory
{
    public function __invoke($services)
    {
        return new CategoriasResource($services->get('CategoriaService'));
    }
}
