@extends('layouts.layout')
@section('title',$category->name)
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4 pb-12">
        <div class="flex flex-col space-y-2 mt-4">
            @if($errors->any())
                {{$errors->first()}}
            @endif
            <p class="flex text-2xl  py-3  font-[600]">
        
                {{$category->name}}
    
            </p>
            <form onsubmit="return confirm('Вы действительно хотите удалить эту категорию?');" method="POST" action="{{route('admin.category.delete',$category->id)}}">
                @csrf

                @method('delete')
                <input type="submit"  value="Удалить категорию" class="bg-red-500 p-2 px-4 rounded drop-shadow cursor-pointer text-white" >
            </form>
            <form action="{{route('admin.category.change',$category->id)}}"  method="POST" class="w-full flex flex-col space-y-4">
                @csrf
                <div class="">
                    <div class="text-lg">Наименование (мн.ч)</div>
                    <input type="text" value="{{$category->name}}" name="name" class="border-b w-1/4 outline-none py-4">
                </div>
                <div class="">
                    <div class="text-lg">Наименование (ед.ч)</div>
                    <input type="text" value="{{$category->declension}}" name="declension" class="border-b w-1/4 outline-none py-4">
                </div>
                <input type="submit" value="Обновить" class="py-2 px-4 bg-[#064B50] text-white w-1/4 cursor-pointer">
            </form>

        </div>
      
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/admin.js')}}"></script>
@endsection