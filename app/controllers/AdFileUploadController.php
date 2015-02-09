<?php
/**
 * Created by PhpStorm.
 * User: NgocSon
 * Date: 2/9/2015
 * Time: 1:09 PM
 */

class AdFileUploadController extends BaseController{

    public function create(){
        return View::make("admin.file.form");
    }
} 