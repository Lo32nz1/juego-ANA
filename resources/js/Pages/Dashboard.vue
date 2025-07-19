<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Juego ANA - Nueva Partida</h1>
            <form @submit.prevent="startGame">
                <div class="mb-4">
                    <label class="block text-gray-700">Número de jugadores (2-4):</label>
                    <input
                        v-model.number="numPlayers"
                        type="number"
                        min="2"
                        max="4"
                        class="w-full border rounded p-2"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                >
                    Iniciar Partida
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            numPlayers: 2,
        };
    },
    methods: {
        startGame() {
            this.$inertia.post('/games/store', {
                numPlayers: this.numPlayers,
                board_size: 3,
            });
        },
    },
};
</script>
