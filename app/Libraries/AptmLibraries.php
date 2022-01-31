<?php namespace App\Libraries; 

class AptmLibraries{

    public function alertMsg(){
        return view('components/alertMsg');
    }

    public function header(){
        return view('components/header');
    }

    public function footer(){
        return view('components/footer');
    }

    public function bannerWidget(){
        return view('components/bannerWidget');
    }

    public function latestNewsWidget(){
        return view('components/latestNewsWidget');
    }

    public function aboutWidget(){
        return view('components/aboutWidget');
    }

    public function ajaxRequest(){
        return view('components/ajaxRequest');
    }
}
?>