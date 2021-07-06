<?php
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('categories')->insert([

            [
                'id' => '1',
                'name' => 'IT'
            ],
            [
                'id' => '2',
                'name' => 'Cars'
            ],
            [
                'id' => '3',
                'name' => 'Phones'
            ],
            [
                'id' => '4',
                'name' => 'World'
            ],
            [
                'id' => '5',
                'name' => 'Pets'
            ],
            [
                'id' => '6',
                'name' => 'Travels'
            ],
            [
                'id' => '7',
                'name' => 'Sports'
            ],
            [
                'id' => '8',
                'name' => 'Relationships'
            ],
            [
                'id' => '9',
                'name' => 'Parenthood'
            ]
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
