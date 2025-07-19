<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Juego ANA</h1>
            <div class="grid gap-2" :style="{ gridTemplateColumns: `repeat(${boardSize}, minmax(0, 1fr))` }">
                <button
                    v-for="(cell, index) in board"
                    :key="index"
                    class="w-16 h-16 border rounded flex items-center justify-center text-xl"
                    @click="placeLetter(index)"
                    :disabled="cell !== null"
                >
                    {{ cell || '' }}
                </button>
            </div>
            <p class="mt-4">Turno: Jugador {{ currentPlayer }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        gameId: Number,
    },
    data() {
        return {
            boardSize: 3,
            board: Array(9).fill(null), // Tablero 3x3
            currentPlayer: 1,
        };
    },
    methods: {
        placeLetter(index) {
            if (this.board[index] === null) {
                this.board[index] = this.currentPlayer % 2 === 1 ? 'A' : 'N';
                this.currentPlayer++;
                if (this.currentPlayer > 2) this.currentPlayer = 1; // Simplificado para 2 jugadores
            }
        },
    },
};
</script>
