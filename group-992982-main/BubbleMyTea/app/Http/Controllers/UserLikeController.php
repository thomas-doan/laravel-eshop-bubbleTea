<?php

namespace App\Http\Controllers;

use App\Models\UserLike;
use App\Http\Requests\StoreUserLikeRequest;
use App\Http\Requests\UpdateUserLikeRequest;

class UserLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserLike  $userLike
     * @return \Illuminate\Http\Response
     */
    public function show(UserLike $userLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserLike  $userLike
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLike $userLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserLikeRequest  $request
     * @param  \App\Models\UserLike  $userLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserLikeRequest $request, UserLike $userLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserLike  $userLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLike $userLike)
    {
        //
    }
}
