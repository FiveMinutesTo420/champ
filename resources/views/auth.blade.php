@extends('layouts.layout')
@section('title','Авторизация')
@section('content')

    <div class="flex justify-center mt-8">
        <div class="flex flex-col w-[30%] space-y-4">
            @if(Request::has('message_form'))
            <div class="p-4 bg-red-500 text-white">
                {{Request::get('message_form')}}

            </div>
            @endif
            <h1 class="text-3xl">Авторизация</h1>
            <form method="POST" class="space-y-4" action="{{route('auth.store')}}">
                @csrf
                <div class="">
                    <p>Логин</p>
                    <input type="text" name="login" placeholder="Введите ваш логин" value="{{old('login')}}" class="w-full p-2 border outline-none">
                </div> 
                <div class="">
                    <p>Пароль</p>
                    <input type="password" placeholder="Введите ваш пароль" name="password" value="{{old('password')}}" class="w-full p-2 border outline-none">
                </div>
    
                <input type="submit" value="Войти" class="bg-red-500 w-full cursor-pointer py-2 text-white">
                @if($errors->any())
                    <div class="text-red-500 text-center">{{$errors->first()}}</div>
                @endif
            </form>

            <div class="flex flex-col items-center space-y-8 pb-12">
     
                <a href="{{route('register')}}" class="font-light hover:text-red-500 hover:border-red-500">Нет аккаунта? Зарегистрироваться</a>
               
            </div>
    
        </div>
    </div>
@endsection