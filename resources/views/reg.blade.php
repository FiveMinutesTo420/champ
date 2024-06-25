@extends('layouts.layout')
@section('title','Регистрация')
@section('content')
<div class="flex justify-center mt-8">
    <div class="flex flex-col w-[30%] space-y-4 pb-4">
        <h1 class="text-3xl">Регистрация</h1>
        <form action="{{route('register.store')}}" class="space-y-4" method="POST">
            @csrf
            <div class="">
                <p>Ваш электронный адрес</p>
                <input type="email" placeholder="Введите вашу почту" name="email" value="{{old('email')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Логин</p>
                <input type="text" placeholder="Введите ваш логин" name="login" value="{{old('login')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Пароль</p>
                <input type="password" placeholder="Введите ваш пароль" name="password" value="{{old('password')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Подтвердите пароль</p>
                <input type="password" placeholder="Подтвердите пароль" name="password_confirmation" value="{{old('password_confirmation')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Имя</p>
                <input type="text" name="name" placeholder="Введите ваше имя" value="{{old('name')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Фамилия</p>
                <input type="text" name="lastname" placeholder="Введите вашу фамилию" value="{{old('lastname')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Отчество</p>
                <input type="text" name="patronymic" placeholder="Введите ваше отчество" value="{{old('patronymic')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <input type="checkbox" required id="check"> <label for="check">Согласен с правилами регистрации и политикой конфиденциальности</label>
            </div>
            <input type="submit" value="Зарегистрироваться" class="bg-[#004B51] w-full cursor-pointer py-2 text-white">
            @if($errors->any())
                <div class="text-white p-4 rounded-lg bg-red-400 text-center">{{$errors->first()}}</div>
            @endif
        </form>

        <div class="flex flex-col items-center space-y-8">
            <a href="{{route('auth')}}" class="font-light hover:text-red-500 hover:border-red-500">Уже есть аккаунт? Войти </a>
           
        </div>

    </div>
</div>
@endsection