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
        Schema::table('web_identities', function (Blueprint $table) {
            // Google Analytics
            $table->string('google_analytics_id')->nullable()->after('google_maps')->comment('Google Analytics Measurement ID (G-XXXXXXXXXX)');
            $table->string('google_tag_manager_id')->nullable()->after('google_analytics_id')->comment('Google Tag Manager ID (GTM-XXXXXXX)');
            $table->string('google_site_verification')->nullable()->after('google_tag_manager_id')->comment('Google Search Console verification code');
            $table->text('google_analytics_code')->nullable()->after('google_site_verification')->comment('Full Google Analytics tracking code (optional)');
            $table->text('google_tag_manager_head')->nullable()->after('google_analytics_code')->comment('GTM head code (optional)');
            $table->text('google_tag_manager_body')->nullable()->after('google_tag_manager_head')->comment('GTM body code (optional)');
            
            // Other tracking codes
            $table->text('facebook_pixel_id')->nullable()->after('google_tag_manager_body')->comment('Facebook Pixel ID');
            $table->text('custom_head_scripts')->nullable()->after('facebook_pixel_id')->comment('Custom scripts for <head>');
            $table->text('custom_body_scripts')->nullable()->after('custom_head_scripts')->comment('Custom scripts for <body>');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_identities', function (Blueprint $table) {
            $table->dropColumn([
                'google_analytics_id',
                'google_tag_manager_id',
                'google_site_verification',
                'google_analytics_code',
                'google_tag_manager_head',
                'google_tag_manager_body',
                'facebook_pixel_id',
                'custom_head_scripts',
                'custom_body_scripts',
            ]);
        });
    }
};
