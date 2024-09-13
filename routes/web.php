<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCRUDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;

// Admin Protected Routes
Route::middleware([AuthMiddleware::class])->group(function () {

//Admin view routes
Route::get('/Blank', function () { return view('Admin.blank'); })->name('blankpage1');
Route::get('/Admin/Dashboard', function () { return view('Admin.index'); })->name('dashboard');
Route::get('/Verification/Request', function () { return view('Admin.verifiedrequests'); })->name('verifiedrequests');
Route::get('/Verified/Agencies', function () { return view('Admin.verifiedagencies'); })->name('verifiedagencies');
Route::get('/Unverified/Agencies', function () { return view('Admin.unverifiedagencies'); })->name('unverifiedagencies');
Route::get('/Admin/SkillAssessment', function () { return view('Admin.SkillAssessment'); })->name('adminskillassessment');
Route::get('/Admin/Jobseeker', function () { return view('Admin.jobseeker'); })->name('jobseeker');
Route::get('/Admin/JobCategory', function () { return view('Admin.jobcategory'); })->name('jobcategory');
Route::get('/Admin/Administrators', function () { return view('Admin.admins'); })->name('administrators');

//Admin view
Route::get('/Admin/Settings', [AdminController::class, 'showAdminDetails'])->name('adminsettings');
Route::get('/Admin/AddAdministrators', [AdminController::class, 'showAllAdmins'])->name('administrators');
Route::post('/Admin/EditAdministrators', [AdminController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::delete('/Admin/DeleteAdministrator', [AdminController::class, 'DeleteAdmin'])->name('DeleteAdmin');

//Jobseekers Admin view
Route::get('/Job/Seekers', [AdminCRUDController::class, 'getJobseekers'])->name('jobseekers');

//Job Categories Admin View
Route::get('/Job/Categories', [AdminCRUDController::class, 'getJobCategories'])->name('jobcategories');

//Get ADmin data to populate datatable
Route::get('/Admin/Accounts', [AdminCRUDController::class, 'getAdminData'])->name('getAdminData');
Route::get('/admin/get/{id}', [AdminCRUDController::class, 'getAdmin']);
Route::delete('/Admin/Delete/{id}', [AdminCRUDController::class, 'deleteAdminData'])->name('deleteAdminData');


//Admin Profile Settings
Route::post('/Admin/UpdateSettings', [AdminController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::post('/Admin/UpdatePassword', [AdminController::class, 'UpdateAdminPassword'])->name('UpdateAdminPassword');
Route::post('/Admin/ProfilePic', [AdminController::class, 'UpdateAdminProfilePic'])->name('UpdateAdminProfilePic');

//Job Category admin controller routes
Route::post('/Admin/CreateJobCategory', [AdminCRUDController::class, 'CreateJobCategory'])->name('CreateJobCategory');
Route::delete('/Job/Categories/{id}', [AdminCRUDController::class, 'deleteJobCategory'])->name('DeleteJobCategory');

//Administrator post controller routes
Route::post('/Admin/Create', [AdminController::class, 'createAdmin'])->name('createAdmin');
});

//Admin Login and Logouts
Route::post('/LoginAdmin', [AuthController::class, 'LoginAdmin'])->name('LoginAdmin');
Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::get('/Admin/Login', function () { return view('Admin.Login'); })->name('AdminLogin');

//Agency Login and Signup
Route::post('/AgencyRegister', [AgencyController::class, 'RegisterAgency'])->name('RegisterAgency');
Route::post('/LoginAgency', [AuthController::class, 'LoginAgency'])->name('LoginAgency');
Route::post('/UpdateAgency', [AgencyController::class, 'UpdateAgency'])->name('UpdateAgency');

//Agency Job details creation done, update $ delete: pending
Route::post('/Agency', [AgencyController::class, 'Agency'])->name('Agency');

//Agency update password: pending
Route::post('/UpdatePassword', [AgencyController::class, 'updatePassword'])->name('UpdatePassword');

// Agency Protected routes
Route::get('/Agency/Dashboard', [AuthController::class, 'dashboard'])->name('agencydashboard');
Route::get('/Agency/Notification', [AuthController::class, 'notification'])->name('agencynotif');
Route::get('/Agency/Settings', [AuthController::class, 'settings'])->name('agencysettings');
Route::get('/Agency/JobPosting', [AuthController::class, 'jobposting'])->name('agencyjobposting');
Route::get('/Agency/SkillAssessment', [AuthController::class, 'skillAssessment'])->name('agencyskillassess');
Route::get('/Agency/SubmittedApplications', [AuthController::class, 'submittedApplications'])->name('submittedapplications');
Route::get('/Agency/SASCompleted', [AuthController::class, 'sasCompleted'])->name('sascompleted');
Route::get('/Agency/ScreenedApplicants', [AuthController::class, 'screenedApplicants'])->name('screenedapplicants');
Route::get('/Agency/ApprovedApplications', [AuthController::class, 'approvedApplications'])->name('approvedapplications');
Route::post('/logoutAgency', [AuthController::class, 'logoutAgency'])->name('logoutAgency');

// Jobseeker Routes
Route::get('/Blank2', function () { return view('Jobseeker.blank'); })->name('blankpage');
Route::get('/', function () { return view('Jobseeker.index'); })->name('homepage');
Route::get('/About', function () { return view('Jobseeker.about'); })->name('about');
Route::get('/SignUp', function () { return view('Jobseeker.signup'); })->name('signup');
Route::get('/AgencySignUp', function () { return view('Jobseeker.agencysignup'); })->name('agencysignup');
Route::get('/AgencyLogin', function () { return view('Jobseeker.agencylogin'); })->name('agencylogin');
Route::get('/Login', function () { return view('Jobseeker.Login'); })->name('login');
Route::get('/Jobs', function () { return view('Jobseeker.jobs'); })->name('jobs');
Route::get('/JobsList', function () { return view('Jobseeker.jobslist'); })->name('jobslist');
Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');
Route::get('/Agency', function () { return view('Jobseeker.agencies'); })->name('agencies');
Route::get('/AgencyFeedback', function () { return view('Jobseeker.agencyfeedback'); })->name('agencyfeedback');
Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');
Route::get('/404', function () { return view('Jobseeker.404'); })->name('404');
Route::get('/Profile', function () { return view('Jobseeker.profile'); })->name('profile');
Route::get('/Settings', function () { return view('Jobseeker.settings'); })->name('settings');

// Jobseeker Page Controllers
Route::post('/', [JobseekerController::class, 'create'])->name('jobseekersCreate');
Route::post('/LoginJobseeker', [AuthController::class, 'LoginJobseeker'])->name('LoginJobseeker');
Route::post('/LogoutJobseeker', [AuthController::class, 'LogoutJobseeker'])->name('LogoutJobseeker');
Route::get('/Profile', [JobseekerController::class, 'getJobseeker'])->name('profile');
Route::post('/Update', [JobseekerController::class, 'updateJobseeker'])->name('updateJobseeker');
Route::post('/updateJsPassword', [JobseekerController::class, 'updateJsPassword'])->name('updateJsPassword');
Route::post('/uploadResume', [JobseekerController::class, 'uploadResume'])->name('uploadResume');