<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements JWTSubject // Implement the interface
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function bioData()
    {
        return $this->hasOne(MemberBioData::class);
    }

    public static function countDomesticUsers(){
        return User::whereRole('user')->count();
    }
    // app/Models/User.php
    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class);
    }

    public function primaryEmergencyContact()
    {
        return $this->hasOne(EmergencyContact::class)->where('is_primary', true);
    }

    public static function getAdmins(){
        return User::whereRole('admin')->get();
    }

    public static function createAdminAccount($name, $email, $phone, $role, $password)
    {
        return self::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
            'password' => Hash::make($password),
        ]);
    }

    public static function changePassword($password){
        User::whereId(Auth::user()->id)->update([
         'password' => Hash::make($password),
        ]);
    }
}
