<?php

namespace App\Livewire;

use App\Models\Film;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Genre;


class Films extends Component
{
    use WithFileUploads;
    use WithPagination;

    public int $perPage = 2;
    public string $search = '';
    public $dateRange;
    public Film|null $film;
    public $images = [];
    public $name = " ";
    public $title = " ";
    public $duration = " ";
    public $description = " ";
    public $trailer = " ";
    public $genre = " ";
    public $condition1 = false;
    public $condition2 = false;
    public bool $selectAll = false;

    public $release_date = " ";
    public $file = [];
    public $showModal = false;
    public $editing = false;
    public $adding = false;
    public $deleting = false;
    public $deletingSelected = false;
    

    public string $sortField = 'id';
    public string $sortDirection = 'asc';
    public array $filmSelected = [];


    public function mount()
    {
        // $this->films = Film::all();
        // dd($this->films);
    }
    public function render()
    {
        // dd(Genre::all());
        return view('livewire.films', [
            'films' => $this->getFilmPaginate(),
            'genres'=> Genre::all()
        ]);
    }
    public function closeModal()
    {
        $this->adding = false;
        $this->editing = false;
        $this->deleting = false;
        $this->deletingSelected = false;
        $this->filmSelected = [];
        $this->film = null;
    }
    public function submitForm()
    {
        // dd(1);
        if ($this->editing) {
            $this->updateFilm();
        }
        if ($this->adding) {
            $this->insertFilm();
        }
        if ($this->deleting) {
            $this->deleteFilm();
        }
        if ($this->deletingSelected) {
            $this->deleteFilmSelect();
        }
        $this->closeModal();
    }
    public function updatedPage($page)
    {
        $this->filmSelected = [];
        $this->selectAll = false;
        $this->dispatch('updatePage');
    }
    public function sortBy($sortField): void
    {
        $this->sortField = $sortField;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    public function setDateRange($dateRange)
    {
        $this->dateRange = $dateRange;
    }

    public function getFilmPaginate()
    {
        return Film::search($this->search)
            ->when($this->dateRange, function ($query) {
                if (str_contains($this->dateRange, ' to ')) {
                    $query->whereBetween('created_at', convertDateRange($this->dateRange));
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function showModalInsert()
    {
        $this->closeModal();
        $this->adding = true;
    }

    public function showModalEdit($id_film)
    {
        // dd($this->showModalEdit);
        $this->closeModal();
        $this->editing = true;
        $this->film = Film::find($id_film);
        $this->name = $this->film->name;
        $this->title = $this->film->title;
        $this->duration = $this->film->duration;
        $this->trailer = $this->film->trailer;
        $this->genre = $this->film->genre;
        $this->description = $this->film->description;
        $this->release_date = $this->film->release_date;
    }

   
    public function checkFilm()
    {
        dd(Str::slug($this->title));
    }

    public function insertFilm()
    {
        $this->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'release_date' => 'required',
            'images.cover' => 'required',
            'images.gallery' => 'required',
            'trailer' => 'required',
            'genre' => 'required',
        ]);
        $film = new Film();
        if ($this->images['cover']) {
            $path = $this->images['cover']->store('uploads', 'public');
            $this->file['cover'] = Storage::url($path);
        }
        if ($this->images['gallery']) {
            foreach ($this->images['gallery'] as $key => $value) {
                $path = $this->images['gallery'][$key]->store('uploads', 'public');
                $this->file['gallery'][$key] = Storage::url($path);
            }
        }
        $film->name = $this->name;
        $film->title = $this->title;
        $film->description = $this->description;
        $film->release_date = $this->release_date;
        $film->trailer = $this->trailer;
        $film->images = $this->file;
        $film->duration = $this->duration;
        $film->genre = $this->genre;
        $film->save();
    }

    public function updateFilm()
    {
        // dd($this->title);
        $this->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'release_date' => 'required',
            'trailer' => 'required',
            'genre' => 'required',
        ]);

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
                $this->file['cover'] = Storage::url($path);
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
                        $this->file['gallery'][$key] = Storage::url($path);
                }
                $this->condition2 = true;
            }
            
        }
        // dd($this->value);
        Film::where('id', $this->film->id)
                ->when($this->condition1, function ($query) {
                    $query->update([
                        'images->cover' => $this->file['cover'],
                    ]);
                })
                ->when($this->condition2, function ($query) {
                    $query->update([
                        'images->gallery' => $this->file['gallery'],
                    ]);
                })->update([
                    'name' => $this->name,
                    'title' => $this->title,
                    'description'=>$this->description,
                    'release_date'=>$this->release_date,
                    'trailer'=>$this->trailer,
                    'duration'=>$this->duration,
                    'genre'=>$this->genre
                ]);
    }
    public function updatedSelectAll($selectAll): void
    {
        if ($selectAll) {
            $filmIds = array_map(fn($filmId) => strval($filmId), $this->getFilmPaginate()->pluck('id')->toArray());
            $this->filmSelected = $filmIds;
        } else {
            $this->filmSelected = [];
        }
    }
    public function deleteFilm(){
        // dd($this->film);

        if (File::exists(public_path($this->film->images['cover']))) {
            unlink(public_path($this->film->images['cover']));
        }
        foreach ($this->film->images['gallery'] as $key => $value) {
            if (File::exists(public_path($value))) {
                unlink(public_path($value));
            }
        }
        $this->film->delete();
    }
    public function deleteFilmSelect(): void
    {
        if (count($this->filmSelected) > 0) {
            Film::whereIn('id', $this->filmSelected)->delete();
        }
    }
    public function getFilmSelected()
    {
        dd($this->selectAll, $this->filmSelected);
    }
    public function showModalDelete(Film|null $film = null)
    {
        if ($film->id == null) {
            $this->deletingSelected = true;
        } else {
            $this->deleting = true;
            $this->film = $film;
        }
    }
}
