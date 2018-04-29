<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SalesProduct;
use Carbon\Carbon;
use DB;

class SalesReportController extends Controller
{
    public function top_selling_products(Request $request)
    {
		//set the oldest record date as the limit in case one is not provided and 5 as the default result limit.
		//Also initialise the report data variable.
		$dt = DB::table('sales_products')->orderBy('created_at','asc')->value('created_at');
		$date_limit = Carbon::parse($dt);
		$result_limit = 5;
		$report_data = null;

		//if the date limit is provided, set it up.
		if(request('date_limit') != null)
		{
			$date_limit = Carbon::createFromFormat('Y-m-d h:i:s', request('date_limit') . '00:00:00');
		}

		//if the month limit is provided, set it up.
		if(request('month_limit') != null){
			//if the limit is provided in a month amount, calculate it and set it up.
			$date_limit = Carbon::now()->copy()->subMonth(request('month_limit'));
		}


		//if the result limit is provided, set it up.
		if(request('result_limit') != null)
		{
			$result_limit = request('result_limit');
		}

		//if the url provided a start and end date, then execute this query
		if(request('start_date') != null && request('end_date') != null)
		{
			//Setting up the date variables
			$start_date = Carbon::createFromFormat('Y-m-d h:i:s', request('start_date') . '00:00:00');
			$end_date = Carbon::createFromFormat('Y-m-d h:i:s', request('end_date') . '00:00:00');

			//Querying...
			$report_data = SalesProduct::select('product_id', DB::raw('sum(quantity) as quantity'))
			->whereBetween('created_at', [$start_date, $end_date])
			->groupBy('product_id')
			->orderBy(DB::raw('sum(quantity)'), 'desc')
			->limit($result_limit)
			->get();
    	}
    	//else assume that the user wants to see some form of results from today backwards.
    	else
    	{
    		//Querying...
			$report_data = SalesProduct::select('product_id', DB::raw('sum(quantity) as quantity'))
			->where('created_at', '>=', $date_limit)
			->groupBy('product_id')
			->orderBy(DB::raw('sum(quantity)'), 'desc')
			->limit($result_limit)
			->get();
		}

		foreach ($report_data as $data) {
			$data->product;
		}

		return response()->json($report_data);
    }

	//This function will return product sales throughtout time. It will receive the Http request and act accordingly.
	//Possible inputs are either a limit date, a start and finish date,an amount of months to go back via Carbon's subMonth function and the result limit.
    public function periodic_sales(Request $request)
    {
		//set the oldest record date as the limit in case one is not provided and 5 as the default result limit.
		//Also initialise the report data variable.
		$dt = DB::table('sales_products')->orderBy('created_at','asc')->value('created_at');
		$date_limit = Carbon::parse($dt);
		$result_limit = 5;
		$report_data = null;

		//if the date limit is provided, set it up.
		if(request('date_limit') != null)
		{
			$date_limit = Carbon::createFromFormat('Y-m-d h:i:s', request('date_limit') . '00:00:00');
		}

		//if the month limit is provided, set it up.
		if(request('month_limit') != null){
			//if the limit is provided in a month amount, calculate it and set it up.
			$date_limit = Carbon::now()->copy()->subMonth(request('month_limit'));
		}


		//if the result limit is provided, set it up.
		if(request('result_limit') != null)
		{
			$result_limit = request('result_limit');
		}

		//if the url provided a start and end date, then execute this query
		if(request('start_date') != null && request('end_date') != null)
		{
			//Setting up the date variables
			$start_date = Carbon::createFromFormat('Y-m-d h:i:s', request('start_date') . '00:00:00');
			$end_date = Carbon::createFromFormat('Y-m-d h:i:s', request('end_date') . '00:00:00');

			//Querying...
			$report_data = SalesProduct::select('created_at', DB::raw('sum(quantity) as quantity'))
			->whereBetween('created_at', [$start_date, $end_date])
			->groupBy('created_at')
			->orderBy('created_at', 'desc')
			->limit($result_limit)
			->get();
		}
		else
		{
			//Querying...
			$report_data = SalesProduct::select('created_at', DB::raw('sum(quantity) as quantity'))
			->where('created_at', '>=', $date_limit)
			->groupBy('created_at')
			->orderBy('created_at', 'desc')
			->limit($result_limit)
			->get();
		}

		return response()->json($report_data);
    }
}
