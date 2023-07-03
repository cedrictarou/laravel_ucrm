<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ResultTable from "@/Components/ResultTable.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { getToday } from "@/common";
import { reactive, onMounted } from "vue";
import Chart from "@/Components/Chart.vue";

onMounted(() => {
	const today = getToday();

	form.startDate = today;
	form.endDate = today;
});

const form = reactive({
	startDate: null,
	endDate: null,
	type: "perDay",
});

const data = reactive({});

const getData = async () => {
	try {
		await axios
			.get("/api/analysis", {
				params: {
					startDate: form.startDate,
					endDate: form.endDate,
					type: form.type,
				},
			})
			.then((res) => {
				data.data = res.data.data;
				data.labels = res.data.labels;
				data.totals = res.data.totals;
				data.type = res.data.type;
			});
	} catch (error) {
		console.log(error);
	}
};
</script>

<template>
	<Head title="データ分析" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				データ分析
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 text-gray-900">
						<form @submit.prevent="getData">
							<div class="flex justify-between items-center gap-x-2">
								<label for="analysis_method">分析方法</label>
								<input
									type="radio"
									v-model="form.type"
									name="type"
									value="perDay"
									checked
								/>
								<span>日別</span>
								<input
									type="radio"
									v-model="form.type"
									name="type"
									value="perMonth"
								/>
								<span>月別</span>
								<input
									type="radio"
									v-model="form.type"
									name="type"
									value="perYear"
								/>
								<span>年別</span>
								<input
									type="radio"
									v-model="form.type"
									name="type"
									value="decile"
								/>
								<span>デシル分析</span>
								<label for="startDate">From</label>
								<input
									type="date"
									id="startDate"
									name="startDate"
									v-model="form.startDate"
									class="block mt-1"
								/>
								<label for="startDate">To</label>
								<input
									type="date"
									id="endDate"
									name="endDate"
									v-model="form.endDate"
									class="block mt-1"
								/>
								<button
									class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
								>
									分析する
								</button>
							</div>
						</form>

						<div
							v-show="data.data"
							class="lg:w-2/3 w-full mx-auto overflow-auto"
						>
							<Chart :data="data" />
							<ResultTable :data="data" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
