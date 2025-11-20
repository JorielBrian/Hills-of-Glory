<?php

use App\Enums\EventsEnums\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\MemberType;
use App\Enums\MemberEnums\HillsJourney;
use App\Enums\MemberEnums\Ministry;
use App\Enums\MemberEnums\MinistryRole;
use App\Enums\MemberEnums\UserRole;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('birth_date');
            $table->enum('gender', array_map(fn($case) => $case->value, Gender::cases()));
            $table->boolean('is_married')->default(false);

            // BASIC INFORMATION EXTENSION
            $table->string('address')->nullable();
            $table->string('contact')->nullable()->unique();
            $table->string('facebook_account')->nullable();

            // CHURCH INFORMATION
            $table->enum('member_type', array_map(fn($case) => $case->value, MemberType::cases()))->nullable();
            $table->enum('member_role', array_map(fn($case) => $case->value, UserRole::cases()))->default(UserRole::CORE_LEADER->value);
            $table->enum('hills_journey', array_map(fn($case) => $case->value, HillsJourney::cases()))->default(HillsJourney::GRADUATE->value);

            // INVITATION INFORMATION
            $table->string('invited_by')->nullable();
            $table->date('date_invited')->nullable();
            $table->string('service_invited', array_map(fn($case) => $case->value, Event::cases()))->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->enum('ministry', array_map(fn($case) => $case->value, Ministry::cases()))->nullable();
            $table->enum('ministry_role', array_map(fn($case) => $case->value, MinistryRole::cases()))->nullable();
            $table->string('ministry_assignment')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->index('member_role');
            $table->index('is_admin');
            $table->index('date_invited');
            $table->index('contact');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
