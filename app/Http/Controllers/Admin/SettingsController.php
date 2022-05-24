<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ecommereTrait;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SettingsController extends Controller
{
    use ecommereTrait;

    public function siteSettings()
    {
        $settings = Setting::find(1);

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::find(1);

        $settings->update($request->except('_token'));

        return redirect()->route('site.settings')->with(['Settings updated successfully.', 'success']);
    }

    // Update Site Images or Site Data
    public function updateAll(Request $request)
    {
        $settings = Setting::find(1);
//        return response()->json($request);

        if ($request->has('site_logo')) {
            $logo = $request->file('logo');

            // delete image if site has one
            if ($settings->logo != null) {
                $this->deletImage("images\site\\", $settings->logo);
            }

            // save image in the project
            $logo = $this->saveImage($logo, 'images/site');

            if (!$settings) {
                Setting::create([
                    'logo' => $logo
                ]);
            } else {
                return response()->json('logo');
                // update image in db
                $settings->update([
                    'logo' => $logo,
                ]);
            }

        } elseif ($request->has('site_favicon')) {
            $favicon = $request->file('favicon');

            // delete image if site has one
            if ($settings->favicon != null) {
                $this->deletImage("images\site\\", $settings->favicon);
            }

            // save image in the project
            $favicon = $this->saveImage($favicon, 'images/site');

            if (!$settings) {
                Setting::create([
                    'favicon' => $favicon
                ]);
            } else {
                return response()->json('favicon');
                // update image in db
                $settings->update([
                    'favicon' => $favicon,
                ]);
            }

        } else {

            $keys = $request->except('_token');

            if (!$settings) {
                Setting::create($request->except('_token'));
            } else {
                foreach ($keys as $key => $value) {
                    $settings->update([
                        $key => $value,
                    ]);
                }
            }

        }
        return redirect()->route('site.settings')->with(['Settings updated successfully.', 'success']);
    }

}
