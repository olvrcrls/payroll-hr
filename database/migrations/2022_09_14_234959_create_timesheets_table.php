<?php

use App\Base\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends BaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id();
            $table->datetime('start')->default('now');
            $table->datetime('end')->nullable();
            $table->datetime('original_start')->nullable();
            $table->datetime('original_end')->nullable();

            $table->unsignedInteger('break_minutes')->default(0);
            $table->text('annotation')->nullable();
            $table->enum('type', ['normal', 'holiday', 'night-shift', 'weekend']);
            $table->enum('status', ['approved', 'pending', 'declined', 'change-request', 'updated', 'finalized']);

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('approved_by')->index();
            $table->text('approver_note')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamp('finalized_at')->nullable();

            $table->softDeletes();
            $this->setDeletedAtColumns($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
};
