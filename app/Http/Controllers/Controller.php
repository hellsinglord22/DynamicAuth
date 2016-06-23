<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}

public function up()
    {
        Schema::create('permissions', function (Blueprint ) {
        ->increments('id');
        ->string('name');
        ->string('label')->nullable();
        ->timestamps();
    });
    Schema::create('roles', function (Blueprint ) {
        ->increments('id');
        ->string('name');
        ->string('label')->nullable();
        ->timestamps();
    });
    Schema::create('role_permission', function (Blueprint ) {
        ->integer('permission_id')->unsigned();
        ->integer('role_id')->unsigned();
        ->foreign('permission_id')
        ->references('id')
        ->on('1s')
        ->onDelete('cascade');
        ->foreign('role_id')
        ->references('id')
        ->on('2s')
        ->onDelete('cascade');
        ->primary(['permission_id', 'role_id']);
    });