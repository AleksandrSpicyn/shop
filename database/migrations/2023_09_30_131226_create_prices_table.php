<?php

use App\Models\Element;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    public function up(): void
    {
        Schema::create('prices', static function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Element::class);
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
}
