@extends('layouts.layout')
@section('title',$product->name)
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4 pb-12">
        <div class="flex flex-col space-y-2 mt-4">
            @if($errors->any())
                {{$errors->first()}}
            @endif
            <p class="flex text-2xl  py-3  font-[600]">
                @if($product->category->declension != "")
                    {{$product->category->declension}}
                @else
                {{$product->category->name}}

                @endif
                {{$product->brand->name}}
                {{$product->name}}
                <form onsubmit="return confirm('Вы действительно хотите удалить этот товар?');" method="POST" action="{{route('admin.product.delete',$product->id)}}">
                    @csrf
    
                    @method('delete')
                    <input type="submit"  value="Удалить товар" class="bg-red-500 p-2 px-4 rounded drop-shadow cursor-pointer text-white" >
                </form>
            </p>
 
            <form action="{{route('admin.product.change',$product->id)}}" enctype="multipart/form-data" method="POST" class="w-full flex flex-col space-y-4">
                @csrf
                <div class="">
                    <div class="text-lg">Наименование</div>
                    <input type="text" value="{{$product->name}}" onchange="addToForm(this,'name')" class="border-l border-black px-4 w-1/4 outline-none py-4">
                </div>

                <div class="">
                    <div class="text-lg">Цена</div>
                    <input type="number" min="0" onchange="addToForm(this,'price')" value="{{$product->price}}" class="border-l border-black px-4 w-1/4 outline-none py-4">
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Описание</div>

                    <textarea onchange="addToForm(this,'description')" id="" class="p-4 border-l border-black px-4 outline-none " cols="100" rows="5">{!!$product->description!!}</textarea>  

                </div>
                <div class="space-y-2">
                    <div class="text-lg">Изображение</div>
                    <img src="{{url('images/products/'.$product->image)}}" class="w-20" alt="">
                    <input type="file" onchange="addToForm(this,'image')">

                </div>
                <div class="">
                    <div class="text-lg">Кол-во</div>
                    <input type="number" min="0" onchange="addToForm(this,'in_stock')" value="{{$product->in_stock}}" class="border-l border-black px-4 w-1/4 outline-none py-4">
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Категория</div>

                    <select onchange="addToForm(this,'category_id')" class="py-2 w-1/4 border rounded px-3 outline-none" >
                        @foreach($categories as $i)
                            @foreach($i as $i)
                                <option value="{{$i->id}}" @if($product->category->id == $i->id) selected @endif class="p-2">{{$i->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Производитель</div>

                    <select onchange="addToForm(this,'brand_id')" class="py-2 w-1/4 border rounded px-3 outline-none" >
                        @foreach($brands as $brand)
                            @foreach($brand as $brand)
                                <option value="{{$brand->id}}" @if($product->brand->id == $brand->id) selected @endif>{{$brand->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Обновить" class="py-2 px-4 border border-black w-1/4 cursor-pointer">
            </form>

        </div>
      
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/admin.js')}}"></script>
@endsection