<template>
    <button class="primary-button" :class="{ disabled: disabled }" :style="{ backgroundColor: color }"
        @click="$emit('click')" :disabled="disabled">
        {{ text }}
    </button>
</template>

<script>
export default {
    name: 'PrimaryButton',
    props: {
        text: {
            type: String,
            default: 'Botón',
        },
        color: {
            type: String,
            default: '#4CAF50', // Verde por defecto, cambiá según el tema de ANA
        },
        disabled: {
            type: Boolean,
            default: false,
        },
    },
};
</script>

<style scoped>
.primary-button {
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.primary-button:hover:not(.disabled) {
    transform: scale(1.1);
    filter: brightness(1.2);
}

.primary-button:active:not(.disabled) {
    transform: scale(0.95);
}

.primary-button.disabled {
    background-color: #ccc;
    cursor: not-allowed;
    box-shadow: none;
}
</style>
