@extends('layouts.layout')
@section('title','Добавить категорию')
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4 pb-12">
        <div class="flex flex-col space-y-2 mt-4">
            @if($errors->any())
                {{$errors->first()}}
            @endif
            <p class="flex text-2xl  py-3  font-[600]">
        
                Добавить категорию
    
            </p>
            <form action="{{route('admin.category.add')}}"  method="POST" class="w-full flex flex-col space-y-4">
                @csrf
                <div class="">
                    <div class="text-lg">Название</div>
                    <input type="text" value="" name="name" class="border-b w-1/4 outline-none py-4">
                </div>
                <div class="">
                    <div class="text-lg">Название в множеств.числе</div>
                    <input type="text" value="" name="declension" class="border-b w-1/4 outline-none py-4">
                </div>
                <input type="submit" value="Добавить" class="py-2 px-4 bg-[#004B51] text-white w-1/4 cursor-pointer">
            </form>

        </div>
      
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/admin.js')}}"></script>
@endsection