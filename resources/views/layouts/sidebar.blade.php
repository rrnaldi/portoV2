<div class="w-64 min-h-screen bg-gray-800 text-white p-4 rounded-e">
    <h2 class="text-2xl font-bold mb-4">Admin Panel</h2>
    <ul>
        <li class="mb-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded">
                <x-heroicon-o-home class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Dashboard
            </a>
        </li>
        
        <li class="mb-2">
            <a href="{{ route('abouts.index') }}"class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded">
                <x-heroicon-o-star class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                About
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('projects.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded"">
                <x-heroicon-o-presentation-chart-bar class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Projects
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('educations.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded"">
                <x-heroicon-o-academic-cap class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Education
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('certificates.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded"">
                <x-heroicon-o-clipboard-document-check class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Certificates
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('contacts.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded"">
                <x-heroicon-o-phone class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Contact
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('experiences.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded"">
                <x-heroicon-o-shield-check class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Experience
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('skills.index') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-700 rounded"">
                <x-heroicon-o-shield-check class="w-5 h-5 text-white" /> <!-- Heroicon Home -->
                Skills
            </a>
        </li>
    </ul>
</div>
