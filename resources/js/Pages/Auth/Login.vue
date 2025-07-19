<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Inicio de Sesión" />
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Iniciar Sesión en ANA</h2>
            <div v-if="status" class="mb-6 text-sm font-medium text-emerald-600">
                {{ status }}
            </div>
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Correo Electrónico" class="text-gray-700" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mt-6">
                    <InputLabel for="password" value="Contraseña" class="text-gray-700" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <div class="mt-6 flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-sm text-gray-600 hover:text-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    >
                        ¿Olvidaste tu contraseña?
                    </Link>
                    <PrimaryButton
                        :text="'Iniciar Sesión'"
                        :disabled="form.processing"
                    />
                </div>
                <div class="mt-4 text-center">
                    <Link :href="route('register')">
                        <SecondaryButton>
                            Crear Cuenta
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
