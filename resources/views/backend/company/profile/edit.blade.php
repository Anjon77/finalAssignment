@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backend.company.content-header')

        <section class="content">
            <div class="container-fluid">


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection







{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if ($message = Session::get('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">{{ $message }}</strong>
                    <button type="button" class="close float-right"><strong>X</strong></button>
                </div>
            @endif
            <br>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}






<script>
    document.addEventListener("DOMContentLoaded", function() {
        const closeButtons = document.querySelectorAll('.close');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const alert = this.parentElement;
                alert.style.display = 'none';
            });
        });
    });
</script>
