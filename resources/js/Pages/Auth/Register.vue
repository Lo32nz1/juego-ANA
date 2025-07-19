<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    birth_date: null,
    country: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Registro" />
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Registrarse en ANA</h2>
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Nombre" class="text-gray-700" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                        required
                        autofocus
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mt-6">
                    <InputLabel for="email" value="Correo Electrónico" class="text-gray-700" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mt-6">
                    <InputLabel for="birth_date" value="Fecha de Nacimiento" class="text-gray-700" />
                    <TextInput
                        id="birth_date"
                        v-model="form.birth_date"
                        type="date"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                    />
                    <InputError class="mt-2" :message="form.errors.birth_date" />
                </div>
                <div class="mt-6">
                    <InputLabel for="country" value="País" class="text-gray-700" />
                    <select
                        id="country"
                        v-model="form.country"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                    >
                        <option value="" disabled selected>Selecciona un país</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Chile">Chile</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="España">España</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.country" />
                </div>
                <div class="mt-6">
                    <InputLabel for="password" value="Contraseña" class="text-gray-700" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <div class="mt-6">
                    <InputLabel for="password_confirmation" value="Confirmar Contraseña" class="text-gray-700" />
                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <Link
                        :href="route('login')"
                        class="text-sm text-gray-600 hover:text-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    >
                        ¿Ya tienes cuenta? Inicia sesión
                    </Link>
                    <PrimaryButton
                        :text="'Registrar'"
                        :disabled="form.processing"
                    />
                </div>
                <div class="mt-4 text-center">
                    <Link :href="route('login')">
                        <SecondaryButton>
                            Volver al Inicio
                        </SecondaryButton>
                    </Link>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<style scoped>
.bg-forest-green-900 {
    background-color: #2F4F4F;
}
.bg-emerald-600 {
    background-color: #059669;
}
.text-emerald-600 {
    color: #059669;
}
.focus\:ring-emerald-500:focus {
    --tw-ring-color: #10B981;
}
</style>
