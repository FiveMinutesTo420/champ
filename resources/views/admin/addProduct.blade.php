@extends('layouts.layout')
@section('title',"Добавить товар")
@section('content')
    <div class="mx-auto w-4/5 flex flex-col pb-12 space-y-4">
        <div class="flex flex-col space-y-2 mt-4">
            @if($errors->any())
                {{$errors->first()}}
            @endif
            <p class="flex text-2xl border-b py-3 border-black font-[600]">
                Добавить товар
            </p>
            <form action="{{route('admin.product.add')}}" enctype="multipart/form-data" method="POST" class="w-full flex flex-col space-y-4">
                @csrf
                <div class="">
                    <div class="text-lg">Название</div>
                    <input type="text" name="name"  class="border-b w-1/4 outline-none py-4">
                </div>

                <div class="">
                    <div class="text-lg">Цена</div>
                    <input type="number" name="price" min="0"  class="border-b w-1/4 outline-none py-4">
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Описание</div>

                    <textarea name="description" id="" class="p-4 border outline-none rounded" cols="100" rows="5"></textarea>  

                </div>
                <div class="space-y-2">
                    <div class="text-lg">Изображение</div>
                    <input name="image" type="file" >

                </div>
                <div class="">
                    <div class="text-lg">Кол-во</div>
                    <input type="number" min="0" value="10" name="in_stock" class="border-b w-1/4 outline-none py-4">
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Категория</div>

                    <select name="category_id" class="py-2 w-1/4 border rounded px-3 outline-none" >
                        @foreach($categories as $i)
                            @foreach($i as $i)
                                <option value="{{$i->id}}" class="p-2">{{$i->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Бренд</div>

                    <select name="brand_id" class="py-2 w-1/4 border rounded px-3 outline-none" >
                        @foreach($brands as $brand)
                            @foreach($brand as $brand)
                                <option value="{{$brand->id}}" >{{$brand->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>


                <input type="submit" value="Добавить" class="py-2 px-4 border border-black w-1/4 cursor-pointer">
            </form>

        </div>
      
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/admin.js')}}"></script>
@endsection