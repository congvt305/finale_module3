<?php


namespace App\Http\Service;


interface ServiceInterface
{
    public function getAll();

    public function create($request);

    public function update($request, $id);

    public function delete($id);

    public function findById($id);
}
