<?php

use App\Services\ManagerLanguageService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

$mls = new ManagerLanguageService('lang_breadcrumbs');
// Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
//     $trail->push('Dashboard', route('home.index'));
// });

// Breadcrumbs::for('subcategories', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('SubCategories', route('sub_categories.index'));
// });

/*------------- Admin Dashboard (Admin Home) -------------*/
// Home
Breadcrumbs::for('admin.dashboard', function ($trail) use ($mls) {
    $trail->push($mls->messageLanguage('only_name', 'dashboard', 2), route('admin.dashboard'));
});

Breadcrumbs::for("admin.profile", function ($trail) use ($mls) {
    $trail->parent("admin.dashboard");
    $trail->push($mls->messageLanguage('only_name', 'profile', 2), route("admin.profile"));
});
Breadcrumbs::for("admin.change-password", function ($trail) use ($mls) {
    $trail->parent("admin.dashboard");
    $trail->push($mls->messageLanguage('only_name', 'change_password', 2), route("admin.change_password"));
});

// general Settings
Breadcrumbs::for('admin.settings.edit_general', function ($trail) {
    $trail->parent("admin.dashboard");
    $trail->push('Settings - General', route("admin.settings.edit_general"));
});

Breadcrumbs::macro('resource', function ($name, $title, $list = false) {
    // Home > $title
    Breadcrumbs::for("admin.$name.index", function ($trail) use ($name, $title) {
        $trail->parent("admin.dashboard");
        $trail->push($title, route("admin.$name.index"));
    });

    // Home > $title > Add New
    Breadcrumbs::for("admin.$name.create", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push("Add New $title", route("admin.$name.create"));
    });
// My Changes
      Breadcrumbs::for("admin.$name.excel", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push("Add New $title", route("admin.$name.excel"));
    });
//
    // Home > $title > Edit
    Breadcrumbs::for("admin.$name.edit", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push("Edit $title", url("admin/$name/{id}/edit"));
    });
    // Home > $title > Details
    Breadcrumbs::for("admin.$name.show", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push(" Details", url("admin/$name/{id}"));
    });
    Breadcrumbs::for("admin.$name.rating", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push(" Details", url("admin/$name/{id}"));
    });
     Breadcrumbs::for("admin.$name.win", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push(" Details", url("admin/$name/{id}"));
    });
    if ($list == true) {
        Breadcrumbs::for("admin.$name.list", function ($trail) use ($name, $title) {
            $trail->parent("admin.dashboard");
            $trail->push($title, route("admin.$name.list"));
        });
    }
});

/*------------- Admin Users ------------------------*/
Breadcrumbs::resource('users', $mls->messageLanguage('only_name', 'user', 2));
/*------------- Admin Roles ------------------------*/
Breadcrumbs::resource('roles', $mls->messageLanguage('only_name', 'role', 2));
/*------------- Admin Permissions ------------------------*/
Breadcrumbs::resource('permissions', $mls->messageLanguage('only_name', 'permission', 2));
/*------------- Admin Battles ------------------------*/
Breadcrumbs::resource('battles', $mls->messageLanguage('only_name', 'battle', 2));
/*------------- Admin Consultants ------------------------*/
Breadcrumbs::resource('consultants', $mls->messageLanguage('only_name', 'consultant', 2));
/*------------- Admin Vehical Service Worker------------------------*/
Breadcrumbs::resource('serviceworkers', $mls->messageLanguage('only_name', 'serviceworker', 2));
/*------------- Admin Vehical Service ------------------------*/
Breadcrumbs::resource('vehicalservices', $mls->messageLanguage('only_name', 'vehicalservice', 2));
/*------------- Admin SubCategory ------------------------*/
Breadcrumbs::resource('subcategorys', $mls->messageLanguage('only_name', 'petsubcategory', 2));
/*------------- Admin Managehostelservice ------------------------*/
Breadcrumbs::resource('managehostels', $mls->messageLanguage('only_name', 'managehostel', 2));
/*------------- Admin Appointment ------------------------*/
Breadcrumbs::resource('bookanappointments', $mls->messageLanguage('only_name', 'bookanappointment', 2));
/*------------- Admin Notification ------------------------*/
Breadcrumbs::resource('notifications', $mls->messageLanguage('only_name', 'notification', 2));
/*------------- Admin Package ------------------------*/
Breadcrumbs::resource('packages', $mls->messageLanguage('only_name', 'package', 2));
/*------------- Admin Contact Us ------------------------*/
Breadcrumbs::resource('contactus', $mls->messageLanguage('only_name', 'contactus', 2));
/*------------- Admin Promocode ------------------------*/
Breadcrumbs::resource('promocodes', $mls->messageLanguage('only_name', 'promocode', 2));


/*-------------  Vehical shop ------------------------*/
Breadcrumbs::resource('vehicalshops', $mls->messageLanguage('only_name', 'vehicalshop', 2));
/*-------------  Shop Registration ------------------------*/
Breadcrumbs::resource('shopregistrations', $mls->messageLanguage('only_name', 'shopregistration', 2));
/*-------------  Car & Bike Details ------------------------*/
Breadcrumbs::resource('carbikedetails', $mls->messageLanguage('only_name', 'carbikedetail', 2));
/*-------------  Care Request ------------------------*/
Breadcrumbs::resource('carerequests', $mls->messageLanguage('only_name', 'carerequest', 2));
/*-------------  Rquest For care ------------------------*/
Breadcrumbs::resource('customerregistration', $mls->messageLanguage('only_name', 'customerreg', 2));
/*-------------  Flat Battery ------------------------*/
Breadcrumbs::resource('flatbatterys', $mls->messageLanguage('only_name', 'flatbattery', 2));
/*-------------  Flat Tyre ------------------------*/
Breadcrumbs::resource('flattyres', $mls->messageLanguage('only_name', 'flattyre', 2));
/*-------------  Flat Tyre ------------------------*/
Breadcrumbs::resource('petroldesiels', $mls->messageLanguage('only_name', 'petroldesiel', 2));
