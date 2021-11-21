<?php
use App\Models\Official;
use App\Models\Resident;
use App\Models\IssueCertificate;
use App\Models\Record;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ResidentController,
    OfficialController,
    IssueCertificateController,
    CaseRecordController,
    NotificationController,
    PageController
};

    
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        $officials = Official::get();
        $record = Record::count();
        $issue_all = IssueCertificate::count();
        $count_resident = Resident::count();
        $count_official = $officials->count();

        return view('home',compact('officials','count_official','count_resident','issue_all','record'));
    });
    Route::prefix('admin')->group(function(){
        Route::get('brgy/info', [PageController::class, 'showInfo'])->name('brgy.info');
        Route::post('update/brgy/info', [PageController::class, 'updateInfo'])->name('update.info');

        //route crud for residents
        Route::get('show/registration/residents',function(){return view('add-residents');})->name('show.registration.residents');
        Route::post('add/resident', [ResidentController::class, 'store'])->name('add.residents');
        Route::delete('delete/resident', [ResidentController::class, 'destroy'])->name('delete.resident');
        Route::get('list/residents', [ResidentController::class, 'index'])->name('list.residents');
        Route::get('resident/profile/{id}', [ResidentController::class, 'show'])->name('resident.profile'); //with case data
        Route::get('resident/info/{id}', [ResidentController::class, 'edit'])->name('edit.resident');
        Route::put('resident/info/{id}', [ResidentController::class, 'update'])->name('update.resident');

        //route crud for Officials
        Route::get('list/official', [OfficialController::class, 'index'])->name('brgy.manage-offcials');
        Route::post('add/official', [OfficialController::class, 'store'])->name('add.official');
        Route::delete('delete/official', [OfficialController::class, 'destroy'])->name('delete.official');
        Route::put('official/info', [OfficialController::class, 'update'])->name('update.official');
        Route::get('list/official/term', [OfficialController::class, 'officialsTermList'])->name('brgy.official');

        //issue certificate
        Route::get('list/residents/certificate', [IssueCertificateController::class, 'index'])->name('issue.certificate');
        Route::get('list/generated/certificate', [IssueCertificateController::class, 'listGenCertificate'])->name('gen.certificate');
        Route::post('generate/certificate/records', [IssueCertificateController::class, 'store'])->name('generate.certificate');

        //print certificate
        Route::get('print/clearance/certificate/{id}', [IssueCertificateController::class, 'printClearance'])->name('print.clearance');
        Route::get('print/business/certificate/{id}', [IssueCertificateController::class, 'printBusiness'])->name('print.business');
        Route::get('print/indigency/certificate/{id}', [IssueCertificateController::class, 'printIndigency'])->name('print.indigency');

        //case record
        Route::get('list/case/records', [CaseRecordController::class, 'index'])->name('list.records');
        Route::post('added/case/records', [CaseRecordController::class, 'store'])->name('add.records');
        Route::get('view/resident/records/{id}', [CaseRecordController::class, 'show'])->name('show.records');
        Route::get('edit/resident/records/{id}', [CaseRecordController::class, 'edit'])->name('edit.records');
        Route::put('udpate/resident/records/{id}', [CaseRecordController::class, 'update'])->name('update.records');
        Route::delete('delete/resident/records', [CaseRecordController::class, 'destroy'])->name('delete.records');

        //sms notification
        Route::get('list/notif/records', [NotificationController::class, 'index'])->name('list.notif');
        Route::delete('list/notif/records/{id}', [NotificationController::class, 'destroy'])->name('del.notif');
        Route::get('fire/notif/form', [NotificationController::class, 'fireForm'])->name('fire.form');
        Route::post('flood/notif', [NotificationController::class, 'floodNotif'])->name('flood.notif');

    });
});
