<?php

namespace Database\Seeders;

use App\Models\DoctorCategory;
use Illuminate\Database\Seeder;

class DoctorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorCategory::create([
            'name' => 'Pediatrician',
            'image' => 'assets/images/doctor-category/1.jpg',
            'description' => "Pediatricians take care of younger patients, from infancy through age 18 or, in some cases, age. Pediatricians provide primary health care to children, including immunizations, well-baby checks, school physicals, and treatment of coughs, colds, and stomach flu, among many other things. More seriously ill or complicated patients may be referred to a pediatric sub-specialist for specialized treatment."
        ]);

        DoctorCategory::create([
            'name' => 'Gynecologist',
            'image' => 'assets/images/doctor-category/4.jpg',
            'description' => "A gynecologist is a doctor who specializes in women's health, which includes reproductive health, menopause, and hormone problems. An obstetrician provides care for women that are pregnant and are trained to deliver babies. Often, these specialities are combined, in which case the physician is referred to as an OB/GYN"
        ]);

        DoctorCategory::create([
            'name' => 'Surgeon',
            'image' => 'assets/images/doctor-category/2.jpg',
            'description' => "Surgeons can be trained in general surgery or in more specialized areas of surgery, such as hand surgery, pediatric surgery, surgical oncology, or vascular surgery. Surgeons spend time planning a surgical procedure, performing surgery in the operating room, and then following up postoperatively to identify complications and to confirm that the procedure was a success."
        ]);

        DoctorCategory::create([
            'name' => 'Psychiatrist',
            'image' => 'assets/images/doctor-category/3.jpg',
            'description' => "A psychiatrist specializes in mental health and treats emotional and behavioral problems through a combination of personal counseling (psychotherapy), psychoanalysis, hospitalization, and medication. Psychiatrists may be office-based, hospital-based, or a combination of the two. "
        ]);
    }
}
