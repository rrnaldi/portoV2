@extends('layout.user')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg" data-aos="zoom-in" data-aos-delay="1000">
    <h1 class="text-2xl font-bold mb-6 text-center">Hubungi Saya</h1>
    <div class="space-y-4">
        @foreach ($contact as $kontak)
            <div class="flex items-center space-x-4 bg-gray-100 p-3 rounded-lg">
                @if ($kontak->name == 'WhatsApp')
                    <div class="bg-green-500 text-white p-2 rounded-lg">
                        📱
                    </div>
                    <a href="https://wa.me/{{ preg_replace('/^0/', '62', str_replace(' ', '', $kontak->value)) }}" class="text-blue-900 hover:underline">
                        {{ $kontak->value }}
                    </a>                    
                @elseif ($kontak->name == 'Instagram')
                    <div class="bg-pink-500 text-white p-2 rounded-lg">
                        📷
                    </div>
                    <a href="{{ $kontak->value }}" target="_blank" class="text-blue-900 hover:underline">
                        Instagram
                    </a>
                @elseif ($kontak->name == 'LinkedIn')
                    <div class="bg-blue-600 text-white p-2 rounded-lg">
                        🔗
                    </div>
                    <a href="{{ $kontak->value }}" target="_blank" class="text-blue-900 hover:underline">
                        LinkedIn
                    </a>
                @elseif ($kontak->name == 'Email')
                    <div class="bg-gray-600 text-white p-2 rounded-lg">
                        ✉️
                    </div>
                    <a href="mailto:{{ $kontak->value }}" class="text-blue-900 hover:underline">
                        {{ $kontak->value }}
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
