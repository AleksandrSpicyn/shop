<?php

use App\Models\Element;
use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementPropertyTable extends Migration
{
    public function up(): void
    {
        Schema::create('element_property', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Element::class);
            $table->foreignIdFor(Property::class);
            $table->string('value');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('element_property');
    }
}
