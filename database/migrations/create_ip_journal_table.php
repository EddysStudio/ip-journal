<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('ipjournal')) {
            Schema::create('ipjournal', function (Blueprint $table) {
                $table->id();
                $table->string('ip', 45);
                $table->string('url', 1024);
                $table->unsignedBigInteger('count')->default(1);
                $table->text('agent')->nullable();
                $table->timestamps();

                $table->index('ip');
                $table->rawIndex('url(190)', 'ipjournal_url_prefix_index');
                $table->index('count');
            });
        }
    }
    public function down(): void
    {
        Schema::dropIfExists('ipjournal');
    }
};
