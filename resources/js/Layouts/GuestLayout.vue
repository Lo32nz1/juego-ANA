<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <header class="w-full bg-forest-green-900 text-white py-4 shadow-md">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
                <Link href="/">
                    <ApplicationLogo class="h-12 w-12 fill-current text-white" />
                </Link>
                <nav class="flex gap-4">
                    <Link
                        href="/"
                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-forest-green-900 bg-white border border-forest-green-900 rounded-md shadow-sm hover:bg-emerald-600 hover:text-white transition duration-150"
                    >
                        Inicio
                    </Link>
                </nav>
            </div>
        </header>
        <main class="flex-grow flex items-center justify-center">
            <div class="w-full max-w-md px-6 py-8 bg-white rounded-lg shadow-lg">
                <slot />
            </div>
        </main>
        <footer class="w-full bg-forest-green-900 text-white py-4">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p class="text-sm">
                    Juego ANA - Proyecto Final para Laboratorio de Programación y Lenguajes
                </p>
                <p class="text-sm mt-2">
                    Universidad Nacional de la Patagonia San Juan Bosco | Contacto: <a href="mailto:iqv.cr.unpsjb@outlook.com" class="hover:text-emerald-300">iqv.cr.unpsjb@outlook.com</a>
                </p>
            </div>
        </footer>
    </div>
</template>

<style scoped>
.bg-forest-green-900 {
    background-color: #2F4F4F;
}
.text-forest-green-900 {
    color: #2F4F4F;
}
.border-forest-green-900 {
    border-color: #2F4F4F;
}
.bg-emerald-600 {
    background-color: #059669;
}
.text-emerald-300 {
    color: #10B981;
}
</style>
