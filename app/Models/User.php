<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Laravel\Sanctum\HasApiTokens;
/**
 * @OA\Schema(
 *      schema="User",
 *      required={"roles_id","name","email","password"},
 *      @OA\Property(
 *          property="name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="email",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="email_verified_at",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="password",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="remember_token",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class User extends Model implements Authenticatable
{
    use HasApiTokens;

    public $table = 'users';

    public $fillable = [
        'roles_id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    public static array $rules = [
        'roles_id' => 'required',
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getAuthIdentifierName()
     {
         return 'id'; // Puedes cambiar 'id' al nombre de la columna que se utiliza como identificador en tu tabla de usuarios.
     }

     public function getRolesId()
     {
         return 'roles_id'; // 
     }
 
     public function getAuthIdentifier()
     {
         return $this->getKey();
     }
 
     public function getAuthPassword()
     {
         return $this->password;
     }
 
     public function getRememberToken()
     {
         return $this->remember_token;
     }
     
     public function setRolesId($value)
     {
         $this->roles_id = $value;
     }

     public function setRememberToken($value)
     {
         $this->remember_token = $value;
     }
 
     public function getRememberTokenName()
     {
         return 'remember_token';
     }
     public function setPasswordAttribute($value)
     {
        if(Hash::needsRehash($value)) 
            $password = Hash::make($value);

        $this->attributes['password'] = $value;
     }
 
    /**
     * Get the transactions for one qrcode.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Roles::class);
    }
    
    public function qrcodes(): HasMany
    {
        return $this->hasMany(Qrcode::class);
    }
}
