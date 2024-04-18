<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify users table if it's already created by Breeze
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                // Add the profile_picture_url column
                $table->string('profile_picture_url')->nullable()->after('password');
            });
        } else {
            // If users table is not created yet, create it as per the new requirements
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('profile_picture_url')->nullable(); // Add profile picture URL
                $table->rememberToken();
                $table->timestamps();
            });
        }

        // Keep the Breeze's password reset tokens if you plan to use that functionality
        // Otherwise, you can remove this block if you don't need it
        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        // Keep the Breeze's session management if you plan to use that functionality
        // Otherwise, you can remove this block if you don't need it
        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback modifications by dropping the column if it exists
        if (Schema::hasColumn('users', 'profile_picture_url')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('profile_picture_url');
            });
        }

        // If you're keeping the password reset tokens table from Breeze, don't drop it here
        // If you've added it in the up() method and want to be able to rollback, uncomment the following line:
        // Schema::dropIfExists('password_reset_tokens');

        // If you're keeping the sessions table from Breeze, don't drop it here
        // If you've added it in the up() method and want to be able to rollback, uncomment the following line:
        // Schema::dropIfExists('sessions');
    }
};
