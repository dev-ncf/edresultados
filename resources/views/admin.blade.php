@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-20 p-8 bg-white rounded-2xl border-2 border-dashed border-slate-200 text-center">
    <div class="mb-4 inline-block p-4 bg-blue-50 rounded-full">
        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
    </div>
    <h3 class="text-lg font-bold">Importar Dados do Excel</h3>
    <p class="text-slate-500 mb-6 text-sm">Carregue o ficheiro .xlsx com os 1000 candidatos</p>
    
    <form action="{{ route('importar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="ficheiro" class="mb-4 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 italic">
        <button class="bg-slate-900 text-white px-6 py-2 rounded-lg font-medium hover:bg-slate-800 transition-colors">
            Processar Candidatos
        </button>
    </form>
</div>
@endsection