@extends("layouts.layout")
@section('content')
    <div class="w-[93%] mx-auto flex justify-between">
        <div class="p-4 w-1/4 flex flex-col space-y-4">
            <div class="text-lg font-semibold cursor-pointer" >Стоимость</div>
            <div class="flex flex-col ">
                <div class="">
                    Начиная с <br><input type="number" min="{{$cheapiest}}" value="@if(Request::has('from_price')){{Request::get('from_price')}}@else{{$cheapiest}}@endif" class="p-2 w-[40%] outline-none border-b" id="from_price">Руб.
                </div>
                <div class="">
                    Заканчивая <br> <input type="number" max="{{$expensive}}" value="@if(Request::has('to_price')){{Request::get('to_price')}}@else{{$expensive}}@endif" class="p-2 w-[40%] outline-none border-b" id="to_price">Руб.
                </div>
                <div class="pt-4">
                    <input type="submit" onclick="priceFilter()" value="Применить" class="p-2 px-4 bg-red-500 text-white cursor-pointer">
                </div>
                 
            </div>

            @if(isset($category))
            <div class="text-lg font-semibold cursor-pointer" >Производитель</div>
            <div class="flex flex-col ">
                @foreach($brands as $brand)
                    @foreach($brand as $i)
                        @if($i->products->count()!=0 && $category->hasBrand($i->id)  )
                        <div class="flex space-x-2">
                            <input type="checkbox" id="brand{{$i->id}}" onchange="brandChanged(this,'{{Request::fullUrlWithQuery(['brand'=> $i->slug])}}')" value="{{$i->slug}}" @if(Request::has('brand') && Request::get('brand') == $i->slug) checked @endif class="cursor-pointer"><label for="brand{{$i->id}}" class="cursor-pointer">{{$i->name}}</label>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            @else
            <div class="text-lg font-semibold cursor-pointer" >Категория</div>
            <div class="flex flex-col">
                @foreach($categories as $i)
                @foreach($i as $i)
                        @if($i->products->count()!=0 && $i->hasBrand($brand->id)  )
                        <div class="flex space-x-2">
                            <input type="checkbox" id="cat{{$i->id}}" onchange="categoryChanged(this,'{{Request::fullUrlWithQuery(['category'=> $i->slug])}}')" value="{{$i->slug}}"  @if(Request::has('category') && Request::get('category') == $i->slug) checked @endif class="cursor-pointer"><label for="cat{{$i->id}}" class="cursor-pointer">{{$i->name}}</label>

                        </div>
                        @endif
                        @endforeach
                @endforeach
            </div>
            @endif

        </div>
        <div class="w-[90%] p-5">

            @yield('products')
        </div>
    </div>

@endsection
@section('scripts')
<script src="{{url('js/catalog.js')}}"></script>
@endsection