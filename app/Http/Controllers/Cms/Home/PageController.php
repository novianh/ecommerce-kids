<?php

namespace App\Http\Controllers\Cms\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutHome;
use App\Models\DiscHome;
use App\Models\Hero;
use App\Models\NewHome;
use App\Models\Story;
use App\Models\WwdHome;
use Illuminate\Container\BoundMethod;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use League\CommonMark\Node\Inline\Newline;

class PageController extends Controller
{
    public function slider()
    {
        return \view('cms.home.hero', [
            'hero' => Hero::latest()->first(),
            'new' => NewHome::latest()->first()
        ]);
    }
    public function wwd()
    {
        return \view('cms.home.wwd', [
            'wwd' => WwdHome::latest()->first(),
        ]);
    }
    public function promo()
    {
        return \view('cms.home.promo', [
            'hero' => Hero::latest()->first(),
            'new' => NewHome::latest()->first(),
            'promo' => DiscHome::latest()->first(),
        ]);
    }
    public function about()
    {
        return \view('cms.home.about', [
            'hero' => Hero::latest()->first(),
            'new' => NewHome::latest()->first(),
            'promo' => DiscHome::latest()->first(),
            'about' => About::all(),
            'aboutHome' => AboutHome::latest()->first(),
            'story' => Story::all()
        ]);
    }


    public function create()
    {
        //
    }


    public function sliderStore(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
                'desc_new' => 'required',
            ],
            [
                'title.required' => 'Wajib Diisi',
                'desc.required' => 'Wajib Diisi',
                'desc_new.required' => 'Wajib Diisi',

            ]
        );

        $input_slider = $request->only([
            'title', 'desc'
        ]);
        $input_new = $request->only('desc_new');
        if ($request->file('image')) {
            $image = $request->file('image');
            if (isset($request->id)) {
                unlink("storage/hero/" . Hero::find($request->id)->image);
            }
            $nama_image = date('d-m-Y His') . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/hero';
            $image->storeAs($tujuan_upload, $nama_image);
            $input_slider['image'] = "$nama_image";
            Hero::updateOrCreate(['id' => $request->id], [
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $nama_image
            ]);
            NewHome::updateOrCreate([
                'id' => $request->id_new,
            ], [
                'desc' => $request->desc_new
            ]);
        } else {
            unset($input_slider['image']);
            $hero = Hero::find($request->id);
            $hero->update($input_slider);
            // $new = NewHome::find($request->id_new);
            NewHome::updateOrCreate([
                'id' => $request->id_new,
            ], [
                'desc' => $request->desc_new
            ]);
        }


        return redirect()->route('slider.index')
            ->with('success_message', 'Your Action Success');
    }
    public function wwdStore(Request $request)
    {

        // \dd($request);
        $request->validate(
            [
                'title1' => 'required',
                'desc1' => 'required',
                'desc2' => 'required',
                'title2' => 'required',
            ]
        );


        $input = $request->all();
        if ($request->file('image1') && !$request->file('image2')) {
            $image1 = $request->file('image1');


            if (isset($request->id)) {
                unlink("storage/wwd/" . WwdHome::find($request->id)->image1);
            }
            $nama_image1 = date('d-m-Y His') . uniqid() . "_" . $image1->getClientOriginalName();
            $tujuan_upload = 'public/wwd';
            $image1->storeAs($tujuan_upload, $nama_image1);
            $input['image1'] = "$nama_image1";
            unset($input['image2']);
            WwdHome::updateOrCreate(['id' => $request->id], [
                'title1' => $request->title1,
                'desc1' => $request->desc1,
                'image1' => $nama_image1,
                'title2' => $request->title2,
                'desc2' => $request->desc2,
            ]);
        } elseif ($request->file('image2') && !$request->file('image1')) {
            $image2 = $request->file('image2');
            if (isset($request->id)) {
                unlink("storage/wwd/" . WwdHome::find($request->id)->image2);
            }
            $nama_image2 = date('d-m-Y His') . uniqid() . "_" . $image2->getClientOriginalName();
            $tujuan_upload = 'public/wwd';
            $image2->storeAs($tujuan_upload, $nama_image2);
            $input['image2'] = "$nama_image2";
            unset($input['image1']);
            WwdHome::updateOrCreate(['id' => $request->id], [
                'title1' => $request->title1,
                'desc1' => $request->desc1,
                'image2' => $nama_image2,
                'title2' => $request->title2,
                'desc2' => $request->desc2,
            ]);
        } elseif ($request->file('image2') && $request->file('image1')) {
            $image1 = $request->file('image1');
            $image2 = $request->file('image2');
            // dd($input);
            if (isset($request->id)) {
                unlink("storage/wwd/" . WwdHome::find($request->id)->image1);
                unlink("storage/wwd/" . WwdHome::find($request->id)->image2);
            }
            $nama_image1 = date('d-m-Y His') . \uniqid() . "_" . $image1->getClientOriginalName();
            $nama_image2 = date('d-m-Y His') . \uniqid() . "_" . $image2->getClientOriginalName();
            $tujuan_upload = 'public/wwd';
            $image1->storeAs($tujuan_upload, $nama_image1);
            $image2->storeAs($tujuan_upload, $nama_image2);
            $input['image1'] = "$nama_image1";
            $input['image2'] = "$nama_image2";

            WwdHome::updateOrCreate(['id' => $request->id], [
                'title1' => $request->title1,
                'desc1' => $request->desc1,
                'image1' => $nama_image1,
                'image2' => $nama_image2,
                'title2' => $request->title2,
                'desc2' => $request->desc2,
            ]);
        } else {
            unset($input['image1']);
            unset($input['image2']);
            $wwd = WwdHome::find($request->id);
            $wwd->update($input);
        }


        return redirect()->route('wwd.index')
            ->with('success_message', 'Your Action Success');
    }

    public function promoStore(Request $request)
    {

        // \dd($request);
        $request->validate(
            [
                'title' => 'required',
                'discount' => 'required|numeric',
            ],
            [
                'title.numeric' => 'Number Only',
            ]
        );


        $input = $request->all();
        if ($request->file('image') && !$request->file('icon')) {
            $image = $request->file('image');


            if (isset($request->id)) {
                unlink("storage/promo/" . DiscHome::find($request->id)->image);
            }
            $nama_image = date('d-m-Y His') . uniqid() . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/promo';
            $image->storeAs($tujuan_upload, $nama_image);
            $input['image'] = "$nama_image";
            unset($input['icon']);
            DiscHome::updateOrCreate(['id' => $request->id], [
                'title' => $request->title,
                'discount' => $request->discount,
                'image' => $nama_image,

            ]);
        } elseif ($request->file('icon') && !$request->file('image')) {
            $icon = $request->file('icon');
            if (isset($request->id)) {
                unlink("storage/promo/icon" . DiscHome::find($request->id)->icon);
            }
            $nama_icon = date('d-m-Y His') . uniqid() . "_" . $icon->getClientOriginalName();
            $tujuan_upload = 'public/promo/icon';
            $icon->storeAs($tujuan_upload, $nama_icon);
            $input['icon'] = "$nama_icon";
            unset($input['image']);
            DiscHome::updateOrCreate(['id' => $request->id], [
                'title' => $request->title,
                'discount' => $request->discount,
                'icon' => $nama_icon,

            ]);
        } elseif ($request->file('icon') && $request->file('image')) {
            $image = $request->file('image');
            $icon = $request->file('icon');
            // dd($input);
            if (isset($request->id)) {
                unlink("storage/promo/" . DiscHome::find($request->id)->image);
                unlink("storage/promo/icon/" . DiscHome::find($request->id)->icon);
            }
            $nama_image = date('d-m-Y His') . \uniqid() . "_" . $image->getClientOriginalName();
            $nama_icon = date('d-m-Y His') . \uniqid() . "_" . $icon->getClientOriginalName();
            $tujuan_upload = 'public/promo';
            $tujuan_upload_icon = 'public/promo/icon';
            $image->storeAs($tujuan_upload, $nama_image);
            $icon->storeAs($tujuan_upload_icon, $nama_icon);
            $input['image'] = "$nama_image";
            $input['icon'] = "$nama_icon";

            DiscHome::updateOrCreate(['id' => $request->id], [
                'title' => $request->title,
                'discount' => $request->discount,
                'image' => $nama_image,
                'icon' => $nama_icon,

            ]);
        } else {
            unset($input['image']);
            unset($input['icon']);
            $wwd = DiscHome::find($request->id);
            $wwd->update($input);
        }


        return redirect()->route('promo.index')
            ->with('success_message', 'Your Action Success');
    }
    public function storyStore(Request $request)
    {

        // \dd($request);
        $request->validate(
            [
                'title' => 'required',
                'year' => 'required',
                'desc' => 'required',
            ],
        );

        // \dd($request);

        $input = $request->all();
        Story::create($input);

        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }
    public function aboutStore(Request $request)
    {

        // \dd($request);
        $request->validate(
            [
                'subtitle' => 'required',
                'icon' => 'required',
            ],
        );

        // \dd($request);

        $input = $request->all();

        $icon = $request->file('icon');

        $nama_image = date('d-m-Y His') . uniqid() . "_" . $icon->getClientOriginalName();
        $tujuan_upload = 'public/about';
        $icon->storeAs($tujuan_upload, $nama_image);
        $input['icon'] = "$nama_image";

        About::create($input);


        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }
    public function subtitleStore(Request $request)
    {

        // \dd($request);
        $request->validate(
            [
                'subtitle' => 'required',

            ],
        );

        // $input = $request->all();
        AboutHome::updateOrCreate(['id' => $request->id], ['subtitle' => $request->subtitle]);

        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }

    public function show($id)
    {
        //
    }


    public function aboutEdit($id)
    {
        $story = About::find($id);
        return \view('cms.home.aboutEdit', [
            'about' => $story
        ]);
    }


    public function aboutUpdate(Request $request, $id)
    {

        $data = About::find($id);
        $input = $request->all();
        if ($request->file('icon')) {

            if ($data->icon) {
                unlink("storage/about/" . $data->icon);
            }
            $image = $request->file('icon');
            $nama_image = date('d-m-Y His') . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/about';
            $image->storeAs($tujuan_upload, $nama_image);
            $thumbnail['icon'] = "$nama_image";
            $data->update([
                'icon' => $nama_image,
            ]);
            $data->save;
        } else{
            unset($input['icon']);
            $data->update($request->all());
        }

        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }
    public function storyEdit($id)
    {
        $story = Story::find($id);
        return \view('cms.home.storyEdit', [
            'story' => $story
        ]);
    }


    public function storyUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required',
            'desc' => 'required'
        ]);

        Story::find($id)->update($request->all());

        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }


    public function aboutDestroy($id)
    {
        // \dd($id);
        $icon = About::find($id);
        // dd($icon);

        if ($icon->icon) {
            \unlink("storage/about/" . $icon->icon);
        }

        $icon->delete();
        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }

    public function storyDestroy($id)
    {
        // \dd($id);
        $story = Story::find($id);
        // dd($icon);

        $story->delete();
        return redirect()->route('about.index')
            ->with('success_message', 'Your Action Success');
    }
}
