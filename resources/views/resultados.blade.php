@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col bg-slate-50">
    <div class="h-2 bg-gradient-to-r from-blue-800 via-orange-500 to-blue-900"></div>

    
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 rounded-full flex items-center justify-center border-2 border-dashed border-slate-300 text-xs text-slate-500 text-center">
                    <img src="{{ asset('img/logotipo-unirovuma.fw.png') }}" alt="logo" srcset="">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-blue-900 leading-none">Universidade Rovuma</h1>
                    <p class="text-xs font-semibold text-orange-600 uppercase tracking-widest mt-1">Serviços Académicos</p>
                </div>
            </div>
            <div class="hidden md:block text-right">
                <p class="text-sm font-medium text-slate-500 italic">"Extensão, Tecnologia e Inovação"</p>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            
            <div class="text-center mb-10">
                <span class="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full mb-4 uppercase tracking-wider">
                    Ano Académico 2026
                </span>
                <h2 class="text-2xl md:text-3xl font-black text-slate-800 leading-tight uppercase">
                    RESULTADOS DE ADMISSÃO AOS CURSOS DA MODALIDADE DE <span class="text-blue-700">ENSINO A DISTÂNCIA</span> 
                    <span class="block text-lg font-medium text-slate-500 mt-2">(CONCURSO DOCUMENTAL)</span>
                </h2>
            </div>

            <div class="bg-white border-l-4 border-orange-500 shadow-md rounded-r-xl p-6 mb-10">
                <div class="flex items-start space-x-4">
                    <div class="bg-orange-100 p-2 rounded-lg">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-slate-700 leading-relaxed">
                        Já se encontram disponíveis os resultados do concurso de admissão à <strong>Universidade Rovuma</strong>, na modalidade de ensino a distância. Para consultar o seu resultado, insira o seu <strong>código de candidatura</strong> no campo indicado abaixo.
                    </p>
                </div>
            </div>
            <div class="max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-slate-100">
                    <div class="bg-blue-900 py-4 px-8">
                        <h3 class="text-white font-semibold text-center">Portal de Consulta</h3>
                    </div>
                    
                    <form action="{{ route('buscar') }}" method="GET" class="p-8 space-y-6">
                        <div>
                            <label for="codigo" class="block text-sm font-bold text-slate-700 mb-2 uppercase">Código de Candidatura</label>
                            <div class="relative">
                                <input type="text" name="codigo" id="codigo" required
                                    placeholder="Ex: 202400123"
                                    class="w-full pl-4 pr-12 py-4 bg-slate-50 rounded-xl border-2 border-slate-200 focus:border-orange-500 focus:ring-0 transition-all outline-none text-lg font-mono">
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                            </div>
                        </div>

                        <button type="submit" 
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-extrabold py-4 rounded-xl transition-all shadow-lg shadow-orange-200 active:scale-95 uppercase tracking-wider">
                            Consultar Admissão
                        </button>
                    </form>
                </div>

               
            @if(isset($resultado))
                @if($resultado)
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200 animate-in fade-in slide-in-from-bottom-8 duration-700">
                   
                    <div class="bg-blue-900 px-8 py-6 flex justify-between items-center">
                        <span class="text-blue-200 text-xs font-bold uppercase tracking-widest">Ficha de Resultado</span>
                        <div class="px-4 py-1 bg-emerald-500 text-white text-xs font-black rounded-full uppercase animate-pulse">
                            {{ $resultado->resultado }}
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Número do Candidato</label>
                                <p class="text-xl font-bold text-slate-800">{{ $resultado->codigo }}</p>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nome Completo</label>
                                <p class="text-xl font-bold text-slate-800 uppercase">{{ $resultado->nome_completo }}</p>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Curso</label>
                                <p class="text-lg font-semibold text-blue-900">{{ $resultado->curso }}</p>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Centro de Recursos</label>
                                <p class="text-lg font-semibold text-slate-700">UniRovuma Nampula</p>
                            </div>
                        </div>

                        <!-- Observação Importante -->
                        
                        <div class="mt-10 p-6 bg-orange-50 border-l-4 border-orange-500 rounded-r-xl">
                            <div class="flex items-center space-x-3 mb-2">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <span class="text-xs font-black text-orange-800 uppercase tracking-widest">Observação Importante</span>
                            </div>
                            <p class="text-orange-900 font-bold italic">Por favor, apresente no acto de matricula o TALÃO DE DEPÓSITO ORIGINAL</p>
                        </div>
                        

                        
                    </div>
                </div>
                @else
                <div class="bg-red-50 border-2 border-red-100 rounded-3xl p-10 text-center animate-bounce-short">
                    <p class="text-red-800 font-black uppercase tracking-tighter text-lg">Candidato Não Encontrado</p>
                    <p class="text-red-600 text-sm mt-2">Verifique o número inserido e tente novamente.</p>
                </div>
                @endif
            @endif
            </div>
        </div>
    </main>

    
    <footer class="bg-white border-t py-10 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm uppercase tracking-widest font-bold">
                &copy; {{ date('Y') }} Universidade Rovuma - Nampula, Moçambique
            </p>
            <div class="mt-4 flex justify-center space-x-6 text-slate-300">
                <a href='https://unirovuma.ac.mz' class="hover:text-blue-800 cursor-pointer transition-colors text-xs uppercase">Website Oficial</a>
                
            </div>
        </div>
    </footer>
    @if ($success)
    @include('success')
        
    @endif
</div>
@endsection