<?php

namespace App\Http\Interfaces\Admin;

interface PostInterface
{
    public function index($datatable);
    public function create();
    public function store($request);
    public function edit($post);
    public function update($request , $post);
    public function show($post);
    public function delete($post);

    public function update_status($comment);

}
