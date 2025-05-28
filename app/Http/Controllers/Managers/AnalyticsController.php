<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;

use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use App\Structure\Elements;
use App\Models\Order;
use App\Models\User;
use App\Models\Tariff;

class AnalyticsController extends Controller
{


    public function index(){


        //retrieve visitors and pageview data for the current day and the last seven days
        $analyticsWeekly = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        $fetchWeekly = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $pagesWeekly = Analytics::fetchMostVisitedPages(Period::days(7));

        $startDate  =  Carbon::now()->subYear();
        $endDate  =  Carbon::now ();
        $period = Period::create($startDate,$endDate);

        $analyticsMonthly = Analytics::fetchTotalVisitorsAndPageViews($period);
        $fetchMonthly = Analytics::fetchVisitorsAndPageViews($period);
        $pagesMonthly = Analytics::fetchMostVisitedPages($period);

        $analyticsMonthlys = new Collection;

        foreach($analyticsMonthly as $page){

            $element = new Elements;
            $element->number = (int) Carbon::parse($page['date'])->format('m');
            $element->date = Carbon::parse($page['date'])->format('F');
            $element->views = $page['pageViews'];
            $element->visitors = $page['visitors'];
            $analyticsMonthlys->push($element);

        }

        $results = $analyticsMonthlys->groupBy("date");

        $monthlys = new Collection;

        foreach($results as $result){
            $finality = new Elements;
            $finality->number = $result->first()->number;
            $finality->date = $result->first()->date;
            $finality->views = $result->sum("views");
            $finality->visitors = $result->sum("visitors");
            $monthlys->push($finality);
        }

        //dd($pages);

        $viewsWeekly = $analyticsWeekly->pluck('pageViews')->sum();
        $datesWeekly = $analyticsWeekly->pluck('date');
        $visitorsWeekly = $analyticsWeekly->pluck('visitors');

        $compositionMonthly = $monthlys->sortBy('number');
        $visitorsMonthly = $compositionMonthly->pluck('visitors');
        $viewsMonthlys = $compositionMonthly->pluck('views');
        $viewsMonthly = $compositionMonthly->pluck('views')->sum();
        $dateMonthly = $compositionMonthly->pluck('date');

        $viewsMonthlys = $viewsMonthlys->toArray();

        //dd($viewsMonthlys);
        return view('managers.views.analytics.index', compact('visitorsMonthly','pagesWeekly','viewsWeekly','datesWeekly','visitorsWeekly','viewsMonthly'))->with('viewsMonthlys',$viewsMonthlys);
    }

   public function contact(){

        return view('pages.pages.contacts');
    }


    public function faq(){

        return view('pages.pages.faqs')->with([
            'faqs' => Faq::available()->latest()->get()
        ]);

    }

    public function newsletters(){

        return view('pages.pages.newsletters');
    }


    public function about(){

        return view('pages.pages.abouts');
    }

    public function privacys(){

        return view('pages.pages.privacys');
    }

}
