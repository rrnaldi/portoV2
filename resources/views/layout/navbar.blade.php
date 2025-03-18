<nav class="fixed top-0 left-0 w-full p-4 bg-transparent z-50 shadow-md">
    <div class="container mx-auto flex justify-center items-center relative">
        <!-- Tombol Menu -->
        <button id="menu-btn" class="md:hidden text-navy text-2xl">&#9776;</button>
        <!-- Daftar Menu -->
        <ul id="menu" class="hidden absolute left-0 top-full w-full bg-white rounded-lg shadow-md md:static md:w-auto md:bg-transparent md:shadow-none md:flex md:space-x-6 text-navy text-xl font-semibold flex-col md:flex-row">
            <li><a href="{{ route('home') }}" class="block px-4 py-2  {{ request()->routeIs('home') ? 'bg-white rounded-lg' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="block px-4 py-2  {{ request()->routeIs('about') ? 'bg-white  rounded-lg' : '' }}">About</a></li>
            <li><a href="{{ route('project') }}" class="block px-4 py-2  {{ request()->routeIs('project') ? 'bg-white  rounded-lg' : '' }}">Projects</a></li>
            <li><a href="{{ route('experience') }}" class="block px-4 py-2  {{ request()->routeIs('experience') ? 'bg-white  rounded-lg' : '' }}">Experience</a></li>
            <li><a href="{{ route('certificate') }}" class="block px-4 py-2  {{ request()->routeIs('certificate') ? 'bg-white  rounded-lg' : '' }}">Certificate</a></li>
            <li><a href="{{ route('education') }}" class="block px-4 py-2  {{ request()->routeIs('education') ? 'bg-white  rounded-lg' : '' }}">Education</a></li>
            <li><a href="{{ route('contact') }}" class="block px-4 py-2  {{ request()->routeIs('contact') ? 'bg-white  rounded-lg' : '' }}">Contact</a></li>
        </ul>
    </div>
</nav>


<script>
    document.getElementById('menu-btn').addEventListener('click', function () {
    let menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
    menu.classList.toggle('flex');
    menu.classList.toggle('transition-all');
    menu.classList.toggle('duration-300');
});


    window.addEventListener("scroll", function() {
        let navbar = document.querySelector("nav");
        if (window.scrollY > 50) {
            navbar.classList.add("bg-white", "shadow-md");
        } else {
            navbar.classList.remove("bg-white", "shadow-md");
        }
    });

</script>
