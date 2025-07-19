<script setup>
defineProps({
    text: {
        type: String,
        default: 'Botón',
    },
    color: {
        type: String,
        default: '#2F4F4F', // Verde bosque
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});

defineEmits(['click']);
</script>

<template>
    <button
        class="inline-flex items-center px-6 py-3 text-base font-semibold text-white rounded-md shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-emerald-500"
        :style="{ backgroundColor: disabled ? '#D1D5DB' : color }"
        :class="{ 'opacity-25 cursor-not-allowed': disabled, 'hover:bg-emerald-600': !disabled }"
        :disabled="disabled"
        @click="$emit('click')"
    >
        {{ text }}
    </button>
</template>

<style scoped>
.bg-emerald-600 {
    background-color: #059669;
}
.focus\:ring-emerald-500:focus {
    --tw-ring-color: #10B981;
}
</style>
