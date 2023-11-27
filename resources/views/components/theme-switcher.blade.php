<button @click="toggleDarkMode">
    <x-feathericon-sun class="w-5 h-5 hidden dark:block transition" />
    <x-feathericon-moon class="w-5 h-5 block dark:hidden transition" />
</button>

<script>
    (function () {
        const darkMode = localStorage.getItem('darkMode');
        if (darkMode !== null) {
            document.documentElement.classList.toggle('dark', JSON.parse(darkMode));
        }
    })();

    function toggleDarkMode() {
        const darkMode = localStorage.getItem('darkMode') === 'true';
        localStorage.setItem('darkMode', (!darkMode).toString());
        document.documentElement.classList.toggle('dark');
    }
</script>