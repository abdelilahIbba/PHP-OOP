<?php

interface RepositoryInterface {
    public function getAll();
    public function push($entity);

}