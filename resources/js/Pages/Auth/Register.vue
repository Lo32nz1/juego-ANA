<template>
    <div class="register-container">
        <h2>Registro en ANA</h2>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" v-model="form.name" type="text" class="form-control"
                    :class="{ 'is-invalid': form.errors.name }" required autofocus />
                <div v-if="form.errors.name" class="invalid-feedback">
                    {{ form.errors.name }}
                </div>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" v-model="form.email" type="email" class="form-control"
                    :class="{ 'is-invalid': form.errors.email }" required />
                <div v-if="form.errors.email" class="invalid-feedback">
                    {{ form.errors.email }}
                </div>
            </div>

            <div class="form-group">
                <label for="birth_date">Fecha de Nacimiento</label>
                <input id="birth_date" v-model="form.birth_date" type="date" class="form-control"
                    :class="{ 'is-invalid': form.errors.birth_date }" />
                <div v-if="form.errors.birth_date" class="invalid-feedback">
                    {{ form.errors.birth_date }}
                </div>
            </div>

            <div class="form-group">
                <label for="country">País</label>
                <select id="country" v-model="form.country" class="form-control"
                    :class="{ 'is-invalid': form.errors.country }">
                    <option value="" disabled selected>Selecciona un país</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Chile">Chile</option>
                    <option value="Estados Unidos">Estados Unidos</option>
                    <option value="España">España</option>
                    <!-- Agrega más países según necesites -->
                </select>
                <div v-if="form.errors.country" class="invalid-feedback">
                    {{ form.errors.country }}
                </div>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" v-model="form.password" type="password" class="form-control"
                    :class="{ 'is-invalid': form.errors.password }" required />
                <div v-if="form.errors.password" class="invalid-feedback">
                    {{ form.errors.password }}
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" v-model="form.password_confirmation" type="password"
                    class="form-control" required />
            </div>

            <div class="form-actions">
                <button type="submit" class="primary-button" :disabled="form.processing">
                    Registrar
                </button>
                <button type="button" class="secondary-button" @click="$inertia.visit(route('login'))">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    setup() {
        const form = useForm({
            name: '',
            email: '',
            birth_date: null,
            country: '',
            password: '',
            password_confirmation: '',
        });

        function submit() {
            form.post(route('register'), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            });
        }

        return { form, submit };
    },
};
</script>

<style scoped>
.register-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 14px;
    font-family: 'Arial', sans-serif;
    /* Cambia según el estilo de ANA */
}

.form-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
}

.primary-button {
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    background-color: #FF5733;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.primary-button:hover:not(:disabled) {
    transform: scale(1.1);
    filter: brightness(1.2);
}

.primary-button:active:not(:disabled) {
    transform: scale(0.95);
}

.primary-button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
    box-shadow: none;
}

.secondary-button {
    padding: 10px 20px;
    border: 2px solid #FF5733;
    border-radius: 6px;
    background-color: transparent;
    color: #FF5733;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
}

.secondary-button:hover:not(:disabled) {
    background-color: rgba(255, 87, 51, 0.1);
    transform: scale(1.05);
}

.secondary-button:active:not(:disabled) {
    transform: scale(0.95);
}

.secondary-button:disabled {
    border-color: #ccc;
    color: #ccc;
    cursor: not-allowed;
    box-shadow: none;
}
</style>
