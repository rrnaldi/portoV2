@extends('layout.main')

@section('content')

{{-- Hero Section --}}
<section id="home" class="relative min-h-screen flex flex-col justify-center items-center bg-[#E6ECF0] text-[#2D3E50] px-6 text-center">
    
    {{-- Teks pojok kiri atas --}}
    <div class="absolute top-4 left-6 text-sm sm:text-base font-semibold text-[#2D3E50]">
        Portofolio
    </div>

    {{-- Teks pojok kanan atas --}}
    <div class="absolute top-4 right-6 text-sm sm:text-base font-semibold text-[#2D3E50]">
        2025
    </div>

    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 leading-tight">Hello, Saya Renaldi</h1>
    <p class="text-lg sm:text-xl md:text-2xl mb-6 leading-relaxed">Temukan pengalaman & karya saya di sini</p>

    @if($about->cv)
        <a href="{{ asset($about->cv) }}" class="mt-4 inline-block font-semibold bg-[#2D3E50] text-white px-6 py-2 rounded-lg hover:bg-opacity-80 transition">
            My Resume
        </a>
    @endif
</section>


{{-- About Section --}}
<section id="about" class="min-h-screen flex items-center justify-center py-24 bg-[#FFFFFF] text-[#2D3E50]">
    <div class="container mx-auto px-6">
        <div class="rounded-3xl bg-[#E6ECF0] shadow-2xl p-10 md:px-20">
            <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] items-center gap-8 md:gap-x-12">
                <div class="flex justify-center md:justify-start mb-6 md:mb-0" data-aos="zoom-in">
                    <div class="w-40 h-40 md:w-64 md:h-64">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->name }}"
                             class="w-full h-full object-cover rounded-full border-8 border-[#E6ECF0] shadow-xl">
                    </div>
                </div>

                <div class="text-center md:text-left" data-aos="fade-left">
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">{{ $about->name }}</h2>
                    <h3 class="text-base md:text-xl font-semibold mb-4">{{ $about->skill }}</h3>
                    <p class="leading-relaxed text-sm md:text-lg">{{ $about->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Experience Section --}}
<section id="experience" class="py-24 bg-[#E6ECF0] text-[#2D3E50]">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Experience</h2>
        <div class="space-y-10">
            @foreach ($experiences as $exp)
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 flex flex-col md:flex-row items-center gap-6" data-aos="fade-up">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset('storage/' . $exp->imgexp) }}" alt="{{ $exp->company }}"
                             class="w-full h-full object-cover rounded-full border-4 border-[#E6ECF0] shadow-md">
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-xl font-bold">{{ $exp->company }}</h3>
                        <p class="text-sm mb-2">{{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - 
                            {{ \Carbon\Carbon::parse($exp->end_date)->format('M Y') }}</p>
                        <p class="text-gray-700 text-sm md:text-base">{{ $exp->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Projects Section --}}
<section id="projects" class="py-24 bg-white text-[#2D3E50]">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl md:text-4xl font-bold text-center mb-12">My Projects</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($projects as $project)
                <div class="bg-[#E6ECF0] rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                    <img src="{{ asset('storage/' . $project->imgprojek) }}" alt="{{ $project->name }}"
                         class="w-full h-52 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $project->name }}</h3>
                        <p class="text-sm text-gray-700">{{ $project->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-24 bg-[#E6ECF0] text-[#2D3E50]">
    <div class="container mx-auto px-6">
        <div class="rounded-3xl bg-white shadow-2xl p-10 md:px-20 max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-10 text-center">Contact</h2>
            <div class="grid grid-cols-1 gap-6">
                @foreach ($contact as $kontak)
                    <div class="flex items-center gap-4 bg-[#E6ECF0] rounded-xl shadow p-4">
                        @php
                            $icon = match($kontak->name) {
                                'WhatsApp' => '📱',
                                'Instagram' => '📷',
                                'LinkedIn' => '🔗',
                                'Email' => '✉️',
                                default => '🔸'
                            };

                            $link = match($kontak->name) {
                                'WhatsApp' => 'https://wa.me/' . preg_replace('/^0/', '62', str_replace(' ', '', $kontak->value)),
                                'Email' => 'mailto:' . $kontak->value,
                                default => $kontak->value
                            };

                            $label = match($kontak->name) {
                                'Instagram', 'LinkedIn' => $kontak->name,
                                default => $kontak->value
                            };
                        @endphp

                        <div class="text-2xl bg-[#2D3E50] text-white rounded-full w-12 h-12 flex items-center justify-center">
                            {{ $icon }}
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold">{{ $kontak->name }}</h4>
                            <a href="{{ $link }}" target="_blank" class="text-blue-800 hover:underline break-all">
                                {{ $label }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
