<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function edit()
    {
        // Получаем текущие значения настроек в виде ключ-значение
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        // Валидация данных
        $data = $request->validate([
            'telegram' => 'nullable|string',
            'instagram' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'google_maps_url' => 'nullable|url',
            'map_image' => 'nullable|image|max:8192', // Максимальный размер 2МБ
        ]);

        $settings = Setting::pluck('value', 'key')->toArray();

        // Обработка изображения карты
        if ($request->hasFile('map_image')) {
            // Удаляем старое изображение карты, если есть
            if (!empty($settings['map_image'])) {
                Storage::delete($settings['map_image']);
            }

            // Сохраняем новое изображение
            $data['map_image'] = $request->file('map_image')->store('settings', 'public');
        }

        // Сохраняем каждую настройку
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key], // Поиск по ключу
                ['value' => $value] // Обновление значения
            );
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }

    public function editAbout()
    {
        // Получаем все текущие настройки
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.about.edit', compact('settings'));
    }

    public function updateAbout(Request $request)
    {
        $data = $request->validate([
            'about_video' => 'nullable|file|mimetypes:video/mp4,video/mov,video/avi|max:204800',
            'about_description' => 'nullable|array',
            'blocks' => 'nullable|array',
            'quote' => 'nullable|array',
            'quote_author' => 'nullable|array',
            'about_photo_1' => 'nullable|image|max:8192',
            'about_photo_2' => 'nullable|image|max:8192',
        ]);

        $settings = Setting::pluck('value', 'key')->toArray();

        // Обработка файлов
        if ($request->hasFile('about_video')) {
            if (!empty($settings['about_video'])) {
                Storage::delete($settings['about_video']);
            }
            $data['about_video'] = $request->file('about_video')->store('settings', 'public');
        }

        if ($request->hasFile('about_photo_1')) {
            if (!empty($settings['about_photo_1'])) {
                Storage::delete($settings['about_photo_1']);
            }
            $data['about_photo_1'] = $request->file('about_photo_1')->store('settings', 'public');
        }

        if ($request->hasFile('about_photo_2')) {
            if (!empty($settings['about_photo_2'])) {
                Storage::delete($settings['about_photo_2']);
            }
            $data['about_photo_2'] = $request->file('about_photo_2')->store('settings', 'public');
        }

        // Сохранение данных
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? json_encode($value) : $value]
            );
        }

        return redirect()->route('admin.about.edit')->with('success', 'About Us information updated successfully.');
    }
}
