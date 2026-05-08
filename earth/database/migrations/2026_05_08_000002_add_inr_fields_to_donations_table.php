<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('pan_number', 20)->nullable()->after('first_name');
            $table->string('mobile_number', 15)->nullable()->after('pan_number');
            $table->string('bank_name', 250)->nullable()->after('mobile_number');
            $table->string('bank_account_number', 100)->nullable()->after('bank_name');
            $table->string('is_indian_citizen', 10)->nullable()->after('bank_account_number');
            $table->string('is_donating_inr', 10)->nullable()->after('is_indian_citizen');
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['pan_number', 'mobile_number', 'bank_name', 'bank_account_number', 'is_indian_citizen', 'is_donating_inr']);
        });
    }
};
