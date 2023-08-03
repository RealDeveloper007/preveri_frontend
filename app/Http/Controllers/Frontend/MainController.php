<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;
use App\HomepageSection;
use App\Company;
use App\CompanyComments;
use App\CompanySalaries;
use App\Contact;
use App\News;
use App\Region;
use App\Setting;
use App\Category;
use App\PopularVideo;
use App\ArchivedData;
use App\CompanyViewed;
use Validator;

class MainController extends Controller
{

    public function signup()
    {
        return redirect()->route('home');
    }

    public function index()
    {

        // forgot session data
        request()->session()->forget('title');

        $HomepageSection = HomepageSection::select('id', 'title', 'image', 'short_description', 'sub_str')->get();

        $TopCompanyList = Company::select('id', 'logo', 'title', 'slug', 'description', 'rating')->where('status', 1)->where('rating', '>', 3)->orderBy('rating', 'DESC')->get()->toArray();

        $RandomSelectedComment = Company::select('logo', 'slug', 'title', 'rating')->has('comments', '>', 0)->inRandomOrder()->where('status', 1)->limit(1)->first();


        $LastComment = CompanyComments::select('company_id')->with('company:rating,id,title,slug,logo')->whereHas('company', function (Builder  $q) {
            // Query the name field in status table
            $q->where('status', 1)->limit(1); // '=' is optional
        })->where('status', 1)->orderBy('id', 'desc')->limit(1)->first();

        // print_r($LastComment); die;

        $LastSalaryComment = CompanySalaries::select('company_id')->with('company:rating,id,title,slug,logo')->whereHas('company', function (Builder  $q) {
            // Query the name field in status table
            $q->where('status', 1)->limit(1); // '=' is optional
        })->orderBy('id', 'DESC')->where('status', 1)->limit(1)->first();
        $PopularVideos = PopularVideo::where('status', 1)->get();


        // $Setting = Setting::select('about_us', 'address', 'email', 'logo', 'phone', 'privacy_policy', 'policy', 'short_desc_about', 'short_description', 'site_title', 'terms_condition')->first();

        return view('frontend.index', ['home_page_sections' => $HomepageSection, 'top_companies' => $TopCompanyList, 'random_selected_company' => $RandomSelectedComment, 'last_comment' => $LastComment, 'last_salary_comment' => $LastSalaryComment, 'setting' => '', 'ratingcount' => 5,'popular_videos'=>$PopularVideos]);
    }
    
    public function autoCompleteAjax(Request $request)
    {
        // $search=  $request->term;

        $char = ',';
        $char1 = '.';
        $Allwords  = explode(' ', $request->term);

        $CompanyListFind = Company::where('slug', $request->term)->where('status', 1)->orderBy('rating', 'DESC')->limit(500)->get();

        if (!isset($CompanyListFind[0])) 
        {
            $Title = str_replace(',', '', $request->term);
            $Title1 = str_replace('.', '', $request->term);
            $CompanyList = Company::where('status', '=', 1)->where(function ($query) use ($char, $char1, $Title, $Title1) {
                $query->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')
                    ->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%');
                    
                 $query->where(\DB::raw("REPLACE(short_name, '$char', '')"), 'like', '%' . $Title . '%')
                    ->orWhere(\DB::raw("REPLACE(short_name, '$char1', '')"), 'like', '%' . $Title1 . '%');
            })->where('status', 1)->orderBy('rating', 'DESC')->limit(500)->get();

        } else {

            $CompanyList = $CompanyListFind;
        }

        if (!isset($CompanyList[0])) 
        {
            krsort($Allwords);

            $CompanyList = Company::where(function ($query) use ($Allwords) {

                for ($i = 0; $i < count($Allwords); $i++) {
                    $query->orWhereRaw("find_in_set('" . $Allwords[$i] . "',search_title)");
                }
            })->where('status', 1)->orderBy('rating', 'DESC')->limit(500)->get();
        }
        
        // $companies = Company::where('title','LIKE',"%{$search}%")->orderBy('created_at','DESC')->limit(5)->get();

        if(!$CompanyList->isEmpty())
        {
            foreach($CompanyList as $company)
            {
                $new_row['title'] = $company->title;
	            $new_row['image'] = backend_asset('company_images/'.$company->logo);
                $new_row['url']   = route('podjetja').'/'.$company->slug;
                
                $row_set[] = $new_row; //build an array
            }
        }
        
        echo json_encode($row_set); 
    }

    private function getTopComapnies()
    {
        $InActiveCompanies = Company::where('status', 0)->get();

        $INActiveCompanies = array();

        foreach ($InActiveCompanies as $singleInActiveCompany) {
            $INActiveCompanies[] = $singleInActiveCompany->id;
        }

        $TopCompanyList = CompanyComments::with(['company' => function ($q) {
            // Query the name field in status table
            $q->where('status', '=', 1); // '=' is optional
        }])->select('company_id')->where('status', 1)->whereNotIn('company_id', $INActiveCompanies)->groupBy('company_id')->get();

        $TopCompanyListArray = [];

        $i = 0;

        foreach ($TopCompanyList as $SingleTopCompany) {

            $CheckRating = $this->GetCompanyRating($SingleTopCompany->company_id);


            $TopCompanyListArray[$i]['id']          = $SingleTopCompany->company_id;
            $TopCompanyListArray[$i]['logo']        = isset($SingleTopCompany->company->logo) ? $SingleTopCompany->company->logo : '';
            $TopCompanyListArray[$i]['title']       = isset($SingleTopCompany->company->title) ? $SingleTopCompany->company->title : '';
            $TopCompanyListArray[$i]['slug']        = isset($SingleTopCompany->company->slug) ? $SingleTopCompany->company->slug : '';
            $TopCompanyListArray[$i]['description'] = isset($SingleTopCompany->company->description) ? $SingleTopCompany->company->description : '';
            $TopCompanyListArray[$i]['rating']      = $CheckRating;

            $i++;
        }

        usort($TopCompanyListArray, function ($item1, $item2) {
            return $item2['rating'] <=> $item1['rating'];
        });

        $TopCompanies = [];

        foreach ($TopCompanyListArray as $SingleCompany) {
            $TopCompanies[] = $SingleCompany['id'];
        }

        return array_reverse($TopCompanies);
    }


    private function GetCompanyRating($id)
    {
        // forgot session data
        request()->session()->forget('title');

        $CompanyDetails = Company::with(['comments' => function ($query) {
            $query->where('status', '=', 1)->orderBy('created_at', 'desc');
        }])->with(['pictures' => function ($query) {
            $query->where('status', '=', 1);
        }])->with(['salaries' => function ($query) {
            $query->where('status', '=', 1);
        }])->with('region')->where('id', $id)->first();

        $CompanyRate = 0;
        if (isset($CompanyDetails->comments)) {
            foreach ($CompanyDetails->comments as $AllComments) {
                $FullResponse = $AllComments->full_response;

                $CompantRateArray = array('Zelo slabo', 'Slabo', 'Niti slabo - niti dobro', 'Dobro', 'Odlično');

                $RecieveRating = array_search($FullResponse['company_rate'], $CompantRateArray);

                $RecieveRate = $RecieveRating + 1;

                $CompanyRate += $RecieveRate;
            }
        }

        $total_comments = isset($CompanyDetails->comments) ? count($CompanyDetails->comments) : 0;

        if ($CompanyRate == 0) {
            $rating = 0;
        } else {
            $rating = $CompanyRate / $total_comments;
        }

        return (int)$rating;
    }

    public function companyNames(Request $request)
    {
        // forgot session data
        request()->session()->forget('title');

        $char = ',';
        $char1 = '.';

        if ($request->title != '') {
            $Allwords  = explode(' ', $request->title);

            $Title = str_replace(',', '', $request->title);
            $Title1 = str_replace('.', '', $request->title);

            $CompanyList = Company::where(function ($query) use ($char, $char1, $Title, $Title1) {
                $query->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')
                    ->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%');
            })->where('status', 1)->select('id', 'title as text')->get();

            if (!isset($CompanyList[0])) {

                krsort($Allwords);

                $CompanyList = Company::where('status', '=', 1)->where(function ($query) use ($Allwords) {

                    for ($i = 0; $i < count($Allwords); $i++) {
                        $query->orWhereRaw("find_in_set('" . $Allwords[$i] . "',search_title)");
                    }
                })->select('id', 'title as text')->get();
            }
        } else {
            $CompanyList = array();
        }


        return  json_encode([
            'status'     => true,
            'message'   => 'Imena podjetij',
            'data'      => $CompanyList
        ]);
    }

    public function regionNames(Request $request)
    {
        // forgot session data
        request()->session()->forget('title');

        $char = ',';
        $char1 = '.';

        if ($request->title != '') {
            $Title = str_replace(',', '', $request->title);
            $Title1 = str_replace('.', '', $request->title);

            $RegionList = Region::where(function ($query) use ($char, $char1, $Title, $Title1) {
                $query->where(\DB::raw("REPLACE(name, '$char', '')"), 'like', '%' . $Title . '%')
                    ->orWhere(\DB::raw("REPLACE(name, '$char1', '')"), 'like', '%' . $Title1 . '%');
            })->where('status', 1)->select('id', 'name as text')->get();
        } else {
            $RegionList = array();
        }


        return  json_encode([
            'status'     => true,
            'message'   => 'Imena regions',
            'data'      => $RegionList
        ]);
    }

    public function categoryNames(Request $request)
    {
        // forgot session data
        request()->session()->forget('title');

        $char = ',';
        $char1 = '.';

        if ($request->title != '') 
        {
           

            $CategoryList = Category::where('title', 'LIKE', '%'.$request->title.'%')->where('status', 1)->select('id as id', 'title as text')->get();
        } else {
            $CategoryList = array();
        }


        return  json_encode([
            'status'     => true,
            'message'   => 'Imena category',
            'data'      => $CategoryList
        ]);
    }



    public function companyList(Request $request)
    {
        if (request()->filled('search_type')) 
        {
            request()->session()->forget('title');
        }

        if (request()->session()->has('title')) 
        {
            $char = ',';
            $char1 = '.';
            $Allwords  = explode(' ', request()->session()->get('title'));

            $CompanyListFind = Company::where('slug', request()->session()->get('title'))->where('status', 1)->orderBy('rating', 'DESC')->paginate(20);

            if (!isset($CompanyListFind[0])) {
                $Title = str_replace(',', '', request()->session()->get('title'));
                $Title1 = str_replace('.', '', request()->session()->get('title'));
                
                $CompanyList = Company::where('status', '=', 1)->where(function ($query) use ($char, $char1, $Title, $Title1) {
                    $query->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')
                        ->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%');
                        
                    $query->where(\DB::raw("REPLACE(short_name, '$char', '')"), 'like', '%' . $Title . '%')
                    ->orWhere(\DB::raw("REPLACE(short_name, '$char1', '')"), 'like', '%' . $Title1 . '%');
                })->where('status', 1)->orderBy('rating', 'DESC')->paginate(20);
            } else {

                $CompanyList = $CompanyListFind;
            }

            if (!isset($CompanyList[0])) {

                krsort($Allwords);


                $CompanyList = Company::where(function ($query) use ($Allwords) {

                    for ($i = 0; $i < count($Allwords); $i++) {
                        $query->orWhereRaw("find_in_set('" . $Allwords[$i] . "',search_title)");
                    }
                })->where('status', 1)->orderBy('rating', 'DESC')->paginate(20);
            }

        } else if (request()->filled('title')) {

            $char = ',';
            $char1 = '.';
            $Allwords  = explode(' ', request()->title);

            $CompanyListFind = Company::where('slug', request()->title)->where('status', 1)->orderBy('rating', 'DESC')->paginate(20);

            if (!isset($CompanyListFind[0])) {
                $Title = str_replace(',', '', request()->title);
                $Title1 = str_replace('.', '', request()->title);
                $CompanyList = Company::where('status', '=', 1)->where(function ($query) use ($char, $char1, $Title, $Title1) {
                    $query->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')
                        ->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%');
                })->where('status', 1)->orderBy('rating', 'DESC')->paginate(20);
            } else {

                $CompanyList = $CompanyListFind;
            }

            if (!isset($CompanyList[0])) {

                krsort($Allwords);

                $CompanyList = Company::where(function ($query) use ($Allwords) {

                    for ($i = 0; $i < count($Allwords); $i++) {
                        $query->orWhereRaw("find_in_set('" . $Allwords[$i] . "',search_title)");
                    }
                })->where('status', 1)->orderBy('rating', 'DESC')->paginate(20);
            }
        } else {

            $CompanyList = Company::filter();
        }


        $RegionList = Region::where('status', 1)->select('id','name')->get();
        
        $CategoryList = Category::where('status', 1)->select('id','title')->get();

        return view('frontend.company_list', ['list' => $CompanyList,'regions'=>$RegionList,'category'=>$CategoryList]);
    }


    public function topComapnies()
    {

        $TopCompanyList = Company::select('id', 'logo', 'title', 'slug', 'description', 'rating')->where('status', 1)->where('rating', '>', 3)->orderBy('rating', 'DESC')->paginate(18);


        return view('frontend.top_company_list', ['top_companies_list' => $TopCompanyList]);
    }

    private function getCompanyID($slug)
    {
        $CheckCompanyDetails = Company::select('slug', 'id')->where('slug', $slug)->get()->toArray();

        if (!isset($CheckCompanyDetails[0])) {
            return redirect()->route('home');
        }

        foreach ($CheckCompanyDetails as $SCompany) {
            if ($SCompany['slug'] === $slug) {
                $ID = $SCompany['id'];
            }
        }

        return $ID;
    }

    private function getCompanyDetails($slug)
    {
        $CheckCompanyDetails = Company::where('slug', $slug)->get();

        if (!isset($CheckCompanyDetails[0])) 
        {
            return redirect()->route('home');
        }

        $CompanyDetails = [];
        foreach ($CheckCompanyDetails as $SCompany) {
            if ($SCompany['slug'] === $slug) {
                $CompanyDetails = $SCompany;
            }
        }

        return $CompanyDetails;
    }

    public function singleCompany($slug)
    {

        // forgot session data
        request()->session()->forget('title');

        $CompanyDetails = $this->getCompanyDetails($slug);
        if (isset($CompanyDetails->comments)) 
        {
            $ValidateCompanyViewed = CompanyViewed::where(['company_id'=>$CompanyDetails->id,'ip_address'=>request()->ip(),'date'=>date('Y-m-d')])->count();

            if($ValidateCompanyViewed == 0)
            {
                $CompanyViewed                      = new CompanyViewed();
                $CompanyViewed->company_id          = $CompanyDetails->id;
                $CompanyViewed->ip_address          = request()->ip();
                $CompanyViewed->date                = date('Y-m-d');
                $CompanyViewed->created_at          = date('Y-m-d H:i:s');
                $CompanyViewed->updated_at          = date('Y-m-d H:i:s');
                $CompanyViewed->save();
            }
            
            $CompanyDetails->total_comments = count($CompanyDetails->comments);

            $TotalSalaries = 0;

            foreach($CompanyDetails->salaries as $SingleSalary)
            {
                $TotalSalaries += (int)$SingleSalary->max_salary;
            }

            return view('frontend.company_details', ['company_details' => $CompanyDetails, 'ratingcount' => 5,'total_salaries'=>$TotalSalaries]);
        } else {
            return view('500');
        }
    }

    public function company_comments(Request $request)
    {
        $CompanyDetails = $this->getCompanyDetails($request->slug);

        $CompanyComments = $CompanyDetails->comments()->paginate(10);

        if (isset($CompanyComments)) {
            foreach ($CompanyComments as $AllComments) {
                $FullResponse = $AllComments->full_response;

                $CompantRateArray = array('Zelo slabo', 'Slabo', 'Niti slabo - niti dobro', 'Dobro', 'Odlično');

                $RecieveRating = array_search($FullResponse['company_rate'], $CompantRateArray);

                $RecieveRate = $RecieveRating + 1;

                $AllComments->rating = $RecieveRate;
            }
        }

        $CompanyDetails->total_comments = $CompanyDetails->comments()->count();

        $CompanyDetails->comments = $CompanyComments;

        $pagination = '';

        if ($CompanyDetails->comments->hasPages()) {

            $pagination .= '<ul class="pagination pagination">';

            if ($CompanyDetails->comments->onFirstPage()) {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
            } else {

                $PrevPageExplode = explode('=', $CompanyDetails->comments->previousPageUrl());
                $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="paginationComment(' . $PrevPageExplode[1] . ')" rel="prev">&laquo;</a></li>';
            }

            foreach (range(1, $CompanyDetails->comments->lastPage()) as $i) {
                if ($i >= $CompanyDetails->comments->currentPage() - 4 && $i <= $CompanyDetails->comments->currentPage() + 4) {
                    if ($i == $CompanyDetails->comments->currentPage()) {
                        $pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                    } else {
                        $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="paginationComment(' . $i . ')">' . $i . '</a></li>';
                    }
                }
            }

            if ($CompanyDetails->comments->hasMorePages()) {
                $NextPageExplode = explode('=', $CompanyDetails->comments->nextPageUrl());

                $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)"  onclick="paginationComment(' . $NextPageExplode[1] . ')" rel="next">&raquo;</a></li>';
            } else {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
            }
            $pagination .= '</ul>';
        }

        return response()->json([
            'status' => true,
            'message' => 'Company Details',
            'data'  => $CompanyDetails,
            'ratingcount' => 5,
            'pagination' => $pagination
        ], 200);
    }

    public function newsList()
    {
        // forgot session data
        request()->session()->forget('title');

        $NewsList = News::orderBy('date', 'desc')->paginate(10);
        return view('frontend.news_list', ['list' => $NewsList]);
    }

    public function singleNews($slug)
    {
        // forgot session data
        request()->session()->forget('title');

        $Newsdetails = News::where('slug', $slug)->first();

        if (isset($Newsdetails)) {
            return view('frontend.news_details', ['details' => $Newsdetails]);
        } else {
            return view('500');
        }
    }

    public function aboutUS()
    {
        // forgot session data
        request()->session()->forget('title');

        $Setting = Setting::select('about_us')->first();
        return view('frontend.about_us', ['setting' => $Setting]);
    }

    public function terms()
    {
        // forgot session data
        request()->session()->forget('title');

        $Setting = Setting::select('terms_condition')->first();
        return view('frontend.terms', ['setting' => $Setting]);
    }

    public function privacy()
    {
        // forgot session data
        request()->session()->forget('title');

        $Setting = Setting::select('privacy_policy')->first();
        return view('frontend.privacy', ['setting' => $Setting]);
    }

    public function cookies()
    {
        $Setting = Setting::select('policy')->first();
        return view('frontend.cookies', ['setting' => $Setting]);
    }

    public function add_newsletter_data(Request $request)
    {
        // forgot session data
        request()->session()->forget('title');

        $CheckContact = Contact::where('email', $request->email)->count();

        if ($CheckContact == 0) {
            $Contact        = new Contact();
            $Contact->email = $request->email;
            $Contact->created_at = date('Y-m-d h:i:s');
            $Contact->updated_at = date('Y-m-d h:i:s');

            $Contact->save();
            return response()->json(['status' => true, 'message' => 'Uspešno ste se prijavili na prejemanje novic.'], 200); // Status code here

        } else {

            return response()->json(['status' => false, 'message' => 'sorry! this email has already exists'], 200); // Status code here

        }
    }

    public function find_company(Request $request)
    {
        // forgot session data
        request()->session()->forget('title');

        $CompanyDetails = Company::findOrfail($request->title);

        $char = ',';
        $char1 = '.';
        if (isset($CompanyDetails->slug) && $request->region_id == '') {
            $Allwords  = explode(' ', $CompanyDetails->slug);

            $CompanyListFind = Company::where('slug', $CompanyDetails->slug)->paginate(18);

            if (!isset($CompanyListFind[0])) {

                $Title = str_replace(',', '', $CompanyDetails->slug);
                $Title1 = str_replace('.', '', $CompanyDetails->slug);
                $CompanyList = Company::with(['comments' => function ($query) {
                    $query->where('status', '=', 1)->orderBy('created_at', 'desc');
                }])->with(['pictures' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with(['salaries' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with('region')->where('status', '=', 1)->where(function ($query) use ($char, $char1, $Title, $Title1) {
                    $query->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')
                        ->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%');
                })->paginate(18);
            } else {

                $CompanyList = $CompanyListFind;
            }

            if (!isset($CompanyList[0])) {

                krsort($Allwords);


                $CompanyList = Company::with(['comments' => function ($query) {
                    $query->where('status', '=', 1)->orderBy('created_at', 'desc');
                }])->with(['pictures' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with(['salaries' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with('region')->where('status', '=', 1)->where(function ($query) use ($Allwords) {

                    for ($i = 0; $i < count($Allwords); $i++) {
                        $query->orWhereRaw("find_in_set('" . $Allwords[$i] . "',search_title)");
                    }
                })->paginate(18);
            }
        } else if (isset($request->region_id) && isset($CompanyDetails->slug)) {

            $Title = str_replace(',', '', $CompanyDetails->slug);
            $Title1 = str_replace('.', '', $CompanyDetails->slug);

            $CompanyList = Company::with(['comments' => function ($query) {
                $query->where('status', '=', 1)->orderBy('created_at', 'desc');
            }])->with(['pictures' => function ($query) {
                $query->where('status', '=', 1);
            }])->with(['salaries' => function ($query) {
                $query->where('status', '=', 1);
            }])->with('region')->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%')->where('region_id', $request->region_id)->where('status', 1)->paginate(18);
        } else if (isset($request->region_id) && $CompanyDetails->slug == '') {

            $CompanyList = Company::with(['comments' => function ($query) {
                $query->where('status', '=', 1)->orderBy('created_at', 'desc');
            }])->with(['pictures' => function ($query) {
                $query->where('status', '=', 1);
            }])->with(['salaries' => function ($query) {
                $query->where('status', '=', 1);
            }])->with('region')->where('region_id', $request->region_id)->where('status', 1)->paginate(18);
        } else {

            $CompanyList = Company::with(['comments' => function ($query) {
                $query->where('status', '=', 1)->orderBy('created_at', 'desc');
            }])->with(['pictures' => function ($query) {
                $query->where('status', '=', 1);
            }])->with(['salaries' => function ($query) {
                $query->where('status', '=', 1);
            }])->with('region')->where('status', 1)->paginate(18);
        }

        $pagination = '';

        if ($CompanyList->hasPages()) {

            $pagination .= '<ul class="pagination pagination">';


            if ($CompanyList->onFirstPage()) {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
            } else {

                $PrevPageExplode = explode('=', $CompanyList->previousPageUrl());
                $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="pagination(' . $PrevPageExplode[1] . ')" rel="prev">&laquo;</a></li>';
            }

            foreach (range(1, $CompanyList->lastPage()) as $i) {
                if ($i >= $CompanyList->currentPage() - 4 && $i <= $CompanyList->currentPage() + 4) {
                    if ($i == $CompanyList->currentPage()) {
                        $pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                    } else {
                        $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="pagination(' . $i . ')">' . $i . '</a></li>';
                    }
                }
            }

            if ($CompanyList->hasMorePages()) {
                $NextPageExplode = explode('=', $CompanyList->nextPageUrl());

                $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)"  onclick="pagination(' . $NextPageExplode[1] . ')" rel="next">&raquo;</a></li>';
            } else {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
            }
            $pagination .= '</ul>';
        }

        return response()->json([
            'status' => true,
            'message' => 'All Companies',
            'data'  => $CompanyList,
            'pagination' => $pagination
        ], 200);
    }

    public function filter_company(Request $request)
    {

        $CompanyList = Company::filter();

        $GetData = $request->except(['_token']);

        $Params = '?=rating=' . $GetData['rating'] . '&type=' . $GetData['type'] . '&region=' . $GetData['type'] . '&category=' . $GetData['category'];

        $pagination = '';

        if ($CompanyList->hasPages()) {

            $pagination .= '<ul class="pagination pagination">';


            if ($CompanyList->onFirstPage()) {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
            } else {

                $PrevPageExplode = explode('=', $CompanyList->previousPageUrl());
                $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="paginationFilter(' . $PrevPageExplode[1] . ',' . $Params . ')" rel="prev">&laquo;</a></li>';
            }

            foreach (range(1, $CompanyList->lastPage()) as $i) {
                if ($i >= $CompanyList->currentPage() - 4 && $i <= $CompanyList->currentPage() + 4) {
                    if ($i == $CompanyList->currentPage()) {
                        $pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                    } else {
                        $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="paginationFilter(' . $i . ',' . $Params . ')">' . $i . '</a></li>';
                    }
                }
            }

            if ($CompanyList->hasMorePages()) {
                $NextPageExplode = explode('=', $CompanyList->nextPageUrl());

                $pagination .= '<li class="page-item"><a class="page-link" href="javascript:void(0)"  onclick="paginationFilter(' . $NextPageExplode[1] . ',' . $Params . ')" rel="next">&raquo;</a></li>';
            } else {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
            }
            $pagination .= '</ul>';
        }

        return response()->json([
            'status' => true,
            'message' => 'Advance Filtered Companies',
            'data'  => $CompanyList,
            'pagination' => $pagination
        ], 200);
    }

    public function commentSubmit(Request $request)
    {
        // forgot session data
        request()->session()->forget('title');

        $validation = Validator::make(
            $request->all(),
            [
                'keyword'    => 'required',
                'imate_place'    => 'required',
                'verify'    => 'required',
            ],
            [
                'keyword.required' => 'Napišite ime podjetja',
                'verify.required' => 'Morate se strinjati z našimi pogoji',
                'imate_place.required' => 'imate plačane is required',

            ]
        );

        if ($validation->fails()) {

            return response()->json([
                'status' => false,
                'message' => $validation->messages()->all(),
            ], 200);

            // return $this->throwValidation($validation->messages()->all());
        }

        try {
            if ($request->type == "home") {
                $Company = Company::findOrfail($request->keyword);
            } else {

                $Company = Company::where('slug', $request->keyword)->select('id')->first();
            }

            $CompanyComment                                 = new CompanyComments();
            $CompanyComment->added_by                       = null;
            $CompanyComment->ip_address                     = $request->ip();
            $CompanyComment->company_id                     = $Company->id;
            $CompanyComment->good_stuff                     = isset($request->good_stuff) ? $request->good_stuff : null;
            $CompanyComment->bad_things                     = isset($request->bad_things) ? $request->bad_things : null;
            $CompanyComment->management_advice              = isset($request->management_advice) ? $request->management_advice : null;
            $CompanyComment->full_response                  = $request->all();
            $CompanyComment->full_response_by_user          = $request->all();
            $CompanyComment->status                         = 2;

            if ($CompanyComment->save()) {
                if ($request->amount != null) {
                    $CompanySalaries                         = new CompanySalaries();
                    $CompanySalaries->company_comment_id     = $CompanyComment->id;
                    $CompanySalaries->company_id             = $Company->id;
                    $CompanySalaries->workplace              = isset($request->amount) ? $request->amount : null;
                    $CompanySalaries->avarage_salary         = isset($request->amount) ? $request->amount : null;
                    $CompanySalaries->min_salary             = isset($request->amount) ? $request->amount : null;
                    $CompanySalaries->max_salary             = isset($request->amount) ? $request->amount : null;
                    $CompanySalaries->added_by               = null;
                    $CompanySalaries->status                 = 2;

                    $CompanySalaries->save();
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Hvala za vaš komentar, objavljen bo v kratkem.',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Oprostite ! Vaš komentar ni bil potrjen.',
                ], 200);
            }
        } catch (\Illuminate\Database\QueryException $exception) {

            return response()->json([
                'status' => false,
                'message' => 'Sorry! something error found.',
            ], 200);
        }
    }


    public function all_companies(Request $request)
    {
        if ($request->session()->has('title')) {
            $request->title = $request->session()->get('title');
        }

        $char = ',';
        $char1 = '.';

        // $ids = $this->getTopComapnies();

        if (isset($request->title) && $request->region_id == '') {
            $Allwords  = explode(' ', $request->title);

            $CompanyListFind = Company::where('slug', $request->title)->paginate(18);

            if (!isset($CompanyListFind[0])) {

                $Title = str_replace(',', '', $request->title);
                $Title1 = str_replace('.', '', $request->title);
                $CompanyList = Company::with(['comments' => function ($query) {
                    $query->where('status', '=', 1)->orderBy('created_at', 'desc');
                }])->with(['pictures' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with(['salaries' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with('region')->where('status', '=', 1)->where(function ($query) use ($char, $char1, $Title, $Title1) {
                    $query->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')
                        ->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%');
                })->orderBy('rating', 'DESC')->paginate(18);

                // ->orderByRaw('FIELD (id, ' . implode(', ', $ids) . ') DESC')->paginate(18);
            } else {

                $CompanyList = $CompanyListFind;
            }

            if (!isset($CompanyList[0])) {

                krsort($Allwords);

                $CompanyList = Company::with(['comments' => function ($query) {
                    $query->where('status', '=', 1)->orderBy('created_at', 'desc');
                }])->with(['pictures' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with(['salaries' => function ($query) {
                    $query->where('status', '=', 1);
                }])->with('region')->where('status', '=', 1)->where(function ($query) use ($Allwords) {

                    for ($i = 0; $i < count($Allwords); $i++) {
                        $query->orWhereRaw("find_in_set('" . $Allwords[$i] . "',search_title)");
                    }
                })->orderBy('rating', 'DESC')->paginate(18);
            }
        } else if (isset($request->region_id) && isset($request->title)) {

            $Title = str_replace(',', '', $request->title);
            $Title1 = str_replace('.', '', $request->title);

            $CompanyList = Company::with(['comments' => function ($query) {
                $query->where('status', '=', 1)->orderBy('created_at', 'desc');
            }])->with(['pictures' => function ($query) {
                $query->where('status', '=', 1);
            }])->with(['salaries' => function ($query) {
                $query->where('status', '=', 1);
            }])->with('region')->where(\DB::raw("REPLACE(title, '$char', '')"), 'like', '%' . $Title . '%')->orWhere(\DB::raw("REPLACE(title, '$char1', '')"), 'like', '%' . $Title1 . '%')->where('region_id', $request->region_id)->where('status', 1)->orderBy('rating', 'DESC')->paginate(18);
        } else if (isset($request->region_id) && $request->title == '') {

            $CompanyList = Company::with(['comments' => function ($query) {
                $query->where('status', '=', 1)->orderBy('created_at', 'desc');
            }])->with(['pictures' => function ($query) {
                $query->where('status', '=', 1);
            }])->with(['salaries' => function ($query) {
                $query->where('status', '=', 1);
            }])->with('region')->where('region_id', $request->region_id)->where('status', 1)->orderBy('rating', 'DESC')->paginate(18);
        } else {
            $CompanyList = Company::with(['comments' => function ($query) {
                $query->where('status', '=', 1)->orderBy('created_at', 'desc');
            }])->with(['pictures' => function ($query) {
                $query->where('status', '=', 1);
            }])->with(['salaries' => function ($query) {
                $query->where('status', '=', 1);
            }])->with('region')->where('status', 1)->orderBy('rating', 'DESC')->paginate(18);
        }

        // print_r($CompanyList);
        // die;


        $pagination = '';

        if ($CompanyList->hasPages()) {

            $pagination .= '<ul class="pagination pagination">';


            if ($CompanyList->onFirstPage()) {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
            } else {

                $PrevPageExplode = explode('=', $CompanyList->previousPageUrl());
                $pagination .= '<li class="page-item"><a class="page-link" href="' . route('podjetja', ["page" => $PrevPageExplode[1]]) . '" onclick="pagination(' . $PrevPageExplode[1] . ')" rel="prev">&laquo;</a></li>';
            }

            foreach (range(1, $CompanyList->lastPage()) as $i) {
                if ($i >= $CompanyList->currentPage() - 4 && $i <= $CompanyList->currentPage() + 4) {
                    if ($i == $CompanyList->currentPage()) {
                        $pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                    } else {
                        $pagination .= '<li class="page-item"><a class="page-link" href="' . route('podjetja', ["page" => $i]) . '" onclick="pagination(' . $i . ')">' . $i . '</a></li>';
                    }
                }
            }

            if ($CompanyList->hasMorePages()) {
                $NextPageExplode = explode('=', $CompanyList->nextPageUrl());

                $pagination .= '<li class="page-item"><a class="page-link" href="' . route('podjetja', ["page" => $NextPageExplode[1]]) . '"  onclick="pagination(' . $NextPageExplode[1] . ')" rel="next">&raquo;</a></li>';
            } else {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
            }
            $pagination .= '</ul>';
        }

        if ($pagination == '') {
            // forgot session data
            request()->session()->forget('title');
        }


        return response()->json([
            'status' => true,
            'message' => 'All Companies',
            'data'  => $CompanyList,
            'pagination' => $pagination
        ], 200);
    }

    public function top_companies(Request $request)
    {

        $TopCompanyList = Company::with(['comments' => function ($query) {
            $query->where('status', '=', 1);
        }])->with(['pictures' => function ($query) {
            $query->where('status', '=', 1);
        }])->with(['salaries' => function ($query) {
            $query->where('status', '=', 1);
        }])->with('region')->where('status', 1)->where('rating', '>', 3)->orderBy('rating', 'DESC')->paginate(18);

        $pagination = '';

        if ($TopCompanyList->hasPages()) {

            $pagination .= '<ul class="pagination pagination">';


            if ($TopCompanyList->onFirstPage()) {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
            } else {

                $PrevPageExplode = explode('=', $TopCompanyList->previousPageUrl());
                $pagination .= '<li class="page-item"><a class="page-link" href="' . route('dobra-zaposlitev', ["page" => $PrevPageExplode[1]]) . '" onclick="pagination(' . $PrevPageExplode[1] . ')" rel="prev">&laquo;</a></li>';
            }

            foreach (range(1, $TopCompanyList->lastPage()) as $i) {
                if ($i >= $TopCompanyList->currentPage() - 4 && $i <= $TopCompanyList->currentPage() + 4) {
                    if ($i == $TopCompanyList->currentPage()) {
                        $pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                    } else {
                        $pagination .= '<li class="page-item"><a class="page-link" href="' . route('dobra-zaposlitev', ["page" => $i]) . '" onclick="pagination(' . $i . ')">' . $i . '</a></li>';
                    }
                }
            }

            if ($TopCompanyList->hasMorePages()) {
                $NextPageExplode = explode('=', $TopCompanyList->nextPageUrl());

                $pagination .= '<li class="page-item"><a class="page-link" href="' . route('dobra-zaposlitev', ["page" => $NextPageExplode[1]]) . '"  onclick="pagination(' . $NextPageExplode[1] . ')" rel="next">&raquo;</a></li>';
            } else {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
            }
            $pagination .= '</ul>';
        }

        if ($pagination == '') {
            // forgot session data
            request()->session()->forget('title');
        }


        return response()->json([
            'status' => true,
            'message' => 'All Top Companies',
            'data'  => $TopCompanyList,
            'pagination' => $pagination
        ], 200);
    }

    public function search_company(Request $request)
    {
        $request->session()->put('title', $request->title);
        
        $ArchivedData                   = new ArchivedData();
        $ArchivedData->search_key       = $request->title;
        $ArchivedData->date             = date('Y-m-d');
        $ArchivedData->created_at       = date('Y-m-d H:i:s');
        $ArchivedData->updated_at       = date('Y-m-d H:i:s');
        $ArchivedData->save();

        return response()->json([
            'status' => true,
            'message' => 'Search Companies',
            'url'  => route('podjetja'),
        ], 200);
    }
}
