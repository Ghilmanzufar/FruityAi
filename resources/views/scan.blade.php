@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Scan Bahan Makanan</h1>
            <p class="text-slate-500">Ambil foto langsung atau upload dari galeri.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            
            @include('scan.partials.form-upload')

            @include('scan.partials.result-section')

        </div>
    </div>
</div>

@include('scan.partials.camera-modal')
@include('scan.partials.scripts')

@endsection