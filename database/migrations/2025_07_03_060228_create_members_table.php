<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\Status;
use App\Enums\MemberEnums\ChurchRole;
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
            $table->integer('age');
            $table->enum('gender', array_map(fn($case) => $case->value, Gender::cases()));
            $table->date('birth_date');
            $table->string('address');
            $table->string('contact')->unique();
            $table->enum('status', array_map(fn($case) => $case->value, Status::cases()));
            $table->string('invitedBy')->nullable();
            // CHURCH INFORMATION
            $table->enum('church_role', array_map(fn($case) => $case->value, ChurchRole::cases()));
            // MINISTRY
            $table->enum('ministry', array_map(fn($case) => $case->value, Ministry::cases()))->nullable();
            $table->enum('ministry_role', array_map(fn($case) => $case->value, MinistryRole::cases()))->nullable();
            $table->string('ministry_assignment')->nullable();
            // LIFEGROUP
            $table->string('network_leader')->nullable();
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
