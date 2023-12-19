<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommunityProjectsController;
use App\Http\Controllers\ControlMeasureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HumanWildlifeConflictController;
use App\Http\Controllers\HuntingController;
use App\Http\Controllers\HWCOutcomeController;
use App\Http\Controllers\HWCTypeController;
use App\Http\Controllers\IllegalActivitiesController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\MitigationMeasureController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeciesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/table', [AdminController::class, 'table']);
Route::get('/admin/form', [AdminController::class, 'form']);
Route::get('/admin/pickers', [AdminController::class, 'pickers']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::get('/administration/dashboard', [AdminController::class, 'dashboard'])->name('administration.dashboard');

Route::get('/dashboard', function () {
    //get the logged in user's organisations
    $orgs = DB::table('organization_users')->where('user_id', Auth::id())->get();
    $data = [];

    //put the organisation, user and role into the collection
    foreach ($orgs as $org) {
        $data[] = [
            'org' => DB::table('organizations')->where('id', $org->organization_id)->first(),
            'user' => DB::table('users')->where('id', $org->user_id)->first(),
            'role' => DB::table('roles')->where('id', $org->role_id)->first()
        ];
    }
    return view('dashboard')->with('data', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/administration/hwc/outcomes', HWCOutcomeController::class);
Route::resource('/administration/hwc/types', HWCTypeController::class);
Route::resource('/administration/pac/mitigation-measures', MitigationMeasureController::class);
Route::resource('/administration/pac/control-measures', ControlMeasureController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //organization controller and methods here
    Route::get('/administration/organizations', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/administration/organizations/add', [OrganizationController::class, 'addOrganisation'])->name('organizations.add');
    Route::get('/administration/organizations/parameters', [OrganizationController::class, 'parameters'])->name('organizations.parameters');
    Route::get('/administration/organizations/roles', [OrganizationController::class, 'roles'])->name('organizations.roles');
    Route::get('/administration/organizations/accounts', [OrganizationController::class, 'userAccounts'])->name('organizations.accounts');
    Route::post('/administration/organizations/parameters', [OrganizationController::class, 'saveOrgType'])->name('organizations.create');

    //wildlife route
    Route::get('/administration/wildlife/species', [SpeciesController::class, 'index'])->name('wildlife.species');
    Route::get('/administration/wildlife/automated-allocation', [SpeciesController::class, 'automatedAllocation'])->name('wildlife.automated-allocation');
    Route::get('/administration/wildlife/manual-allocation', [SpeciesController::class, 'manualAllocation'])->name('wildlife.manual-allocation');

    //human wildlife conflict
    Route::get('/administration/human-wildlife-conflict/record-incident', [HumanWildlifeConflictController::class, 'index'])->name('human-wildlife-conflict.record-incident');
    Route::get('/administration/human-wildlife-conflict/outcomes', [HumanWildlifeConflictController::class, 'outcomes'])->name('human-wildlife-conflict.outcomes');
    Route::get('/administration/human-wildlife-conflict/types', [HumanWildlifeConflictController::class, 'types'])->name('human-wildlife-conflict.types');
    Route::get('/administration/human-wildlife-conflict/marking', [HumanWildlifeConflictController::class, 'marking'])->name('human-wildlife-conflict.marking');
    Route::get('/administration/human-wildlife-conflict/security', [HumanWildlifeConflictController::class, 'security'])->name('human-wildlife-conflict.security');
    Route::get('/administration/human-wildlife-conflict/campaigns', [HumanWildlifeConflictController::class, 'campaigns'])->name('human-wildlife-conflict.campaigns');

    //problematic animal control
    Route::get('/administration/problematic-animal-control/record-incident', [ControlMeasureController::class, 'index'])->name('problematic-animal-control.record-incident');
    Route::get('/administration/problematic-animal-control/incidents', [ControlMeasureController::class, 'incidents'])->name('problematic-animal-control.incidents');
    Route::get('/administration/problematic-animal-control/mitigation-measures', [ControlMeasureController::class, 'mitigationMeasures'])->name('problematic-animal-control.mitigation-measures');
    Route::get('/administration/problematic-animal-control/control-measures', [ControlMeasureController::class, 'controlMeasures'])->name('problematic-animal-control.control-measures');

    //illegal activities methods
    Route::get('/administration/illegal-activities/incidents', [IllegalActivitiesController::class, 'controlMeasures'])->name('illegal-activities.incidents');
    Route::get('/administration/illegal-activities/illegal/investigations', [IllegalActivitiesController::class, 'investigations'])->name('illegal-activities.illegal.investigations');
    Route::get('/administration/illegal-activities/illegal/case-management', [IllegalActivitiesController::class, 'caseManagement'])->name('illegal-activities.illegal.case-management');

    //marketing controller here
    Route::get('/administration/marketing/rdcs', [MarketingController::class, 'rdcs'])->name('marketing.rdcs');
    Route::get('/administration/marketing/quotas', [MarketingController::class, 'quotas'])->name('marketing.quotas');
    Route::get('/administration/marketing/negotiate', [MarketingController::class, 'negotiate'])->name('marketing.negotiate');
    Route::get('/administration/marketing/contracts', [MarketingController::class, 'contracts'])->name('marketing.contracts');
    Route::get('/administration/marketing/buyers', [MarketingController::class, 'buyers'])->name('marketing.buyers');
    Route::get('/administration/marketing/trophy-fees', [MarketingController::class, 'trophyFees'])->name('marketing.trophy-fees');

    //hunting controller here
    Route::get('/administration/hunting/records', [HuntingController::class, 'records'])->name('hunting.records');
    Route::get('/administration/hunting/activities', [HuntingController::class, 'activities'])->name('hunting.activities');
    Route::get('/administration/hunting/income', [HuntingController::class, 'income'])->name('hunting.income');
    Route::get('/administration/hunting/revenue-sources', [HuntingController::class, 'revenueSources'])->name('hunting.revenue-sources');
    Route::get('/administration/hunting/trophy-fees', [HuntingController::class, 'trophyFees'])->name('hunting.trophy-fees');
    Route::get('/administration/hunting/ivory-sales', [HuntingController::class, 'ivorySales'])->name('hunting.ivory-sales');
    Route::get('/administration/hunting/meat-sales', [HuntingController::class, 'meatSales'])->name('hunting.meat-sales');
    Route::get('/administration/hunting/film-fees', [HuntingController::class, 'filmFees'])->name('hunting.film-fees');
    Route::get('/administration/hunting/concession-fees', [HuntingController::class, 'concessionFees'])->name('hunting.concession-fees');
    Route::get('/administration/hunting/analytics', [HuntingController::class, 'analytics'])->name('hunting.analytics');
    Route::get('/administration/hunting/reports/activities', [HuntingController::class, 'activityReports'])->name('hunting.reports.activities');
    Route::get('/administration/hunting/reports/revenue', [HuntingController::class, 'revenueAnalysis'])->name('hunting.reports.revenue');

    //community projects routes
    Route::get('/administration/community-projects/projects', [CommunityProjectsController::class, 'projects'])->name('community-projects.projects');
    Route::get('/administration/community-projects/participants', [CommunityProjectsController::class, 'participants'])->name('community-projects.participants');
    Route::get('/administration/community-projects/funding', [CommunityProjectsController::class, 'funding'])->name('community-projects.funding');
    Route::get('/administration/community-projects/progress', [CommunityProjectsController::class, 'progress'])->name('community-projects.progress');
    Route::get('/administration/community-projects/reports', [CommunityProjectsController::class, 'reports'])->name('community-projects.reports');

    //admin.parameters.store route
    Route::post('/administration/parameters', [OrganizationController::class, 'storeFieldType'])->name('admin.parameters.store');
    Route::post('/administration/organisation/roles', [OrganizationController::class, 'storeOrganisationRole'])->name('admin.roles.store');

    //organisation routes
    Route::get('/{organization}/dashboard', [DashboardController::class, 'dashboardHome'])->name('dashboard.home');

});

require __DIR__ . '/auth.php';

//starting the dashboard routes here
Route::get('/{organization}/dashboard', [DashboardController::class, 'dashboardHome'])->name('dashboard.home');
Route::get('/{organization}/wildlife-species', [DashboardController::class, 'wildlifeSpeciesHome'])->name('wildlife.home');
Route::get('/{organization}/human-wildlife-conflict', [DashboardController::class, 'humanWildlifeConflictHome'])->name('hwc.home');
Route::get('/{organization}/human-wildlife-conflict/create', [DashboardController::class, 'createHumanWildlifeConflict'])->name('hwc.create');
Route::get('/{organization}/problematic-animal-control', [DashboardController::class, 'problematicAnimalControlHome'])->name('pac.home');

//post routes to save stuff
Route::post('/human-wildlife-conflict/create', [DashboardController::class, 'storeHumanWildlifeConflict'])->name('hwc.incidents.store');
