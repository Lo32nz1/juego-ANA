<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/SecondaryButton.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Bienvenido a ANA" />
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <header class="w-full bg-forest-green-900 text-white py-4 shadow-md">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
                <Link href="/">
                    <ApplicationLogo class="h-12 w-12 fill-current text-white" />
                </Link>
                <nav class="flex gap-4">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-forest-green-900 bg-white border border-forest-green-900 rounded-md shadow-sm hover:bg-emerald-600 hover:text-white transition duration-150"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-forest-green-900 bg-white border border-forest-green-900 rounded-md shadow-sm hover:bg-emerald-600 hover:text-white transition duration-150"
                        >
                            Iniciar Sesión
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-forest-green-900 bg-white border border-forest-green-900 rounded-md shadow-sm hover:bg-emerald-600 hover:text-white transition duration-150"
                        >
                            Registrarse
                        </Link>
                    </template>
                </nav>
            </div>
        </header>
        <main class="flex-grow bg-gradient-to-b from-gray-100 to-gray-200 py-12">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">¡Bienvenido al Juego ANA!</h2>
                <p class="text-lg text-gray-600 mb-8">
                    ANA es un emocionante juego de estrategia para hasta 4 jugadores. Compite para formar la palabra "ANA" en un tablero, colocando letras estratégicamente. ¡El jugador con más "ANA"s al final gana!
                </p>
                <div class="flex justify-center gap-6 mb-12">
                    <Link
                        :href="route('login')"
                        class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-forest-green-900 rounded-md shadow-md hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    >
                        Jugar Ahora
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-forest-green-900 rounded-md shadow-md hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    >
                        Crear Cuenta
                    </Link>

                </div>
                <section class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Cómo Jugar a ANA</h3>
                    <ol class="text-left text-gray-600 space-y-4">
                        <li><strong>Tamaño del Tablero:</strong> Elige el tamaño del tablero (mínimo 3x3).</li>
                        <li><strong>Jugadores:</strong> Hasta 4 jugadores pueden participar, cada uno con un color distinto.</li>
                        <li><strong>Turnos:</strong> Tira los dados para determinar el orden de los turnos (el mayor número va primero).</li>
                        <li><strong>Colocación de Letras:</strong> En tu turno, coloca una "A" o una "N" en una casilla vacía.</li>
                        <li><strong>Objetivo:</strong> Forma la palabra "ANA" (horizontal, vertical o diagonal) para sumar puntos.</li>
                        <li><strong>Fin del Juego:</strong> La partida termina cuando el tablero está lleno. El jugador con más "ANA"s gana.</li>
                        <li><strong>Estadísticas:</strong> Consulta el ranking de los 5 mejores jugadores por tamaño de tablero al final.</li>
                    </ol>
                </section>
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
.focus\:ring-emerald-500:focus {
    --tw-ring-color: #10B981;
}
</style>
