@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Página no encontrada'))

@section('image')
<style>
    #apartado-derecho{
        text-align:center;
    }
    ul{
        text-decoration: none !important;
        list-style: none;
        color: black;
        font-weight: bold;
    }

    img{
        width:300px;
        margin-top: 30%;
    }
</style>
<div id="apartado-derecho" style="background-color: #bcecf8;" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
 <img src="/image/banner.png">
</div>
@endsection

@section('message', __('No hemos encontrado la página que buscas.'))