<?php

namespace App\Models;

//use NotificationChannels\WebPush\HasPushSubscriptions;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mediable;
use App\Models\Profile;
use Carbon\Carbon;
use App\Models\Media;
use App\Models\Countrie;
use App\Models\Objective;
use App\Models\Offer;
use App\Models\People;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class User extends Model implements  AuthenticatableContract, AuthorizableContract,  CanResetPasswordContract {


    use Notifiable;
    use Mediable;
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    //use Notifiable;
    //use Notifiable ,HasPushSubscriptions;


     /**
     * The database table used by the model.
     *
     * @var string
     */

     protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'firstname',
         'lastname',
         'cellphone',
         'phone',
         'organization',
         'charge',
         'email',
         'password',
         'terms',
         'purchases',
         'profile_id',
         'countrie_id',
         'created_at',
         'updated_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



     /**
     * Get the user's fullname titleized.
     *
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return title_case($this->name);
    }

    public static function auth(){

        return Auth::user();
    }



    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query ,$available)
    {
        return $query->where('available', $available)->get();
    }



    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeId($query ,$id)
    {
        return $query->where('id', $id)->first();
    }





    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeConditions($query)
    {
        return $query->where('profile_id', '>=', 3)->orderBy('profile_id', 'asc');
    }

    public static function validate($email){

            $existenceUser= User::where('email', $email)->get();

            if ($existenceUser->count() == 1) {
                return $existenceUser;
            }else{
                return null;
            }
    }

    /**
     * Encrypt the user's password.
     *
     * @param string $passwword
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


     public function validateCurrentPassword($attribute, $value, $parameters)
    {
        return Hash::check($value, Auth::user()->clave);
    }

    /**
     * Scope a query to only include users registered last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])
                     ->latest();
    }

    /**
     * Scope a query to order users by latest registered.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

     /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeToken($query ,$slack)
    {
        return $query->where('slack', $slack)->first();
    }


     /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEmail($query ,$email)
    {
        return $query->where('email', $email)->first();
    }



     /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilters($query ,$value)
    {
        $profiles = Profile::slug($value);

        return $query->where('profile_id', $profiles->id)->get();
    }





    public static function generate(){

        $token = User::random();
        $existenceToken = User::existence($token);

        if ($existenceToken!= null) {
            existence();
        }else{
        return $token;
        }
    }

    public static function random(){

            $incluye=true;
            $longitud=20;
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

            if($incluye) {
                $arrPassResult="";
                for($i=0;$i<$longitud;$i++){
                    $arrPassResult.=$caracteres[rand(0,strlen($caracteres)-1)];
                }
            }

            return $arrPassResult;
    }

    public static function existence($token){

            return User::where("token", '=', $token)->first();
    }




      /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasThumbnail(): bool
    {
        return $this->hasMedia($this->id);
    }


      /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasCertificate(): bool
    {
        return $this->hasMedia($this->id);
    }


    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function certificate()
    {
         return $this->media()->where('mime_type', "Certificate")->where('featured', 1)->where('mediable_id', $this->id)->first();
    }


    /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function storeAndSetCertificate(UploadedFile $thumbnail , $uploaded)
    {

        return  $this->media()->create([
            'filename' => $uploaded,
            'featured' => 1,
            'original_filename' => $uploaded,
            'mime_type' => 'Certificate',
            'type' => 'Certificate'
        ]);

    }


      /**
     * Store and set the post's thumbnail
     *
     * @return void
     */
    public function deleteCertificate()
    {
         $media =  $this->media()->where('mime_type', "Certificate")->where('featured', 1)->where('mediable_id', $this->id)->first();

        if($media!=null){
             $string = $media->filename;
             $exists = Storage::disk('pages')->exists('/certificates'.'/'.$string);
             $elemnt = Storage::disk('pages')->delete('/certificates'.'/'.$string);
             $media->delete();
        }else{

        }

    }

    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function profiles()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }


    /**
    * Return the post's author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function objectives(){
        return $this->belongsToMany(Objective::class,'objective_user')->withPivot('objective_id');
    }

    public function offers(){
        return $this->belongsToMany(Offer::class,'offer_user')->withPivot('offer_id');
    }




}


