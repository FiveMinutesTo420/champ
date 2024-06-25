@extends('layouts.layout')
@section('title',"Мои заказы")
@section('content')
    <div class="w-[93%] mx-auto py-4 flex flex-col space-y-4">
        <p class="my-5 text-3xl">Мои заказы</p>

        @foreach($orders as $order)
        <div class="border p-4 ">
            <div class="flex flex-col space-y-3  w-full py-2">
                <?php $total = 0?>
                @foreach($order->carts as $cart)
                    <?php $total += $cart->product->price * $cart->amount?>
                @endforeach
                    <p class="text-xl font-medium flex justify-between w-full"> Заказ от {{date_format(date_create($order->created_at),"d.m.Y") }}
                         <span></span></p>
                         <span class="flex space-x-5 items-center font-[300]">
                            <p class=" py-2 px-3 text-black @if($order->status == 'Отменен') text-red-500  @endif @if($order->status == 'Новый')  text-green-500 @endif @if($order->status == 'Подтвержден') text-green-800  @endif">Статус: {{$order->status}}</p>
                            @if($order->status == "Отменен")
                            <p>Комментарий: {{$order->comment}}</p>
                            @endif
                           @if($order->status == "Новый")
                           <form action="{{route('cancel.order',$order->id)}}" method="POST" class="ml-4">
                               @csrf
                               <input type="submit" value="Удалить заказ" class="px-3 text-white bg-red-500 cursor-pointer py-2 ">    
                           </form>
                           @endif
                       </span>
                    <span class="">Итого: {{number_format($total)}} руб.</span>
                    <p class="pt-4 text-lg">Список товаров:</p>
            @foreach($order->carts as $cart)
            <div class="flex border-t mt-4 py-4">
                <img src="{{url('images/products/'.$cart->product->image)}}" class="w-24 h-24" alt="">
                <div class="flex flex-col w-full p-2 space-y-4  ">
                    <div class="flex space-x-4 text-xs">
                        <a href="{{route('product',[$cart->product->category->slug,$cart->product->slug])}}" class="w-[300px] truncate">{{$cart->product->name}}</a> 

                    </div>
                    <div class="w-96 line-clamp-3 text-xs">
                        {!! $cart->product->description !!}
                    </div>
                    <div class="flex flex-col text-xs">
                        Цена 1-го товара: {{number_format($cart->product->price)}} руб.
                        
                        <p>Количество: {{$cart->amount}}</p>
                    </div>

                </div>
            </div>
                
            @endforeach
            </div>
        </div>

        @endforeach

    </div>
@endsection