<?php

namespace App\Http\Repositories\Impl;

interface BaseRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function destroy($id);
}
