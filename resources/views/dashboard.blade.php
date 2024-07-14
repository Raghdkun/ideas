@extends('layouts.master')

@section('title', 'feeds')

@section('body')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.leftsidebar')
            </div>
            <div class="col-6">
            @include('shared.successfeedmsg')
            @include('shared.submitfeedform')
            <hr>
            
            
                
            
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

        <div class="col-3">
           @include('shared.searchbar')
            <div class="card mt-3">
           @include('shared.followbox')
            </div>
        </div>


    @endsection
