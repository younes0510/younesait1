<nav class="bg-transparent px-8 py-14 ">
    <div class="w-1/2   mx-auto flex justify-between  items-center bg-red-600 text-white px-6 py-1 rounded-full shadow-lg">




        <a href="index.php" class="hover:underline">HOME</a>
        <a href="projects.php" class="hover:underline">PROJECTS</a>
        <a href="contact.php" class="hover:underline">CONTACT</a>
        <a href="demande.php" class="hover:underline">DEMANDE</a>



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