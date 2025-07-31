<nav class="bg-transparent px-8 py-14 ">
   <div class="w-1/2   mx-auto flex justify-between  items-center bg-red-600 text-white px-6 py-1 rounded-full shadow-lg">
        
        <div class="flex items-center ">
           

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>

        
        <div class="hidden md:flex space-x-6 font-medium">
            <a href="index.php" class="hover:underline">HOME</a>
            <a href="projects.php" class="hover:underline">PROJECTS</a>
            <a href="contact.php" class="hover:underline">CONTACT</a>
            <a href="demande.php" class="hover:underline">DEMANDE</a>
        </div>

        
        <button id="menu-toggle" class="md:hidden text-2xl focus:outline-none">
            ☰
        </button>
    </div>

    
    <div id="mobile-menu" class="hidden md:hidden bg-red-600 text-white rounded-xl mt-2 py-2 px-4 space-y-2 font-medium shadow-lg">
        <a href="index.php" class="block hover:underline">HOME</a>
        <a href="projects.php" class="block hover:underline">PROJECTS</a>
        <a href="contact.php" class="block hover:underline">CONTACT</a>
        <a href="demande.php" class="block hover:underline">DEMANDE</a>
    </div>
</nav>

<script>
    const toggleButton = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    toggleButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
