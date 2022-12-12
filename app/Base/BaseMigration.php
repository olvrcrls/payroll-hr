<?php

namespace App\Base;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

abstract class BaseMigration extends Migration
{
    public function setDeletedAtColumns(Blueprint $table)
    {
        $table->unsignedBigInteger('deleted_by')->nullable()->index();
        $table->unsignedBigInteger('restored_by')->nullable()->index();
        $table->datetime('restored_at')->nullable();
    }
}
