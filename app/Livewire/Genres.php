<?php

namespace App\Livewire;

use App\Models\Genre;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Genres extends Component
{
    use WithPagination;

    public int $perPage = 2;
    public string $search = '';
    public $dateRange;
    public Genre|null $genre;
    #[Validate('required')]
    public string $name = '';
    public array $seats;

    public bool $deleting = false;
    public bool $deletingSelected = false;
    public bool $editing = false;
    public bool $adding = false;

    public bool $selectAll = false;
    public array $seatSelected = [];
    public array $genreSelected = [];

    public string $sortField = 'id';
    public string $sortDirection = 'asc';

    public function sortBy($sortField): void
    {
        $this->sortField = $sortField;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function mount()
    {
        $this->seatSelected = [];
    }

    public function setDateRange($dateRange)
    {
        $this->dateRange = $dateRange;
    }

    public function updatedPage($page)
    {
        $this->genreSelected = [];
        $this->selectAll = false;
        $this->dispatch('updatePage');
    }

    public function render()
    {
        return view('livewire.genres', [
            'genres' => $this->getGenrePaginate()
        ]);
    }

    public function getGenrePaginate()
    {
        return Genre::search($this->search)
            ->when($this->dateRange, function ($query) {
                if (str_contains($this->dateRange, ' to ')) {
                    $query->whereBetween('created_at', convertDateRange($this->dateRange));
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function showModalEdit($genre_id)
    {
        $this->closeModal();
        $this->editing = true;
        $this->genre = Genre::find($genre_id);
        $this->name = $this->genre->name;
        $this->seats = json_decode(File::get('data/seats.json'), true);
        foreach ($this->genre->seats as $row) {
            foreach ($row as $key => $seat) {
                if ($seat['error']) {
                    $this->seatSelected[] = $key;
                }
            }
        }
    }

    public function showModalAdd()
    {
        $this->closeModal();
        $this->adding = true;
        $this->name = '';
        $this->seats = json_decode(File::get('data/seats.json'), true);
    }

    public function closeModal()
    {
        $this->adding = false;
        $this->editing = false;
        $this->deleting = false;
        $this->deletingSelected = false;
        $this->genre = null;
        $this->seatSelected = [];
        $this->genreSelected = [];
    }

    public function submitForm()
    {
        if ($this->editing) {
            $this->updateGenre();
        }
        if ($this->adding) {
            $this->addGenre();
        }
        if ($this->deleting) {
            $this->deleteGenre();
        }
        if ($this->deletingSelected) {
            $this->deleteGenreSelect();
        }
        $this->closeModal();
//        $this->Genres = Genre::all();
    }

    public function addGenre()
    {
        $this->validate();
        foreach ($this->seatSelected as $seat) {
            $this->seats[explode('_', $seat)[0]][$seat]['error'] = true;
        }

        Genre::create([
            'name' => $this->name,
            'seats' => $this->seats
        ]);
    }

    public function updateGenre()
    {

        foreach ($this->seatSelected as $seat) {
            $this->seats[explode('_', $seat)[0]][$seat]['error'] = true;
        }
        Genre::where('id', $this->genre->id)->update([
            'name' => $this->name,
            'seats' => $this->seats
        ]);
    }

    public function deleteGenre(): void
    {
        $this->genre->delete();
    }

    public function deleteGenreSelect(): void
    {
        if (count($this->genreSelected) > 0) {
            Genre::whereIn('id', $this->genreSelected)->delete();
        }
    }

    public function showModalDelete(Genre|null $genre = null)
    {
        if ($genre->id == null) {
            $this->deletingSelected = true;
        } else {
            $this->deleting = true;
            $this->genre = $genre;
        }
    }

    // debug fn
    public function getSeatSelected()
    {
//        dd($this->seatSelected);
    }

    public function getGenreSelected()
    {
        dd($this->selectAll, $this->genreSelected);
    }

    public function updatedSelectAll($selectAll): void
    {
        if ($selectAll) {
            $genreIds = array_map(fn($genreId) => strval($genreId), $this->getGenrePaginate()->pluck('id')->toArray());
            $this->genreSelected = $genreIds;
        } else {
            $this->genreSelected = [];
        }
    }
}
