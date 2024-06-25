<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    @yield('head')
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full bg-red-950">
        <div class="w-[93%] mx-auto  text-white py-[7.5px] items-center flex justify-between">
            <div class="flex space-x-4 items-center font-medium">
            </div>
            <div class="flex space-x-2 items-center">
                @if(!Auth::check())
                <a href="{{route('auth')}}" class="flex cursor-pointer items-center hover:text-red-400">Войти</a>
                <div>
                    |
                </div>
                <a href="{{route('register')}}" class="flex cursor-pointer items-center hover:text-red-400">Регистрация</a>
                @else
                    @if(auth()->user()->status == 2)
                    <a href="{{route('admin')}}" class="hover:text-red-500">Админ панель</a> 
                    <div>
                        |
                    </div>
                    @endif
                    <a href="{{route('cart.page')}}" class="hover:text-red-500">Корзина</a>
                    <div>
                        |
                    </div> 
                    <a href="{{route('order')}}" class="hover:text-red-500">Мои заказы</a> 
                    <div>
                        |
                    </div> 
                    <a href="{{route('logout')}}" class="hover:text-red-500">Выйти </a> 
                @endif
            </div>
        </div>
    </div>
    <div class="w-full bg-[#A12820]">
        <div class="w-[93%] mx-auto  flex justify-between items-center bg-[#A12820] ">
            <div class="flex w-full space-x-4 items-center p-4 ">
                <a href="/" class=" " ><img src="{{url('images/logo/logo.png')}}" class="w-[150px]" alt=""></a>
                <div class="flex w-full flex-col space-y-3 justify-between p-4">
                    <div class="flex space-x-12 items-center font-medium ">
                        <p class="text-white text-2xl">8(985)747-70-36</p>
                        <p class="text-center text-2xl text-gray-100">8(495)775-89-10 </p>
                        <p class="text-center text-white">Режим работы <br> с 10:00 до 18:00 </p>
                    </div>
                    <div class="flex space-x-8">
                        <div class="flex w-full">
                            <input type="text" placeholder="Найти товар" class="w-full px-3 outline-none">
                            <input type="submit" value="Найти" class="bg-green-600 cursor-pointer text-white px-6">
                        </div>
                        <a href="{{route('cart.page')}}" class="flex">
                            <div class="px-4 flex items-center py-3 w-[200px] space-x-4 text-white bg-[#363A40]">
                                <svg class="header-cart__icon" viewBox="0 0 48 48" width='24' version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="icons-304" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="shop-cart-1" fill-rule="nonzero" fill="#ff9100"><path d="M41.0038998,11 C43.7660083,11 46,13.2352387 46,16.0029527 L46,23.6807776 C46,26.2876694 44.0216844,28.7225849 41.4664245,29.257771 L19.3535627,33.889196 C16.6435553,34.4567931 13.9979529,32.7227836 13.4387674,30.0079192 L8.37766195,6 L4,6 C2.8954305,6 2,5.1045695 2,4 C2,2.8954305 2.8954305,2 4,2 L10,2 C10.9455707,2 11.761939,2.66221268 11.9569876,3.58744776 L13.5196266,11 L41.0038998,11 Z M17.3562289,29.1995223 C17.4680003,29.7457544 17.9896941,30.0880586 18.5335755,29.9741454 L40.6464373,25.3427204 C41.3490192,25.1955682 42,24.3943395 42,23.6807776 L42,16.0029527 C42,15.4438782 41.5563695,15 41.0038998,15 L14.4506862,15 L17.3562289,29.1995223 Z M16.5,46 C14.0147186,46 12,43.9852814 12,41.5 C12,39.0147186 14.0147186,37 16.5,37 C18.9852814,37 21,39.0147186 21,41.5 C21,43.9852814 18.9852814,46 16.5,46 Z M36.5,46 C34.0147186,46 32,43.9852814 32,41.5 C32,39.0147186 34.0147186,37 36.5,37 C38.9852814,37 41,39.0147186 41,41.5 C41,43.9852814 38.9852814,46 36.5,46 Z" id="Combined-Shape"></path></g></g></svg>
                                <p class="hover:text-red-600">Корзина</p>
                            </div>
                            <div class="px-5  py-3 bg-green-600 text-white">
                                @if(Auth::check())
                                {{auth()->user()->carts->where('order_id',null)->count()}}
                                @else
                                0
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-[#A12820]">
        <div class="w-[93%] mx-auto flex text-white justify-between items-center bg-[#3A3C42] ">
            <div class="flex w-full justify-between">
                <div class="p-4 flex cursor-pointer space-x-6 items-center bg-white text-black" onmouseover="openC()">
                    <img class="side-catalog-btn__icon lazy loaded" src="https://www.clife.ru/upload/ammina.optimizer/png-webp/q80/local/templates/clife_composite/images/arr-down.webp" alt="" data-was-processed="true">
                    <a href="{{route('fullCatalog')}}">Каталог продукции</a>
                </div>
                <div class="p-4 flex cursor-pointer items-center space-x-2">
                    <a href="/" class="hover:text-red-600">Главная</a>
                </div>
                <div class="p-4 flex cursor-pointer items-center space-x-2">
                    <a href="{{route('find')}}" class="hover:text-red-600">Где нас найти</a>
                </div>

                <div class="p-4 pr-14 flex cursor-pointer flex-col items-center space-x-2">
                    <a href="{{route('about')}} "class="hover:text-red-600">О нас</a>
                </div>

            </div>
        </div>
        <div class="w-[93%] mx-auto uppercase font-medium flex relative hidden " id="categories">
            <div class="p-4 absolute  z-40 px-6 w-[240px] bg-white flex flex-col space-y-4 drop-shadow-lg">
                <p class="cursor-pointer " onmouseover="openS('brands')">Бренд</p>
                @foreach($categories as $category)
                    @foreach($category as $i)
                       <a href="{{route('category',$i->slug)}}" class="cursor-pointer" onmouseover="openS('category{{$i->id}}')"> {{$i->name}}</a>
                       
                    @endforeach

                @endforeach
            </div>
            @foreach($categories as $category)
            @foreach($category as $i)
            <div class="p-4 absolute z-40 px-6 w-[250px] min-h-[300px] ml-[240px] hidden bg-white flex flex-col space-y-4 category" id="category{{$i->id}}">
                @foreach($brands as $brand)
                    @foreach($brand as $br)
                        @if($br->hasProductWithCategory($i->id))
                            <a href="{{route('brand',['brand'=>$br->slug,'category'=>$i->slug])}}" class="cursor-pointer ">{{$br->name}}</a>
                        @endif
                       
                    @endforeach

                @endforeach
            </div>
            @endforeach
        @endforeach


       
            <div class="p-4 absolute z-40 px-6 w-[250px] ml-[240px] hidden bg-white flex flex-col space-y-4" id="brands">
                @foreach($brands as $brand)
                    @foreach($brand as $i)
                            <a href="{{route('brand',$i->slug)}}" class="cursor-pointer pb-2">{{$i->name}}</a>
                    @endforeach

                @endforeach
            </div>
        </div>
    </div>

    @if(Session::has('success'))
    <div class="w-[93%] text-center mx-auto bg-green-400 p-4 text-white mt-4">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="w-[93%] text-center mx-auto bg-red-400 p-4 text-white my-4">
        {{Session::get('error')}}
    </div>
    @endif
    @yield('content')
    
    <footer class="min-h-[50vh] bg-[#272C32] text-white">
        <div class="flex p-12">
            <div class="flex-col space-y-6">
                <div class="">
                    <p>г.Якутск ул.Петра Алексеева, 73</p>
                    <a href="{{route('find')}}" class="text-sm text-[#009383] border-b border-[#009383]">Смотреть на карте</a>
                </div>

                <p>Телефон: 8 (495) 775-89-10</p>
                <div>
                    <span class="text-sm text-gray-400">Время работы:</span>
                    <p>Рабочие дни с 10-00 до 21-00 <br>Выходных с 10-00 до 19-00 </p>
                </div>
                <div class="space-y-6 text-sm text-gray-400">
                    <p>Все права защищены</p>
                    <p>Copyright © 2002-2022 компания «Champion»</p>
                </div>
            </div>
            <div class="flex-col">
                <div class="flex flex-wrap w-[800px] text-sm">
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Услуги</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Статьи</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Скидки</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Сертификаты</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Покупателям</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Контакты</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Вакансии</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Вопросы и ответы</a>
                    <a href="" class="m-4 mt-0 border-b border-white hover:text-red-500 hover:border-red-500">Обратная связь</a>
                </div>
                
            </div>
        </div>
    </footer>
    <script src="{{url('js/layout.js')}}"></script>
    @yield('scripts')
</body>
</html>