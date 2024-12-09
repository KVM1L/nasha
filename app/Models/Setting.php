<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $fillable = ['key', 'value'];

    public $translatable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Допустим, вы храните список переводимых ключей в config('app.translatable_keys')
        $this->translatable = config('app.translatable_keys', []);
    }

    public function getValueAttribute($value)
    {
        // Убедимся, что ключ 'key' существует в атрибутах
        if (isset($this->attributes['key']) && in_array($this->attributes['key'], $this->translatable)) {
            // Если ключ переводимый, вернуть переводы
            return $this->getTranslations('value');
        }

        // Если значение хранится как JSON, декодируем, иначе возвращаем как есть
        return json_decode($value, true) ?? $value;
    }

    public function setValueAttribute($value)
    {
        if (in_array($this->attributes['key'], $this->translatable)) {
            // Если значение переводимое, value должен быть массивом вида ['en' => '...', 'ru' => '...']
            // Spatie Translatable использует setTranslation или setTranslations.
            // Мы можем напрямую установить переводы так:
            $this->setTranslations('value', $value);
        } else {
            // Если значение не переводимое, просто сохраняем его как JSON
            $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
        }
    }
}
