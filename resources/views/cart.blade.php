@extends('layouts.layout')
@section('title','Корзина')
@section('content')
@if(isset($errorNotEnough))
<div class="w-[93%] mx-auto bg-red-400 p-4 text-white my-4">
    {{$errorNotEnough}}
</div>
@endif

    <div class="w-[93%] mx-auto py-4 flex flex-col space-y-6 min-h-screen">
        <div class="text-2xl font-semibold">Корзина ({{$carts->count()}}) </div>
        <div class="flex flex-col justify-between">

            <div class="flex flex-col mb-6 w-full">

                @if($carts->count() != 0)
                <?php $all=0?>
                @foreach($carts as $cart)
                    @if($cart->order_id == null)
                    <div class="border px-5 py-4 flex items-center space-x-8  justify-between">
                        <div class="flex space-x-4 w-[200px]">
                        <img src="{{url('images/products/'.$cart->product->image)}}" class="w-[90px]" alt="">

                            <div class="flex-col">
                                <p class="text-gray-500 text-sm">{{$cart->product->category->declension}}</p>
                                <a href="{{route('product',[$cart->product->category->slug,$cart->product->slug])}}" class="w-[100px] truncate">{{$cart->product->name}}</a>
                               

                            </div>
                        </div>
                        <div class="flex">
                            <form id="amountCart" action="{{route('cart.changeAmount',$cart->id)}}" class="w-[200px]  flex flex-col space-x-2 p-2" method="POST">
                                @csrf
                                <div class="flex space-x-2">
                                    <input type="submit" id="f" name="action" value="-" class="p-2 text-white rounded text-center flex items-center bg-red-500">
                                    <input type="number" name="amount" class="py-1 text-center border-b border-black @if($cart->amount > $cart->product->in_stock) border-red-500 @endif outline-none  pl-2" value="{{$cart->amount}}">
                                    <input type="submit" id="f" name="action" value="+" class="p-2 text-white rounded text-center flex items-center bg-green-500">
                                </div>
          
                            </form>
                        </div>
                        <div class="flex items-center text-center">

                            <p class="w-[100px] font-semibold ">  {{number_format($cart->product->price)}} ₽</p>
 
    
                            <form action="{{route('cart.delete',$cart->id)}}" onsubmit="return confirm('Вы точно хотите убрать товар с корзины?')" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="X" class="p-2 px-4 text-white bg-red-500 border rounded cursor-pointer">
                            </form>
                        </div>

                    </div>
                    @endif
    
                        <?php $all += $cart->product->price * $cart->amount?>
                @endforeach
    
                @else
                    <div class="m-4 text-gray-400 text-lg">
                        Корзина пуста
                    </div>
                @endif
            </div>
            @if($carts->count() != 0)
            <div class="flex flex-col sticky  border w-full rounded p-5 space-y-4 drop-shadow-2xl">
                <div class="border-b py-3 pb-5 flex text-gray-400  justify-between">
                    {{$cart->amount}} @if($cart->amount>1) товара @else товар @endif на сумму  
                    
                    <p class="text-black font-semibold">{{number_format($all)}} ₽</p>
                    
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm font-semibold">Итого: </p>
                    <p class="text-xl font-bold">{{number_format($all)}} ₽</p>
                </div>
                @if(!Session::has('error') )
                <form action="{{route('cart.makeOrder')}}" method="POST">
                    @csrf
                    <input type="submit" value="Оформить заказ" class="py-3 font-semibold drop-shadow px-4 w-full  bg-[#F59331] text-white cursor-pointer  rounded ">
                </form>
                @else
 
                    <input type="submit" value="Оформить заказ" class="py-3 font-semibold drop-shadow px-4 w-full  bg-[#F59331] text-white cursor-pointer  rounded ">
       
                @endif
            </div>
        @endif  
        </div>
 

    </div>
@endsection
