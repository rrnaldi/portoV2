@extends('layout.main')

@section('content')

{{-- Hero Section --}}
<section id="home" class="relative min-h-screen flex flex-col justify-center items-center bg-[#106EBE] text-white px-6 text-center">
    <div class="absolute top-4 left-6 text-sm font-semibold text-white">Portofolio</div>
    <div class="absolute top-4 right-6 text-sm font-semibold text-white">2025</div>

    <h1 class="text-4xl md:text-5xl font-bold mb-4">Hello, Saya Renaldi</h1>
    <p class="text-[#0FFCBE] text-xl md:text-2xl mb-6">Temukan pengalaman & karya saya di sini</p>

    @if($about->cv)
        <a href="{{ asset($about->cv) }}" class="mt-4 inline-block font-semibold bg-[#0FFCBE] text-[#106EBE] px-6 py-2 rounded-lg hover:bg-opacity-80 transition">
            My Resume
        </a>
    @endif
</section>



{{-- About Section --}}
<section id="about" class="min-h-screen flex items-center justify-center py-24 bg-[#FFFFFF]">
    <div class="container mx-auto px-6">
        <div class="rounded-3xl bg-[#106EBE] shadow-2xl p-10 md:px-20">
            <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] items-center gap-8 md:gap-x-12">
                <div class="flex justify-center md:justify-start mb-6 md:mb-0" data-aos="zoom-in">
                    <div class="w-40 h-40 md:w-64 md:h-64">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->name }}"
                             class="w-full h-full object-cover rounded-full border-8 border-[#106EBE] shadow-xl">
                    </div>
                </div>

                <div class="text-center md:text-left" data-aos="fade-left">
                    <h2 class="text-white text-2xl md:text-4xl font-bold mb-2">{{ $about->name }}</h2>
                    <h3 class="text-[#0FFCBE] text-base md:text-xl font-semibold mb-4">{{ $about->skill }}</h3>
                    <p class="text-white leading-relaxed text-sm md:text-lg">{{ $about->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Experience Section --}}
<section id="experience" class="py-24 bg-[#106EBE]">
    <div class="container mx-auto px-6">
        <h2 class="text-white text-3xl md:text-4xl font-bold text-center mb-12">Experience</h2>
        <div class="space-y-10">
            @foreach ($experiences as $exp)
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 flex flex-col md:flex-row items-center gap-6" data-aos="fade-up">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset('storage/' . $exp->imgexp) }}" alt="{{ $exp->company }}"
                             class="w-full h-full object-cover rounded-full border-4 border-[#106EBE] shadow-md">
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
<section id="projects" class="py-24 bg-[#F8FAFC]">
    <div class="container mx-auto px-6">
        <h2 class="text-[#106EBE] text-4xl md:text-5xl font-bold text-center mb-12">My Projects</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($projects as $project)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group" data-aos="fade-up">
                    <div class="overflow-hidden h-52">
                        <img src="{{ asset('storage/' . $project->imgprojek) }}" alt="{{ $project->name }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-6 flex flex-col justify-between h-[200px]">
                        <div>
                            <h3 class="text-xl font-bold text-[#106EBE] mb-2">{{ $project->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $project->deskripsi }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ $project->github_url }}" target="_blank"
                               class="inline-block px-4 py-2 text-sm font-semibold text-white bg-[#0FFCBE] hover:bg-[#0fcbae] rounded-lg transition">
                                Lihat Project
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- Education Section
<section id="education" class="py-24 bg-[#106EBE]">
    <div class="container mx-auto px-6">
        <h2 class="text-[#0FFCBE] text-3xl md:text-4xl font-bold text-center mb-12">Education</h2>

        <div class="space-y-10 max-w-4xl mx-auto">
            @foreach ($educations as $edu)
                <div class="bg-[#F1F5F9] rounded-xl shadow-md p-6 md:p-8" data-aos="fade-up">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-2">
                        <h3 class="text-xl font-semibold">{{ $edu->name }}</h3>
                        <span class="text-sm text-gray-600">
                            {{ $edu->year }}
                        </span>
                    </div>
                    <p class="text-gray-700 text-sm">{{ $edu->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

{{-- Skills Section --}}
<section id="skills" class="py-24 bg-[#106EBE]">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-12">My Skills</h2>

        <div class="max-w-3xl mx-auto space-y-6">
            @foreach ($skills as $skill)
                <div data-aos="fade-up" class="space-y-2">
                    <div class="flex justify-between items-center">
                        <h3 class="text-base md:text-lg font-semibold text-white">{{ $skill->name }}</h3>
                        <span class="text-sm font-medium text-[#0FFCBE]">{{ $skill->percentage }}%</span>
                    </div>

                    {{-- Progress Bar --}}
                    <div class="w-full bg-[#E0E0E0] rounded-full h-4 overflow-hidden">
                        <div class="bg-[#0FFCBE] h-full" style="width: {{ $skill->percentage }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



{{-- Contact Section --}}
<section id="contact" class="bg-white rounded-t-[4rem] py-24">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-5xl font-extrabold text-[#106EBE] mb-12">Hubungi Saya</h2>

        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($contact as $kontak)
                @php
                    $link = match($kontak->name) {
                        'WhatsApp' => 'https://wa.me/' . preg_replace('/^0/', '62', str_replace(' ', '', $kontak->value)),
                        'Email' => 'mailto:' . $kontak->value,
                        'LinkedIn' => $kontak->value,
                        'Instagram' => $kontak->value
                    };

                    $icon = match($kontak->name) {
                        'WhatsApp' => 'fa-brands fa-whatsapp',
                        'Email' => 'fa-solid fa-envelope',
                        'LinkedIn' => 'fa-brands fa-linkedin',
                        'Instagram' => 'fa-solid fa-instagram'
                    };
                @endphp

                <a href="{{ $link }}" target="_blank"
                   class="w-16 h-16 flex items-center justify-center border-2 border-[#106EBE] text-[#106EBE] rounded-full text-2xl hover:bg-[#106EBE] hover:text-white transition"
                   title="{{ $kontak->name }}">
                    <i class="{{ $icon }}"></i>
                </a>
            @endforeach
        </div>
    </div>
</section>



@endsection
