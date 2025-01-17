<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('agency_id')->nullable();
            $table->string('job_image')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_type')->nullable();
            $table->string('skills_required')->nullable();
            $table->string('job_vacancy')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('job_salary')->nullable();
            $table->string('salary_frequency')->nullable();
            $table->longText('job_description')->nullable();
            $table->string('job_status')->nullable();
            $table->timestamps();
        });

        // Insert job data by category
        DB::table('job_details')->insert([
            // Skilled Trades Jobs
            [
                'job_title' => 'Electrician',
                'category_id' => 1,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Bacolod',
                'job_type' => 'Full Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 12000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Install, maintain, and repair electrical systems and components.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_title' => 'Plumber',
                'category_id' => 1,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Victorias',
                'job_type' => 'Part Time',
                'skills_required' => null,
                'job_vacancy' => 1,
                'other_skills' => null,
                'job_salary' => '₱ 15000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Install and repair piping systems, fixtures, and plumbing systems.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'job_title' => 'Construction Laborer',
                'category_id' => 2,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Bacolod',
                'job_type' => 'Full Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 25000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Perform various tasks at construction sites such as material handling and site clean-up.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_title' => 'Site Supervisor',
                'category_id' => 2,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Bacolod',
                'job_type' => 'Full Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 25000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Oversee daily operations at construction sites and ensure safety protocols are followed.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Manufacturing Jobs
            [
                'job_title' => 'Machine Operator',
                'category_id' => 3,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Talisay',
                'job_type' => 'Full Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 30000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Operate and maintain production machinery on the assembly line.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_title' => 'Assembly Line Worker',
                'category_id' => 3,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Talisay',
                'job_type' => 'Part Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 35000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Perform tasks on the assembly line for manufacturing products.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Transportation and Logistics Jobs
            [
                'job_title' => 'Truck Driver',
                'category_id' => 4,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Talisay',
                'job_type' => 'Part Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 26000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Drive trucks to transport goods across locations, ensuring timely delivery.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_title' => 'Warehouse Manager',
                'category_id' => 4,
                'agency_id' => 2,
                'job_image' => 'default.jpg',
                'job_location' => 'Victorias',
                'job_type' => 'Part Time',
                'skills_required' => null,
                'job_vacancy' => 2,
                'other_skills' => null,
                'job_salary' => '₱ 35000.00',
                'salary_frequency' => 'monthly',
                'job_description' => 'Oversee warehouse operations, including inventory management and logistics.',
                'job_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_details');
    }
};
