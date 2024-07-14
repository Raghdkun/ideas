@extends('layouts.master')

@section('title', 'feeds')

@section('body')
    <div class="container py-4">
        <div class="row">
         
           
            @include('shared.profile-card-edit')
            @forelse ($feeds as $feed)
            @include('shared.feedcard')
            @empty
            <center><h5>No results found</h5></center>
            @endforelse
            {{-- //uses if with count() before --}}
            
            
            <div class="mt-3">
                {{$feeds->withQueryString()->links()}}
            </div>
        </div>

            
            <div class="mt-3">
                {{-- {{$feeds->withQueryString()->links()}} --}}
                
               
           
            
       
        </div>


    @endsection


    {{-- <div class="col-3">
        @include('shared.leftsidebar')
        <div class=" mt-3">
            @include('shared.searchbar')
        </div>
        <div class=" mt-3">
            <div class="card mt-3">
                @include('shared.followbox')
            </div>
            
        </div>

        
    </div> --}}