<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const emitTest = (value) => {
    console.log(value);
};
</script>

<template>
    <GuestLayout>
        <InputLabel value="件名" />
        <TextInput
            modelValue="初期値が入ります"
            @update:modelValue="emitTest"
        />
    </GuestLayout>
</template>
