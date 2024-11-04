<?php



use Illuminate\Support\Facades\Route;
//PhpMailer
//use App\Http\Controllers\PHPMailerController;
//
use App\Http\Controllers\HowToPayController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ClientCommunicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MyPetsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ListofappointmentController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\TreatmentController;

use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ChatifyController;
use App\Actions\Fortify\CreateNewUser;

//adminnnn
use App\Http\Controllers\AdminNavController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminWelcomeController;
use App\Http\Controllers\MonthlyVaccinatedController;
use App\Http\Controllers\MonthlyConsultationController;
use App\Http\Controllers\MonthlyDewormingController;
use App\Http\Controllers\MonthlyPetGroomingController;
use App\Http\Controllers\MonthlyCancelledController;
use App\Http\Controllers\AdminCommunicationController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\ClientAccountListController;
use App\Http\Controllers\FullCalenderController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\checkConfirmationController;  
//adminn !>

//SuperAdmin
use App\Http\Controllers\SuperAdminWelcomeController;
use App\Http\Controllers\SuperAdminManageAccController;
use App\Http\Controllers\SuperAdminPaymentHistoryController;
use App\Http\ControllersAccountConfirmationController;


use App\Http\Controllers\AuthenticatedSessionController;
//calender 
use App\Http\Controllers\EventController;
//Date Picker funct
use App\Http\Controllers\checkDateController;
use App\Http\Controllers\DiagnosisController;

use App\Http\Controllers\ClinicDescriptionController;

            Route::get('/', function () {
                return view('welcome');
            });
           
           // require __DIR__.'/admin-auth.php';


  
         //  Route::post('/register', [CreateNewUser::class, 'create'])->name('register');

           Route::post('/register', [RegisterController::class, 'register'])->name('register');

           Route::get('/login', function(){
                return view('auth/login');
           })->name('login');
           

           Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
          
          
           Route::get('/register', function(){
            return view('auth/register');
            })->name('register');

            Route::middleware([
                'auth:sanctum',
                config('jetstream.auth_session'),
                'verified',
            ])->group(function () {
                Route::get('/WelcomeDigitalVeterinarayClinic', function () {
                    return view('dashboard');
                })->name('dashboard');

                




            });
            



Route::middleware(['auth'])->group(function () {
Route::resource(name:'ClientCommunication', controller:\App\Http\Controllers\ClientCommunicationController::class);
Route::resource(name:'Appointment', controller:\App\Http\Controllers\AppointmentController::class);
Route::resource(name:'MyPets', controller:\App\Http\Controllers\MyPetsController::class);
Route::resource(name:'Listofappointment', controller:\App\Http\Controllers\ListofappointmentController::class);
Route::resource(name:'Success', controller:\App\Http\Controllers\SuccessController::class);
//Route::resource(name:'Treatment', controller:\App\Http\Controllers\TreatmentController::class); removed
//Route::resource(name:'Diet', controller:\App\Http\Controllers\DietController::class); removed
Route::resource(name:'Prescription', controller:\App\Http\Controllers\PrescriptionController::class);
Route::resource(name:'HowToPay', controller:\App\Http\Controllers\HowToPayController::class);

//Modals managepetaccount
Route::post('/diagnoses/store', [DiagnosisController::class, 'store'])->name('diagnoses.store');
//calendar
Route::get('/calendar', function () {
  return view('calendar'); // Replace with the actual view name
});

// Define a route to fetch events by user ID

Route::get('/events', [EventController::class,  'getEvents']); // Adjust with your controller





//confirmation
// Route for confirming an account
Route::post('/superadmin/confirm-account/{id}', [SuperAdminManageAccController::class, 'confirmAccount'])
    ->name('superadmin.confirmAccount');
    //pphpmailer
Route::post('/SuperAdmin/send-email-alert/{id}', [SuperAdminManageAccController::class, 'sendEmailAlert'])->name('SuperAdmin.SuperAdminManageAcc');

//superadmin crud
Route::get('/superadmin/payments', [SuperAdminPaymentHistoryController::class, 'index'])->name('SuperAdmin.SuperAdminPaymentHistory.index');
Route::delete('/payments/{id}', [SuperAdminPaymentHistoryController::class, 'destroy'])->name('payments.destroy');

Route::put('/payments/{id}', [SuperAdminPaymentHistoryController::class, 'update'])->name('payments.update');


Route::post('/payments', [SuperAdminPaymentHistoryController::class, 'store'])->name('payments.store');
//Route::post('/dietplan/store', [DietPlanController::class, 'store'])->name('dietplan.store');


//Route::get('/mypets/{pet_name}/History', [HistoryController::class, 'index'])->name('MyPets.History.index');
Route::get('/mypets/{pet_id}/History', [HistoryController::class, 'index'])->name('MyPets.History.index');


// Route to handle the registration form submission


// User profile add description
Route::post('/store-pricing', [ClinicDescriptionController::class, 'storePricing'])->name('store.pricing');


//fetchdata to sucess//fetch to succuess//client appoimmnents features function 
Route::get('/Appointment/Success', [AppointmentController::class, 'success']);
Route::post('/Appointment', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/Success', [SuccessController::class, 'index'])->name('Success.index');

//listofappointemnts
Route::get('/Listofappointment', [ListofappointmentController::class, 'index'])->name('Listofappointment.index');


//Cancelled appoitments
Route::post('/Listofappointment', [ListofappointmentController::class, 'cancelAppointment'])->name('Listofappointment.cancel');




//admin  layout
Route::middleware(['auth',])->group(function () {
Route::get('VeterenaryClinic', [AdminWelcomeController::class, 'index'])->name('admin.AdminWelcome');   
//notficationbell

/// error nav links  need to fix 
Route::get('VeterenaryClinic/notif', [AdminNavController::class, 'index'])->name('AdminNav.admin-nav'); 


 //admincontroller
Route::resource('admin/AdminsDashboard', AdminDashboardController::class)->names(['index' => 'admin.AdminsDashboard.index',]);
Route::resource('admin/AdminCommunication', AdminCommunicationController::class)->names(['index' => 'admin.AdminCommunication.index',]);
Route::resource('admin/MonthlyVaccinated', MonthlyVaccinatedController::class)->names(['index' => 'admin.MonthlyVaccinated.index',]);
Route::resource('admin/MonthlyConsultation', controller:\App\Http\Controllers\MonthlyConsultationController::class)->names(['index' => 'admin.MonthlyConsultation.index',]);
Route::resource(name:'admin/MonthlyDeworming', controller:\App\Http\Controllers\MonthlyDewormingController::class)->names(['index' => 'admin.MonthlyDeworming.index',]);
Route::resource(name:'admin/MonthlyPetGrooming', controller:\App\Http\Controllers\MonthlyPetGroomingController::class)->names(['index' => 'admin.MonthlyPetGrooming.index',]);
Route::resource(name:'admin/MonthlyCancelled', controller:\App\Http\Controllers\MonthlyCancelledController::class)->names(['index' => 'admin.MonthlyCancelled.index',]);   
Route::resource(name:'admin/AdminAppointment', controller:\App\Http\Controllers\AdminAppointmentController::class)->names(['index' => 'admin.AdminAppointment.index',]);
Route::resource(name:'admin/AdminClientAccountList', controller:\App\Http\Controllers\ClientAccountListController::class)->names(['index' => 'admin.AdminClientAccountList.index',]);                         
Route::resource(name:'admin/AdminManagePetAccount', controller:\App\Http\Controllers\AdminManagePetAccountController::class)->names(['index' => 'admin.AdminManagePetAccount.index',]);                          





Route::resource(name:'events', controller:\App\Http\Controllers\EventController::class)->names(['index' => 'admin.FullCalender.index',]);  
/// !>

//checkDate
Route::post('/check-date', [checkDateController::class, 'checkDate'])->name('checkdate');

//adminappointment button done
Route::patch('/appointments/{id}/mark-done', [AdminAppointmentController::class, 'markAsDone']);
Route::delete('/appointments/{id}', [AdminAppointmentController::class, 'destroy'])->name('appointments.destroy');
Route::get('/appointments/stats', [AdminAppointmentController::class, 'getPatientStats'])->name('dashboard.stats'); //recieved data 
Route::get('/admin/AdminAppointment', [AdminAppointmentController::class, 'index'])->name('admin.AdminAppointment.index');





//get fetch
//Route::get('/admin/MonthlyVaccinated', [MonthlyVaccinatedController::class, 'index'])->name('admin.MonthlyVaccinated.index');
//get data exclusive for done vaccinated appoimtment 
Route::get('/admin/MonthlyVaccinated', [MonthlyVaccinatedController::class, 'getVaccinatedData'])->name('admin.MonthlyVaccinated.index');



// Route to display the Monthly Consultation page
//Route::get('/admin/MonthlyConsultation', [MonthlyConsultationController::class, 'getConsultationData'])->name('admin.MonthlyConsultation.index');

// Route to receive data for Monthly Consultation stats
Route::get('/admin/MonthlyConsultation', [MonthlyConsultationController::class, 'getConsultationData'])->name('admin.MonthlyConsultation.index');
// <monthly deworming get data ></monthly>
Route::get('/admin/MonthlyDeworming', [MonthlyDewormingController::class, 'getDewormingData'])->name('admin.MonthlyDeworming.index');
Route::get('/admin/MonthlyPetGrooming', [MonthlyPetGroomingController::class, 'getGroomingData'])->name('admin.MonthlyPetGrooming.index');

//client accounts 
Route::get('/admin/AdminClientAccountList', [ClientAccountListController::class, 'getClients'])->name('admin.AdminClientAccountList.index');
Route::delete('/clients/{id}', [ClientAccountListController::class, 'destroy'])->name('AdminClientAccountList.destroy');



// calendar routes
Route::get('fullcalender', [EventController::class, 'index'])->name('admin.FullCalendar.index');
//Route::get('fullcalender', [EventController::class, 'index'])->name('admin.FullCalender.index');
Route::post('fullcalenderAjax', [EventController::class, 'ajax'])->name('admin.FullCalender.ajax');


Route::get('/fullcalender', [AppointmentController::class, 'getCalendarEvents'])->name('calendar.events');


//Route::get('/events', [EventController::class, 'index'])->name('admin.FullCalender.index');
//Route::post('/events', [EventController::class, 'store'])->name('admin.FullCalender.store');
//Route::put('/events/{id}', [EventController::class, 'update'])->name('admin.FullCalender.update');
//Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('admin.FullCalender.delete');






Route::get('/check-confirmation', function () {
  return view('confirmation'); // Change this to your desired view
});


Route::post('/check-confirmation', [checkConfirmationController::class, 'confirmAccount'])->name('confirmation');





//SuperAdmin routes
Route::get('SuperAdmin/SuperAdminWelcome', [SuperAdminWelcomeController::class, 'index'])->name('SuperAdmin.SuperAdminWelcome');            
Route::resource('SuperAdmin/SuperAdminManageAcc', SuperAdminManageAccController::class)->names(['index' => 'SuperAdmin.SuperAdminManageAcc.index',]);
Route::resource('SuperAdmin/SuperAdminPaymentHistory', SuperAdminPaymentHistoryController::class)->names(['index' => 'SuperAdmin.SuperAdminPaymentHistory.index',]);

//Super Admin Manage Accounts --- table function
Route::get('SuperAdmin/SuperAdminManageAcc', [SuperAdminManageAccController::class, 'index'])->name('SuperAdmin.SuperAdminManageAcc.index');
Route::post('/superadmin/updateStatus/{id}', [SuperAdminManageAccController::class, 'updateStatus'])->name('superadmin.updateStatus');
Route::delete('/vetclinic/delete/{id}', [SuperAdminManageAccController::class, 'destroy'])->name('vetclinic.delete');
  });

//crud function my_pets
Route::get('pets/{id}/edit', [MyPetsController::class, 'edit'])->name('MyPets.edit');
Route::get('mypets/{id}/history', [MyPetsController::class, 'history'])->name('MyPets.history');
Route::get('/MyPets/{id}', [MyPetsController::class, 'destroy'])->name('MyPets.destroy');

});



route::get('auth/google',[GoogleController::class,'googlepage']);

route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

