<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-md border border-forest-green-900 bg-white px-4 py-2 text-sm font-semibold text-forest-green-900 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-emerald-500 disabled:opacity-25"
    >
        <slot />
    </button>
</template>

<style scoped>
.border-forest-green-900 {
    border-color: #2F4F4F;
}
.text-forest-green-900 {
    color: #2F4F4F;
}
.focus\:ring-emerald-500:focus {
    --tw-ring-color: #10B981;
}
</style>
