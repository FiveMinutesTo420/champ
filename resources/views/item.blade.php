@extends('layouts.layout')
@section('title', $product->category->declension . " " .  $product->name )
@section('content')

    <div class="w-[93%] space-x-2 mx-auto flex justify-between mt-4">
        <div class="flex flex-col space-y-6 w-1/2 ">
            <p class="text-2xl font-semibold ">
                {{$product->category->declension}}
                {{$product->name}}
            </p>
            <div class="flex w-full justify-around ">
                <img src="{{url('images/products/'.$product->image)}}" class="w-[30%]"  alt="">

            </div>

        </div>
        <div class="flex flex-col w-1/2   py-12 space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <p class="text-4xl">
                        <span class="font-bold">{{number_format($product->price)}}</span> ₽
                    </p>
            
     
                </div>
                <div class="flex items-center">

                </div>
            </div>

   
            <div class="text-sm leading-4 pb-5 border-b border-gray-300 text-gray-500">
                {!!nl2br($product->description)!!}
            </div>
            <div class=" text-sm space-y-4">
                <p>В наличии: {{$product->in_stock}}</p>
                
                @if(Auth::check())
                <form action="{{route('cart.add',$product->id)}}" method="post">
                    @csrf
                    <input type="submit" value="Добавить в корзину" class="p-3 cursor-pointer text-white rounded px-8 bg-red-500 hover:bg-red-700">
                </form>
                @endif
            </div>
            <img src="{{url('images/site/likenew.png')}}" class="w-[450px]" alt="">
        </div>
    </div>
    <img src="{{url('images/site/i1.png')}}" class="mt-8" alt="">
    <img src="{{url('images/site/i2.png')}}" class="mt-4" alt="">
    <img src="{{url('images/site/i3.png')}}" class="mt-4" alt="">
    <img src="{{url('images/site/i4.png')}}"  alt="">




@endsection