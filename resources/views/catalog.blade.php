@extends('layouts.catalog')
@section('title',$title)
@section('products')
    <div class="w-full py-2"> 
        <div class="flex font-semibold items-center  space-x-4 px-2">

            <button class="p-2 " onclick="sortByPrice(this,'{{Request::fullUrlWithQuery(['price'=> 'cheap'])}}')"> Цена</button>
            <button class="p-2 " onclick="sortByNew(this,'{{Request::fullUrlWithQuery(['new'=> 'new'])}}')">Дате добавления</button>
            <button class="p-2 " onclick="sortByNew(this,'{{Request::fullUrlWithQuery(['from'=> 'a-z'])}}')">От А-Я</button>
            <button class="p-2 " onclick="sortByNew(this,'{{Request::fullUrlWithQuery(['from'=> 'z-a'])}}')">От Я-А</button>

            <p class="text-gray-500">
                Найдено {{count($items)}} товаров
            </p>
        </div>
    </div>
    <div class="flex flex-wrap">
        @if($items->count() == 0)
            <p class="text-gray-500 text-lg ">Товаров не найдено</p>
        @endif
        <div id="catalog-products" class=" flex flex-col w-full">
            @foreach($items as $item)
            <a href="{{route('product',[$item->category->slug,$item->slug])}}" class="w-full rounded flex border justify-between m-2 space-y-1 p-2 py-2 ">
                <div class="flex h-full items-center justify-center">
                    <img src="{{url('images/products/'.$item->image)}}" class="w-[120px] h-[120px]" alt="">
                </div>
                <div class=" w-[300px] line-clamp-2">
                    <p class="text-sm text-sky-800 pb-4 ">{{$item->category->declension}} {{$item->name}}</p>
                    <div class="text-sm">
                        {{$item->description}}
                        </div> 
                </div>
                <div class="px-2 w-[200px]">
                    Цена:
                    <p class=" text-[#064B50]">{{number_format($item->price)}} ₽</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

@endsection