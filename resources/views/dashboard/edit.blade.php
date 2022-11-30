@extends('layout')

@section('content')
<div class="container wrapper bg-white">  
  <form  method="POST" id="" action="{{route('todo.update', $todo['id'])}}">
    @csrf
    @method('PATCH')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    
    @endif
    <div class="d-flex align-items-start justify-content-between">
        <div class="d-flex flex-column">
        <h3>Edit Todo</h3>
        </div>
        
    </div>

    <div class="work border-bottom pt-3"></div>
    <div class="mb-3">
        <label for="" class="form-label">Title</label>
        <input class="form-control" placeholder="title of todo" type="text" name="title" value="{{ $todo['title'] }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Target Date</label>
        <input class="form-control" placeholder="Target Date" type="date" name="date" value="{{ $todo['date'] }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <div class="form-floating">
            <textarea name="description" class="form-control" placeholder="Leave a comment here" id="" style="height: 100px">{{ $todo['description'] }}</textarea>
            <label for="floatingTextarea2">Type your descriptions here...</label>
        </div>   
    </div>
    <div class="d-grid gap-2">
    <button class="btn btn-success" type="submit">Submit</button>
    <a href="/todo/" class="btn btn-dark" type="button">Cancel</a>
    </div>
    





    <!-- <fieldset>
        <label for="">Title</label>
        <input placeholder="title of todo" type="text" name="title" value="{{ $todo['title'] }}">
    </fieldset>
    <fieldset>
        <label for="">Target Date</label>
        <input placeholder="Target Date" type="date" name="date" value="{{ $todo['date'] }}">
    </fieldset>
    <fieldset> 
        <label for="">Description</label>
        <textarea name="description" placeholder="Type your descriptions here..." tabindex="5">{{ $todo['description'] }}</textarea>
    </fieldset>
    <fieldset>
        <button  type="submit" id="contactus-submit">Submit</button>
    </fieldset>
    <fieldset>
        <a href="/todo/" class="btn-cancel btn-lg btn">Cancel</a>
    </fieldset>
   -->
  </form>
</div>
@endsection