<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Films extends Component
{
    use WithFileUploads;
    public $films;
    public $film;
    public $images = [];
    public $value = [];
    public $title = " ";
    public $duration = " ";
    public $trailer = " ";
    public $genre = " ";
    public $condition1 = false;
    public $condition2 = false;
    public $description = "";
    public $release_date = " ";
    public $file;
    public $showModal = false;
    public $editting = false;

    public function mount()
    {
        $this->films = Film::all();
        $this->film = (object)[];
        // dd($this->films);
    }
    public function render()
    {
        return view('livewire.films');
    }

    public function showModalInsert()
    {
        $this->showModal = true;
    }

    public function showModalEdit($id_film)
    {
        // dd($this->showModalEdit);
        $this->film = Film::find($id_film);
        $this->title = $this->film->title;
        $this->duration = $this->film->duration;
        $this->trailer = $this->film->trailer;
        $this->genre = $this->film->genre;
        $this->description = $this->film->description;
        $this->release_date = $this->film->release_date;
        $this->editting = true;
    }

    public function closeModalInsert()
    {
        $this->showModal = false;
    }
    public function checkFilm()
    {
        dd('?????????');
    }

    public function insertFilm()
    {
        $film = new Film();
        $hehe = $this->value;
        if ($this->images['cover']) {
            $path = $this->images['cover']->store('uploads', 'public');
            $hehe['images']['cover'] = Storage::url($path);
        }
        if ($this->images['gallery']) {
            foreach ($this->images['gallery'] as $key => $value) {
                $path = $this->images['gallery'][$key]->store('uploads', 'public');
                $hehe['images']['gallery'][$key] = Storage::url($path);
            }
        }
        $film->title = $this->title;
        $film->description = $this->description;
        $film->release_date = $this->release_date;
        $film->trailer = $this->trailer;
        $film->images = $hehe['images'];
        $film->duration = $this->duration;
        $film->genre = $this->genre;
        $film->save();
    }

    public function updateFilm()
    {
        
        // dd(public_path($this->film->images['cover']));

        // $condition2 = false;
        if (!$this->images) {
            $this->condition1 = false;
            $this->condition2 = false;
        }

        if ($this-> images) {
            if (isset($this->images['cover'])) {
                if (File::exists(public_path($this->film->images['cover']))) {
                    unlink(public_path($this->film->images['cover']));
                }
                $path = $this->images['cover']->store('uploads', 'public');
                $this->value['images']['cover'] = Storage::url($path);
                $this->condition1 = true;
            }
            if (isset($this->images['gallery'])) {
                foreach ($this->film->images['gallery'] as $key => $value) {
                    if (File::exists(public_path($value))) {
                        unlink(public_path($value));
                    }
                }
                foreach ($this->images['gallery'] as $key => $value) {
                        $path = $this->images['gallery'][$key]->store('uploads', 'public');
                        $this->value['images']['gallery'][$key] = Storage::url($path);
                }
                $this->condition2 = true;
            }
            
        }
        // dd($this->value);
        Film::where('id', $this->film->id)
                ->when($this->condition1, function ($query) {
                    $query->update([
                        'images->cover' => $this->value['images']['cover'],
                    ]);
                })
                ->when($this->condition2, function ($query) {
                    $query->update([
                        'images->gallery' => $this->value['images']['gallery'],
                    ]);
                })->update([
                    'title' => $this->title,
                    'description'=>$this->description,
                    'release_date'=>$this->release_date,
                    'trailer'=>$this->trailer,
                    'duration'=>$this->duration,
                    'genre'=>$this->genre
                ]);
    }

    public function deleteFilm($id_film){
        $this->film = Film::find($id_film);
        if (File::exists(public_path($this->film->images['cover']))) {
            unlink(public_path($this->film->images['cover']));
        }
        foreach ($this->film->images['gallery'] as $key => $value) {
            if (File::exists(public_path($value))) {
                unlink(public_path($value));
            }
        }
        Film::find($id_film)->delete();
    }
}
