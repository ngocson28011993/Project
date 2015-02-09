<?php
/**
 * Created by PhpStorm.
 * User: NgocSon
 * Date: 2/9/2015
 * Time: 2:05 PM
 */

class AdPostController extends BaseController {

    public function create(){
        return View::make('admin.post.form');
    }
} 