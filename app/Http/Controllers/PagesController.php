<?php

namespace App\Http\Controllers;
use App\Http\Requests;

class PagesController extends controller {
  
    public function getIndex() {
        return view ('blog.index');
    }
    public function getAbout() {
        return view ('blog.about2');
    }
    public function getContact(){
        return view ('blog.contact2');
        }
    public function getSample(){
        return view ('blog.sample');
    }
}

?>