<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Policy;
use App\User;
use Auth;
use Carbon\Carbon;
/**
 * 
 */
class Helper 
{

	// admin graphics helpers
	public static function best_seller_month(){
		$month = Carbon::now()->month;
		$sellers = Policy::select('user_id')->where('user_id', '!=', null)->whereMonth('created_at', $month)->get();

		if ($sellers->first() != null) {
			
			$arr = [];

			foreach ($sellers as $seller) {
				array_push($arr, $seller->user_id);
			}

			$count = array_count_values($arr);
			$higher_num = max($count);
			$user_id = array_search($higher_num, $count);

			$user_nl = User::select('name', 'lastname')->where('id', $user_id)->get();
			$best_seller = $user_nl[0]->name.' '.$user_nl[0]->lastname;
			return $best_seller;
		}


		$empty_seller = 'No hay vendedor del mes'; 

		return $empty_seller; 
	}

	public static function policies_sold_month(){
		$month = Carbon::now()->month;
		$year = Carbon::now()->year;
		$policies = Policy::select()->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();

		if ($policies->first() != null) {		
			$arr = [];
			foreach ($policies as $policy) {
				array_push($arr, $policy);
			}

			$counted_policies = count($arr);
			return $counted_policies;
		}

		return 0;

	}

	public static function policies_valid(){
		$date = Carbon::now();
		$policies = Policy::whereDate('expiring_date', '>=', $date)->get();

		if ($policies->first() != null) {		
			$arr = [];
			foreach ($policies as $policy) {
				array_push($arr, $policy);
			}

			$counted_policies = count($arr);
			return $counted_policies;
		}
		return 0;
	}



	public static function policies_sold_all(){
		$policies = Policy::all();

		if ($policies->first() != null) {		
			$arr = [];
			foreach ($policies as $policy) {
				array_push($arr, $policy);
			}

			$counted_policies = count($arr);
			return $counted_policies;
		}

		return 0;

	}

	public static function policies_money_month(){
		$month = Carbon::now()->month;
		$year = Carbon::now()->year;
		$policies = Policy::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();

		if ($policies->first() != null) {
			$prices = 0;
			foreach ($policies as $policy) {
				$prices = $prices + $policy->price->total_all;		
			}

			return $prices;
		}

	}

	public static function policies_month($month){
		$year = Carbon::now()->year;
		$policies = Policy::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();

		// var_dump($policies);
		// exit();

		if ($policies->first() != null) {
			$arr = [];
			foreach($policies as $policy){
				array_push($arr, $policy->id);
			}

			return count($arr);
		}

		return 0;
	}

// User graphics helpers
	public static function policies_valid_user(){
		$date = Carbon::now();
		$user_id = Auth::user()->id;
		$policies = Policy::where('id', $user_id)->whereDate('expiring_date', '>=', $date)->get();

		if ($policies->first() != null) {		
			$arr = [];
			foreach ($policies as $policy) {
				array_push($arr, $policy);
			}

			$counted_policies = count($arr);
			return $counted_policies;
		}
		return 0;
	}

	public static function policies_sold_user(){
		$user_id = Auth::user()->id;
		$policies = Policy::where('id', $user_id)->get();

		if ($policies->first() != null) {		
			$arr = [];
			foreach ($policies as $policy) {
				array_push($arr, $policy);
			}

			$counted_policies = count($arr);
			return $counted_policies;
		}

		return 0;

	}

	public static function policies_sold_weeks(){
		$weeks = Carbon::now()->subDays(15);
		$today = Carbon::now();
		$year = Carbon::now()->year;
		$user_id = Auth::user()->id;

		$policies = Policy::where('id', $user_id)->whereDate('created_at','>=', $weeks)->whereDate('created_at', '<=', $today)->whereYear('created_at', $year)->get();

		if ($policies->first() != null) {		
			$arr = [];
			foreach ($policies as $policy) {
				array_push($arr, $policy);
			}

			$counted_policies = count($arr);
			return $counted_policies;
		}

		return 0;

	}

	public static function policies_revenue_weeks(){
		$weeks = Carbon::now()->subDays(15);
		$today = Carbon::now();
		$year = Carbon::now()->year;
		$user_id = Auth::user()->id;

		$policies = Policy::where('id', $user_id)->whereDate('created_at','>=', $weeks)->whereDate('created_at', '<=', $today)->whereYear('created_at', $year)->get();

		if ($policies->first() != null) {		
			$prices = 0;
			$profit_percentage = 0;
			foreach ($policies as $policy) {
				$prices = $prices + $policy->price->total_all;
				$profit_percentage = $policy->user->profit_percentage;		
			}

			$result = ($prices * $profit_percentage) / 100;

			return $result;
		}

		return 0;

	}

	public static function policies_revenue_year(){
		$year = Carbon::now()->year;
		$user_id = Auth::user()->id;

		$policies = Policy::where('id', $user_id)->whereYear('created_at', $year)->get();

		if ($policies->first() != null) {		
			$prices = 0;
			$profit_percentage = 0;
			foreach ($policies as $policy) {
				$prices = $prices + $policy->price->total_all;
				$profit_percentage = $policy->user->profit_percentage;		
			}

			$result = ($prices * $profit_percentage) / 100;

			return $result;
		}

		return 0;

	}

	public static function policies_month_user($month){
		$user_id = Auth::user()->id;
		$year = Carbon::now()->year;
		$policies = Policy::where('id', $user_id)->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();

		// var_dump($policies);
		// exit();

		if ($policies->first() != null) {
			$arr = [];
			foreach($policies as $policy){
				array_push($arr, $policy->id);
			}

			return count($arr);
		}

		return 0;
	}

}
