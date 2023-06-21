<script setup>
import axios from "axios";
import { ref, reactive } from "vue";

const search = ref("");
const customers = reactive({});
const isShow = ref(false);
const toggle = () => {
	isShow.value = !isShow.value;
};

const searchCustomers = async () => {
	try {
		// const res = await axios.get(`/api/searchCustomers/?search=${search.value}`);
		const res = await axios.get("/api/searchCustomers", {
			params: {
				search: search.value,
			},
		});

		customers.value = res.data;
		console.log(customers.value);
		toggle();
	} catch (error) {
		console.log(error);
	}
};

// onMounted(() => {
// 	axios.get("/api/user").then((res) => {
// 		console.log(res.data);
// 	});
// });
</script>
<template>
	<div v-show="isShow" class="modal" id="modal-1" aria-hidden="true">
		<div class="modal__overlay" tabindex="-1" data-micromodal-close>
			<div
				class="modal__container"
				role="dialog"
				aria-modal="true"
				aria-labelledby="modal-1-title"
			>
				<header class="modal__header">
					<h2 class="modal__title" id="modal-1-title">Micromodal</h2>
					<button
						@click="toggle"
						type="button"
						class="modal__close"
						aria-label="Close modal"
						data-micromodal-close
					></button>
				</header>
				<main class="modal__content" id="modal-1-content">
					<p>
						Try hitting the <code>tab</code> key and notice how the focus stays
						within the modal itself. Also, <code>esc</code> to close modal.
					</p>
				</main>
				<footer class="modal__footer">
					<button
						@click="toggle"
						type="button"
						class="modal__btn modal__btn-primary"
					>
						Continue
					</button>
					<button
						@click="toggle"
						type="button"
						class="modal__btn"
						data-micromodal-close
						aria-label="Close this dialog window"
					>
						Close
					</button>
				</footer>
			</div>
		</div>
	</div>
	<input type="text" name="customer" v-model="search" />

	<button
		@click="searchCustomers"
		type="button"
		data-micromodal-trigger="modal-1"
	>
		検索する
	</button>
</template>
