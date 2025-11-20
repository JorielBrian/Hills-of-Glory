<?php

use App\Enums\EventsEnums\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\MemberRole;
use App\Enums\MemberEnums\HillsJourney;
use App\Enums\MemberEnums\MemberType;
use App\Enums\MemberEnums\Ministry;
use App\Enums\MemberEnums\MinistryRole;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            // BASIC INFORMATION
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender', array_map(fn($case) => $case->value, Gender::cases()));
            $table->date('birth_date');
            $table->string('address');
            $table->string('contact')->unique();
            $table->string('email')->nullable()->unique();
            $table->enum('member_type', array_map(fn($case) => $case->value, MemberType::cases()));
            $table->boolean('is_married')->default(false);

            // PHOTO
            $table->string('member_photo')->nullable();

            // CHURCH INFORMATION
            $table->string('invited_by');
            $table->date('date_invited');
            $table->string('service_invited', array_map(fn($case) => $case->value, Event::cases()));
            $table->enum('member_role', array_map(fn($case) => $case->value, MemberRole::cases()));
            $table->enum('hills_journey', array_map(fn($case) => $case->value, HillsJourney::cases()))->nullable();

            // SOCIAL MEDIA
            $table->string('facebook_account')->nullable();

            // MINISTRY
            $table->enum('ministry', array_map(fn($case) => $case->value, Ministry::cases()))->nullable();
            $table->enum('ministry_role', array_map(fn($case) => $case->value, MinistryRole::cases()))->nullable();
            $table->string('ministry_assignment')->nullable();

            // LIFE GROUP
            $table->foreignId('life_group_id')->nullable()->constrained('life_groups');
            $table->foreignId('network_leader_id')->nullable()->constrained('users');

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Added indexes for better performance
            $table->index('life_group_id');
            $table->index('network_leader_id');
            $table->index('is_active');
            $table->index('member_type');
            $table->index('email');
            $table->index('date_invited');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
