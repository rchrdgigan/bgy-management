<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ResidentController,
    OfficialController,
    IssueCertificateController,
    CaseRecordController,
    NotificationController
};
    
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::prefix('admin')->group(function(){
        Route::get('brgy/info', function () {
            return view('brgy-info');
        })->name('brgy.info');

        Route::get('show/registration/residents', function () {
            return view('add-residents');
        })->name('show.registration.residents');
        

        //route crud for residents
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
        Route::get('print/business/certificate', [IssueCertificateController::class, 'printBusiness'])->name('print.business');
        Route::get('print/indigency/certificate', [IssueCertificateController::class, 'printIndigency'])->name('print.indigency');

        //case record
        Route::get('list/case/records', [CaseRecordController::class, 'index'])->name('list.records');
        Route::post('added/case/records', [CaseRecordController::class, 'store'])->name('add.records');
        Route::get('view/resident/records/{id}', [CaseRecordController::class, 'show'])->name('show.records');
        Route::get('edit/resident/records/{id}', [CaseRecordController::class, 'edit'])->name('edit.records');
        Route::put('udpate/resident/records/{id}', [CaseRecordController::class, 'update'])->name('update.records');
        Route::delete('delete/resident/records', [CaseRecordController::class, 'destroy'])->name('delete.records');

        //sms notification
        Route::get('list/notif/records', [NotificationController::class, 'index'])->name('list.notif');
        Route::get('fire/notif/form', [NotificationController::class, 'fireForm'])->name('fire.form');


    });
});
