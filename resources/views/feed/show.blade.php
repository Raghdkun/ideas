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
                <hr>
                @include('shared.feedcard')
            </div>

            <div class="col-3">
                @include('shared.searchbar')
                <div class="card mt-3">
                    @include('shared.followbox')
                  
                </div>
            </div>
        @endsection
