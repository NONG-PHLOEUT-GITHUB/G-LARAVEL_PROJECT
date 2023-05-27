<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];
    public static function store($request , $id = null){
        // $plans = $request->only([
        //     'plan_name',
        //     'date_time',
        //     'type',
        //     'spray_density',
        //     'plan_description',
        //     'user_id',
        // ]);
        $users = $request->only([
            'name',
            'email',
            'password',
            'phone_number',
        ]);
        $users['password'] = Hash::make($users['password']);
      
        if ($id) {
            $user = self::find($id);
            if (!$user) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $user->update($users);
        } else {
            $user = self::create($users);
            $id = $user->$id;
        }

        $token = null;
        $token = $user->createToken('TOKEN', ['select', 'create', 'update', 'delete']);
        return response()->json(['success' =>true, 'data' => $user,'token' => $token->plainTextToken],201);
    }
   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relation to farm
    public function farms():HasMany{
        return $this->hasMany(Farm::class);
    }
    public function drones():HasMany{
        return $this->hasMany(Drone::class);
    }
    public function plans():HasMany{
        return $this->hasMany(Plan::class);
    }
    public function instruction():HasMany{
        return $this->hasMany(Instruction::class);
    }

}
