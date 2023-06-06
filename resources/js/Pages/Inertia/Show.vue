<script setup>
import { Inertia } from "@inertiajs/inertia";

defineProps({
    blog: Object,
});

const deleteConfirm = (id) => {
    // 削除先のURLを指定
    const url = route("inertia.delete", { id: id });
    // 削除処理
    Inertia.delete(url, { onBefore: () => confirm("削除しますか？") });
};
</script>
<template>
    <div>
        <h2>{{ blog.title }}</h2>
        <p>{{ blog.content }}</p>
    </div>
    <div>
        <button @click="deleteConfirm(blog.id)">削除</button>
    </div>
</template>
