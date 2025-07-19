<template>
    <div class="game-menu">
        <PrimaryButton text="Iniciar Juego" color="#FF5733" @click="startGame" />
        <SecondaryButton text="Volver" color="#FF5733" @click="goBack" />
    </div>
</template>

<script>
import PrimaryButton from './components/PrimaryButton.vue';
import SecondaryButton from './components/SecondaryButton.vue';

export default {
    components: { PrimaryButton, SecondaryButton },
    methods: {
        startGame() {
            console.log('¡ANA empieza!');
        },
        goBack() {
            console.log('Volviendo al menú principal');
        },
    },
};
</script>

<style scoped>
.game-menu {
    display: flex;
    gap: 16px;
    justify-content: center;
    padding: 20px;
}
</style>
