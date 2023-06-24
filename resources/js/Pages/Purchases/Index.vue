<script setup>
import FlashMessage from "@/Components/FlashMessage.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PagiNation from "@/Components/PagiNation.vue";
import dayjs from "dayjs";

const props = defineProps({
	orders: {
		type: Object,
		required: true,
	},
});
</script>

<template>
	<Head title="購買履歴" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				購買履歴
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 text-gray-900">
						<section class="text-gray-600 body-font">
							<div class="container px-5 py-8 mx-auto">
								<FlashMessage />

								<div class="lg:w-2/3 w-full mx-auto overflow-auto">
									<table class="table-auto w-full text-left whitespace-no-wrap">
										<thead>
											<tr>
												<th
													class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"
												>
													id
												</th>
												<th
													class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
												>
													氏名
												</th>
												<th
													class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
												>
													合計金額
												</th>
												<th
													class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
												>
													ステータス
												</th>
												<th
													class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
												>
													購入日
												</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="order in props.orders.data" :key="order.id">
												<td
													class="px-4 py-3 border-t-2 border-b-2 border-gray-200"
												>
													<Link
														:href="
															route('purchases.show', {
																purchase: order.id,
															})
														"
														class="text-indigo-600 hover:text-indigo-900"
													>
														{{ order.id }}
													</Link>
												</td>
												<td
													class="px-4 py-3 border-t-2 border-b-2 border-gray-200"
												>
													{{ order.customer_name }}
												</td>
												<td
													class="px-4 py-3 border-t-2 border-b-2 border-gray-200"
												>
													{{ order.total }}
												</td>
												<td
													class="px-4 py-3 border-t-2 border-b-2 border-gray-200"
												>
													{{ order.status }}
												</td>
												<td
													class="px-4 py-3 border-t-2 border-b-2 border-gray-200"
												>
													{{ dayjs(order.created_at).format("YYYY/MM/DD") }}
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<PagiNation
								class="mt-6 flex justify-center"
								:links="props.orders.links"
							/>
						</section>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
