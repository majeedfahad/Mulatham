<?php

use App\Models\Elimination;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHiddenScoreColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->double('hidden_score')->after('score')->nullable();
        });
        $users = User::all();
        $eliminaions = Elimination::where('status', 'SUCCESS')->get();
        foreach ($users as $user) {
            foreach ($eliminaions as $e) {
                if($user->id == $e->attacker_id) {
                    $user->hidden_score = $e->points;
                    $user->update();
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('hidden_score');
        });
    }
}
