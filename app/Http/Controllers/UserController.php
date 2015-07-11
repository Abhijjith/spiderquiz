<?php namespace App\Http\Controllers;
class UserController extends Controller
{
    /**
     * Responds to requests to GET /users
     */
    public function getIndex()
    {
        return "hi there its my index";
    }
    /**
     * Responds to requests to GET /users/show/1
     */
    public function getShow()
    {
         return "hi there its my show";
    }
    /**
     * Responds to requests to GET /users/admin-profile
     */
    public function getAdminProfile()
    {
         return "hi there its my Admin-profile";
    }
    /**
     * Responds to requests to POST /users/profile
     */
    public function postProfile()
    {
        //
    }
}