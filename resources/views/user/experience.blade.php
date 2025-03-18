@extends('layout.user')

@section('content')
<div class="max-w-4xl mx-auto px-5 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-navy">
        @foreach($experience as $exp)
            <div class="flex gap-2 items-start" data-aos="zoom-in" data-aos-delay="1000">
                <img src="{{ asset('storage/' . $exp->imgexp) }}" 
                     alt="{{ $exp->company }}" 
                     class="w-16 h-16 md:w-20 md:h-20 object-contain">       
                <div>
                    <h3 class="font-semibold text-lg md:text-xl">{{ $exp->company }}</h3>
                    <p class="mt-1 text-black-500 text-sm md:text-base">
                        {{ \Carbon\Carbon::parse($exp->start_date)->format('F Y') }} - 
                        {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('F Y') : 'Present' }}
                    </p>
                    <ul class="list-disc list-inside mt-2 text-sm md:text-base">
                        @foreach(explode("\n", $exp->description) as $desc)
                            <li>{{ $desc }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection