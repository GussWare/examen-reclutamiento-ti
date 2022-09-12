<?php

interface ICrudService {
    public function find_paginate(object $filter, Options_ViewModel $options, bool $is_array);
    public function find_all();
    public function find_by_id(int $id);
    public function create(object $body);
    public function update(int $id, object $body);
    public function remove(int $id);
}