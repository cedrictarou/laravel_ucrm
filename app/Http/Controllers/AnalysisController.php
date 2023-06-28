<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AnalysisController extends Controller
{
	public function index()
	{
		// $startDate = '2021-01-01';
		// $endDate = '2021-01-30';

		// $subQuery = Order::betweenDate($startDate, $endDate)
		// 	->where('status', true)
		// 	->groupBy('id')
		// 	->selectRaw('id, sum(subtotal) as totalPerPurchase,
		//     DATE_FORMAT(created_at, "%Y%m%d") as date');

		// $data = DB::table($subQuery)
		// 	->groupBy('date')
		// 	->selectRaw('date, sum(totalPerPurchase) as total')
		// 	->get();


		return Inertia::render('Analysis');
	}
}
