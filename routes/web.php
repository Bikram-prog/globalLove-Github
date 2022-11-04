<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotmanController;

// use Session;
// use Stripe;
// use Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','App\Http\Controllers\UsersController@home');
Route::get('/location','App\Http\Controllers\UsersController@location');
Route::get('/front-test','App\Http\Controllers\UsersController@homeTest');
Route::get('/browse','App\Http\Controllers\UsersController@browse2');
Route::get('/single-profile/{id}','App\Http\Controllers\UsersController@tinder')->name('tinder');
Route::get('/browse2','App\Http\Controllers\UsersController@browse');
Route::get('/online','App\Http\Controllers\UsersController@onlineuser');
Route::get('/mail','App\Http\Controllers\UsersController@sendMail');

Route::get('/signup-for-free','App\Http\Controllers\UsersController@signupForFree');

Route::get('/news','App\Http\Controllers\UsersController@viewNews');
Route::POST('/newsupdatepost','App\Http\Controllers\UsersController@newsUpdatePost');

Route::get('/suggestion','App\Http\Controllers\UsersController@viewSuggestions');
Route::POST('/suggestionupdatepost','App\Http\Controllers\UsersController@suggestionUpdatePost');


//Route::get('/signup','UsersController@signup');
// Route::get('/signup', 'App\Http\Controllers\UsersController@signup');
Route::post('/signupaction', 'App\Http\Controllers\UsersController@signupaction');

Route::get('/finish/{user_id}/{domain?}', 'App\Http\Controllers\UsersController@finish');
Route::post('/signupactiongoogle', 'App\Http\Controllers\UsersController@signupActionGoogle');

Route::get('/agentsignup', 'App\Http\Controllers\UsersController@agentsignup');
Route::post('/agentsignupaction', 'App\Http\Controllers\UsersController@agentsignupaction');

Route::get('/verifyaccount/{id}','App\Http\Controllers\UsersController@viewVerifyAccount');

Route::post('/chatpost', 'App\Http\Controllers\UsersController@chatPostAction');

Route::get('/resetpassword/{token}/{mail}','App\Http\Controllers\UsersController@viewResetPassword');
Route::POST('/resetpasswordaction','App\Http\Controllers\UsersController@resetPasswordAction');

Route::get('/forgotpassword','App\Http\Controllers\UsersController@viewForgotPassword');
Route::post('/forgotpasswordaction', 'App\Http\Controllers\UsersController@forgotPasswordAction');

Route::get('/u/messages', 'App\Http\Controllers\MessagesController@viewMessages');

Route::get('/chatinterval/{id}', 'App\Http\Controllers\MessagesController@chatInterval');

Route::get('/locationinsert/{id}/{lat}/{long}', 'App\Http\Controllers\MessagesController@locationInsert');

Route::get('/login/{dp?}', 'App\Http\Controllers\UsersController@login');
Route::post('/loginaction', 'App\Http\Controllers\UsersController@loginaction');


Route::get('/g-login-redirect', 'App\Http\Controllers\UsersController@googleLoginAction');
Route::get('/fb-login', 'App\Http\Controllers\UsersController@facebookLoginAction');

Route::get('/dashboard', 'App\Http\Controllers\UsersController@dashboard');


Route::post('/postinsert', 'App\Http\Controllers\UsersController@ajaxRequestPost');
Route::post('/postdelete', 'App\Http\Controllers\UsersController@ajaxRequestDel');

Route::get('/userprofile/{id}', 'App\Http\Controllers\UsersController@userProfile');
Route::get('/profilesettings', 'App\Http\Controllers\UsersController@profileSettings');
Route::post('/profilesettingspost', 'App\Http\Controllers\UsersController@profilesettingspost');
Route::get('/photos', 'App\Http\Controllers\UsersController@viewPhotos');
Route::get('/upload', 'App\Http\Controllers\UsersController@viewUpload');
Route::post('/uploadpost', 'App\Http\Controllers\UsersController@uploadPost');

Route::get('/preferredlanguage', 'App\Http\Controllers\UsersController@preferredLanguage');
Route::post('/preferredlanguagepost', 'App\Http\Controllers\UsersController@preferredLanguagePost');

Route::get('/prflphoto/{title}', 'App\Http\Controllers\UsersController@prflPhotoAction');
Route::get('/privatephoto/{id}', 'App\Http\Controllers\UsersController@privatePhotoAction');
Route::get('/deletephoto/{id}/{name}', 'App\Http\Controllers\UsersController@deletePhotoAction');

Route::get('/hidephotopost/{id}', 'App\Http\Controllers\UsersController@hidePhotoAction');
Route::get('/unhidephotopost/{id}', 'App\Http\Controllers\UsersController@unhidePhotoAction');

Route::get('/deletephotopost/{id}', 'App\Http\Controllers\UsersController@deletePhotoPostAction');
Route::get('/deletevideopost/{id}', 'App\Http\Controllers\UsersController@deleteVideoPostAction');

Route::get('/unlockphoto/{id}', 'App\Http\Controllers\UsersController@unlockPhotoAction');

Route::get('/account', 'App\Http\Controllers\UsersController@viewAccount');
Route::post('/changepasswordaction', 'App\Http\Controllers\UsersController@changePasswordAction');

Route::get('/connection', 'App\Http\Controllers\UsersController@viewConnection');
Route::get('/likes', 'App\Http\Controllers\UsersController@viewLikes');
Route::get('/mutuallikes', 'App\Http\Controllers\UsersController@viewMutualLikes');

Route::get('/profile', 'App\Http\Controllers\UsersController@viewProfile');

// Route::get('/verifyprofile', 'App\Http\Controllers\UsersController@viewVerifyProfile');

Route::get('/profiledetails', 'App\Http\Controllers\UsersController@viewProfileDetails');
Route::POST('/profiledetailsaction', 'App\Http\Controllers\UsersController@profileDetailsAction');

Route::get('/editprofile', 'App\Http\Controllers\UsersController@viewEditProfile');
Route::POST('/editprofileaction', 'App\Http\Controllers\UsersController@editProfileAction');

Route::get('/personalityquestion', 'App\Http\Controllers\UsersController@viewPersonalityQuestion');
Route::POST('/persnlquestnactn', 'App\Http\Controllers\UsersController@persnlQuestnActn');


Route::get('/verifyprofile', 'App\Http\Controllers\UsersController@viewVerifyProfile');
Route::post('/verifyprofileaction', 'App\Http\Controllers\UsersController@verifyProfileAction');

Route::get('/changeemail', 'App\Http\Controllers\UsersController@viewChangeEmail');
Route::post('/changeemailaction', 'App\Http\Controllers\UsersController@changeEmailAction');

Route::get('/mobeditprofile/{id}', 'App\Http\Controllers\UsersController@viewMobEditProfile');
Route::POST('/mobeditprofileaction', 'App\Http\Controllers\UsersController@editMobProfileAction');

Route::get('/match', 'App\Http\Controllers\UsersController@viewProfileMatch');
Route::POST('/profilematchaction', 'App\Http\Controllers\UsersController@profileMatchAction');

Route::POST('/propicaction', 'App\Http\Controllers\UsersController@profilePhotoAction');

Route::get('/provideoupload', 'App\Http\Controllers\UsersController@proVideoUpload');
Route::POST('/provideouploadpost', 'App\Http\Controllers\UsersController@proVideoUploadPost');

Route::get('/photoupload', 'App\Http\Controllers\UsersController@viewPhotoUpload');
Route::POST('/photouploadpost', 'App\Http\Controllers\UsersController@photoUploadPost');

Route::get('/logout', 'App\Http\Controllers\UsersController@logout');
Route::get('/delete-account', 'App\Http\Controllers\UsersController@deleteAccount');
Route::POST('/deleteprofileaction', 'App\Http\Controllers\UsersController@deleteProfileActionUser');

Route::get('/applogout', 'App\Http\Controllers\UsersController@appLogout');


Route::POST('/chatdisplay', 'App\Http\Controllers\MessagesController@loadMsgs');
Route::POST('/chatdisplayadmin', 'App\Http\Controllers\MessagesController@admin_loadMsgs');
Route::POST('/chatinsert', 'App\Http\Controllers\MessagesController@chatinsert');
Route::POST('/cs_chatinsert', 'App\Http\Controllers\MessagesController@cs_chatinsert');
Route::POST('/chatinsertadmin', 'App\Http\Controllers\MessagesController@admin_chatinsert');
Route::POST('/onlineupdate', 'App\Http\Controllers\MessagesController@online');
Route::POST('/offlineupdate', 'App\Http\Controllers\MessagesController@offline');
Route::POST('/offlinemessage', 'App\Http\Controllers\MessagesController@offlinemessage');

Route::get('/group-chat-terms', 'App\Http\Controllers\MessagesController@groupChatTerms');
Route::get('/group-chat', 'App\Http\Controllers\MessagesController@groupChatView');
Route::get('/chat-pref/{id}/{value}', 'App\Http\Controllers\MessagesController@chatPrefAction');
Route::get('/group-chat-online', 'App\Http\Controllers\MessagesController@groupChatOnlineView');
Route::POST('/groupchataction', 'App\Http\Controllers\MessagesController@groupChatAction');

Route::get('/pickuplines', 'App\Http\Controllers\MessagesController@pickupLinesView');

Route::get('/grouptermsaction', function () {
     return redirect('/group-chat');
    });

Route::get('/group-chat/gf', 'App\Http\Controllers\MessagesController@groupChatGayFemaleView');
Route::POST('/groupchatactiongf', 'App\Http\Controllers\MessagesController@groupChatGayFemaleAction');
Route::get('/group-chat-online-gf', 'App\Http\Controllers\MessagesController@groupChatOnlineGayFemaleView');

Route::get('/group-chat-terms-female', 'App\Http\Controllers\MessagesController@groupChatTermsFemale');
Route::get('/grouptermsactionfemale', function () {
    return redirect('/group-chat/gf');
   });

//////////////////////////////////// Gay male group chat /////////////////////////

Route::get('/group-chat/gm', 'App\Http\Controllers\MessagesController@groupChatGayMaleView');
Route::POST('/groupchatactiongm', 'App\Http\Controllers\MessagesController@groupChatGayMaleAction');
Route::get('/group-chat-online-gm', 'App\Http\Controllers\MessagesController@groupChatOnlineGayMaleView');

Route::get('/group-chat-terms-male', 'App\Http\Controllers\MessagesController@groupChatTermsMale');
Route::get('/grouptermsactionmale', function () {
    return redirect('/group-chat/gm');
   });

///////////////////////////////////////////

//////////////////////////////////// Traansexual group chat /////////////////////////

Route::get('/group-chat/transexual', 'App\Http\Controllers\MessagesController@groupChaTransexualView');
Route::POST('/groupchatactiontransexual', 'App\Http\Controllers\MessagesController@groupChatTransexualAction');
Route::get('/group-chat-online-transexual', 'App\Http\Controllers\MessagesController@groupChatOnlineTransexualView');

Route::get('/group-chat-terms-transexual', 'App\Http\Controllers\MessagesController@groupChatTermsTransexual');
Route::get('/grouptermsactiontransexual', function () {
    return redirect('/group-chat/transexual');
   });

///////////////////////////////////////////

//////////////////////////////////// Gay Female group chat /////////////////////////

Route::get('/group-chat/gayfemale', 'App\Http\Controllers\MessagesController@groupChatGayLesbianView');
Route::POST('/groupchatactiongayfemale', 'App\Http\Controllers\MessagesController@groupChatGayLesbianAction');
Route::get('/group-chat-online-gayfemale', 'App\Http\Controllers\MessagesController@groupChatOnlineGayLesbianView');

Route::get('/group-chat-terms-gayfemale', 'App\Http\Controllers\MessagesController@groupChatTermsGayLesbian');
Route::get('/grouptermsactiongayfemale', function () {
    return redirect('/group-chat/gayfemale');
   });

///////////////////////////////////////////


Route::get('/viewprofileuser', 'App\Http\Controllers\UsersController@viewProfileUsers');


Route::get('/matches', 'App\Http\Controllers\MatchesController@algorithm');


Route::get('/addnewmessage/{id}', 'App\Http\Controllers\MessagesController@viewAddNewMessage');
Route::POST('/addnewmessageaction', 'App\Http\Controllers\MessagesController@addNewMessageAction');

Route::get('/messanger/{id}', 'App\Http\Controllers\MessagesController@messangerr');

Route::get('/messageuserlist', 'App\Http\Controllers\MessagesController@viewLeftMenuMessages');

Route::POST('/sendfile', 'App\Http\Controllers\MessagesController@sendFile');
Route::POST('/deleteChat', 'App\Http\Controllers\MessagesController@deleteChat');

Route::get('/blocklist','App\Http\Controllers\UsersController@viewBlocklist');


/////////////////////Membership//////////////////////
Route::get('/membership','App\Http\Controllers\MembershipController@viewMembership');
Route::get('/payment-successfull','App\Http\Controllers\MembershipController@paymentSuccessfull');
Route::get('/u/adminuserpremium/{id}','App\Http\Controllers\MembershipController@upgradeProfileAction');
// Route::get('payment', 'App\Http\Controllers\MembershipController@payment')->name('payment');
// Route::get('cancel', 'App\Http\Controllers\MembershipController@cancel')->name('payment.cancel');
// Route::get('payment/success', 'App\Http\Controllers\MembershipController@success')->name('payment.success');

Route::get('paypal-payment-form/{id}', 'App\Http\Controllers\MembershipController@index')->name('paypal-payment-form');
Route::POST('paypal-payment-form-submit', 'App\Http\Controllers\MembershipController@payment')->name('paypal-payment-form-submit');
Route::POST('stripe-post', 'App\Http\Controllers\MembershipController@stripePost')->name('stripe-post');

Route::POST('/promocodepost', 'App\Http\Controllers\MembershipController@promoCodePost');

//////////////MOB API///////////////////////////////////

Route::get('/mobeditprofile/{id}', 'App\Http\Controllers\UsersController@viewMobEditProfile');
Route::POST('/mobeditprofileaction', 'App\Http\Controllers\UsersController@editMobProfileAction');

Route::get('/mobeditmatch/{id}', 'App\Http\Controllers\UsersController@viewmobProfileMatch');
Route::POST('/mobprofilematchaction', 'App\Http\Controllers\UsersController@MobProfileMatchAction');


Route::get('/mobpersonalityquestion/{id}', 'App\Http\Controllers\UsersController@viewMobPersonalityQuestion');
Route::POST('/mobpersnlquestnactn', 'App\Http\Controllers\UsersController@mobpersnlQuestnActn');


Route::get('/mobprofiledetails/{id}', 'App\Http\Controllers\UsersController@viewMobProfileDetails');
Route::POST('/mobprofiledetailsaction', 'App\Http\Controllers\UsersController@mobprofileDetailsAction');

Route::get('/mobnotification', 'App\Http\Controllers\UsersController@viewMobileNotification');
Route::post('/updatenotif', 'App\Http\Controllers\UsersController@ajaxNotifUpdate');


Route::get('/report/{id}', 'App\Http\Controllers\UsersController@reportAction');
Route::post('/reportuser', 'App\Http\Controllers\UsersController@savereportAction');


Route::get('/unsubscribe/{email}','App\Http\Controllers\UsersController@unsubscribe');
//////////////////END MOB API/////////////////////////////

////////////////////////////// ADMIN //////////////////////////////////////////



Route::get('/u/adminlogin','App\Http\Controllers\AdminController@viewAdminLogin');
Route::POST('/u/adminloginpost','App\Http\Controllers\AdminController@AdminLoginPost');
Route::get('/u/adminviewuser','App\Http\Controllers\AdminController@viewAdminUsers');
Route::get('/u/adminviewapprveuser','App\Http\Controllers\AdminController@viewAdminApproveUsers');
Route::get('/u/adminviewdenieduser','App\Http\Controllers\AdminController@viewAdminDeniedUsers');

Route::get('/u/adminverifyprofile','App\Http\Controllers\AdminController@viewAdminVerifyUsers');
Route::get('/u/adminverifyapprove/{id}/{email}','App\Http\Controllers\AdminController@adminVerifyApprove');
Route::get('/u/adminverifydeny/{id}/{email}','App\Http\Controllers\AdminController@adminVerifyDeny');

Route::get('/u/adminviewapprvetext','App\Http\Controllers\AdminController@viewAdminApproveText');
Route::get('/u/textupdateapprove/{id}','App\Http\Controllers\AdminController@viewAdminTextupdateApprove');
Route::get('/u/textupdatedenyreason/{id}','App\Http\Controllers\AdminController@viewAdminTextupdateDenyReason');
Route::POST('/u/textupdatedeny','App\Http\Controllers\AdminController@viewAdminTextupdateDeny');
Route::get('/u/adminviewprofilephotos','App\Http\Controllers\AdminController@viewAdminPrflPhotos');
Route::post('/u/approveprfl','App\Http\Controllers\AdminController@viewApprovePrflPhotos');
Route::post('/u/denyprfl','App\Http\Controllers\AdminController@viewDenyPrflPhotos');
Route::get('/u/adminviewphotos','App\Http\Controllers\AdminController@viewAdminPhotos');
Route::get('/u/approve/{id}/{userid}','App\Http\Controllers\AdminController@viewApprovePhotos');
Route::get('/u/deny/{id}/{userid}','App\Http\Controllers\AdminController@viewDenyPhotos');
Route::get('/u/adminuserdelete/{id}','App\Http\Controllers\AdminController@deleteProfileAction');
Route::get('/u/countrylisting','App\Http\Controllers\AdminController@viewCountryList');
Route::POST('/u/countrylistingpost','App\Http\Controllers\AdminController@countryListingPost');
Route::get('/u/delcountrypricing/{id}','App\Http\Controllers\AdminController@delPricing');
Route::get('/u/adminuserdtls/{id}','App\Http\Controllers\AdminController@viewAccountDetails');
Route::get('/u/admineditprofile/{id}','App\Http\Controllers\AdminController@viewEditDetails');
Route::POST('/u/admineditprofileaction','App\Http\Controllers\AdminController@adminEditProAction');
Route::get('/u/admintext','App\Http\Controllers\AdminController@viewAdminText');
Route::POST('/u/admintextpost','App\Http\Controllers\AdminController@adminTextPost');
Route::get('/u/adminlogout','App\Http\Controllers\AdminController@adminLogout');

Route::get('/u/adminuserreporteddtls/{id}','App\Http\Controllers\AdminController@viewReportedAccountDetails');
Route::post('/u/reportedapproveprfl','App\Http\Controllers\AdminController@approveReport');
Route::post('/u/reporteddenyprfl','App\Http\Controllers\AdminController@denyReport');
Route::get('/u/adminreportviewuser','App\Http\Controllers\AdminController@reportAdminUsers');
Route::get('/u/adminreportapprveuser','App\Http\Controllers\AdminController@reportAdminApproveUsers');
Route::get('/u/adminreportdenieduser','App\Http\Controllers\AdminController@reportAdminDeniedUsers');

Route::get('/u/adminviewagent','App\Http\Controllers\AdminController@viewAdminAgent');
Route::get('/u/adminviewapproveagent/{id}','App\Http\Controllers\AdminController@viewAdminApproveAgent');
Route::get('/u/adminviewdenyagent/{id}','App\Http\Controllers\AdminController@viewAdminDenyAgent');
Route::get('/u/adminlistapproveagent','App\Http\Controllers\AdminController@viewAdminListApproveAgent');
Route::get('/u/adminlistdenyagent','App\Http\Controllers\AdminController@viewAdminListDenyAgent');


Route::get('/u/adminviewstats','App\Http\Controllers\AdminController@viewAdminStats');
Route::get('/u/adminviewtestimonial','App\Http\Controllers\AdminController@viewAdminTestimonial');
Route::get('/u/adminviewtestimonialAdd','App\Http\Controllers\AdminController@viewAdminTestimonialAdd');
Route::POST('/u/adminviewtestimonialPost','App\Http\Controllers\AdminController@viewAdminTestimonialAddAction');
Route::get('/u/adminviewtestimoniaEdit/{id}','App\Http\Controllers\AdminController@viewAdminTestimonialEdit');
Route::POST('/u/viewAdminTestimonialEditAction','App\Http\Controllers\AdminController@viewAdminTestimonialEditAction');
Route::get('/u/adminviewtestimoniaDelete/{id}','App\Http\Controllers\AdminController@viewAdminTestimonialDelete');


Route::get('/u/abusewordlisting','App\Http\Controllers\AdminController@viewabusewordList');
Route::POST('/u/abusewordlistingpost','App\Http\Controllers\AdminController@abusewordListingPost');
Route::get('/u/delabuseword/{id}','App\Http\Controllers\AdminController@delabuseword');

Route::get('/u/to-do-list','App\Http\Controllers\AdminController@toDoList');
Route::get('/u/edit-to-do-list/{id}','App\Http\Controllers\AdminController@editToDoList');
Route::POST('/u/edittodolistaction','App\Http\Controllers\AdminController@editToDoListAction');
Route::get('/u/add-reciepent/{name}/{email}/{psswrd}/{status}','App\Http\Controllers\AdminController@addReciepent');
Route::get('/u/all-reciepent','App\Http\Controllers\AdminController@allReciepent');
Route::get('/u/del-reciepent/{id}','App\Http\Controllers\AdminController@delReciepent');
Route::POST('/u/addtodolistpost','App\Http\Controllers\AdminController@addToDoListPost');

Route::get('/u/todohome','App\Http\Controllers\AdminController@toDoHome');

Route::get('/u/to-do-list-login','App\Http\Controllers\AdminController@toDoListLogin');
Route::POST('/u/todologpost','App\Http\Controllers\AdminController@toDoLogPost');

Route::get('/u/opentodo','App\Http\Controllers\AdminController@openToDo');
Route::get('/u/completetodo','App\Http\Controllers\AdminController@completeToDo');
Route::get('/u/inprogtodo','App\Http\Controllers\AdminController@inProgToDo');
Route::get('/u/delaytodo','App\Http\Controllers\AdminController@delayToDo');


Route::get('/u/del-todo/{id}','App\Http\Controllers\AdminController@delToDo');
Route::get('/u/complete-todo/{id}','App\Http\Controllers\AdminController@completeToDoAction');
Route::get('/u/in-prog-todo/{id}','App\Http\Controllers\AdminController@inProgressToDoAction');
Route::get('/u/delay-todo/{id}','App\Http\Controllers\AdminController@delayToDoAction');

Route::get('/u/to_do_logout','App\Http\Controllers\AdminController@toDoLogout');

//////////////////////// To Do Bescrow //////////////////////////////
Route::get('/u/to-do-list-bes-login','App\Http\Controllers\AdminController@toDoListBesLogin');
Route::POST('/u/todobeslogpost','App\Http\Controllers\AdminController@toDoBesLogPost');

Route::get('/u/to-do-list-bes','App\Http\Controllers\AdminController@toDoListBes');
Route::get('/u/edit-to-do-list-bes/{id}','App\Http\Controllers\AdminController@editToDoListBes');
Route::POST('/u/edittodolistaction-bes','App\Http\Controllers\AdminController@editToDoListActionBes');
Route::get('/u/add-reciepent-bes/{name}/{email}/{psswrd}/{status}','App\Http\Controllers\AdminController@addReciepentBes');
Route::get('/u/all-reciepent-bes','App\Http\Controllers\AdminController@allReciepentBes');
Route::get('/u/del-reciepent-bes/{id}','App\Http\Controllers\AdminController@delReciepentBes');
Route::POST('/u/addtodolistpost-bes','App\Http\Controllers\AdminController@addToDoListPostBes');

Route::get('/u/opentodo-bes','App\Http\Controllers\AdminController@openToDoBes');
Route::get('/u/completetodo-bes','App\Http\Controllers\AdminController@completeToDoBes');
Route::get('/u/inprogtodo-bes','App\Http\Controllers\AdminController@inProgToDoBes');
Route::get('/u/delaytodo-bes','App\Http\Controllers\AdminController@delayToDoBes');


Route::get('/u/del-todo-bes/{id}','App\Http\Controllers\AdminController@delToDoBes');
Route::get('/u/complete-todo-bes/{id}','App\Http\Controllers\AdminController@completeToDoActionBes');
Route::get('/u/in-prog-todo-bes/{id}','App\Http\Controllers\AdminController@inProgressToDoActionBes');
Route::get('/u/delay-todo-bes/{id}','App\Http\Controllers\AdminController@delayToDoActionBes');

Route::get('/u/to_do_bes_logout','App\Http\Controllers\AdminController@toDoBesLogout');

//////////////////////// End To Do Bescrow ////////////////////////////////

//////////////////////// To Do New //////////////////////////////
Route::get('/u/to-do-smarter-signup','App\Http\Controllers\AdminController@toDoSmarterSignup');
Route::POST('/u/todosmartersignuppost','App\Http\Controllers\AdminController@toDoSmarterSignupPost');

Route::get('/u/to-do-smarter-login','App\Http\Controllers\AdminController@toDoSmarterLogin');
Route::POST('/u/todosmarterlogpost','App\Http\Controllers\AdminController@toDoSmarterLogPost');

Route::get('/u/to-do-list-smarter','App\Http\Controllers\AdminController@toDoListSmarter');
Route::get('/u/edit-to-do-list-smarter/{id}','App\Http\Controllers\AdminController@editToDoListSmarter');
Route::POST('/u/edittodolistaction-smarter','App\Http\Controllers\AdminController@editToDoListActionSmarter');
Route::get('/u/add-reciepent-smarter/{name}/{email}/{psswrd}/{status}','App\Http\Controllers\AdminController@addReciepentSmarter');
Route::get('/u/all-reciepent-smarter','App\Http\Controllers\AdminController@allReciepentSmarter');
Route::get('/u/del-reciepent-smarter/{id}','App\Http\Controllers\AdminController@delReciepentSmarter');
Route::POST('/u/addtodolistpost-smarter','App\Http\Controllers\AdminController@addToDoListPostSmarter');

Route::get('/u/opentodo-smarter','App\Http\Controllers\AdminController@openToDoSmarter');
Route::get('/u/completetodo-smarter','App\Http\Controllers\AdminController@completeToDoSmarter');
Route::get('/u/inprogtodo-smarter','App\Http\Controllers\AdminController@inProgToDoSmarter');
Route::get('/u/delaytodo-smarter','App\Http\Controllers\AdminController@delayToDoSmarter');


Route::get('/u/del-todo-smarter/{id}','App\Http\Controllers\AdminController@delToDoSmarter');
Route::get('/u/complete-todo-smarter/{id}','App\Http\Controllers\AdminController@completeToDoActionSmarter');
Route::get('/u/in-prog-todo-smarter/{id}','App\Http\Controllers\AdminController@inProgressToDoActionSmarter');
Route::get('/u/delay-todo-smarter/{id}','App\Http\Controllers\AdminController@delayToDoActionSmarter');

Route::get('/u/to_do_smarter_logout','App\Http\Controllers\AdminController@toDoSmarterLogout');

//////////////////////// End To Do New ////////////////////////////////

Route::POST('/u/adminbroadcast','App\Http\Controllers\AdminController@adminBroadcast');
Route::POST('/u/broadcastpost','App\Http\Controllers\AdminController@broadcastPost');

Route::get('/u/searchuser','App\Http\Controllers\AdminController@searchUser');

/////////////APP API////////////////////////////

Route::get('/mobbrowse/{id}','App\Http\Controllers\ApiController@viewBrowse');
Route::get('/mobmatch/{id}','App\Http\Controllers\ApiController@viewMatch');
Route::get('/mobmylikes/{id}','App\Http\Controllers\ApiController@viewMyLikes');
Route::get('/moblikesme/{id}','App\Http\Controllers\ApiController@viewLikesMe');
Route::get('/mobviewusers/{id}','App\Http\Controllers\ApiController@viewProfileUsersMob');
Route::get('/mobviewprofile/{id}','App\Http\Controllers\ApiController@viewProfile');
Route::get('/mobviewuserphotos/{id}','App\Http\Controllers\ApiController@viewUsersPhotos');

Route::get('/mobuserdetails/{id}','App\Http\Controllers\ApiController@viewUsersDetails');

Route::get('/mob-to-do-list','App\Http\Controllers\ApiController@mobToDoList');
Route::POST('/mob-to-do-list/logingl','App\Http\Controllers\ApiController@loginGl');

Route::get('/wwwmediaapp','App\Http\Controllers\AdminController@wwwMediaApp');
Route::get('/u/adminapp','App\Http\Controllers\AdminController@adminApp');






Route::get('/about', 'App\Http\Controllers\AboutController@index');
Route::get('/careers', 'App\Http\Controllers\CareersController@index');
Route::get('/secure', 'App\Http\Controllers\SecureController@index');
Route::get('/privacy', 'App\Http\Controllers\TermsController@index');
Route::get('/terms', 'App\Http\Controllers\PrivacyController@index');
Route::get('/cookies', 'App\Http\Controllers\PrivacyController@cookies');
Route::get('/contactus', 'App\Http\Controllers\ContactUSController@index');
Route::get('/articles', 'App\Http\Controllers\CareersController@blog');
Route::get('/post', 'App\Http\Controllers\CareersController@post');


Route::get('/facebook', 'App\Http\Controllers\FacebookController@redirectToFacebook');
Route::get('/facebook/callback', 'App\Http\Controllers\FacebookController@handleFacebookCallback');


/*
* Botman Routes
*/

 Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

 /*
 * Video call from Twilio
 */

Route::get('access_token/{room}', 'App\Http\Controllers\AccessTokenController@generate_token');
Route::get('videocall', 'App\Http\Controllers\AccessTokenController@videocall');

/*
* mesages inbox, sent, delete
*/
Route::get('messages/inbox2', 'App\Http\Controllers\MessagesController@inbox2');
Route::get('messages/inbox', 'App\Http\Controllers\MessagesController@inbox');
Route::get('messages/sent', 'App\Http\Controllers\MessagesController@sent');


Route::get('/bshjgshsg/clear-cache', function() {
    return Artisan::call('cache:clear');

});


Route::get('/chat-top-bar-ajax', 'App\Http\Controllers\SumantaController@chat_top_bar_ajax')->name('chat.top.bar.ajax');



Route::get('/sumanta-photo-algo', function () {
    $users = DB::table('users')
        ->select('id', 'prfl_photo_path')
        ->get();


    foreach ($users as $user)
    {
        if (str_contains($user->prfl_photo_path, 'google'))
        {
            $photo_post = DB::table('profile_post_photos')
                ->where('pro_pic_user_id', '=', $user->id)
                ->where('pro_pic_path', '!=', '')
                ->select('pro_pic_path')
                ->get();


            // update user table photo column
            if(count($photo_post) > 0)
            {
                DB::table('users')
                    ->where('id',$user->id)
                    ->update(array(
                        'prfl_photo_path'=>$photo_post[0]->pro_pic_path,
                    ));
            }
        }

        // If default photo exist

        if ($user->prfl_photo_path == 'https://www.globallove.online/images/male-user-placeholder.png')
        {
            $photo_post = DB::table('profile_post_photos')
                ->where('pro_pic_user_id', '=', $user->id)
                ->where('pro_pic_path', '!=', '')
                ->select('pro_pic_path')
                ->get();


            // update user table photo column
            if(count($photo_post) > 0)
            {
                DB::table('users')
                    ->where('id',$user->id)
                    ->update(array(
                        'prfl_photo_path'=>$photo_post[0]->pro_pic_path,
                    ));
            }
        }





    }
});


Route::get('/sumanta/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

//Clear View cache:
Route::get('/sumanta/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});


// remove ads

Route::get('secure/remove/ads', function () {

    $remove_ads = \App\Models\RemoveAds::where("user_id", "=", Crypt::decryptString($_COOKIE['UserIds']))
        ->where('end_date', '>', date('Y-m-d H:i:s'))->get();

    return view('users.remove-ads', ['remove_ads' => $remove_ads]);
})->name('remove.ads');

Route::post('secure/remove/ads/post', function (\Illuminate\Http\Request $request) {

    try {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $dataStripe = Stripe\Charge::create ([
            "amount" => 9.90 * 100,
            "currency" => "aud",
            "source" => $request->stripeToken,
            "description" => "Globallove No Ads."
        ]);

        if($dataStripe->status == 'succeeded') {
            $remove_ads = \App\Models\RemoveAds::where("user_id", "=", Crypt::decryptString($_COOKIE['UserIds']))->get();

            $start_date = date('Y-m-d H:i:s');
            $stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' +30 day'));

            if(count($remove_ads) === 0) {
                // insert into table

                $remove_ads = new \App\Models\RemoveAds;

                $remove_ads->user_id = Crypt::decryptString($_COOKIE['UserIds']);
                $remove_ads->start_date = $start_date;
                $remove_ads->end_date = $stop_date;
                $remove_ads->amount = $dataStripe->amount_captured / 100;
                $remove_ads->transaction_id = $dataStripe->id;
                $remove_ads->receipt_url = $dataStripe->receipt_url;

                $remove_ads->save();
            } else {
                \App\Models\RemoveAds::where('user_id', '=', Crypt::decryptString($_COOKIE['UserIds']))->update(['end_date' => $stop_date, 'start_date' => $start_date, 'amount' => $dataStripe->amount_captured / 100, 'transaction_id' => $dataStripe->id, 'receipt_url' => $dataStripe->receipt_url]);
            }

            Session::flash('success', 'Payment successful!');

        } else {
            Session::flash('error', 'Payment unsuccessful! Please try again later.');
        }

        return back();

    } catch (\Throwable $th) {
        Session::flash('error', 'Payment unsuccessful! Please try again later.');

        return back();
    }

})->name('remove.ads.post');


Route::post('/moderatorpost', function (\Illuminate\Http\Request $request) {

    DB::table('users_chat')->insert([
        'chat_to_id' => $request->to,
        'chat_from_id' => Crypt::decryptString($_COOKIE['UserIds']),
        'chat_files' => $request->url

    ]);

    DB::table('users_chat')->insert([
        'chat_to_id' => $request->to,
        'chat_from_id' => Crypt::decryptString($_COOKIE['UserIds']),
        'chat_msg' => $request->msg

    ]);


    $last= DB::getPdo()->lastInsertId();

    DB::table('chat_mod')->insert([
        'mod_to_id' => $request->to,
        'mod_from_id' => Crypt::decryptString($_COOKIE['UserIds']),
        'mod_chat_id' => $last,
        'mod_chat_msg' => 'Moderator Start',

    ]);



});

Route::post('/stopmoderatorpost', function (\Illuminate\Http\Request $request) {

    $moderatorcheck= DB::Select("SELECT * FROM chat_mod WHERE (mod_from_id= '".Crypt::decryptString($_COOKIE['UserIds'])."' AND mod_to_id='".$request->to."' AND mod_status='0' AND mod_chat_msg='Moderator Start')");

    if(count($moderatorcheck) > 0){
        $moderator= DB::Select("SELECT * FROM chat_mod WHERE (mod_from_id= '".Crypt::decryptString($_COOKIE['UserIds'])."' AND mod_to_id='".$request->to."' AND mod_status='0') OR (mod_to_id='".Crypt::decryptString($_COOKIE['UserIds'])."' AND mod_from_id='".$request->to."' AND mod_status='0')");

    $data= DB::select("SELECT * FROM users WHERE id= '".$request->to."'");
    $user_info= DB::select("SELECT * FROM users as u left join users_metas um ON u.id=um.user_id WHERE u.id= '".Crypt::decryptString($_COOKIE['UserIds'])."'");

    $mail=$data[0]->email;
    $mailform=$user_info[0]->email;

    Mail::send(['html'=>'users.email_chat_moderator_template'], ['from'=>$moderator], function($message) use ($mail)  {
        $message->to($mail)->subject
            ('Transscript from moderator');
        $message->from('no-reply@wwwmedia.world','GlobalLove');
        });


        Mail::send(['html'=>'users.email_chat_moderator_template'], ['from'=>$moderator], function($message) use ($mailform)  {
            $message->to($mailform)->subject
                ('Transscript from moderator');
            $message->from('no-reply@wwwmedia.world','GlobalLove');
            });


    $moderatorupdate= DB::Select("UPDATE chat_mod SET mod_status= '1' WHERE (mod_from_id= '".Crypt::decryptString($_COOKIE['UserIds'])."' AND mod_to_id='".$request->to."') OR (mod_to_id='".Crypt::decryptString($_COOKIE['UserIds'])."' AND mod_from_id='".$request->to."')");
    }else{
        return response()->json(['success'=> 'no']);
    }






});



Route::get('/dailyupdatetest', function () {
$users = DB::table('users')
            ->leftJoin('users_metas', 'users.id', '=', 'users_metas.user_id')
            ->where('subscribe_newsletter', 1)
            ->get();

        $attachment = DB::table('daily_email_update')->first();

        //dd($users);




            $dataa = 'Sumanta';
            $newregs= "test";
            Mail::send(['html'=>'users.email_dailyupdate_template'], ['text'=>$dataa,'nwusers'=>$newregs], function($message) use ($dataa,$attachment)  {
                $message->to('sumantasam1990@gmail.com')->subject
                   ('GlobalLove Daily Update');
if($attachment->email_file != ''){
                   $message->attach("http://68.183.224.218/images/".$attachment->email_file);
}
                $message->from('noreply@wwwmedia.world','GlobalLove');
             });



    });

Route::get('/dailyupdateemail', function () {
    $users = DB::table('users')
    ->leftJoin('users_metas', 'users.id', '=', 'users_metas.user_id')
    ->where('subscribe_newsletter', 1)
    ->get();

$attachment = DB::table('daily_email_update')->first();

//dd($users);

foreach($users as $u){

    $newreg = DB::table('users')->leftJoin('users_metas', 'users.id', '=', 'users_metas.user_id')->where('prfl_photo_path','!=','https://www.globallove.online/images/male-user-placeholder.png');
    if($u->sex =="Female") {
        $newreg->where('users_metas.sex', "Male");
    }
    if($u->sex =="Male") {
        $newreg->where('users_metas.sex', "Female");
    }
    if($u->sex =="Transgender") {
        $newreg->where(function($q) {
            $q->where('users_metas.sex', "Female")
              ->orWhere('users_metas.sex', "Male");
        });
    }

    $newregs = $newreg->inRandomOrder()->limit(5)->get(); // Call this at last to get the result
    //DB::enableQueryLog(); // Enable query log
    //dd(DB::getQueryLog());

    $mail = $u->email;
    $dataa = $u->name;
    Mail::send(['html'=>'users.email_dailyupdate_template'], ['email'=>Crypt::encryptString($u->email),'text'=>$dataa,'nwusers'=>$newregs], function($message) use ($mail, $dataa, $attachment)  {
        $message->to($mail)->subject
           ('GlobalLove Daily Update');
           if($attachment->email_file != ''){
           $message->attach("http://68.183.224.218/images/".$attachment->email_file);
           }
        $message->from('noreply@wwwmedia.world','GlobalLove');
     });

}
dd ('Daily E-mail Update Sent');
});


Route::post('/post/secure/add/testimonial', function (\Illuminate\Http\Request $request) {
   $request->validate([
       'cate' => 'required',
       'username' => 'required',
       'country' => 'required',
       'remarks' => 'required'
   ]);

    try {
        $testimonial = new \App\Models\Testimonial;

        $testimonial->category = $request->cate;
        $testimonial->name = $request->username;
        $testimonial->country = $request->country;
        $testimonial->remarks = $request->remarks;

        $testimonial->save();

        return back()->with('msg', "Your testimonial has been successfully submitted. It will under review process.");
    } catch (\Throwable $th) {
        dd("Some error occured.");
    }

})->name('add.testimonial.post');


Route::get('/womendating', function () {

    return view('users.women_dating');

});

Route::get('/map/view', function () {
    

    return view('users.location');

});

Route::get('/map/view/ajax', function () {

    $location= DB::select('SELECT * FROM users WHERE users_lattitude != "" AND users_longitude != ""');

    $arr= [];

    foreach ($location as $loc){
        if ($loc->id == Crypt::decryptString($_COOKIE['UserIds'])){
            $profile= '<a class="header-brand" href="/profile" style="color: #FFFFFF;">
            <img style="width: 100px;height: 100px;" src="'. $loc->prfl_photo_path . '" alt="GlobalLove">             </a>';
        }else{
            $profile= '<a class="header-brand" href="/userprofile/'.$loc->id.'" style="color: #FFFFFF;">
            <img style="width: 100px;height: 100px;" src="'. $loc->prfl_photo_path . '" alt="GlobalLove">             </a>';
        }
        
        $arr[]= array(
            $loc->users_lattitude,
            $loc->users_longitude,
            $profile,
            $loc->prfl_photo_path
        );
    }

    

    return response()->json($arr);

});



