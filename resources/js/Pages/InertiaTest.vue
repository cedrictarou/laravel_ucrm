<script setup>
import { Link } from "@inertiajs/inertia-vue3";

import { ref } from "vue";

const newTitle = ref("");
const newContent = ref("");
</script>

<template>
    <div>
        <h1>Inertiaテストです</h1>
        <a href="/">Aタグです</a> <br />

        <Link href="/">Linkコンポーネント</Link> <br />

        <Link :href="route('inertia.index')">名前付きルートの確認です</Link>
        <br />

        <Link :href="route('inertia.show', { id: 1 })"
            >ルートパラメーターのテスト</Link
        >

        <div class="mb-8"></div>
        <input type="text" name="newTitle" v-model="newTitle" /> <br />
        <input type="text" name="newContent" v-model="newContent" /> <br />
        <Link
            as="button"
            method="post"
            :href="route('inertia.store')"
            :data="{ title: newTitle, content: newContent }"
            >BD保存テスト</Link
        >
    </div>
</template>
