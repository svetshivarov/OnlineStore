<?php

abstract class BaseModel
{
    public abstract function create($data);
    public abstract function view($id);
    public abstract function listAll();
    public abstract function update($id);
    public abstract function delete($id);
}