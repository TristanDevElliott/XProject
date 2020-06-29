<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Setting extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'settings';

    protected $appends = [
        'app_logo',
        'app_favicon',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const USERS_CAN_REGISTER_SELECT = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    const POSTS_PER_PAGE_SELECT = [
        '0' => '5',
        '1' => '10',
        '2' => '15',
        '3' => '20',
    ];

    protected $fillable = [
        'app_name',
        'app_description',
        'app_keywords',
        'app_author',
        'app_author_link',
        'users_can_register',
        'admin_email',
        'posts_per_page',
        'default_role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getAppLogoAttribute()
    {
        $file = $this->getMedia('app_logo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getAppFaviconAttribute()
    {
        $file = $this->getMedia('app_favicon')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function default_role()
    {
        return $this->belongsTo(Role::class, 'default_role_id');
    }
}
