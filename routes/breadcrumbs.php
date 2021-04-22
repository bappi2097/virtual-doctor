<?php

// Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Profile
Breadcrumbs::for('admin.profile', function ($trail) {
    $trail->push('Profile', route('admin.profile.edit'));
});

// Dashboard > Admin
Breadcrumbs::for('admin', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Admin', route('admin.users.admin.index'));
});

// Dashboard > Admin > Create
Breadcrumbs::for('admin.create', function ($trail) {
    $trail->parent('admin');
    $trail->push('Create', route('admin.users.admin.create'));
});

// Dashboard > Admin > Show
Breadcrumbs::for('admin.show', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Show', route('admin.users.admin.show', $id));
});


// Dashboard > Admin > Edit
Breadcrumbs::for('admin.edit', function ($trail, $id) {
    $trail->parent('admin');
    $trail->push('Edit', route('admin.users.admin.edit', $id));
});

// Dashboard > Doctor
Breadcrumbs::for('doctor', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Doctor', route('admin.users.doctor.index'));
});

// Dashboard > Doctor > Create
Breadcrumbs::for('doctor.create', function ($trail) {
    $trail->parent('doctor');
    $trail->push('Create', route('admin.users.doctor.create'));
});

// Dashboard > Doctor > Show
Breadcrumbs::for('doctor.show', function ($trail, $id) {
    $trail->parent('doctor');
    $trail->push('Show', route('admin.users.doctor.show', $id));
});


// Dashboard > Doctor > Edit
Breadcrumbs::for('doctor.edit', function ($trail, $id) {
    $trail->parent('doctor');
    $trail->push('Edit', route('admin.users.doctor.edit', $id));
});

// Dashboard > Doctor > Schedule
Breadcrumbs::for('doctor.schedule', function ($trail, $id) {
    $trail->parent('doctor');
    $trail->push('Schedule', route('admin.users.doctor.doctor-schedule.edit', $id));
});

// Dashboard > Patient
Breadcrumbs::for('patient', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Patient', route('admin.users.patient.index'));
});

// Dashboard > Patient > Create
Breadcrumbs::for('patient.create', function ($trail) {
    $trail->parent('patient');
    $trail->push('Create', route('admin.users.patient.create'));
});

// Dashboard > Patient > Show
Breadcrumbs::for('patient.show', function ($trail, $id) {
    $trail->parent('patient');
    $trail->push('Show', route('admin.users.patient.show', $id));
});

// Dashboard > Patient > Edit
Breadcrumbs::for('patient.edit', function ($trail, $id) {
    $trail->parent('patient');
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
