<?php

/* -------------------------------------------------------------------------- */
/*                           Admin Breadcrumb Start                           */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Profile
Breadcrumbs::for('admin.profile', function ($trail) {
    $trail->push('Profile', route('admin.profile.edit'));
});

// Dashboard > Admin
Breadcrumbs::for('admin.admin', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Admin', route('admin.users.admin.index'));
});

// Dashboard > Admin > Create
Breadcrumbs::for('admin.admin.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Create', route('admin.users.admin.create'));
});

// Dashboard > Admin > Show
Breadcrumbs::for('admin.admin.show', function ($trail, $id) {
    $trail->parent('admin.dashboard');
    $trail->push('Show', route('admin.users.admin.show', $id));
});


// Dashboard > Admin > Edit
Breadcrumbs::for('admin.admin.edit', function ($trail, $id) {
    $trail->parent('admin.dashboard');
    $trail->push('Edit', route('admin.users.admin.edit', $id));
});

// Dashboard > Doctor
Breadcrumbs::for('admin.doctor', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Doctor', route('admin.users.doctor.index'));
});

// Dashboard > Doctor > Create
Breadcrumbs::for('admin.doctor.create', function ($trail) {
    $trail->parent('admin.doctor');
    $trail->push('Create', route('admin.users.doctor.create'));
});

// Dashboard > Doctor > Show
Breadcrumbs::for('admin.doctor.show', function ($trail, $id) {
    $trail->parent('admin.doctor');
    $trail->push('Show', route('admin.users.doctor.show', $id));
});


// Dashboard > Doctor > Edit
Breadcrumbs::for('admin.doctor.edit', function ($trail, $id) {
    $trail->parent('admin.doctor');
    $trail->push('Edit', route('admin.users.doctor.edit', $id));
});

// Dashboard > Doctor > Schedule
Breadcrumbs::for('admin.doctor.schedule', function ($trail, $id) {
    $trail->parent('admin.doctor');
    $trail->push('Schedule', route('admin.users.doctor.doctor-schedule.edit', $id));
});

// Dashboard > Patient
Breadcrumbs::for('admin.patient', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Patient', route('admin.users.patient.index'));
});

// Dashboard > Patient > Create
Breadcrumbs::for('admin.patient.create', function ($trail) {
    $trail->parent('admin.patient');
    $trail->push('Create', route('admin.users.patient.create'));
});

// Dashboard > Patient > Show
Breadcrumbs::for('admin.patient.show', function ($trail, $id) {
    $trail->parent('admin.patient');
    $trail->push('Show', route('admin.users.patient.show', $id));
});

// Dashboard > Patient > Edit
Breadcrumbs::for('admin.patient.edit', function ($trail, $id) {
    $trail->parent('admin.patient');
    $trail->push('Edit', route('admin.users.patient.edit', $id));
});


// Dashboard > Doctor Category
Breadcrumbs::for('admin.doctor-category', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Doctor Category', route('admin.doctor-category.index'));
});

// Dashboard > Doctor Category > Create
Breadcrumbs::for('admin.doctor-category.create', function ($trail) {
    $trail->parent('admin.doctor-category');
    $trail->push('Create', route('admin.doctor-category.create'));
});

// Dashboard > Doctor Category > Show
Breadcrumbs::for('admin.doctor-category.show', function ($trail, $id) {
    $trail->parent('admin.doctor-category');
    $trail->push('Show', route('admin.doctor-category.show', $id));
});

// Dashboard > Doctor Category > Edit
Breadcrumbs::for('admin.doctor-category.edit', function ($trail, $id) {
    $trail->parent('admin.doctor-category');
    $trail->push('Edit', route('admin.doctor-category.edit', $id));
});


// Dashboard > Appointment
Breadcrumbs::for('admin.appointment', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Appointment', route('admin.appointments.index'));
});

// Dashboard > Appointment > Create
Breadcrumbs::for('admin.appointment.create', function ($trail) {
    $trail->parent('admin.appointment');
    $trail->push('Create', route('admin.appointments.create'));
});

// Dashboard > Appointment > Show
Breadcrumbs::for('admin.appointment.show', function ($trail, $id) {
    $trail->parent('admin.appointment');
    $trail->push('Show', route('admin.appointments.show', $id));
});

// Dashboard > Appointment > Edit
Breadcrumbs::for('admin.appointment.edit', function ($trail, $id) {
    $trail->parent('admin.appointment');
    $trail->push('Edit', route('admin.appointments.edit', $id));
});


// Dashboard > Health
Breadcrumbs::for('admin.health', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Health', route('admin.healths.index'));
});

// Dashboard > Health > Create
Breadcrumbs::for('admin.health.create', function ($trail) {
    $trail->parent('admin.health');
    $trail->push('Create', route('admin.healths.create'));
});

// Dashboard > Health > Show
Breadcrumbs::for('admin.health.show', function ($trail, $id) {
    $trail->parent('admin.health');
    $trail->push('Show', route('admin.healths.show', $id));
});

// Dashboard > Health > Edit
Breadcrumbs::for('admin.health.edit', function ($trail, $id) {
    $trail->parent('admin.health');
    $trail->push('Edit', route('admin.healths.edit', $id));
});


// Dashboard > Report
Breadcrumbs::for('admin.report', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Report', route('admin.reports.index'));
});

// Dashboard > Report > Create
Breadcrumbs::for('admin.report.create', function ($trail) {
    $trail->parent('admin.report');
    $trail->push('Create', route('admin.reports.create'));
});

// Dashboard > Report > Show
Breadcrumbs::for('admin.report.show', function ($trail, $id) {
    $trail->parent('admin.report');
    $trail->push('Show', route('admin.reports.show', $id));
});

// Dashboard > Report > Edit
Breadcrumbs::for('admin.report.edit', function ($trail, $id) {
    $trail->parent('admin.report');
    $trail->push('Edit', route('admin.reports.edit', $id));
});


// Dashboard > Info
Breadcrumbs::for('admin.info', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Information', route('admin.infos.index'));
});

// Dashboard > Info > Create
Breadcrumbs::for('admin.info.create', function ($trail) {
    $trail->parent('admin.info');
    $trail->push('Create', route('admin.infos.create'));
});

// Dashboard > Info > Show
Breadcrumbs::for('admin.info.show', function ($trail, $id) {
    $trail->parent('admin.info');
    $trail->push('Show', route('admin.infos.show', $id));
});

// Dashboard > Info > Edit
Breadcrumbs::for('admin.info.edit', function ($trail, $id) {
    $trail->parent('admin.info');
    $trail->push('Edit', route('admin.infos.edit', $id));
});

// Dashboard > Prescription
Breadcrumbs::for('admin.prescription', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Prescription', route('admin.prescriptions.index'));
});

// Dashboard > Prescription > Create
Breadcrumbs::for('admin.prescription.create', function ($trail) {
    $trail->parent('admin.prescription');
    $trail->push('Create', route('admin.prescriptions.create'));
});

// Dashboard > Prescription > Show
Breadcrumbs::for('admin.prescription.show', function ($trail, $id) {
    $trail->parent('admin.prescription');
    $trail->push('Show', route('admin.prescriptions.show', $id));
});

// Dashboard > Prescription > Edit
Breadcrumbs::for('admin.prescription.edit', function ($trail, $id) {
    $trail->parent('admin.prescription');
    $trail->push('Edit', route('admin.prescriptions.edit', $id));
});

/* -------------------------------------------------------------------------- */
/*                            Admin Breadcrumb End                            */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                           Doctor Breadcrumb Start                          */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('doctor.dashboard', function ($trail) {
    $trail->push('Dashboard', route('doctor.dashboard'));
});

// Profile
Breadcrumbs::for('doctor.profile', function ($trail) {
    $trail->push('Profile', route('doctor.profile.edit'));
});

// Dashboard > Doctor
Breadcrumbs::for('doctor.doctor', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Doctor', route('doctor.users.doctor.index'));
});

// Dashboard > Doctor > Show
Breadcrumbs::for('doctor.doctor.show', function ($trail, $id) {
    $trail->parent('doctor.doctor');
    $trail->push('Show', route('doctor.users.doctor.show', $id));
});

// Dashboard > Doctor > Schedule
Breadcrumbs::for('doctor.doctor.schedule', function ($trail, $id) {
    $trail->parent('doctor.doctor');
    $trail->push('Schedule', route('doctor.users.doctor.doctor-schedule.show', $id));
});

// Dashboard > Patient
Breadcrumbs::for('doctor.patient', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Patient', route('doctor.users.patient.index'));
});

// Dashboard > Patient > Create
Breadcrumbs::for('doctor.patient.create', function ($trail) {
    $trail->parent('doctor.patient');
    $trail->push('Create', route('doctor.users.patient.create'));
});

// Dashboard > Patient > Show
Breadcrumbs::for('doctor.patient.show', function ($trail, $id) {
    $trail->parent('doctor.patient');
    $trail->push('Show', route('doctor.users.patient.show', $id));
});

// Dashboard > Patient > Edit
Breadcrumbs::for('doctor.patient.edit', function ($trail, $id) {
    $trail->parent('doctor.patient');
    $trail->push('Edit', route('doctor.users.patient.edit', $id));
});


// Dashboard > Doctor Category
Breadcrumbs::for('doctor.doctor-category', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Doctor Category', route('doctor.doctor-category.index'));
});

// Dashboard > Doctor Category > Show
Breadcrumbs::for('doctor.doctor-category.show', function ($trail, $id) {
    $trail->parent('doctor.doctor-category');
    $trail->push('Show', route('doctor.doctor-category.show', $id));
});

// Dashboard > Appointment
Breadcrumbs::for('doctor.appointment', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Appointment', route('doctor.appointments.index'));
});

// Dashboard > Appointment > Create
Breadcrumbs::for('doctor.appointment.create', function ($trail) {
    $trail->parent('doctor.appointment');
    $trail->push('Create', route('doctor.appointments.create'));
});

// Dashboard > Appointment > Show
Breadcrumbs::for('doctor.appointment.show', function ($trail, $id) {
    $trail->parent('doctor.appointment');
    $trail->push('Show', route('doctor.appointments.show', $id));
});

// Dashboard > Appointment > Edit
Breadcrumbs::for('doctor.appointment.edit', function ($trail, $id) {
    $trail->parent('doctor.appointment');
    $trail->push('Edit', route('doctor.appointments.edit', $id));
});


// Dashboard > Health
Breadcrumbs::for('doctor.health', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Health', route('doctor.healths.index'));
});

// Dashboard > Health > Show
Breadcrumbs::for('doctor.health.show', function ($trail, $id) {
    $trail->parent('doctor.health');
    $trail->push('Show', route('doctor.healths.show', $id));
});

// Dashboard > Report
Breadcrumbs::for('doctor.report', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Report', route('doctor.reports.index'));
});

// Dashboard > Report > Create
Breadcrumbs::for('doctor.report.create', function ($trail) {
    $trail->parent('doctor.report');
    $trail->push('Create', route('doctor.reports.create'));
});

// Dashboard > Report > Show
Breadcrumbs::for('doctor.report.show', function ($trail, $id) {
    $trail->parent('doctor.report');
    $trail->push('Show', route('doctor.reports.show', $id));
});

// Dashboard > Report > Edit
Breadcrumbs::for('doctor.report.edit', function ($trail, $id) {
    $trail->parent('doctor.report');
    $trail->push('Edit', route('doctor.reports.edit', $id));
});


// Dashboard > Info
Breadcrumbs::for('doctor.info', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Information', route('doctor.infos.index'));
});

// Dashboard > Info > Create
Breadcrumbs::for('doctor.info.create', function ($trail) {
    $trail->parent('doctor.info');
    $trail->push('Create', route('doctor.infos.create'));
});

// Dashboard > Info > Show
Breadcrumbs::for('doctor.info.show', function ($trail, $id) {
    $trail->parent('doctor.info');
    $trail->push('Show', route('doctor.infos.show', $id));
});

// Dashboard > Info > Edit
Breadcrumbs::for('doctor.info.edit', function ($trail, $id) {
    $trail->parent('doctor.info');
    $trail->push('Edit', route('doctor.infos.edit', $id));
});

// Dashboard > Prescription
Breadcrumbs::for('doctor.prescription', function ($trail) {
    $trail->parent('doctor.dashboard');
    $trail->push('Prescription', route('doctor.prescriptions.index'));
});

// Dashboard > Prescription > Create
Breadcrumbs::for('doctor.prescription.create', function ($trail) {
    $trail->parent('doctor.prescription');
    $trail->push('Create', route('doctor.prescriptions.create'));
});

// Dashboard > Prescription > Show
Breadcrumbs::for('doctor.prescription.show', function ($trail, $id) {
    $trail->parent('doctor.prescription');
    $trail->push('Show', route('doctor.prescriptions.show', $id));
});

// Dashboard > Prescription > Edit
Breadcrumbs::for('doctor.prescription.edit', function ($trail, $id) {
    $trail->parent('doctor.prescription');
    $trail->push('Edit', route('doctor.prescriptions.edit', $id));
});

/* -------------------------------------------------------------------------- */
/*                           Doctor Breadcrumb end                            */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                          Patient Breadcrumb Start                          */
/* -------------------------------------------------------------------------- */

// Dashboard
Breadcrumbs::for('patient.dashboard', function ($trail) {
    $trail->push('Dashboard', route('patient.dashboard'));
});

// Profile
Breadcrumbs::for('patient.profile', function ($trail) {
    $trail->push('Profile', route('patient.profile.edit'));
});

// Dashboard > Doctor
Breadcrumbs::for('patient.doctor', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Doctor', route('patient.users.doctor.index'));
});

// Dashboard > Doctor > Create
Breadcrumbs::for('patient.doctor.create', function ($trail) {
    $trail->parent('patient.doctor');
    $trail->push('Create', route('patient.users.doctor.create'));
});

// Dashboard > Doctor > Show
Breadcrumbs::for('patient.doctor.show', function ($trail, $id) {
    $trail->parent('patient.doctor');
    $trail->push('Show', route('patient.users.doctor.show', $id));
});


// Dashboard > Doctor > Edit
Breadcrumbs::for('patient.doctor.edit', function ($trail, $id) {
    $trail->parent('patient.doctor');
    $trail->push('Edit', route('patient.users.doctor.edit', $id));
});

// Dashboard > Doctor > Schedule
Breadcrumbs::for('patient.doctor.schedule', function ($trail, $id) {
    $trail->parent('patient.doctor');
    $trail->push('Schedule', route('patient.users.doctor.doctor-schedule.edit', $id));
});

// Dashboard > Patient
Breadcrumbs::for('patient.patient', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Patient', route('patient.users.patient.index'));
});

// Dashboard > Patient > Create
Breadcrumbs::for('patient.patient.create', function ($trail) {
    $trail->parent('patient.patient');
    $trail->push('Create', route('patient.users.patient.create'));
});

// Dashboard > Patient > Show
Breadcrumbs::for('patient.patient.show', function ($trail, $id) {
    $trail->parent('patient.patient');
    $trail->push('Show', route('patient.users.patient.show', $id));
});

// Dashboard > Patient > Edit
Breadcrumbs::for('patient.patient.edit', function ($trail, $id) {
    $trail->parent('patient.patient');
    $trail->push('Edit', route('patient.users.patient.edit', $id));
});


// Dashboard > Doctor Category
Breadcrumbs::for('patient.doctor-category', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Doctor Category', route('patient.doctor-category.index'));
});

// Dashboard > Doctor Category > Create
Breadcrumbs::for('patient.doctor-category.create', function ($trail) {
    $trail->parent('patient.doctor-category');
    $trail->push('Create', route('patient.doctor-category.create'));
});

// Dashboard > Doctor Category > Show
Breadcrumbs::for('patient.doctor-category.show', function ($trail, $id) {
    $trail->parent('patient.doctor-category');
    $trail->push('Show', route('patient.doctor-category.show', $id));
});

// Dashboard > Doctor Category > Edit
Breadcrumbs::for('patient.doctor-category.edit', function ($trail, $id) {
    $trail->parent('patient.doctor-category');
    $trail->push('Edit', route('patient.doctor-category.edit', $id));
});


// Dashboard > Appointment
Breadcrumbs::for('patient.appointment', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Appointment', route('patient.appointments.index'));
});

// Dashboard > Appointment > Create
Breadcrumbs::for('patient.appointment.create', function ($trail) {
    $trail->parent('patient.appointment');
    $trail->push('Create', route('patient.appointments.create'));
});

// Dashboard > Appointment > Show
Breadcrumbs::for('patient.appointment.show', function ($trail, $id) {
    $trail->parent('patient.appointment');
    $trail->push('Show', route('patient.appointments.show', $id));
});

// Dashboard > Appointment > Edit
Breadcrumbs::for('patient.appointment.edit', function ($trail, $id) {
    $trail->parent('patient.appointment');
    $trail->push('Edit', route('patient.appointments.edit', $id));
});


// Dashboard > Health
Breadcrumbs::for('patient.health', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Health', route('patient.healths.index'));
});

// Dashboard > Health > Create
Breadcrumbs::for('patient.health.create', function ($trail) {
    $trail->parent('patient.health');
    $trail->push('Create', route('patient.healths.create'));
});

// Dashboard > Health > Show
Breadcrumbs::for('patient.health.show', function ($trail, $id) {
    $trail->parent('patient.health');
    $trail->push('Show', route('patient.healths.show', $id));
});

// Dashboard > Health > Edit
Breadcrumbs::for('patient.health.edit', function ($trail, $id) {
    $trail->parent('patient.health');
    $trail->push('Edit', route('patient.healths.edit', $id));
});


// Dashboard > Report
Breadcrumbs::for('patient.report', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Report', route('patient.reports.index'));
});

// Dashboard > Report > Create
Breadcrumbs::for('patient.report.create', function ($trail) {
    $trail->parent('patient.report');
    $trail->push('Create', route('patient.reports.create'));
});

// Dashboard > Report > Show
Breadcrumbs::for('patient.report.show', function ($trail, $id) {
    $trail->parent('patient.report');
    $trail->push('Show', route('patient.reports.show', $id));
});

// Dashboard > Report > Edit
Breadcrumbs::for('patient.report.edit', function ($trail, $id) {
    $trail->parent('patient.report');
    $trail->push('Edit', route('patient.reports.edit', $id));
});


// Dashboard > Info
Breadcrumbs::for('patient.info', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Information', route('patient.infos.index'));
});

// Dashboard > Info > Create
Breadcrumbs::for('patient.info.create', function ($trail) {
    $trail->parent('patient.info');
    $trail->push('Create', route('patient.infos.create'));
});

// Dashboard > Info > Show
Breadcrumbs::for('patient.info.show', function ($trail, $id) {
    $trail->parent('patient.info');
    $trail->push('Show', route('patient.infos.show', $id));
});

// Dashboard > Info > Edit
Breadcrumbs::for('patient.info.edit', function ($trail, $id) {
    $trail->parent('patient.info');
    $trail->push('Edit', route('patient.infos.edit', $id));
});

// Dashboard > Prescription
Breadcrumbs::for('patient.prescription', function ($trail) {
    $trail->parent('patient.dashboard');
    $trail->push('Prescription', route('patient.prescriptions.index'));
});

// Dashboard > Prescription > Create
Breadcrumbs::for('patient.prescription.create', function ($trail) {
    $trail->parent('patient.prescription');
    $trail->push('Create', route('patient.prescriptions.create'));
});

// Dashboard > Prescription > Show
Breadcrumbs::for('patient.prescription.show', function ($trail, $id) {
    $trail->parent('patient.prescription');
    $trail->push('Show', route('patient.prescriptions.show', $id));
});

// Dashboard > Prescription > Edit
Breadcrumbs::for('patient.prescription.edit', function ($trail, $id) {
    $trail->parent('patient.prescription');
    $trail->push('Edit', route('patient.prescriptions.edit', $id));
});


/* -------------------------------------------------------------------------- */
/*                           Patient Breadcrumb End                           */
/* -------------------------------------------------------------------------- */


// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });
