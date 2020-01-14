<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class IndexController extends Controller
{
	public function index(){
		return view('campaign.index');
	}

    public function app(){
        return view('campaign.app');
    }
    
    public function web(){
        return view("campaign.web");
    }

    public function u8(){
    	return view("campaign.u8");
    }

	public function getIndex() {
		return view ( 'campaign.index' );
	}

	/**
	 * WebUI
	 * @param Request $request
	 * @return string
	 */
	public function getTaskPies(Request $request) {
		$user = $request->user ();
		$rcService = new ReportChartService ();
		$rows = $rcService->getWebTaskPieForIndex ( $user );
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}

	public function getApiTaskPies(Request $request){
		$user = $request->user ();
		$rcService = new ReportChartService ();
		$rows = $rcService->getApiTaskPieForIndex ( $user );
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}

	public function getAppTaskPies(Request $request){
		$user = $request->user ();
		$rcService = new ReportChartService ();
		$rows = $rcService->getAppTaskPieForIndex ( $user );
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}

	public function getDispatchTaskPies(Request $request){
		$user = $request->user ();
		$rcService = new ReportChartService ();
		$rows = $rcService->getDispatchTaskPieForIndex ( $user );
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}

	/**
	 *
	 * @param Request $request
	 * @return string
	 */
	public function getTaskLines(Request $request) {
		$user = $request->user ();
		$cycle = $request->input ( 'cycle' );
		$rcService = new ReportChartService ();
		$rows = $rcService->getWebTaskLine ( $user, $cycle );
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}

	/**
	 *
	 * @param Request $request
	 * @return string
	 */
	public function getSchemeChart(Request $request) {
		$user = $request->user ();
		$cycle = $request->input ( 'cycle' );
		$rcService = new ReportChartService ();
		$rows = $rcService->getSchemeChart ( $user ,$cycle);
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}


	/**
	 *
	 * @param Request $request
	 * @return string
	 */
	public function getScriptChart(Request $request) {
		$user = $request->user ();
		$rcService = new ReportChartService ();
		$rows = $rcService->getScriptChart ( $user);
		return "{success:1,data:{web:'" . json_encode ( $rows ) . "'}}";
	}

    public function ult()
    {
        $file=storage_path('download/ULT.zip');
        return response()->download($file);
    }

    public function mtt()
    {
        $file=storage_path('download/MTT.zip');
        return response()->download($file);
    }
    public function sett()
    {
        $file=storage_path('download/SETT.zip');
        return response()->download($file);
    }
    public function dult()
    {
        $file=storage_path('download/DULT.zip');
        return response()->download($file);
    }
    public function pct()
    {
        $file=storage_path('download/PCT.zip');
        return response()->download($file);
    }
    public function js()
    {
        $file=storage_path('download/JS.zip');
        return response()->download($file);
    }
    public function lsbcx()
    {
        $file=storage_path('download/LSBCX.zip');
        return response()->download($file);
    }
    public function gdi()
    {
        $file=storage_path('download/GDI.zip');
        return response()->download($file);
    }
    public function sjkjgdb()
    {
        $file=storage_path('download/SJKJGDB.zip');
        return response()->download($file);
    }
    public function wj()
    {
        $file=storage_path('download/WJ.zip');
        return response()->download($file);
    }
    public function xn()
    {
        $file=storage_path('download/XN.zip');
        return response()->download($file);
    }
    public function ylzx()
    {
        $file=storage_path('download/YLZX.zip');
        return response()->download($file);
    }


}
