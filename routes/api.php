<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{CountriesController,SchoolsController
    ,GradesController,StudentsController,Auth\AuthController
    ,TpCandidacyController,TpCandidateController,TpAuxCandidateVoteController
    ,TpAuxWhiteVoteController,TpCandidateGradeController,TpControlPanelController
    ,TpDegreesPerTableController,TpPollingStationController,TpJuryController
    ,TpSiteTableController,TpVoteController,TpWhiteVoteController,UserTypeController,
    TpVotingSiteController,VotingCodeController};


Route::prefix('v1')->group(function () {


         Route::post('register', [AuthController::class, 'register']);
         Route::post('login', [AuthController::class, 'login']);



        Route::middleware('jwt.verify')->group(function(){


            #Country
            Route::post('country/new', [CountriesController::class, 'createCountry'])->middleware('check.typeuser');
            Route::get('country/view', [CountriesController::class, 'viewCountry']);
            Route::get('country/list', [CountriesController::class, 'listCountries']);
            Route::delete('country/delete/{id}', [CountriesController::class, 'deleteCountry']);


            #School
            Route::post('school/new', [SchoolsController::class, 'createSchool'])->middleware('check.typeuser');
            Route::get('school/view', [SchoolsController::class, 'viewSchool']);
            Route::get('school/list', [SchoolsController::class, 'listSchool']);
            Route::put('school/update/{id}', [SchoolsController::class, 'updateSchool'])->middleware('check.typeuser');
            Route::delete('school/delete/{id}', [SchoolsController::class, 'deleteSchool'])->middleware('check.typeuser');

            #Grade
            Route::post('grade/new', [GradesController::class, 'createGrade']);

            #Student
            Route::post('student/new', [StudentsController::class, 'createStudent'])->middleware('check.typeuser');
            Route::get('student/view', [StudentsController::class, 'viewStudent']);
            Route::get('student/list', [StudentsController::class, 'listStudents']);
            Route::put('student/update/{id}', [StudentsController::class, 'updateStudent'])->middleware('check.typeuser');
            Route::delete('student/delete/{id}', [StudentsController::class, 'deleteStudent'])->middleware('check.typeuser');


            #tp_candidacies => TpCandidacy
            Route::post('candidacy/new', [TpCandidacyController::class, 'create'])->middleware('check.typeuser');
            Route::get('candidacy/view', [TpCandidacyController::class, 'view']);
            Route::get('candidacy/list', [TpCandidacyController::class, 'list']);

            #tp_candidates => TpCandidate
            Route::post('candidate/new', [TpCandidateController::class, 'create'])->middleware('check.typeuser');
            Route::get('candidate/view', [TpCandidateController::class, 'view']);
            Route::get('candidate/list', [TpCandidateController::class, 'list']);

            #tp_aux_candidate_votes => TpAuxCandidateVote
            Route::post('aux/candidate/new', [TpAuxCandidateVoteController::class, 'create'])->middleware('check.typeuser');
            Route::get('aux/candidate/view', [TpAuxCandidateVoteController::class, 'view']);
            Route::get('aux/candidate/list', [TpAuxCandidateVoteController::class, 'list']);

            #tp_aux_white_vote => TpAuxWhiteVoteController
            Route::post('aux/white/vote/new', [TpAuxWhiteVoteController::class, 'create'])->middleware('check.typeuser');
            Route::get('aux/white/vote/view', [TpAuxWhiteVoteController::class, 'view']);
            Route::get('aux/white/vote/list', [TpAuxWhiteVoteController::class, 'list']);

            #tp_candidate_grades => TpCandidateGrade
            Route::post('candidate/grade/new', [TpCandidateGradeController::class, 'create'])->middleware('check.typeuser');
            Route::get('candidate/grade/view', [TpCandidateGradeController::class, 'view']);
            Route::get('candidate/grade/list', [TpCandidateGradeController::class, 'list']);

            #tp_control_panel => tp_control_panel
            Route::post('control/panel/new', [TpControlPanelController::class, 'create'])->middleware('check.typeuser');
            Route::get('control/panel/view', [TpControlPanelController::class, 'view']);
            Route::get('control/panel/list', [TpControlPanelController::class, 'list']);

            #tp_degrees_per_table => TpDegreesPerTabl

            Route::post('degrees/new', [TpDegreesPerTableController::class, 'create'])->middleware('check.typeuser');
            Route::get('degrees/view', [TpDegreesPerTableController::class, 'view']);
            Route::get('degrees/list', [TpDegreesPerTableController::class, 'list']);

            // tp_polling_stations => TpPollingStation
            Route::post('tp/polling/new', [TpPollingStationController::class, 'create'])->middleware('check.typeuser');
            Route::get('tp/polling/view', [TpPollingStationController::class, 'view']);
            Route::get('tp/polling/list', [TpPollingStationController::class, 'list']);

            // tp_jury
            Route::post('tp/jury/new', [TpJuryController::class, 'create'])->middleware('check.typeuser');
            Route::get('tp/jury/view', [TpJuryController::class, 'view']);
            Route::get('tp/jury/list', [TpJuryController::class, 'list']);

            // tp_site_table

            Route::post('site/table/new', [TpSiteTableController::class, 'create'])->middleware('check.typeuser');
            Route::get('site/table/view', [TpSiteTableController::class, 'view']);
            Route::get('site/table/list', [TpSiteTableController::class, 'list']);

            // tp_votes
            Route::post('tp/vote/new', [TpVoteController::class, 'create'])->middleware('check.typeuser');
            Route::get('tp/vote/view', [TpVoteController::class, 'view']);
            Route::get('tp/vote/list', [TpVoteController::class, 'list']);

            // tp_white_vote
            Route::post('tp/white/vote/new', [TpWhiteVoteController::class, 'create'])->middleware('check.typeuser');
            Route::get('tp/white/vote/view', [TpWhiteVoteController::class, 'view']);
            Route::get('tp/white/vote/list', [TpWhiteVoteController::class, 'list']);

            // UserType
            Route::get('user/type/list', [UserTypeController::class, 'list']);

            #tp_voting_sites
            Route::post('vote/site/new', [TpVotingSiteController::class, 'create'])->middleware('check.typeuser');
            Route::get('vote/site/view', [TpVotingSiteController::class, 'view']);
            Route::get('vote/site/list', [TpVotingSiteController::class, 'list']);

            #voting_code
            Route::post('vote/code/new', [VotingCodeController::class, 'create'])->middleware('check.typeuser');
            Route::get('vote/code/view', [VotingCodeController::class, 'view']);
            Route::get('vote/code/list', [VotingCodeController::class, 'list']);



            });








});
