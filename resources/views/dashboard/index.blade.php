@extends('layout')

@section('content')
<div class="wrapper bg-white">
@if (Session::get('notAllowed'))
    
    <div class="alert alert-danger w-100">
        {{Session::get('notAllowed')}}

    </div>
@endif
@if (Session::get('succesAdd'))
    
    <div class="alert alert-success w-100">
        {{Session::get('succesAdd')}}

    </div>
@endif
@if (Session::get('succesUpdate'))
    
    <div class="alert alert-success w-100">
        {{Session::get('succesUpdate')}}

    </div>
@endif
@if (Session::get('successDelete'))
    
    <div class="alert alert-success w-100">
        {{Session::get('successDelete')}}

    </div>
@endif
    <div class="d-flex align-items-start justify-content-between">
        <div class="d-flex flex-column">
            <div class="h5">My Todo's</div>
            <p class="text-muted text-justify">
                Here's a list of activities you have to do
            </p>
            <br>
            <span class="cece">
                <a href="{{route('todo.create')}}" class="text-success" ><i class="fa-solid fa-plus"></i> Create</a> | <a href="{{route('todo.complated')}}"><i class="fa-regular fa-circle-check"></i> Complated</a>
            </span>
            
        </div>
        <div class="info btn ml-md-4 ml-0">
            <span class="fas fa-info" title="Info"></span>
        </div>
    </div>
    <div class="work border-bottom pt-3">
    <div class="d-flex align-items-center py-2 mt-1">
            <div>
                <span class="text-muted fas fa-comment btn"></span>
            </div>
            <div class="text-muted">{{!is_null($todos) ? count($todos)  : '-'}} complated todos</div> 
            <!-- # is null = ngeck arraynya kosong apa engga di tambahin tanda seru itu kalo ada datanya di hitung kalo ga ada nampilin - -->
            <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
        </div>
    </div>
    <div id="comments" class="mt-1">
        @foreach ($todos as $todo)
        <div class="comment d-flex align-items-start justify-content-between">
            <div class="mr-2">
                <form action="/todo/complated/{{$todo['id']}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="fas fa-check" style="background: #B9E0FF; padding: 8px !important; margin-right: 6px !important;" ></button>
                </form>
            </div>
            <div class="d-flex flex-column w-75 sign-up">
                <a href="/todo/edit/{{ $todo ['id'] }}" class="text-justify font-weight-bold" >
                    {{$todo['title']}}
                </a>
                <p class="text-muted">{{ $todo['status'] ? 'Complated,' : 'On-Progress,'}} <span class="date">{{\Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</span></p>
            </div>
            <div class="ml-auto">
                <!-- ketika akan membuat fitur delete, harus menggunakan form,
                    kenapa?karena kalu kita jalanin fitur delete itu kan artinya 
                    mau ubah di databasenya kan? kalu hal2 yang berhubungan dengan
                    modifikasi database harus menggunakan form -->
                <form action="{{route('todo.delete', $todo['id'])}}" method="POST">
                    @csrf
                    <!-- menimpa attribut method="POST" paada form agar menjadi delete, karena di method routenya menggunakan delete -->
                    @method('DELETE')
                    <!-- baiar action formnya bisa di jalanin, buttonya harus type submit -->
                    <button type="submit" class="fa-solid fa-trash btn"></button>
                </form>
                </div>
                <div class="ml-auto">
                <a href="/todo/edit/{{ $todo ['id'] }}" class="fas fa-arrow-right btn"></a>
                </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection