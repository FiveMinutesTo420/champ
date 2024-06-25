@extends('layouts.layout')
@section('title','Админ панель')
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4 pb-12">
        <div class="flex flex-col">
   
            <p class="py-8 text-3xl">Админ панель</p>
            <div class="p-4 mt-4 text-2xl bg-gray-100 rounded flex items-center rounded-b-none justify-between space-x-4">
                <div class="flex space-x-4 items-center">
                    
                    <span>Список товаров</span>

            
                    <a href="{{route('admin.product.add')}}" class="text-sm p-2 bg-green-500 transition text-white px-6 ">Добавить товар</a>
                </div>
            </div>    
            </p>
            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto h-screen">         
                @foreach($products as $product)
                    <a href="{{route('admin.product.change',$product->id)}}" class="border-b py-2 hover:text-red-500 flex justify-between items-center">
                        <p class="w-[20px]">№{{$product->id}}</p>

                        <img src="{{url('images/products/'.$product->image)}}" class="w-[5%]" alt="">
                        <p class="w-[200px]">{{$product->name}}</p>
                        <p class="w-[200px] line-clamp-2">{{$product->description}}></p>
                        <p class="w-[50px]">{{number_format($product->price)}}</p>
                        <p class="w-[100px]">{{$product->category->name}}</p>
                        <p class="w-[100px]">{{$product->brand->name}}</p>
                    </a>
                @endforeach
            </div>
            <div class="p-4 mt-12 text-2xl bg-gray-100 rounded flex items-center rounded-b-none justify-between space-x-4">
                <div class="flex space-x-4 items-center">
                    
                    <span>Список категорий</span>
                    <a href="{{route('admin.category.add')}}" class="text-sm p-2 bg-green-500 transition text-white px-6 ">Добавить</a></p>
            
                </div>
            </div>    
           
            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto min-h-fit max-h-screen">         
                @foreach($cats as $product)
                    <a href="{{route('admin.category.change',$product->id)}}" class="border-b py-2 hover:text-red-500 flex space-x-12 items-center">
                        <p class="w-[20px]">№{{$product->id}}</p>

                        <p class="w-[200px]">{{$product->name}}</p>
                        
                    </a>
                @endforeach
            </div>
            <div class="p-4 mt-12 text-2xl bg-gray-100 rounded flex items-center rounded-b-none justify-between space-x-4">
                <div class="flex space-x-4 items-center">
                    
                    <span>Заказы пользователей</span>

            
                </div>
                
            </div>    
            <div class="flex">
                <p class="p-4">Фильтр: </p>
                <a href="{{route('admin')}}" class=" hover:text-red-500 p-4">Все</a>

                <a href="{{route('admin',['orderByOrders'=>'new'])}}" class="hover:text-red-500 p-4">Новые</a>
                <a href="{{route('admin',['orderByOrders'=>'confirmed'])}}" class="hover:text-red-500 p-4">Подтвержденные</a>
                <a href="{{route('admin',['orderByOrders'=>'cancelled'])}}" class="hover:text-red-500 p-4">Отмененные</a>

            </div>



            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto min-h-fit max-h-screen">         
                @forelse($orders as $order)
                @php $all = 0 @endphp
                    <div  class="border-b py-2 flex space-x-12 items-center">
                        <p class="w-[100px]">Заказ №{{$order->id}}</p>
                        <p class="w-[200px]">{{$order->status}}</p>
                        <p class="w-[200px]">Комментарий: {{$order->comment}}</p>
                        
                        <p class="w-[200px]">{{$order->created_at}}</p>



                        
                    </div>
                    @foreach($order->carts as $cart)
                    @php $all += $cart->product->price * $cart->amount @endphp
                   
                        <div class="flex space-x-4">
                            <img src="{{url('images/products/'.$cart->product->image)}}" class="w-[80px]" alt="">
                            <div class="flex flex-col">
                                <p>{{$cart->product->name}}</p>
                                <p>Кол-во: {{$cart->amount}}</p>
                                <p>Цена: {{number_format($cart->product->price)}} руб.</p>
                            </div>

                        </div>
                    @endforeach
                        <p>Итого: {{number_format($all)}} рублей</p>
                        @if($order->status == "Новый")
                        <form action="{{route('admin.confirm',$order->id)}}" method="POST">
                            @csrf
                            <input type="submit" class="bg-green-500 p-2 w-[150px] text-white" value="Подтвердить заказ">
                        </form>
                        <form action="{{route('admin.cancel',$order->id)}}" method="POST" class="flex">
                            @csrf
                            <input type="text" placeholder="Комментарий" class="p-2 py-3 border w-[400px]" required name="comment">
                            <input type="submit" value="Отменить заказ" class="bg-red-500 p-2 w-[150px] text-white">
                        </form>
                        @endif

                @empty
                    <p>Нет заказов</p>
                @endforelse
            </div>
        </div>



    </div>
@endsection