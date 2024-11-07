<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-7 flex ">
                    <!-- Features section -->
                    <section class="bg-white hover:bg-slate-200 py-20">
                        <div class="container mx-auto px-4">
                            @if (Auth::check())
                                {{-- admin --}}
                                @if (Auth::user()->hasRole('admin'))
                                    @include('ademin.dashbor')
                                    {{-- Pengunujung --}}
                                @elseif (Auth::user()->hasRole('pengunjung'))
                                    @include('pengunjung.dashpeng')
                                    {{-- Client --}}
                                @elseif (Auth::user()->hasRole('client'))
                                    @include('klien.dashbod')
                                @endif
                            @endif


                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
